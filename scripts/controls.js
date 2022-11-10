

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
    duration: 0.3,
    ease: Power2.easeOut,
  };

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

  reset.addEventListener("click", resetViewport);
  window.addEventListener("wheel", onWheel);
  window.addEventListener("resize", function() {
    pivotAnimation.reverse();
  });

  window.addEventListener("contextmenu", function(event) {
    event.preventDefault();
    event.stopPropagation();
    return false;
  });

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
    
    viewBox.x -= (startPoint.x - viewBox.x) * (scaleDelta - 1);
    viewBox.y -= (startPoint.y - viewBox.y) * (scaleDelta - 1);
    viewBox.width *= scaleDelta;
    viewBox.height *= scaleDelta;
      
    zoom.animation = TweenLite.from(viewBox, zoom.duration, fromVars);  
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
    /*
    if(event.button === 0){
      
    }
    // Right mouse button
    //console.log(variavel);*/
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
      pannable.enable()//.update().startDrag(event);
      pivotAnimation.reverse();
    }
  }

  //
  // RESET VIEWPORT
  // =========================================================================== 
  function resetViewport() {
    var duration = 0.8;
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
        x: cachedViewBox.x,
        y: cachedViewBox.y,
        width: cachedViewBox.width,
        height: cachedViewBox.height,
        ease: ease
      }, 0)
      .to(viewport, duration, {
        attr: { transform: "matrix(1,0,0,1,0,0)" },
        // rotation: "0_short",
        smoothOrigin: false,
        svgOrigin: "0 0",
        ease: ease
      }, 0)
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
    
    var moveGlobal = point.matrixTransform(svg.getScreenCTM().inverse());
      
    viewBox.x -= (moveGlobal.x - startGlobal.x);
    viewBox.y -= (moveGlobal.y - startGlobal.y); 
  }
    
  


function actionOnHover(target, group, texto,pan){
  let label, card;
  let paper = group;
  let SVGTarget = target;

  paper.hover(criar_hover, deletar_hover);
  paper.click(criar_click);
  var points = SVGTarget.getBBox();


function criar_click(){
    card = paper.path("m249.05774 201.51181l0 0c0 -4.586426 3.7180328 -8.304459 8.304474 -8.304459l19.873993 0l0 0l42.26773 0l90.32022 0c2.2024841 0 4.314728 0.8749237 5.8721313 2.432312c1.557373 1.5573883 2.432312 3.6696625 2.432312 5.8721466l0 20.761154l0 0l0 12.456696l0 0c0 4.586426 -3.7180176 8.304459 -8.304443 8.304459l-90.32022 0l-21.1333 6.228348l-21.13443 -6.228348l-19.873993 0c-4.586441 0 -8.304474 -3.7180328 -8.304474 -8.304459l0 0l0 -12.456696l0 0z");
    card.attr({"fill":"black"});
    card = paper.g(card);
    paper.append(card);
}


  function criar_hover(){
    //pannable.disable();
    let angle = Snap.angle(points.x,points.y,points.x2,points.y2) - 260;
    let text_1 = paper.text(points.x, points.cy, texto);
    
    text_1.attr({
      'font-size': '40px',
      'fill': 'white',
    });
  
    label = paper.g(text_1);
    label.attr({ opacity: 0.1 });
    label.animate({ opacity: 1 }, 500 );
    label.transform('r' + angle);
    paper.append(label);
  }

  function deletar_hover(){
      label.remove();
      a = false;
  }
}

function loadImage(id_element,a){
  window.onload = function(){
    let s = Snap("#viewport");
    Snap.load("./img/svg/main.svg", onSVGLoaded);

    function onSVGLoaded(data) {
          s.append( data );
          setActions(s, id_element, "#Gbloco", "Bloco",a);
          
    }
  }  

}

function setActions(s, id_element, id_group, text){
  let elemento = s.select(id_element);
  let grupo = s.select(id_group);
  actionOnHover(elemento, grupo,text);
}

loadImage("#bloco");

