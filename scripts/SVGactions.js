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


function abrir(texto){
    const element = document.getElementById("titulo-side-bar");
    if(element)
      element.parentNode.removeChild(element);
    let btn_360 = document.getElementById("btn-360")
    btn_360 = Snap(btn_360);
    btn_360.drag()
    /*
    btn_360.drag(function(event,a,b,c,d){
        console.log(event,a,b,c,d);
    });*/
    const h6 = document.createElement("h6");
    h6.setAttribute('id',"titulo-side-bar")
    const node = document.createTextNode(texto);
    h6.appendChild(node);
    side_bar.appendChild(h6);

    side_bar.style.display= "inline";
    svg.style.width= "75%";
}
  function fechar(){

    const element = document.getElementById("titulo-side-bar");
    element.parentNode.removeChild(element);
    side_bar.style.display= "none";
    svg.style.width= "100%";

  }



function setHover(parent, ID_element, ID_group, texto){
  let elemento = parent.select(ID_element);
  let grupo = parent.select(ID_group);
  let info = new Info(parent,elemento,grupo);
  
  grupo.click(function(){
    abrir(texto)
  });

  
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


console.log(atributos);
new LoadSVG("./img/svg/main.svg",atributos,setHover);





