
function actionOnHover(target, group, texto){
  let label;
  let paper = group;
  let SVGTarget = target;
  paper.hover(criar,deletar);
  var points = SVGTarget.getBBox();
  //paper.click(criar);
  
  function criar(){
    
    console.log(points);
    let angle = Snap.angle(points.x,points.y,points.x2,points.y2) - 260;
    let text_1 = paper.text(points.x, points.cy, texto);
    let card = paper.path("m249.05774 201.51181l0 0c0 -4.586426 3.7180328 -8.304459 8.304474 -8.304459l19.873993 0l0 0l42.26773 0l90.32022 0c2.2024841 0 4.314728 0.8749237 5.8721313 2.432312c1.557373 1.5573883 2.432312 3.6696625 2.432312 5.8721466l0 20.761154l0 0l0 12.456696l0 0c0 4.586426 -3.7180176 8.304459 -8.304443 8.304459l-90.32022 0l-21.1333 6.228348l-21.13443 -6.228348l-19.873993 0c-4.586441 0 -8.304474 -3.7180328 -8.304474 -8.304459l0 0l0 -12.456696l0 0z");
    card.attr({"fill":"black"});
    text_1.attr({
      'font-size': '40px',
      'fill': 'white',
    });
  
    label = paper.g(card,text_1);
    label.attr({ opacity: 0.1 });
    label.animate({ opacity: 1 }, 500 );
    label.transform('r' + angle);
    paper.append(label);
  }

  function deletar(){
      label.remove();
  }
}

function loadImage(id_element){
  window.onload = function(){
    let s = Snap("#viewport");
    Snap.load("./img/svg/main.svg", onSVGLoaded);

    function onSVGLoaded(data) {
          s.append( data );
          return setActions(s, id_element, "#Gbloco", "Bloco");
          
    }
  }  
}

function setActions(s, id_element, id_group, text){
  let elemento = s.select(id_element);
  let grupo = s.select(id_group);
  actionOnHover(elemento, grupo,text);
  return elemento
}




