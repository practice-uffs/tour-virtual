@extends('layouts.panorama_base')
@section('title', 'Chapecó - Panorama')
@section('btn-voltar', route('home'))
@section('sceneList')
    <a href="javascript:void(0)" class="scene" data-id="0-caminho-9">
        <li class="text">Caminho 9</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="1-caminho-8">
        <li class="text">Caminho 8</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="2-caminho-7">
        <li class="text">Caminho 7</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="3-caminho-6">
        <li class="text">Caminho 6</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="4-caminho-5">
        <li class="text">Caminho 5</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="5-caminho-4">
        <li class="text">Caminho 4</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="6-caminho-3">
        <li class="text">Caminho 3</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="7-caminho-2">
        <li class="text">Caminho 2</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="8-caminho-1">
        <li class="text">Caminho 1</li>
    </a>







    <a href="javascript:void(0)" class="scene" data-id="12-bloco-a-e-b">
        <li class="text">Acesso Bloco A e B</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="15-sada-bloco-b">
        <li class="text">Bloco B (saida)</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="21-bloco-c">
        <li class="text">Bloco C</li>
    </a>



    <a href="javascript:void(0)" class="scene" data-id="13-biblioteca">
        <li class="text">Biblioteca</li>
    </a>


    <a href="javascript:void(0)" class="scene" data-id="11-bloco-dos-professores">
        <li class="text">Bloco Docente</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="14-sada-bloco-dos-professores">
        <li class="text">Bloco Docente (saida)</li>
    </a>



    <a href="javascript:void(0)" class="scene" data-id="16-laboratrio-12">
        <li class="text">Acesso Lab. 1 e 2</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="17-laoratrio-34">
        <li class="text">Acesso Lab. 3 e 4</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="18-laboratrio-04">
        <li class="text">Laboratório 04</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="19-laboratrio-03">
        <li class="text">Laboratório 03</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="10-cantina">
        <li class="text">Cantina</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="20-ru">
        <li class="text">Restaurante Univ.</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="9-sada-ru">
        <li class="text">Restaurante Univ. (saida)</li>
    </a>



@endsection
@section('data_panorama')
    <script>var prefix_DIR = 'ch'</script>
    <script src="{{'../js/panorama/ch/data.js'}}"></script>
@endsection
<script>
    const personalSceneName = "Chapecó";
</script>
