class Info{
  
  constructor(SVGtarget, group){
    this.paper = group;
    this.target = SVGtarget;
    this.label = null;
    this.points = this.target.getBBox();
    this.angle = (this.points.r1 + this.points.r2)  - 90; 
  
    if(( this.points.r1 + this.points.r2 ) > 90){
      this.angle *= -1;
    }
    this.angle = 0; // Provisório
  }

  #getText(texto){
    let text_1 = this.paper.text(this.points.x , this.points.y , texto);
    text_1.attr({
      'font-size': '40px',
      'fill': 'white',
      'opacity': 0.1,
    });
    text_1.animate({ opacity: 1 }, 800 );
    return text_1;
  }

  #getCard(){
    let position_card = Snap.format("M{x} {y}c0 -4.586426 3.7180328 -8.304459 8.304474 -8.304459l19.873993 0l0 0l42.26773 0l90.32022 0c2.2024841 0 4.314728 0.8749237 5.8721313 2.432312c1.557373 1.5573883 2.432312 3.6696625 2.432312 5.8721466l0 20.761154l0 0l0 12.456696l0 0c0 4.586426 -3.7180176 8.304459 -8.304443 8.304459l-90.32022 0l-21.1333 6.228348l-21.13443 -6.228348l-19.873993 0c-4.586441 0 -8.304474 -3.7180328 -8.304474 -8.304459l0 0l0 -12.456696l0 0z",
    {
      x: this.points.x - (this.points.x) * 0.025,
      y: this.points.y - (this.points.y) *0.02
    }
    );

    let card = this.paper.path(position_card);
    card.attr({
      "fill":"#04923F",
      "stroke": "#08523F",
      "stroke-width": "2",
    });
    
    card.animate({stroke: "#04923F"},500, mina.bounce)
    return card;
  }

  #getAgroup(card, SVG_text){
    this.label = this.paper.g(card,SVG_text);
    this.label.attr({ opacity: 0.1 });
    this.label.animate({ opacity: 1 }, 500 );
    this.label.transform('r' + this.angle);
    this.paper.append(this.label);
  }

  criar(texto){
    let SVG_text = this.#getText(texto);
    let card = this.#getCard();
    this.#getAgroup(card,SVG_text);
    
  }

  deletar(){
    this.label.remove(0);

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
  let info = new Info(elemento,grupo);

  // Hover
  grupo.hover(function(){
    info.criar(text)
  }, 
  function(){
    info.deletar()
  }); // Fim Hover

}


var atributos = [];
let tam = 14
for(let i = 1; i <= tam; i++){
  atributos[i] = {
    "id":"#bloco" + i,
    "group":"#Gbloco" + i,
    "texto": "Bloco" + i
  }
}

loadImage(atributos);



