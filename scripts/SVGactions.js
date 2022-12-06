import {LoadSVG}from './loadSVG.js';
import {atributos} from './data.js'


//
// CRIAR HOVER
// ====================================

function criar(evt, text) {
  let tooltip = document.getElementById("tooltip");
  tooltip.innerHTML = text;
  tooltip.style.display = "inline";
  tooltip.style.left = evt.pageX - 50 + 'px';
  tooltip.style.top = evt.pageY -50 + 'px';
}


//
// DELETAR HOVER
// ====================================

function deletar() {
  var tooltip = document.getElementById("tooltip");
  tooltip.style.display = "none";
}


//
// CRIAR SIDEBAR
// ====================================

function abrir(titulo, descricao){
  $("#titulo-sidebar-c").text(titulo);
  $("#descricao-sidebar-c").text(descricao);
  
  $("#svg").css('width', '100%');
  $("#side-bar").slideDown(400);
  $("#side-bar").css('display', 'block');
  $("#search").val(titulo)
  $("#btn-close-search").css({"border-left":"1px dashed rgba(184, 184, 184, 0.2)", "width":"50px"});
  $(".search-bar-container").css({"width":"392px", "transition": "width 0.5s"})
 
}


//
// FECHAR SIDEBAR
// ====================================

function fechar(){
  $("#titulo-sidebar-c").text("");
  $("#descricao-sidebar-c").text("");
  $("#svg").css('width', '100%');
  $("#side-bar").slideUp(400);

  $("#search").val("")
  $(".search-bar-container").css({"width":"342px", "transition": "width 0.5s"});
  $("#btn-close-search").css({"border-left":"0px", "width":"0"})
  
}


//
// DEFINIR ACOES
// ====================================

function setActions(parent, ID_element, ID_group, titulo,desc){
  let grupoSNAP =  parent.select(ID_group);
  let grupo =  $(ID_group);

  grupo.click(function(){
    abrir(titulo,desc)
  });

  grupo.bind("touchstart",function(){
    abrir(titulo,desc);})
 

  // Hover

  grupoSNAP.mouseover((evt)=>{
    criar(evt,titulo);
  });
  grupoSNAP.mouseout(()=>{
    deletar();
  })
  
 
  
}
class BTN_360{
 constructor(atributos){
  this.btn = Snap($('#btn-360')[0]);
  this.point = svg.createSVGPoint();
  this.pointOnSVG = this.point.matrixTransform(svg.getScreenCTM().inverse());
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
        //window.location.assign(window.location.href + "panorama/");
        window.location.href = "panorama/index.html";
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
$("#btn-close-search").click(fechar);




