function move(dx,dy) {
  var clientX, clientY;
  if( (typeof dx == 'object') && ( dx.type == 'touchmove') ) {
      clientX = dx.changedTouches[0].clientX;
      clientY = dx.changedTouches[0].clientY;
      dx = clientX - this.data('ox');
      dy = clientY - this.data('oy');
  }
  
  this.attr({
              transform: this.data('origTransform') + (this.data('origTransform') ? "T" : "t") + [dx, dy]
          },false);
} 

function start(x) {
  if( (typeof x == 'object') && ( x.type == 'touchstart') ) {
      x.preventDefault();
      this.data('ox', x.changedTouches[0].clientX );
      this.data('oy', x.changedTouches[0].clientY );  
  }
  this.data('origTransform', this.transform().local );
}

 function stop() {
}



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
    }
  }


function zoomEvent(event){
    let normalized = event.DeltaY > 0? 1: -1;  
    let delta = event.wheelDelta;


  if (delta) {
    normalized = (delta % 120) == 0 ? delta / 120 : delta / 12;
  } else {
    delta = event.deltaY || event.detail || 0;
    normalized = -(delta % 3 ? delta * 10 : delta / 3);
  }

  let scaleDelta = (normalized > 0 ? 1 / zoom.scaleFactor : zoom.scaleFactor).toFixed(2);
  point.x = event.clientX;
  point.y = event.clientY;

  let startPoint = point.matrixTransform(svg.getScreenCTM().inverse());

  limitZoom(scaleDelta,startPoint);
}




var paper = Snap("#svg")
paper.touchstart( start );
paper.touchmove( move );
paper.touchend( stop );
paper.drag(move,start,stop);




var svg = document.querySelector("#svg");
var point = svg.createSVGPoint();
var viewBox = svg.viewBox.baseVal;



var zoom = {
    scaleFactor: 1.4
};


var cachedViewBox = {
    x: viewBox.x,
    y: viewBox.y,
    width: viewBox.width,
    height: viewBox.height
};

var limits = {
    min: {
      x: -400,
      y: -400, 
      width: 1526,
      height:1526
    },
    max: {
        x: 1200,
        y: 1200 , 
        width: 382,
        height: 382
    }
  
}



window.addEventListener("wheel", ()=>{ /* FIX Lag */ 
    svg.addEventListener('wheel',function(e){
        e.stopPropagation();
        zoomEvent(e)
    
    }) 
})

