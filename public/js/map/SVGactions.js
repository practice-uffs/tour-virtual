import {LoadSVG} from './loadSVG.js';


// Get file hash from Google Drive
function max_string_array(string) {
    let result = string.split('/');
    let hash = ""
    for (let i of result) {
        if (i.length > hash.length) {
            hash = i;
        }
    }
    return hash;
}

const PREFIX_IMG = "img/pictures/LS/Principal/Capa/"
const httpRegex = new RegExp('https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b([-a-zA-Z0-9()@:%_\\+.~#?&//=]*)')
const driveRegex = new RegExp('[d-dD-D][r-rR-R][i-iI-I][v-vV-V][e-eE-E][.][g-gG-G][o-oO-O][o-oO-O][g-gG-G][l-lL-L][e-eE-E]');
const DIR_MAP = '/img/svg/map/'

//
// CRIAR HOVER
// ====================================

function criar(evt, text) {
    let tooltip = document.getElementById("tooltip");
    tooltip.innerHTML = text;
    tooltip.style.display = "inline";
    tooltip.style.left = evt.pageX - 50 + 'px';
    tooltip.style.top = evt.pageY - 50 + 'px';
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

function abrir(ID_group, titulo, descricao, list_desc, id_360, img_capa, paper, element) {
   
    let str = ID_group;
    let numbers_id = str.replace(/[^0-9]/g, "");
    
    const nextURL = '/'+campus+'/'+numbers_id+'/'+''+encodeURIComponent(titulo).replaceAll('%20','-');
    const nextTitle = titulo;
    const nextState = '';

    // This will create a new entry in the browser's history, without reloading
    window.history.pushState(nextState, nextTitle, nextURL);
    // This will replace the current entry in the browser's history, without reloading
    window.history.replaceState(nextState, nextTitle, nextURL);

    const campus_name = [];
    campus_name['ch']= "Chapecó";
    campus_name['pf']= "Passo Fundo";
    campus_name['ls']= "Laranjeiras do Sul";
    campus_name['ch']= "Chapecó";
    campus_name['ch']= "Chapecó";
    campus_name['ch']= "Chapecó";
    
    //This will force to replace title page
    document.title = titulo+' | '+campus_name[campus]+' | Mapa do Campus - Tour Virtual UFFS';


    let marcado = $('.map-selected')
    if(marcado)
        marcado.removeClass('map-selected')


    if(element)
        element.addClass('map-selected')
    $("#titulo-sidebar").text(titulo);
    $("#descricao-sidebar").html(descricao);
    let ul = $("<ul>")
    let lista = $("#list_description");
    lista.empty();
    let img_url;
    if (httpRegex.test(img_capa)) {
        if (driveRegex.test(img_capa)) {
            let hash = max_string_array(img_capa);
            img_url = `https://drive.google.com/uc?id=${hash}`;
            $("#vista-panoramica").attr({"style": `background-image: url('https://drive.google.com/uc?id=${hash}')`})
        } else {;
            img_url = img_capa
            $("#vista-panoramica").attr("style", `background-image: url('${img_capa}')`)
        }

    } else {
        img_url = PREFIX_IMG + img_capa;
        $("#vista-panoramica").attr("style", `background-image: url('${PREFIX_IMG + img_capa}')`)
    }

    for (let i in list_desc) {
        let li = $("<li>")
        let a = $("<a>")
        li.html(list_desc[i])
        ul.append(li)
    }
    lista.append(ul)


    $("#side-bar").removeClass("hidden-side-bar");

    $("#vista-panoramica").click(() => {
        if(!$('#legenda').hasClass('ocultar'))
            $("#btn-legenda").trigger('click');
        $('#image_modal_img').attr('src', img_url);
        $('#image_modal_title').html(titulo)
        $(".image_modal").show()
    })

    let btn_360_side = $("#vista-panoramica2")

    if(id_360){
        btn_360_side.click(() => {
            changeToPanorama(id_360);
        })
    }else{
        btn_360_side.css('display','none');
    }


    $("#btn-adicionar-photo").click(openPopupConstrucao)

    //
    // Search Action
    // ============================

    $("#search").val(titulo)
    $("#btn-close-search").css({"width": "60px", "transition": "width 0.5s", "border-left": "1px solid #7171713c"});
    // $(".search-bar-container").css({"width":"392px", "transition": "width 0.5s"})

}


//
// FECHAR SIDEBAR
// ====================================

function fechar() {

    let marcado = $('.map-selected')
    if(marcado)
        marcado.removeClass('map-selected')
    $("#side-bar").addClass("hidden-side-bar");
    $("#titulo-sidebar").text("");
    $("#descricao-sidebar").text("");


    // ============================
    //Search Action
    $("#search").val("")
    $("#btn-close-search").css({"border-left": "0px", "width": "0", "transition": "all 1s ease 0s"})

    
    const nextURL = '/'+campus;
    const nextTitle = '';
    const nextState = '';

    // This will create a new entry in the browser's history, without reloading
    window.history.pushState(nextState, nextTitle, nextURL);

    // This will replace the current entry in the browser's history, without reloading
    window.history.replaceState(nextState, nextTitle, nextURL);

    const campus_name = [];
    campus_name['ch']= "Chapecó";
    campus_name['pf']= "Passo Fundo";
    campus_name['ls']= "Laranjeiras do Sul";
    campus_name['ch']= "Chapecó";
    campus_name['ch']= "Chapecó";
    campus_name['ch']= "Chapecó";
    
    //This will force to replace title page
    document.title = campus_name[campus]+' | Mapa do Campus - Tour Virtual UFFS';

}


function changeToPanorama(id_360) {
    sessionStorage.setItem("id_360", id_360);
    window.location.href = campus+"/panorama";
}


//
// DEFINIR ACOES
// ====================================

function setActions(parent, ID_element, ID_group, titulo, desc, list_desc, id_360, img_capa) {

    let grupoSNAP = parent.select(ID_group);
    let grupo = $(ID_group);

    if (grupo) {
        grupo.bind("touchstart", function () {
            abrir(ID_group, titulo, desc);
        })

        grupo.click(function () {
            abrir(ID_group, titulo, desc, list_desc, id_360, img_capa, grupoSNAP, grupoSNAP.select(ID_element))
        });
        
        //verifica se o usuário acessou um link com essa informação selecionada, então abre o menu lateral dessa informação
        let numbers_id = ID_element.replace(/[^0-9]/g, "");
        let href_id = window.location.pathname.split('/');
        if(href_id[2] == numbers_id){
            abrir(ID_group, titulo, desc, list_desc, id_360, img_capa, grupoSNAP, grupoSNAP.select(ID_element))
        }
    }

    // Hover
    if (grupoSNAP) {
        if (!grupoSNAP.hasClass('map')) {
            grupoSNAP.addClass('map')
        }

        grupoSNAP.mouseover((evt) => {
            criar(evt, titulo);
        });
        grupoSNAP.mouseout(() => {
            deletar();
        })

    }


}

class BTN_360 {
    constructor(atributos) {
        this.btn = Snap($('#btn-360')[0]);
        this.point = svg.createSVGPoint();
        this.pointOnSVG = this.point.matrixTransform(svg.getScreenCTM().inverse());
        this.atributos = atributos;
        this.parent = Snap("#viewport");
    }

    move(dx, dy, xa, ya) {
        this.#updatePoint(xa, ya);
        this.btn.attr({transform: this.btn.data('origTransform') + (this.btn.data('origTransform') ? "T" : "t") + [dx, dy]});

    }

    start() {
        this.btn.data('origTransform', this.btn.transform().local);
        this.#color360(false);

    }

    stop(dx, dy) {
        for (let i in this.atributos) {
            let atributo = true
            let paper
            try {
                paper = this.parent.select(this.atributos[i].component)
            } catch (DOMException) {
                atributo = false;
            }


            if (this.#Onpoint(paper) && atributo && this.atributos[i].identifier_360) {
                changeToPanorama(this.atributos[i].identifier_360)

            }
        }
        let nearPoint = this.#nearPoint();
        if (nearPoint.value - 80 <= 0) {
            if(nearPoint.element && nearPoint.element.identifier_360)
                changeToPanorama(nearPoint.element.identifier_360)
        }


        this.btn.animate({transform: 'r360'}, 220, mina.linear);
        this.btn.attr({
            transform: (this.btn.data('origTransform') ? "T" : "t") + [dx, dy]
        });
        this.#color360(true);


    }

    #nearPoint() {
        let min = {element: null, value: null};
        for (let i of this.atributos) {
            let paper = this.parent.select(i.component)
            if (paper) {
                let coords = paper.getBBox()
                let pointer = this.#coordsCasting()
                let value = this.#distancePoints(coords.cx, pointer.x, coords.cy, pointer.y)
                if (!min.value) {
                    min.value = value
                } else if (value < min.value) {
                    min.element = i;
                    min.value = value;
                }
            }
        }
        return min;
    }


    #color360(remove){
        for(let atributo of this.atributos){
            let group = this.parent.select(atributo.group);
            if(group && atributo.identifier_360){

                let element = group.select(atributo.component)
                if(element){
                    if(!remove)
                        element.addClass('_360')
                    else element.removeClass('_360')
                }

            }
        }


    }
    // Converte o ponteiro de acordo com o zoom


    #coordsCasting() {
        let original_coords = this.#matrixInverse()
        return {
            x: this.pointOnSVG.x * original_coords.a + original_coords.e,
            y: this.pointOnSVG.y * original_coords.d + original_coords.f
        }

    }

    #matrixInverse() {
        let element = $('.svg-pan-zoom_viewport')[0];
        let matrix_without_zoom = new Snap.Matrix(1, 0, 0, 1, 0, 0);
        let converted_matrix = this.#matrixCasting(element);
        let matrix_inverse = new Snap.Matrix(converted_matrix[0], converted_matrix[1], converted_matrix[2], converted_matrix[3], converted_matrix[4], converted_matrix[5]).invert();
        return matrix_without_zoom.multLeft(matrix_inverse.a, matrix_inverse.b, matrix_inverse.c, matrix_inverse.d, matrix_inverse.e, matrix_inverse.f);
    }

    // Pega a matriz do css e converte para inteiro.
    #matrixCasting(element) {
        let trans = element.style.transform;
        let numberPattern = /-?\d+\.?\d*/g;
        return trans.match(numberPattern);
    }

    #updatePoint(dx, dy) {
        this.point.x = dx;
        this.point.y = dy;
        this.pointOnSVG = this.point.matrixTransform(svg.getScreenCTM().inverse());
    }

    #Onpoint(element) {
        if (!element)
            return false;
        element = element.getBBox();
        let updated_coords = this.#coordsCasting();
        let _x = updated_coords.x > element.x && updated_coords.x < (element.x + element.w);
        let _y = updated_coords.y > element.y && updated_coords.y < (element.y + element.h);

        return _x && _y;

    }

    #distancePoints(x1, x2, y1, y2) {
        return Math.sqrt(Math.pow((x2 - x1), 2) + Math.pow((y2 - y1), 2))
    }

}

let btn_360_action = new BTN_360(atributos);
let btn_360 = Snap($('#btn-360')[0]);
btn_360.drag(
    (dx, dy, xa, ya) => {
        btn_360_action.move(dx, dy, xa, ya)
    },
    () => {
        btn_360_action.start()
    },
    (dx, dy) => {
        btn_360_action.stop(dx, dy)
    });


new LoadSVG(DIR_MAP + campus + "/main.svg" + "?id=" + hash_file, atributos, setActions);


$("#btn-close-search").click(fechar);
