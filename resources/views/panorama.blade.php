<html lang="pt-br">
<head>
<title>UFFS Laranjeiras do Sul Panorama</title>
<meta charset="utf-8">
<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui" />
<style> @-ms-viewport { width: device-width; } </style>
<link rel="stylesheet" href="{{'css/panorama/reset.min.css'}}">
<link rel="stylesheet" href="{{'css/panorama/style.css'}}">
 <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body class="multiple-scenes ">

<div id="pano"></div>

<div id="sceneList">
  <ul class="scenes">

    <a href="javascript:void(0)" class="scene" data-id="17-bloco-a-dentro">
      <li class="text">Bloco A Dentro</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="18-bloco-a-fora">
      <li class="text">Bloco A Fora</li>
    </a>

      <a href="javascript:void(0)" class="scene" data-id="0-bloco-dos-professores-fora">
        <li class="text">Bloco dos Professores Fora</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="19-bloco-dos-professores-dentro">
        <li class="text">Bloco dos Professores Dentro</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="8-laboratrio-1">
        <li class="text">Laboratório 1</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="9-laboratrio-2">
        <li class="text">Laboratório 2</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="10-laboratrio-3">
        <li class="text">Laboratório 3</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="12-ru-dentro">
        <li class="text">RU Dentro</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="13-ru-fora">
        <li class="text">RU Fora</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="11-pomar">
        <li class="text">Pomar</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="1-campo-de-futebol">
        <li class="text">Campo de Futebol</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="2-campo-de-vlei">
        <li class="text">Campo de Vôlei</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="3-cantina">
        <li class="text">Cantina</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="4-cvt">
        <li class="text">CVT</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="5-estao-de-tratamento">
        <li class="text">Estação de Tratamento</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="6-estufas">
        <li class="text">Estufas</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="7-galpo-de-mquinas-agrcolas">
        <li class="text">Galpão de Máquinas Agrícolas</li>
      </a>



      <a href="javascript:void(0)" class="scene" data-id="14-slackline">
        <li class="text">Slackline</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="15-almoxarifado">
        <li class="text">Almoxarifado</li>
      </a>

      <a href="javascript:void(0)" class="scene" data-id="16-rea-experimental-da-aquicultura">
        <li class="text">Área Experimental da Aquicultura</li>
      </a>

  </ul>
</div>

<div id="titleBar">
  <h1 class="sceneName"></h1>
</div>

<a href="javascript:void(0)" id="btn-voltar" class="enabled">
  <img class="icon on" src="{{'img/panorama/img/left.png'}}">
</a>

<a href="javascript:void(0)" id="autorotateToggle">
  <img class="icon off" src="{{'img/panorama/img/play.png'}}">
  <img class="icon on" src="{{'img/panorama/img/pause.png'}}">
</a>

<a href="javascript:void(0)" id="fullscreenToggle">
  <img class="icon off" src="{{'img/panorama/img/fullscreen.png'}}">
  <img class="icon on" src="{{'img/panorama/img/windowed.png'}}">
</a>

<a href="javascript:void(0)" id="sceneListToggle">
  <img class="icon off" src="{{'img/panorama/img/expand.png'}}">
  <img class="icon on" src="{{'img/panorama/img/collapse.png'}}">
</a>



<a href="/" id="viewUp" class="viewControlButton viewControlButton-1">
  <img class="icon" src="{{'img/panorama/img/up.png'}}">
</a>
<a href="javascript:void(0)" id="viewDown" class="viewControlButton viewControlButton-2">
  <img class="icon" src="{{'img/panorama/img/down.png'}}">
</a>
<a href="javascript:void(0)" id="viewLeft" class="viewControlButton viewControlButton-3">

</a>
<a href="javascript:void(0)" id="viewRight" class="viewControlButton viewControlButton-4">
  <img class="icon" src="{{'img/panorama/img/right.png'}}">
</a>
<a href="javascript:void(0)" id="viewIn" class="viewControlButton viewControlButton-5">
  <img class="icon" src="{{'img/panorama/img/plus.png'}}">
</a>
<a href="javascript:void(0)" id="viewOut" class="viewControlButton viewControlButton-6">
  <img class="icon" src="{{'img/panorama/img/minus.png'}}">
</a>

<script src="{{'js/panorama/vendor/screenfull.min.js'}}" ></script>
<script src="{{'js/panorama/vendor/bowser.min.js'}}" ></script>
<script src="{{'js/panorama/vendor/marzipano.js'}}" ></script>

<script src="{{'js/panorama/data.js'}}"></script>
<script src="{{'js/panorama/index.js'}}"></script>
<script src="{{'js/panorama/script.js'}}"></script>

</body>
</html>
