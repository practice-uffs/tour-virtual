function actionOnHover(target, group, texto,pan){
  let label, card;
  let paper = group;
  let SVGTarget = target;

  paper.hover(criar_hover, deletar_hover);
  var points = SVGTarget.getBBox();
  let angle = Snap.angle(points.x,points.y,points.x2,points.y2) - 250;

  //let angle = Snap.angle(points.x,points.y,0,0);
  //let angle = Snap.atan( ((points.y2/ points.x2) )) 
  //let angle = Snap.acos( points.r0) 
  //console.log(angle);
  console.log(points);
  console.log("V:" + points.y/ points.y2);
  console.log(angle)


function criar_click(){
    let position_card = Snap.format("m {x} {y}c0 -4.586426 3.7180328 -8.304459 8.304474 -8.304459l19.873993 0l0 0l42.26773 0l90.32022 0c2.2024841 0 4.314728 0.8749237 5.8721313 2.432312c1.557373 1.5573883 2.432312 3.6696625 2.432312 5.8721466l0 20.761154l0 0l0 12.456696l0 0c0 4.586426 -3.7180176 8.304459 -8.304443 8.304459l-90.32022 0l-21.1333 6.228348l-21.13443 -6.228348l-19.873993 0c-4.586441 0 -8.304474 -3.7180328 -8.304474 -8.304459l0 0l0 -12.456696l0 0z",
    {
      x: points.x,
      y: points.y
    }
    );
    card = paper.path(position_card);
    card.attr({"fill":"black"});
    card.transform('r' + angle)
    card = paper.g(card);
    paper.append(card);
}


  function criar_hover(){

    //Texto
    let text_1 = paper.text(points.x , points.y , texto);
    
    text_1.attr({
      'font-size': '40px',
      'fill': 'white',
      'opacity': 0.1,
    });
    text_1.animate({ opacity: 1 }, 800 );
  
    // Card
    let position_card = Snap.format("M{x} {y}c0 -4.586426 3.7180328 -8.304459 8.304474 -8.304459l19.873993 0l0 0l42.26773 0l90.32022 0c2.2024841 0 4.314728 0.8749237 5.8721313 2.432312c1.557373 1.5573883 2.432312 3.6696625 2.432312 5.8721466l0 20.761154l0 0l0 12.456696l0 0c0 4.586426 -3.7180176 8.304459 -8.304443 8.304459l-90.32022 0l-21.1333 6.228348l-21.13443 -6.228348l-19.873993 0c-4.586441 0 -8.304474 -3.7180328 -8.304474 -8.304459l0 0l0 -12.456696l0 0z",
    {
      x: points.x - (points.x) * 0.025,
      y: points.y - (points.y) *0.02
    }
    );

    card = paper.path(position_card);
    card.attr({
      "fill":"#04923F",
      "stroke": "#08523F",
      "stroke-width": "2",
    });
    
    card.animate({stroke: "#04923F"},500, mina.bounce)
  
    // Agroup
    label = paper.g(card,text_1);
    label.attr({ opacity: 0.1 });
    label.animate({ opacity: 1 }, 500 );
    label.transform('r' + angle);
    paper.append(label);
  }

  function deletar_hover(){
      console.log(paper);
      label.remove(0);
      
  }
}

function loadImage(elementos){
  window.onload = function(){
    let s = Snap("#viewport");
    Snap.load("./img/svg/main.svg", onSVGLoaded);

    function onSVGLoaded(data) {
          s.append( data );
          for( let elemento in elementos){
            
            console.log(elementos[elemento].id)
            setActions(s, elementos[elemento].id, elementos[elemento].group, elementos[elemento].texto);
          }
          
          
    }
  }  

}

function setActions(s, id_element, id_group, text){
  let elemento = s.select(id_element);
  let grupo = s.select(id_group);
  actionOnHover(elemento, grupo,text);
}

var atributos = {
  1:{
    "id":"#bloco",
    "group":"#Gbloco",
    "texto": "Bloco"
  },
  2:{
    "id":"#bloco2",
    "group":"#Gbloco2",
    "texto": "Bloco2"
  }
}

loadImage(atributos);



