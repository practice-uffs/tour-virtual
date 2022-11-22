import {LoadSVG}from './loadSVG.js';
import {atributos} from './data.js'

class Utils{
  
}


class Info{
  constructor(){
    
  }
  criar(texto){
    const div = document.createElement("div");
    const paragraph = document.createElement("p");
    const node = document.createTextNode(texto);
    paragraph.appendChild(node);
    const element = document.getElementById("information");
    div.appendChild(paragraph)
    div.setAttribute('id',texto);
    div.addEventListener('hover',this.criar);
    element.appendChild(div);
    

    
  }

  deletar(texto){
    const element = document.getElementById(texto);
    element.parentNode.removeChild(element);
  }
}



const side_bar = document.getElementById("side-bar");
const svg = document.getElementById("svg"); 
const fechar_side_bar = document.getElementById("side-bar-fechar");
fechar_side_bar.addEventListener('click',fechar);

function drag_start(){}
function drag_onmouse(){}
function drag_end(){}


function abrir(titulo, descricao){


  // Verifica se já foi criado

  let element_titulo_p = document.getElementById("titulo-sidebar-p");
  let element_desc_p = document.getElementById("descricao-sidebar-p");
  let element_titulo_c = document.getElementById("titulo-sidebar-c");
  let element_desc_c = document.getElementById("descricao-sidebar-c");
  
  if(element_desc_c)
    element_desc_p.removeChild(element_desc_c)
  if(element_titulo_c)
    element_titulo_p.removeChild(element_titulo_c);

    let tit = document.createTextNode(titulo);
    let desc = document.createTextNode(descricao);

    


    const tit_e = document.createElement("p");
    const desc_e = document.createElement("p");

    tit_e.appendChild(tit);
    tit_e.setAttribute('id', 'titulo-sidebar-c')

    desc_e.appendChild(desc);
    desc_e.setAttribute('id','descricao-sidebar-c');


  

    element_titulo_p.appendChild(tit_e);
    element_desc_p.appendChild(desc_e);
    side_bar.style.display= "inline";
    svg.style.width= "75%";
}
  function fechar(){

  let element_titulo_p = document.getElementById("titulo-sidebar-p");
  let element_desc_p = document.getElementById("descricao-sidebar-p");
  let element_titulo_c = document.getElementById("titulo-sidebar-c");
  let element_desc_c = document.getElementById("descricao-sidebar-c");
  
  if(element_desc_c)
    element_desc_p.removeChild(element_desc_c)
  if(element_titulo_c)
    element_titulo_p.removeChild(element_titulo_c);
  side_bar.style.display= "none";
  svg.style.width= "100%";
  console.log("fechar")

  }




function setHover(parent, ID_element, ID_group, titulo,desc){
  let elemento = parent.select(ID_element);
  let grupo = parent.select(ID_group);
  let info = new Info(parent,elemento,grupo);
  
  grupo.click(function(){
    abrir(titulo,desc)
  });

  
  // Hover

  grupo.hover(function(){
    info.criar(titulo)
  }, 
  function(){
    info.deletar(titulo)
  }); // Fim Hover
  
  // Hover Touch
  grupo.touchstart(function(){
    info.criar(titulo)
  });
  grupo.touchend(function(){
    info.deletar()
  });  // Fim Hover Touch
}


console.log(atributos);
new LoadSVG("./img/svg/main.svg",atributos,setHover);





