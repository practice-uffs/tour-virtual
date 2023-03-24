import {LoadSVG}from './loadSVG.js';



// Get file hash from Google Drive
function max_string_array(string){
    let result = string.split('/');
    let hash = ""
    for(let i of result){
        if (i.length > hash.length){
            hash = i;
        }
    }
    return hash;
}

const PREFIX_IMG = "img/pictures/LS/Principal/Capa/"
const httpRegex = new RegExp('https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b([-a-zA-Z0-9()@:%_\\+.~#?&//=]*)')
const driveRegex = new RegExp('[d-dD-D][r-rR-R][i-iI-I][v-vV-V][e-eE-E][.][g-gG-G][o-oO-O][o-oO-O][g-gG-G][l-lL-L][e-eE-E]');
const DIR_MAP = './img/svg/map/'

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

function abrir(titulo, descricao,list_desc,id_360, img_capa){


  $("#titulo-sidebar").text(titulo);
  $("#descricao-sidebar").html(descricao);
  let ul = $("<ul>")
  let lista = $("#list_description");
  lista.empty();
  if (httpRegex.test(img_capa)){
      if(driveRegex.test(img_capa)){
          let hash = max_string_array(img_capa);
          $("#vista-panoramica").attr({"style": `background-image: url('https://drive.google.com/uc?id=${hash}')`})
      }
      else{
          $("#vista-panoramica").attr("style", `background-image: url('${img_capa}')` )
      }

  }
  else{
      $("#vista-panoramica").attr("style", `background-image: url('${PREFIX_IMG + img_capa }')`)
  }

  for(let i in list_desc){
    let li = $("<li>")
    let a = $("<a>")
    li.html(list_desc[i])
    ul.append(li)
  }
  lista.append(ul)



  $("#side-bar").removeClass("hidden-side-bar");

  $("#vista-panoramica").click(()=>{changeToPanorama(id_360)})
  $("#vista-panoramica2").click(()=>{changeToPanorama(id_360)})


  $("#btn-adicionar-photo").click(openPopupConstrucao)

  //
  // Search Action
  // ============================

  $("#search").val(titulo)
  $("#btn-close-search").css({"width":"60px", "transition": "width 0.5s", "border-left": "1px solid #7171713c"});
  // $(".search-bar-container").css({"width":"392px", "transition": "width 0.5s"})

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
  $("#btn-close-search").css({"border-left":"0px", "width":"0", "transition": "all 1s ease 0s"})

}


function changeToPanorama(id_360){
  sessionStorage.setItem("id_360", id_360);
  window.location.href += "/panorama";
}


//
// DEFINIR ACOES
// ====================================

function setActions(parent, ID_element, ID_group, titulo, desc, list_desc,id_360, img_capa){
    let grupoSNAP =  parent.select(ID_group);
  let grupo =  $(ID_group);

  if(grupo){
    grupo.click(function(){
      abrir(titulo,desc,list_desc,id_360, img_capa)
  });

    grupo.bind("touchstart",function(){
      abrir(titulo,desc);})

  }

  // Hover
  if(grupoSNAP){
      if(!grupoSNAP.hasClass('map')){
          grupoSNAP.addClass('map')
      }

      grupoSNAP.mouseover((evt)=>{
      criar(evt,titulo);
    });
    grupoSNAP.mouseout(()=>{
      deletar();
    })

  }




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
        let atributo = true
        let paper
        try{
            paper = this.parent.select(this.atributos[i].component)
        }catch (DOMException ){
            atributo = false;
        }

      if(this.#Onpoint(paper) && atributo){
        changeToPanorama(this.atributos[i].identifier_360)


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
    if(!element)
      return false;
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




new LoadSVG(DIR_MAP + campus + "/main.svg" + "?id=" + hash_file ,atributos,setActions);


$("#btn-close-search").click(fechar);
