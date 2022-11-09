function actionOnHover(target, group, texto){
  let label;
  let paper = group;
  let SVGTarget = target;
  paper.hover(criar,deletar);
  
  function criar(){
    let points = SVGTarget.getBBox();
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

  function deletar(){
      label.remove();
  }
}

function loadImage(){
  window.onload = function(){
    let s = Snap("#viewport");
    Snap.load("./img/svg/main.svg", onSVGLoaded);

    function onSVGLoaded(data) {
          s.append( data );
          setActions(s);
    }
  }  
}

function setActions(s){
  let elemento = s.select("#bloco");
  let grupo = s.select("#Gbloco");
  actionOnHover(elemento, grupo,"Bloco");
}

loadImage();


