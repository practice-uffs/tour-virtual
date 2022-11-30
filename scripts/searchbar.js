import {atributos} from './data.js'


$("#search").keyup(filtro)

add();





function add(){
    let input, filter, ul, li, a;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    ul = $("#menu");
    for(let i in atributos){
            ul.append(
                $("<li/>").append(
                    $("<a/>").text(atributos[i].titulo).click(function(){
                        $(atributos[i].group).trigger('click');
                        $(".search-bar-container").removeClass("pesquisa")
                        input.value = atributos[i].titulo;
                        $("#menu").css("display","none")
                    })
                )
            )
        }
    ul.css("display","none")
}




function filtro(){
    if(this.value.length > 0){
        $("#menu").css("display","")
        $(".search-bar-container").addClass("pesquisa")
        
        var value = this.value.toLowerCase().trim();
        $("#menu a").show().filter(function() {
            $("#resultado").addClass("resultado")
            return $(this).text().toLowerCase().trim().indexOf(value) == -1;
        }).hide();
    }
    else{
        $("#resultado").removeClass("resultado")
        $(".search-bar-container").removeClass("pesquisa")
        $("#menu").css("display","none")
    }
      
}