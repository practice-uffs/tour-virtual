var svg = document.querySelector("#svg");
var reset = document.querySelector("#reset");
var pivot = document.querySelector("#pivot");
var proxy = document.createElement("div");
var viewport = document.querySelector("#viewport");
var rotateThreshold = 4;
var reachedThreshold = false;

var point = svg.createSVGPoint();
var startClient = svg.createSVGPoint();
var startGlobal = svg.createSVGPoint();

var viewBox = svg.viewBox.baseVal;

var cachedViewBox = {
  x: viewBox.x,
  y: viewBox.y,
  width: viewBox.width,
  height: viewBox.height
};

var zoom = {
  animation: new TimelineLite(),
  scaleFactor: 1.4,
  duration: 0.4,
  ease: Power2.easeOut,
};

var limits = {
  min: {
    x: -400,
    y: -400, 
    width: cachedViewBox.width,
    height: cachedViewBox.height
  },
  max: {
      x: 1200,
      y: 1200 , 
      width: viewBox.width/4,
      height: viewBox.height/4
  }
  
}

TweenLite.set(pivot, { scale: 0 });

var resetAnimation = new TimelineLite();
var pivotAnimation = TweenLite.to(pivot, 0.1, {
  alpha: 1,
  scale: 1,
  paused: true,
});

var pannable = new Draggable(proxy, {
  throwResistance: 3000,
  trigger: svg,
  throwProps: true,
  onPress: selectDraggable,
  onDrag: updateViewBox,
  onThrowUpdate: updateViewBox,
});

var rotatable = new Draggable(viewport, {
  type: "rotation",
  trigger: svg,
  throwProps: true,
  liveSnap: true,
  snap: checkThreshold,
  onPress: selectDraggable,
});

rotatable.disable();


svg.addEventListener('click',function(){
  $("#search").trigger('blur');
  $("#menu").css('display','none')
})
reset.addEventListener("click", function(){
  resetViewport(cachedViewBox);
});
svg.addEventListener("wheel", onWheel);
window.addEventListener("resize", function() {
  pivotAnimation.reverse();
});

window.addEventListener("contextmenu", function(event) {
  event.preventDefault();
  event.stopPropagation();
  return false;
});




//
// LIMIT ZOOM
// ===========================================================================

function limitZoom(scaleDelta,startPoint,fromVars){
  _x = viewBox.x -(startPoint.x - viewBox.x) * (scaleDelta - 1);
  _y = viewBox.y -(startPoint.y - viewBox.y) * (scaleDelta - 1);
  _width = viewBox.width * scaleDelta;
  _height = viewBox.height * scaleDelta;
  zoom_minimo =  _width < limits.min.width  && _height < limits.min.height;
  zoom_maximo =  _width > limits.max.width  && _height > limits.max.height;
  if(zoom_minimo && zoom_maximo){
    viewBox.x = _x;
    viewBox.y = _y
    viewBox.width = _width;
    viewBox.height = _height;
    zoom.animation = TweenLite.from(viewBox, zoom.duration, fromVars);
  }
}


//
// LIMIT DRAG
// ===========================================================================

function limitDrag(moveGlobal){
  _x = viewBox.x - (moveGlobal.x - startGlobal.x)
  _y = viewBox.y - (moveGlobal.y - startGlobal.y)
  if(_x > limits.min.x && _x < limits.max.x){
    viewBox.x = _x;
  }
  if(_y > limits.min.y && _y < limits.max.y){
    viewBox.y = _y;
  }
}

//
// ON WHEEL
// =========================================================================== 

function onWheel(event) {
  
  pivotAnimation.reverse();
  
  var normalized;  
  var delta = event.wheelDelta;

  if (delta) {
    normalized = (delta % 120) == 0 ? delta / 120 : delta / 12;
  } else {
    delta = event.deltaY || event.detail || 0;
    normalized = -(delta % 3 ? delta * 10 : delta / 3);
  }
  
  var scaleDelta = normalized > 0 ? 1 / zoom.scaleFactor : zoom.scaleFactor;
  
  point.x = event.clientX;
  point.y = event.clientY;
  
  var startPoint = point.matrixTransform(svg.getScreenCTM().inverse());
    
  var fromVars = {
    ease: zoom.ease,
    x: viewBox.x,
    y: viewBox.y,
    width: viewBox.width,
    height: viewBox.height,
  };
  limitZoom(scaleDelta,startPoint,fromVars);
}

//
// SELECT DRAGGABLE
// =========================================================================== 
function selectDraggable(event) {
 
  if (resetAnimation.isActive()) {
    resetAnimation.kill();
  }
    
  startClient.x = this.pointerX;
  startClient.y = this.pointerY;
  startGlobal = startClient.matrixTransform(svg.getScreenCTM().inverse());

  // Right mouse button
  if (event.button === 2) {
    
    reachedThreshold = false;
    
    TweenLite.set(viewport, { 
      svgOrigin: startGlobal.x + " " + startGlobal.y
    });
    
    TweenLite.set(pivot, { 
      x: this.pointerX, 
      y: this.pointerY
    });
      
    pannable.disable();
    rotatable.enable().update().startDrag(event);
    pivotAnimation.play(0);
    
  } else {
    
    TweenLite.set(proxy, { 
      x: this.pointerX, 
      y: this.pointerY
    });
    
    rotatable.disable();
    pannable.enable()
    pivotAnimation.reverse();
  }
}

//
// RESET VIEWPORT
// =========================================================================== 
function resetViewport(tempViewBox) {
  pannable.disable();
  var duration = 0.3;
  var ease = Power3.easeOut;
  
  pivotAnimation.reverse();
  
  if (pannable.tween) {
    pannable.tween.kill();
  }
  
  if (rotatable.tween) {
    rotatable.tween.kill();
  }
    
  resetAnimation.clear()
    .to(viewBox, duration, {
      x: tempViewBox.x,
      y: tempViewBox.y,
      width: tempViewBox.width,
      height: tempViewBox.height,
      ease: ease
    }, 0)
    .to(viewport, duration, {
      attr: { transform: "matrix(1,0,0,1,0,0)" },
      smoothOrigin: false,
      svgOrigin: "0 0",
      ease: ease
    }, 0)
    pannable.enable();
}


//
// CHECK THRESHOLD
// =========================================================================== 
function checkThreshold(value) {
  
  if (reachedThreshold) {
    return value;
  }
  
  var dx = Math.abs(this.pointerX - startClient.x);
  var dy = Math.abs(this.pointerY - startClient.y);
  
  if (dx > rotateThreshold || dy > rotateThreshold || this.isThrowing) {
    reachedThreshold = true;
    return value;
  }
    
  return this.rotation;
}

//
// UPDATE VIEWBOX
// =========================================================================== 

function updateViewBox() {

  if (zoom.animation.isActive()) {
    return;
  }
  point.x = this.x;
  point.y = this.y;
  let moveGlobal = point.matrixTransform(svg.getScreenCTM().inverse());
  limitDrag(moveGlobal);
}
    
  



