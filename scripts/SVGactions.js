import {LoadSVG}from './loadSVG.js';

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




function setHover(parent, ID_element, ID_group, texto){
  let elemento = parent.select(ID_element);
  let grupo = parent.select(ID_group);
  let info = new Info(parent,elemento,grupo);
  const side_bar = document.getElementById("side-bar");
  const svg = document.getElementById("svg"); 
  function abrir(){
    side_bar.style.display= "inline";
    svg.style.width= "75%";
  }
  function fechar(){
    side_bar.style.display= "none";
    svg.style.width= "100%";

  }
  grupo.click(abrir);

  
  // Hover

  grupo.hover(function(){
    info.criar(texto)
  }, 
  function(){
    info.deletar(texto)
  }); // Fim Hover
  
  // Hover Touch
  grupo.touchstart(function(){
    info.criar(texto)
  });
  grupo.touchend(function(){
    info.deletar()
  });  // Fim Hover Touch
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

new LoadSVG("./img/svg/main.svg",atributos,setHover);





