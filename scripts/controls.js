var svg = document.querySelector("#svg");
var paper = Snap("#svg")

paper.touchstart( start );
paper.touchmove( move );
paper.touchend( stop );


paper.drag()
var point = svg.createSVGPoint();

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
          });
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
