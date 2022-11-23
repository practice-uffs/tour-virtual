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
  let side_bar = document.getElementById("side-bar");
  let svg = document.getElementById("svg"); 
  let element_titulo_p = document.getElementById("titulo-sidebar-p");
  let element_desc_p = document.getElementById("descricao-sidebar-p");
  let element_titulo_c = document.getElementById("titulo-sidebar-c");
  let element_desc_c = document.getElementById("descricao-sidebar-c");
  let tit = document.createTextNode(titulo);
  let desc = document.createTextNode(descricao);
  const tit_e = document.createElement("p");
  const desc_e = document.createElement("p");
  
  // Verifica se já foi criado
  
  if(element_desc_c){
    element_desc_p.removeChild(element_desc_c)
  }
  if(element_titulo_c){
    element_titulo_p.removeChild(element_titulo_c);
  }

  tit_e.appendChild(tit);
  tit_e.setAttribute('id', 'titulo-sidebar-c')
  desc_e.appendChild(desc);
  desc_e.setAttribute('id','descricao-sidebar-c');

  element_titulo_p.appendChild(tit_e);
  element_desc_p.appendChild(desc_e);
  side_bar.style.display= "inline";
  svg.style.width= "75%";
}


//
// FECHAR SIDEBAR
// ====================================

function fechar(){
  let side_bar = document.getElementById("side-bar");
  let svg = document.getElementById("svg"); 
  let element_titulo_p = document.getElementById("titulo-sidebar-p");
  let element_desc_p = document.getElementById("descricao-sidebar-p");
  let element_titulo_c = document.getElementById("titulo-sidebar-c");
  let element_desc_c = document.getElementById("descricao-sidebar-c");

  if(element_desc_c){
    element_desc_p.removeChild(element_desc_c)
  }
  if(element_titulo_c){
    element_titulo_p.removeChild(element_titulo_c);
  }

  side_bar.style.display= "none";
  svg.style.width= "100%";
}



//
// DEFINIR ACOES
// ====================================

function setActions(parent, ID_element, ID_group, titulo,desc){
  //let elemento = parent.select(ID_element);
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
document.getElementById("side-bar-fechar").addEventListener('click',fechar);



