$("#btn-legenda").click(function(){
    $(".controls-container").toggleClass("controls-show-legenda");
    $("#legenda").toggleClass("ocultar");
});

$("#btn-legenda").trigger('click');