import {LoadSVG}from './loadSVG.js';
import {atributos} from './data.js'


//
// CRIAR HOVER
// ====================================

function criar(texto){
  const div = document.createElement("div");
  const paragraph = document.createElement("p");
  const node = document.createTextNode(texto);
  paragraph.appendChild(node);
  const element = document.getElementById("information");
  div.appendChild(paragraph)
  div.setAttribute('id',texto);
  element.appendChild(div);
}


//
// DELETAR HOVER
// ====================================

function deletar(texto){
  const element = document.getElementById(texto);
  if(element)
    element.parentNode.removeChild(element);
}


//
// CRIAR SIDEBAR
// ====================================

function abrir(titulo, descricao){
  $("#titulo-sidebar-c").text(titulo);
  $("#descricao-sidebar-c").text(descricao);
  
  $("#svg").css('width', '75%');
  $("#side-bar").slideDown(400);
  $("#side-bar").css('display', 'inline');
}


//
// FECHAR SIDEBAR
// ====================================

function fechar(){
  $("#titulo-sidebar-c").text("");
  $("#descricao-sidebar-c").text("");
  $("#svg").css('width', '100%');
  $("#side-bar").slideUp(400);
  
}


//
// DEFINIR ACOES
// ====================================

function setActions(parent, ID_element, ID_group, titulo,desc){
  let grupo = parent.select(ID_group);

  grupo.click(function(){
    abrir(titulo,desc)
  });

  // Hover
  grupo.mouseover(()=>{
    criar(titulo);
  });
  grupo.mouseout(()=>{
    deletar(titulo);
  })
  /*
  grupo.hover(function(){
    criar(titulo)
  }, 
  function(){
    deletar(titulo)
  }); // Fim Hover*/
  
}


class BTN_360{
 constructor(atributos){
  this.btn = Snap($('#btn-360')[0]);
  this.point = svg.createSVGPoint();
  this.pointOnSVG = point.matrixTransform(svg.getScreenCTM().inverse());
  this.atributos = atributos;
  this.parent = Snap("#viewport");
 }

  move(dx,dy,xa,ya) {
    this.#updatePoint(xa,ya);
    this.btn.attr({transform: this.btn.data('origTransform') + (this.btn.data('origTransform') ? "T" : "t") + [dx, dy] });
    
  }
          
  start() {
    this.btn.data('origTransform', this.btn.transform().local );
    $(".map").addClass('_360');
    
  }
  stop(dx,dy) {
    for(let i in this.atributos){
      let paper = this.parent.select(this.atributos[i].id)
      if(this.#Onpoint(paper)){
        sessionStorage.setItem("id_360",this.atributos[i].id_360);
        window.location.assign("/panorama/");
        console.log(window.location)
      }
    }
    this.btn.animate({ transform: 'r360' }, 220, mina.linear);
    this.btn.attr({
      transform:(this.btn.data('origTransform') ? "T" : "t") + [dx, dy]
    });
    $(".map").removeClass('_360');
    
    
  }
  #updatePoint(dx,dy){
    this.point.x = dx;
    this.point.y = dy;
    this.pointOnSVG = this.point.matrixTransform(svg.getScreenCTM().inverse());
  }

  #Onpoint(element){
    element = element.getBBox();
    let _x = this.pointOnSVG.x > element.x && this.pointOnSVG.x < (element.x + element.w);
    let _y = this.pointOnSVG.y > element.y && this.pointOnSVG.y < (element.y + element.h);

    if(_x && _y){
      return true;
    }
    return false;
  }


}

let btn_360_action = new BTN_360(atributos);
let btn_360 = Snap($('#btn-360')[0]);
btn_360.drag(
  (dx,dy,xa,ya)=>{btn_360_action.move(dx,dy,xa,ya)},
  ()=>{btn_360_action.start()},
  (dx,dy)=>{btn_360_action.stop(dx,dy)});

new LoadSVG("./img/svg/main.svg",atributos,setActions);
$("#side-bar-fechar").click(fechar);




