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
  grupo.hover(function(){
    criar(titulo)
  }, 
  function(){
    deletar(titulo)
  }); // Fim Hover
  
}

new LoadSVG("./img/svg/main.svg",atributos,setActions);
$("#side-bar-fechar").click(fechar);




