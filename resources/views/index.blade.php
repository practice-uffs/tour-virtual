@php
    $hash_file = uniqid();
@endphp

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Tour Virtual</title>

    <link rel="stylesheet" href="{{ 'css/map/scroll.css?id='.$hash_file }}">
    <link rel="stylesheet" href="{{ 'css/map/sidebar.css?id='.$hash_file }}">
    <link rel="stylesheet" href="{{ 'css/map/controls.css?id='.$hash_file}}">
    <link rel="stylesheet" href="{{ 'css/map/map.css?id='.$hash_file}}">
    <link rel="stylesheet" href="{{ 'css/map/legenda.css?id='.$hash_file}}">
    <link rel="stylesheet" href="{{ 'css/map/searchbar.css?id='.$hash_file}}">
    <link rel="stylesheet" href="{{ 'css/map/construcao.css?id='.$hash_file }}">
    <link href="{{ 'tour-explain/bootstrap.min.css' }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ 'css/style.css' }}">



    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{'img/icon/uffsvirtual-icon.png'}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/utils/Draggable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/svg-pan-zoom@3.6.1/dist/svg-pan-zoom.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="{{ 'js/map/snap.svg/snap.svg.js'}}"></script>


</head>
<body>


<script>
    var atributos = {!! json_encode($data, JSON_HEX_TAG) !!};
    var campus = {!! json_encode($campus, JSON_HEX_TAG) !!};
    var hash_file = {!! json_encode($hash_file, JSON_HEX_TAG) !!};


</script>


@if(isset($popup) && $popup)
    @include('components.popup')
@endif

@include('components.image_modal')
<div class="mapa" id="backdrop">
    <div class="map-svg">
        <svg id="svg" class="svg" viewBox="{{$viewport ?? '0 0 3794 1985'}}" preserveAspectRatio="xMidYMid meet"  fill="none" xmlns="http://www.w3.org/2000/svg"><g id="viewport"></g></svg>
    </div>
    <div class="campus" id="step4">
        <div onclick="$('.campus-popup').show();">
            <img src="{{'img/icon/forward-item-svgrepo-com.svg'}}"  width="30px" height="30px" style="stroke: #567569; margin-right: 15px;">

            <h2>{{$titulo}}</h2>
        </div>

    </div>
    <div class="controls-container controls-top" id="step2">
        <div class="especial-controls" >
            <div class="btn-legenda" id="btn-legenda">
                <img src="{{'img/icon/legend-right-svgrepo-com.svg'}}" style="width: 25px; height: 25px;">
            </div>
            <div class="btn-ajuda startTour">
                <img src="{{'img/icon/book-1-svgrepo-com.svg'}}" style="width: 25px; height: 25px;">
            </div>
        </div>
    </div>
    <div class="controls-container controls-bottom" id="step3" >
        <div class="zoom-container">
            <div class="btn-360">
                {{-- <img  id="btn-360" src="/img/icon/zoom-in-svgrepo-com.svg" style="width: 25px; height: 25px;"> --}}
                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                <svg id="btn-360" fill="#000000" style="background-color: white; border-radius: 10px;"  width="28px" height="28px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 0 480 480" xml:space="preserve">
                            <g>
                                <g>
                                    <g>
                                        <path d="M328.003,363.825c-5.395-1.208-10.737,2.183-11.945,7.57c-1.208,5.389,2.182,10.737,7.57,11.945
                                            c42.555,9.539,61.937,24.364,61.937,34.101c0,6.727-10.152,18.013-38.764,27.683C318.417,454.717,280.487,460,240,460
                                            c-40.487,0-78.416-5.283-106.801-14.876c-28.612-9.67-38.764-20.956-38.764-27.683c0-9.302,17.14-22.966,55.432-32.524
                                            c5.358-1.337,8.618-6.766,7.28-12.124c-1.337-5.358-6.766-8.62-12.124-7.28c-45.52,11.362-70.588,29.804-70.588,51.929
                                            c0,13.2,9.084,32.004,52.36,46.63C157.189,474.343,197.393,480,240,480s82.811-5.657,113.204-15.929
                                            c43.276-14.626,52.36-33.43,52.36-46.63C405.565,394.078,378.021,375.037,328.003,363.825z"/>
                                        <path d="M172.273,293.739h12.581v102.889c0,5.523,4.477,10,10,10h90.293c5.522,0,10-4.477,10-10V293.739h12.58
                                            c5.522,0,10-4.477,10-10V103.123c0-5.523-4.478-10-10-10h-29.195c9.412-9.899,15.207-23.27,15.207-37.977
                                            C293.739,24.739,269,0,238.592,0c-30.416,0-55.162,24.739-55.162,55.146c0,14.707,5.797,28.078,15.211,37.977h-26.37
                                            c-5.523,0-10,4.477-10,10v180.616C162.273,289.262,166.749,293.739,172.273,293.739z M238.592,20
                                            c19.379,0,35.146,15.767,35.146,35.146c0,19.388-15.767,35.162-35.146,35.162c-19.388,0-35.162-15.773-35.162-35.162
                                            C203.432,35.767,219.204,20,238.592,20z M182.273,113.123h115.454v160.616h-12.58c-5.522,0-10,4.477-10,10v102.889H250v-91.599
                                            c0-5.523-4.478-10-10-10c-5.523,0-10,4.477-10,10v91.599h-25.147V283.739c0-5.523-4.477-10-10-10h-12.581V113.123z"/>
                                    </g>
                                </g>
                            </g>
                        </svg>
            </div>

            <div class="zoomin" id="zoomin">
                <img src="{{'img/icon/zoom-in-svgrepo-com.svg'}}" style="width: 25px; height: 25px;">
            </div>
            <div class="zoomout" id="zoomout">
                <img src="{{'img/icon/zoom-out-svgrepo-com.svg'}}" style="width: 25px; height: 25px;">
            </div>
            <div class="zoomreset" id="zoomreset">
                <img src="{{'img/icon/eye-svgrepo-com.svg'}}" style="width: 18px; height: 18px;">
                <img src="{{'img/icon/screen-full-svgrepo-com.svg'}}" style="width: 30px;height: 30px;position: absolute;">
            </div>
        </div>
    </div>

    <div id="tooltip" display="none" style="position: absolute; display: none;"></div>

</div>
<div class="container-side-bar  hidden-side-bar"id="side-bar">
    <div style="width: 100%; height: 30vh; background-color: black" >
        <div class="img custom-hover-sidebar-img" id="vista-panoramica">
            {{-- <img  id="sidebar-img-capa" src="{{'img/pictures/LS/Principal/Capa/almoxarifado.jpg'}}" alt=""> --}}
            <img class="eye-btn-sidebar" src="{{'img/icon/eye-svgrepo-com.svg'}}">
        </div>
    </div>

    <div class="container-content-side-bar custom-scrollbar-css" >
        <div class="content-side-bar">
            <div class="titulo">
                <h2 id="titulo-sidebar">BLOCO A</h2>
            </div>
            <div class="description"><p id="descricao-sidebar">Neste bloco é onde ocorre a maioria das aulas. Estão presentes, também: </p></div>
            <div id="list_description"></div>
        </div>
    </div>

    <div class="side-bar-logo">
        <div class="vista-panoramica-container">
            <div class="vista-panoramica" id="vista-panoramica2">
                <span>VISTA PANORÂMICA</span>
            </div>
        </div>
        <a href="https://practice.uffs.edu.br/" target="_blank" style="text-decoration: none"><img src="{{asset('img/icon/practice.svg')}}" class="logo-practice"></a>
        <a href="https://www.uffs.edu.br/" target="_blank"><div class="bkgd-logo-uffs"><img src="{{'img/icon/logoUFFS.png'}}" class="logo-UFFS"></div></a>
    </div>




</div>


<div class="legenda ocultar" id="legenda">
    <div><h2> Legenda</h2></div>
    <img src="{{'img/svg/legenda.svg'}}" alt="">
    <div class="container-list"><div class="list" id="list"></div></div>
    <div class="close-legenda"><div class="close-container"><div class="arrow "></div></div></div>
</div>


<div class="search-bar-container" id="step1">
    <div class="search-bar">
        <a class="icons-search" href="{{ route('home') }}" >
            <img src="{{'img/icon/left-chevron-svgrepo-com.svg'}}" style="width: 25px; height: 25px;">
        </a>
        <input type="text" id="search" placeholder="Procurar..." title="Type in a category">
        <div class="icons-search" >
            <img src="{{'img/icon/search-icon.svg'}}" style="width: 23px; height: 22px;">
        </div>
        <div class="icons-search" id="btn-close-search" style="width: 0;">
            <svg width="25" height="25" clip-rule="evenodd" fill-rule="evenodd" fill="#616161" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12 10.93 5.719-5.72c.146-.146.339-.219.531-.219.404 0 .75.324.75.749 0 .193-.073.385-.219.532l-5.72 5.719 5.719 5.719c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.385-.073-.531-.219l-5.719-5.719-5.719 5.719c-.146.146-.339.219-.531.219-.401 0-.75-.323-.75-.75 0-.192.073-.384.22-.531l5.719-5.719-5.72-5.719c-.146-.147-.219-.339-.219-.532 0-.425.346-.749.75-.749.192 0 .385.073.531.219z"/></svg>
        </div>
    </div>
    <div class="search-bar" id="resultado"><ul id="menu"></ul></div>
</div>

<div class="popup-container" id="popup-construcao">
    <div class="popup-construcao">
        <div class="popup-content">
            <div class="popup-cabecalho">
                <div class="popup-close" id="popup-close-construcao">
                    <svg clip-rule="evenodd" fill-rule="evenodd"  stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12 10.93 5.719-5.72c.146-.146.339-.219.531-.219.404 0 .75.324.75.749 0 .193-.073.385-.219.532l-5.72 5.719 5.719 5.719c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.385-.073-.531-.219l-5.719-5.719-5.719 5.719c-.146.146-.339.219-.531.219-.401 0-.75-.323-.75-.75 0-.192.073-.384.22-.531l5.719-5.719-5.72-5.719c-.146-.147-.219-.339-.219-.532 0-.425.346-.749.75-.749.192 0 .385.073.531.219z"/></svg>
                </div>
            </div>
            <h1>Em construção</h1>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100.001px" height="70px" viewBox="0 0 100 68">
                <g id="large">
                    <g>
                        <path d="M55.777,38.473l6.221-1.133c0.017-1.791-0.123-3.573-0.41-5.324l-6.321-0.19c-0.438-2.053-1.135-4.048-2.076-5.931
                            l4.82-4.094c-0.868-1.552-1.874-3.028-3.005-4.417l-5.569,2.999c-1.385-1.54-2.98-2.921-4.771-4.099l2.124-5.954
                            c-0.759-0.452-1.543-0.878-2.357-1.269c-0.811-0.39-1.625-0.732-2.449-1.046l-3.325,5.381c-2.038-0.665-4.113-1.052-6.183-1.174
                            L31.34,6.002c-1.792-0.02-3.571,0.119-5.32,0.406l-0.191,6.32c-2.056,0.439-4.051,1.137-5.936,2.08l-4.097-4.82
                            c-1.546,0.872-3.022,1.875-4.407,3.006l2.996,5.566c-1.54,1.384-2.925,2.985-4.104,4.778c-2.16-0.771-4.196-1.498-5.953-2.127
                            c-0.449,0.765-0.875,1.544-1.265,2.354c-0.39,0.811-0.733,1.63-1.049,2.457c1.587,0.981,3.424,2.119,5.377,3.325
                            c-0.662,2.037-1.049,4.117-1.172,6.186l-6.218,1.136c-0.021,1.789,0.12,3.566,0.407,5.321l6.32,0.188
                            c0.442,2.06,1.143,4.057,2.082,5.937l-4.818,4.095c0.872,1.549,1.873,3.026,3.009,4.412l5.563-2.998
                            c1.392,1.54,2.989,2.92,4.777,4.099l-2.121,5.954c0.756,0.446,1.538,0.871,2.348,1.258c0.813,0.394,1.633,0.739,2.462,1.05
                            l3.326-5.375c2.033,0.662,4.109,1.05,6.175,1.17l1.137,6.221c1.791,0.019,3.569-0.123,5.323-0.407l0.194-6.324
                            c2.053-0.438,4.045-1.136,5.927-2.079l4.093,4.817c1.55-0.865,3.026-1.87,4.414-2.999l-2.995-5.572
                            c1.537-1.385,2.914-2.98,4.093-4.772l5.953,2.127c0.448-0.761,0.878-1.545,1.268-2.356c0.388-0.808,0.729-1.631,1.047-2.458
                            l-5.378-3.324C55.268,42.615,55.655,40.542,55.777,38.473z M42.302,42.435c-3.002,6.243-10.495,8.872-16.737,5.866
                            c-6.244-2.999-8.872-10.493-5.867-16.736c3.002-6.244,10.495-8.873,16.736-5.869C42.676,28.698,45.306,36.19,42.302,42.435z" fill="none" stroke="#E43" />
                        <animateTransform attributeName="transform" begin="0s" dur="3s" type="rotate" from="0 31 37" to="360 31 37" repeatCount="indefinite" </animateTransform>
                    </g>
                    <g id="small">
                        <path d="M93.068,19.253L99,16.31c-0.371-1.651-0.934-3.257-1.679-4.776l-6.472,1.404c-0.902-1.436-2.051-2.735-3.42-3.819
                            l2.115-6.273c-0.706-0.448-1.443-0.867-2.213-1.238c-0.774-0.371-1.559-0.685-2.351-0.958l-3.584,5.567
                            c-1.701-0.39-3.432-0.479-5.118-0.284L73.335,0c-1.652,0.367-3.256,0.931-4.776,1.672l1.404,6.47
                            c-1.439,0.899-2.744,2.047-3.835,3.419c-2.208-0.746-4.38-1.476-6.273-2.114c-0.451,0.71-0.874,1.448-1.244,2.229
                            c-0.371,0.764-0.68,1.541-0.954,2.329c1.681,1.078,3.612,2.323,5.569,3.579c-0.399,1.711-0.486,3.449-0.291,5.145
                            c-2.086,1.034-4.143,2.055-5.936,2.945c0.368,1.648,0.929,3.25,1.67,4.769c1.954-0.426,4.193-0.912,6.468-1.405
                            c0.906,1.449,2.06,2.758,3.442,3.853l-2.117,6.27c0.708,0.449,1.439,0.865,2.218,1.236c0.767,0.371,1.551,0.685,2.338,0.96
                            c1.081-1.68,2.319-3.612,3.583-5.574c1.714,0.401,3.457,0.484,5.156,0.288L82.695,42c1.651-0.371,3.252-0.931,4.773-1.676
                            c-0.425-1.952-0.912-4.194-1.404-6.473c1.439-0.902,2.744-2.057,3.835-3.436l6.273,2.11c0.444-0.7,0.856-1.43,1.225-2.197
                            c0.372-0.777,0.691-1.569,0.963-2.361l-5.568-3.586C93.181,22.677,93.269,20.939,93.068,19.253z M84.365,24.062
                            c-1.693,3.513-5.908,4.991-9.418,3.302c-3.513-1.689-4.99-5.906-3.301-9.419c1.688-3.513,5.906-4.991,9.417-3.302
                            C84.573,16.331,86.05,20.549,84.365,24.062z" fill="none" stroke="#E43" />
                        <animateTransform attributeName="transform" begin="0s" dur="2s" type="rotate" from="0 78 21" to="-360 78 21" repeatCount="indefinite" </animateTransform>
                    </g>
            </svg>
            <p>
                Estamos trabalhando nisso.
            </p>
        </div>
    </div>
</div>
</div>




<div class='campus-popup'>
    <div class='campus-selector-popup'>
        <h2>Selecione um Campus</h2>
        <div class="campus-item"><a href="{{ route('map.cl') }}"><img class="eye-btn" src="{{'img/icon/eye-svgrepo-com_green.svg'}}">Cerro Largo</a></div>
        <div class="campus-item"><a href="{{ route('map.ch') }}"><img class="eye-btn" src="{{'img/icon/eye-svgrepo-com_green.svg'}}">Chapecó</a></div>
        <div class="campus-item"><a href="{{ route('map.er') }}"><img class="eye-btn" src="{{'img/icon/eye-svgrepo-com_green.svg'}}">Erechim</a></div>
        <div class="campus-item"><a href="{{ route('map.ls') }}"><img class="eye-btn" src="{{'img/icon/eye-svgrepo-com_green.svg'}}">Laranjeiras do Sul</a></div>
        <div class="campus-item"><a href="{{ route('map.pf') }}"><img class="eye-btn" src="{{'img/icon/eye-svgrepo-com_green.svg'}}">Passo Fundo</a></div>
        <div class="campus-item"><a href="{{ route('map.re') }}"><img class="eye-btn" src="{{'img/icon/eye-svgrepo-com_green.svg'}}">Realeza</a></div>
        <img class="btn-close-campus-selector" onclick="$('.campus-popup').hide();" src="{{'img/icon/close-square-svgrepo-com.svg'}}">
    </div>
</div>

<!-- Tour-Virtual Scripts -->
<script type="module" src=" {{'js/map/SVGactions.js?id='.$hash_file}}" defer></script>
<script type="module" src="{{'js/map/legenda.js?id='.$hash_file}}" defer></script>
<script type="module" src="{{'js/map/searchbar.js?id='.$hash_file}}"defer></script>
<script src="{{'js/map/controls.js?id='.$hash_file}}" defer></script>
<script src="{{'js/map/popup.js?id='.$hash_file}}" defer></script>

<!-- Explain Steps Scripts -->
<script src="{{'tour-explain/jquery.min.js'}}"></script>
<script src="{{'tour-explain/bootstrap.min.js'}}"></script>
<script src="{{'tour-explain/bootstrap-tour.js'}}"></script>

<script>
    $(document).ready(function (){
        // Instance the tour
        var tour = new Tour({
            steps: [{
                element: "#step1",
                title: "Barra de pesquisa",
                content: "Procure por um local específico do campus. Basta digitar a sua busca e selecionar um elemento para obter as informações detalhadas.",
                placement: "bottom",
                backdrop: true,
                backdropContainer: '#wrapper',
                onShown: function (tour){
                    $('#step1').addClass('z-index-1120')
                },
                onHidden: function (tour){
                    $('#step1').removeClass('z-index-1120')
                }
            },
                {
                    element: "#btn-legenda",
                    title: "Legenda",
                    content: " Clique aqui abrir o menu lateral e entenda o que representa cada elemento presente no mapa.",
                    placement: "bottom",
                    backdrop: true,
                    backdropContainer: '#wrapper',
                    onShown: function (tour){
                        $('#step2').addClass('z-index-1120')
                    },
                    onHidden: function (tour){
                        $('#step2').removeClass('z-index-1120')
                    }
                },
                {
                    element: "#step3",
                    title: "Controles de navegação",
                    content: "Aqui estão localizados os controles de visualização do mapa. Arraste o ícone do personagem até um local específico para iniciar o tour.",
                    placement: "top",
                    backdrop: true,
                    backdropContainer: '#wrapper',
                    onShown: function (tour){
                        $('#step3').addClass('z-index-1120')
                    },
                    onHidden: function (tour){
                        $('#step3').removeClass('z-index-1120')
                    }
                },
                {
                    element: "#step4",
                    title: "Nome do Campus",
                    content: "Este é nome do campus que está sendo exibido. Clique aqui para alternar entre os campi.",
                    placement: "top",
                    backdrop: true,
                    backdropContainer: '#wrapper',
                    onShown: function (tour){
                        $('#step4').addClass('z-index-1120')
                    },
                    onHidden: function (tour){
                        $('#step4').removeClass('z-index-1120')
                    }
                }
            ]});

        // Initialize the tour
        tour.init();

        $('.startTour').click(function(){
            tour.restart();

            // Start the tour
            // tour.start();
        })

        if(!localStorage.getItem('tutorial')){
            localStorage.setItem('tutorial', 'true');
            tour.restart();

        }

    });

</script>
</body>
</html>
