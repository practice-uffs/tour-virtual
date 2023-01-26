import {LoadSVG}from './loadSVG.js';
//import {atributos} from './data.js'

//let atributos;
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

function abrir(titulo, descricao,list_desc,id_360){


  $("#titulo-sidebar").text(titulo);
  $(".description").html(descricao)

  $("#side-bar").removeClass("hidden-side-bar");
  
  $("#vista-panoramica").click(()=>{changeToPanorama(id_360)})
  
  
  $("#btn-adicionar-photo").click(openPopupConstrucao)

  //
  // Search Action
  // ============================
  
  $("#search").val(titulo)
  $("#btn-close-search").css({"border-left":"1px dashed rgba(184, 184, 184, 0.2)", "width":"50px"});
  $(".search-bar-container").css({"width":"392px", "transition": "width 0.5s"})
 
}


//
// FECHAR SIDEBAR
// ====================================

function fechar(){
  $("#side-bar").addClass("hidden-side-bar");
  $("#titulo-sidebar").text("");
  $("#descricao-sidebar").text("");


  // ============================
  //Search Action
  $("#search").val("")
  $(".search-bar-container").css({"width":"342px", "transition": "width 0.5s"});
  $("#btn-close-search").css({"border-left":"0px", "width":"0"})
  
}


function changeToPanorama(id_360){
  sessionStorage.setItem("id_360", id_360);
  window.location.href = "panorama/";
}


//
// DEFINIR ACOES
// ====================================

function setActions(parent, ID_element, ID_group, titulo, desc, list_desc,id_360){
  let grupoSNAP =  parent.select(ID_group);
  let grupo =  $(ID_group);

  grupo.click(function(){
    abrir(titulo,desc,list_desc,id_360)
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
        changeToPanorama(this.atributos[i].id_360)
       
       
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
  (dx,dy)=>{btn_360_action.stop(dx,dy)}
);

/*

fetch("http://127.0.0.1:8000").then((Response) => {
    return Response.json()
    
    
}).then((data) => {
  new LoadSVG("static/map/img/svg/main.svg",data,setActions);
   
}).catch((a)=>{
  console.log("ERRO" + a)
  new LoadSVG("static/map/img/svg/main.svg",atributos,setActions);
});
*/
console.log(atributos)

for(let i in atributos){
  console.log(atributos[i]["group"])
}


new LoadSVG("static/map/img/svg/main.svg",atributos,setActions);

console.log("aaaa")


$("#btn-close-search").click(fechar);



