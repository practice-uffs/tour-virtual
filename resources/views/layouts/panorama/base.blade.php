@php
    $hash_file = uniqid();
@endphp

<html lang="pt-br">
<head>
    <meta charset="utf-8">

    <link href="https://practice.uffs.edu.br/tour-virtual/{{ $campus }}/panorama/{{ $ID_element ?? '' }}" rel="canonical">
    <title>{{$campus_name}}: Visão Panoramica</title>
    <base href="{{ route('home') }}/">
    <meta name="title" content="Tour Virtual UFFS - Conheça e navegue dentro dos campi da Universidade Federal da Fronteira Sul" />
    <meta name="description" content="Tenha acesso aos mapas contendo informações sobre os blocos e a localização das salas, além de acessar a visualização 360 dos principais pontos de cada campus." />
    <meta name='image' content="https://practice.uffs.edu.br/tour-virtual/img/icon/tour-icon.svg" />
    <meta name="rating" content="General" />
    <meta name="expires" content="0" />
    <meta name="language" content="portuguese, PT-BR" />
    <meta name="distribution" content="Global" />
    <meta name="revisit-after" content="7 Days" />
    <meta name="author" content="Practice - https://practice.uffs.edu.br" />
    <meta name="publisher" content="Practice - https://practice.uffs.edu.br" />
    <meta name="copyright" content="Practice"/>
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="url" content="https://practice.uffs.edu.br/tour-virtual"/>        

    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Tour Virtual UFFS - Conheça e navegue dentro dos campi da Universidade Federal da Fronteira Sul" />
    <meta property="og:description" content="Tenha acesso aos mapas contendo informações sobre os blocos e a localização das salas, além de acessar a visualização 360 dos principais pontos de cada campus." />
    <meta property="og:image" content="https://practice.uffs.edu.br/tour-virtual/img/icon/tour-icon.svg" />
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="600">
    <meta property="og:url" content="https://practice.uffs.edu.br/tour-virtual" />
    <meta property="og:site_name" content="practice" />
    <meta property="og:locale" content="pt_BR"/>
    <meta property="article:author" content="Practice - https://practice.uffs.edu.br"/>
    <meta property="article:publisher" content="Practice - https://practice.uffs.edu.br"/>   

    <meta property="twitter:card" content="summary_large_image"/>
    <meta property="twitter:site" content="https://practice.uffs.edu.br/tour-virtual"/>
    <meta property="twitter:domain" content="https://practice.uffs.edu.br/tour-virtual"/>
    <meta property="twitter:title" content="Tour Virtual UFFS - Conheça e navegue dentro dos campi da Universidade Federal da Fronteira Sul"/>
    <meta property="twitter:description" content="Tenha acesso aos mapas contendo informações sobre os blocos e a localização das salas, além de acessar a visualização 360 dos principais pontos de cada campus."/>
    <meta property="twitter:image:src" content="https://practice.uffs.edu.br/tour-virtual/img/icon/tour-icon.svg/">
    <meta property="twitter:url" content="https://practice.uffs.edu.br/tour-virtual"/>




    <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui" />
    <style> @-ms-viewport { width: device-width; } </style>
    <link rel="stylesheet" href="{{asset('../css/panorama/reset.min.css')}}">
    <link rel="stylesheet" href="{{asset('../css/panorama/style.css?id='.$hash_file )}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="{{asset('../img/icon/uffsvirtual-icon.png')}}">




</head>
<body class="multiple-scenes ">

<div id="pano"></div>

<div id="sceneList">
<ul class="scenes">
@yield('sceneList')

</ul>
</div>



<div id="titleBar">
    <h1 class="sceneName"></h1>
</div>

<a href='@yield('btn-voltar')' id="btn-voltar" class="enabled">
    <img class="icon on" src="{{asset('../img/panorama/img/left.png')}}">
</a>

<a href="javascript:void(0)" id="autorotateToggle">
    <img class="icon off" src="{{asset('../img/panorama/img/play.png')}}">
    <img class="icon on" src="{{asset('../img/panorama/img/pause.png')}}">
</a>

<a href="javascript:void(0)" id="fullscreenToggle">
    <img class="icon off" src="{{asset('../img/panorama/img/fullscreen.png')}}">
    <img class="icon on" src="{{asset('../img/panorama/img/windowed.png')}}">
</a>

<a href="javascript:void(0)" id="sceneListToggle">
    <img class="icon off" src="{{asset('../img/icon/menu-svgrepo-com.svg')}}">
    <img class="icon on" src="{{asset('../img/icon/menu-svgrepo-com.svg')}}">
</a>



<a href="/" id="viewUp" class="viewControlButton viewControlButton-1">
    <img class="icon" src="{{asset('../img/panorama/img/up.png')}}">
</a>
<a href="javascript:void(0)" id="viewDown" class="viewControlButton viewControlButton-2">
    <img class="icon" src="{{asset('../img/panorama/img/down.png')}}">
</a>
<a href="javascript:void(0)" id="viewLeft" class="viewControlButton viewControlButton-3">

</a>
<a href="javascript:void(0)" id="viewRight" class="viewControlButton viewControlButton-4">
    <img class="icon" src="{{asset('../img/panorama/img/right.png')}}">
</a>
<a href="javascript:void(0)" id="viewIn" class="viewControlButton viewControlButton-5">
    <img class="icon" src="{{asset('../img/panorama/img/plus.png')}}">
</a>
<a href="javascript:void(0)" id="viewOut" class="viewControlButton viewControlButton-6">
    <img class="icon" src="{{asset('../img/panorama/img/minus.png')}}">
</a>

<script src="{{asset('../js/panorama/vendor/screenfull.min.js')}}" ></script>
<script src="{{asset('../js/panorama/vendor/bowser.min.js')}}" ></script>
<script src="{{asset('../js/panorama/vendor/marzipano.js')}}" ></script>


@yield('data_panorama')

<script src="{{asset('../js/panorama/index.js?id='.$hash_file) }}"></script>
<script src="{{asset('../js/panorama/script.js?id='.$hash_file) }}"></script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-J157BT7FS9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-J157BT7FS9');
</script>

</body>
</html>
