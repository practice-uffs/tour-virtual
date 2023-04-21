@extends('layouts.panorama.base')
@section('title', 'Chapecó - Panorama')
@section('btn-voltar', route('map.ch'))
@section('sceneList')

@component('components.panorama.dropdown', ['title' => 'Biblioteca'])
    <a href="javascript:void(0)" class="scene" data-id="0-biblioteca---interno">
        <li class="text">interno</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="1-biblioteca---cobertura">
        <li class="text">cobertura</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="2-biblioteca---sala-de-estudos">
        <li class="text">sala de estudos</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="3-biblioteca----externo">
        <li class="text"> externo</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="4-biblioteca---biblioteca">
        <li class="text">biblioteca</li>
    </a>
@endcomponent

@component('components.panorama.dropdown', ['title' => 'Bloco B'])
    <a href="javascript:void(0)" class="scene" data-id="5-bloco-b---entrada">
        <li class="text">externo</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="6-bloco-b-interno">
        <li class="text">interno</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="7-bloco-b---auditrio">
        <li class="text">Auditório</li>
    </a>
@endcomponent

@component('components.panorama.dropdown', ['title' => 'Bloco A'])
    <a href="javascript:void(0)" class="scene" data-id="8-bloco-a">
        <li class="text">Externo</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="10-bloco-a---interno">
        <li class="text">Interno</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="9-auditrio-bloco-a">
        <li class="text">Auditório</li>
    </a>
@endcomponent

@component('components.panorama.dropdown', ['title' => 'Laboratório 1'])
    <a href="javascript:void(0)" class="scene" data-id="13-laboratrio-1">
        <li class="text">Externo</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="14-laboratrio-1-interno">
        <li class="text">Interno</li>
    </a>
@endcomponent

@component('components.panorama.dropdown', ['title' => 'Laboratório 2'])
    <a href="javascript:void(0)" class="scene" data-id="15-laboratrio-2">
        <li class="text">Externo</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="16-laboratrio-2-interno">
        <li class="text">Iinterno</li>
    </a>
@endcomponent

@component('components.panorama.dropdown', ['title' => 'Laboratório 3'])
    <a href="javascript:void(0)" class="scene" data-id="17-laboratrio-3">
        <li class="text">Externo</li>
    </a>
@endcomponent

@component('components.panorama.dropdown', ['title' => 'Laboratório 4'])
    <a href="javascript:void(0)" class="scene" data-id="11-laboratrio-4">
        <li class="text">Laboratório 4</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="12-laboratrio-4---interno">
        <li class="text">interno</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="18-laboratrio-4---interno">
        <li class="text">interno</li>
    </a>
@endcomponent

@component('components.panorama.dropdown', ['title' => 'Bloco C'])
    <a href="javascript:void(0)" class="scene" data-id="19-bloco-c">
        <li class="text">Entrada</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="20-auditorio-c">
        <li class="text">Auditorio</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="21-bloco-c---entrada-1-piso">
        <li class="text">Interno 1° andar</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="22-bloco-c---entrada-2-andar">
        <li class="text">Externo</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="23-bloco-c---entrada-2-piso-">
        <li class="text">Interno 2° andar </li>
    </a>
@endcomponent

@component('components.panorama.dropdown', ['title' => 'Bloco dos Professores'])
    <a href="javascript:void(0)" class="scene" data-id="24-bloco-dos-professores">
        <li class="text">Externo</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="25-bloco-dos-professores---entrada">
        <li class="text">Entrada</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="26-bloco-professores---interno">
        <li class="text">Interno</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="27-auditrio-professor">
        <li class="text">Auditório</li>
    </a>
@endcomponent

@component('components.panorama.dropdown', ['title' => 'RU'])
    <a href="javascript:void(0)" class="scene" data-id="30-restaurante-universitrio">
        <li class="text">Entrada</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="28-ru-interno">
        <li class="text">interno</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="29-ru---sada">
        <li class="text">saída</li>
    </a>
@endcomponent

<a href="javascript:void(0)" class="scene" data-id="31-estao-de-esgoto">
    <li class="text">Estação de Esgoto</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="32-estufas-experimentais">
    <li class="text">Estufas experimentais</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="33-galpo-agrcola">
    <li class="text">Galpão agrícola</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="34-usina-fotovoltaica">
    <li class="text">Usina Fotovoltaica</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="35-almoxarifado">
    <li class="text">Almoxarifado</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="36-central-de-resduos">
    <li class="text">Central de resíduos</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="37-campo-de-futebol">
    <li class="text">Campo de futebol</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="38-quadra-de-volei-de-areia">
    <li class="text">Quadra de volei de areia</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="39-caminho-43">
    <li class="text">Caminho 43</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="40-caminho-42">
    <li class="text">Caminho 42</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="41-caminho-41">
    <li class="text">Caminho 41</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="42-caminho-40">
    <li class="text">Caminho 40</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="43-caminho-39">
    <li class="text">Caminho 39</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="44-caminho-38">
    <li class="text">Caminho 38</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="45-caminho-37">
    <li class="text">Caminho 37</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="46-caminho-36">
    <li class="text">Caminho 36</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="47-caminho-35">
    <li class="text">Caminho 35</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="48-caminho-34">
    <li class="text">Caminho 34</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="49-caminho-33">
    <li class="text">Caminho 33</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="50-caminho-32">
    <li class="text">Caminho 32</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="51-caminho-31">
    <li class="text">Caminho 31</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="52-caminho-30">
    <li class="text">Caminho 30</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="53-caminho-29">
    <li class="text">Caminho 29</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="54-caminho-28">
    <li class="text">Caminho 28</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="55-caminho-27">
    <li class="text">Caminho 27</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="56-caminho-26">
    <li class="text">Caminho 26</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="57-caminho-25">
    <li class="text">Caminho 25</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="58-caminho-24">
    <li class="text">Caminho 24</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="59-caminho-23">
    <li class="text">Caminho 23</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="60-caminho-22">
    <li class="text">Caminho 22</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="61-caminho-21">
    <li class="text">Caminho 21</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="62-caminho-20">
    <li class="text">Caminho 20</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="63-caminho-19">
    <li class="text">Caminho 19</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="64-caminho-18">
    <li class="text">Caminho 18</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="65-caminho-17">
    <li class="text">Caminho 17</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="66-caminho-16">
    <li class="text">Caminho 16</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="67-caminho-15">
    <li class="text">Caminho 15</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="68-caminho-14">
    <li class="text">Caminho 14</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="69-caminho-13">
    <li class="text">Caminho 13</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="70-caminho-12">
    <li class="text">Caminho 12</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="71-caminho-11">
    <li class="text">Caminho 11</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="72-caminho-10">
    <li class="text">Caminho 10</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="73-caminho-9">
    <li class="text">Caminho 9</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="74-caminho-8">
    <li class="text">Caminho 8</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="75-caminho-7">
    <li class="text">Caminho 7</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="76-caminho-6">
    <li class="text">Caminho 6</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="77-caminho-5">
    <li class="text">Caminho 5</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="78-caminho-4">
    <li class="text">Caminho 4</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="79-caminho-3">
    <li class="text">Caminho 3</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="80-caminho-2">
    <li class="text">Caminho 2</li>
</a>
<a href="javascript:void(0)" class="scene" data-id="81-caminho-1">
    <li class="text">Caminho 1</li>
</a>








@endsection
@section('data_panorama')
<script>var prefix_DIR = 'ch'</script>
<script src="{{'js/panorama/ch/data.js'}}"></script>
@endsection
<script>
    const personalSceneName = "Chapecó";
</script>
