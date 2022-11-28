import { atributos } from "./data.js";

let legenda = $("container-list")
let list = $("#list")

for(let i in atributos){
    let element_div = document.createElement('div')
    element_div.className = "item";
    element_div.appendChild(document.createTextNode(atributos[i].titulo))
    element_div.addEventListener("click",()=>{
        $(atributos[i].group).trigger('click');
    });

    element_div.addEventListener("mouseover",()=>{
        $(atributos[i].id).addClass("map-hover-legendas");

    });
    
    element_div.addEventListener("mouseout",()=>{
        $(atributos[i].id).removeClass("map-hover-legendas");
    });




    list.append(element_div);
}
legenda.append(list)