@php
    $hash_file = uniqid();
@endphp

<html lang="pt-br">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui" />
    <style> @-ms-viewport { width: device-width; } </style>
    <link rel="stylesheet" href="{{'../css/panorama/reset.min.css'}}">
    <link rel="stylesheet" href="{{'../css/panorama/style.css?id='.$hash_file }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="{{'../img/icon/uffsvirtual-icon.png'}}">
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
    <img class="icon on" src="{{'../img/panorama/img/left.png'}}">
</a>

<a href="javascript:void(0)" id="autorotateToggle">
    <img class="icon off" src="{{'../img/panorama/img/play.png'}}">
    <img class="icon on" src="{{'../img/panorama/img/pause.png'}}">
</a>

<a href="javascript:void(0)" id="fullscreenToggle">
    <img class="icon off" src="{{'../img/panorama/img/fullscreen.png'}}">
    <img class="icon on" src="{{'../img/panorama/img/windowed.png'}}">
</a>

<a href="javascript:void(0)" id="sceneListToggle">
    <img class="icon off" src="{{'../img/icon/menu-svgrepo-com.svg'}}">
    <img class="icon on" src="{{'../img/icon/menu-svgrepo-com.svg'}}">
</a>



<a href="/" id="viewUp" class="viewControlButton viewControlButton-1">
    <img class="icon" src="{{'../img/panorama/img/up.png'}}">
</a>
<a href="javascript:void(0)" id="viewDown" class="viewControlButton viewControlButton-2">
    <img class="icon" src="{{'../img/panorama/img/down.png'}}">
</a>
<a href="javascript:void(0)" id="viewLeft" class="viewControlButton viewControlButton-3">

</a>
<a href="javascript:void(0)" id="viewRight" class="viewControlButton viewControlButton-4">
    <img class="icon" src="{{'../img/panorama/img/right.png'}}">
</a>
<a href="javascript:void(0)" id="viewIn" class="viewControlButton viewControlButton-5">
    <img class="icon" src="{{'../img/panorama/img/plus.png'}}">
</a>
<a href="javascript:void(0)" id="viewOut" class="viewControlButton viewControlButton-6">
    <img class="icon" src="{{'../img/panorama/img/minus.png'}}">
</a>

<script src="{{'../js/panorama/vendor/screenfull.min.js'}}" ></script>
<script src="{{'../js/panorama/vendor/bowser.min.js'}}" ></script>
<script src="{{'../js/panorama/vendor/marzipano.js'}}" ></script>


@yield('data_panorama')

<script src="{{'../js/panorama/index.js?id='.$hash_file }}"></script>
<script src="{{'../js/panorama/script.js?id='.$hash_file }}"></script>

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
