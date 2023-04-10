@extends('layouts.panorama.base')
@section('title', 'Chapecó - Panorama')
@section('btn-voltar', route('map.ch'))
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
        <li class="text">Bloco A</li>
    </a>

    @component('components.panorama.dropdown', ['title' => 'Bloco B'])
        <a href="javascript:void(0)" class="scene" data-id="bloco-b-acesso">
            <li class="text">Acesso</li>
        </a>
        <a href="javascript:void(0)" class="scene" data-id="15-sada-bloco-b">
            <li class="text">Saída</li>
        </a>

    @endcomponent


    <a href="javascript:void(0)" class="scene" data-id="21-bloco-c">
        <li class="text">Bloco C</li>
    </a>



    @component('components.panorama.dropdown', ['title' => 'Bloco dos Professores'])

        <a href="javascript:void(0)" class="scene" data-id="11-bloco-dos-professores">
            <li class="text">Acesso</li>
        </a>

        <a href="javascript:void(0)" class="scene" data-id="14-sada-bloco-dos-professores">
            <li class="text">Saída</li>
        </a>

    @endcomponent



    @component('components.panorama.dropdown', ['title' => 'RU'])
        <a href="javascript:void(0)" class="scene" data-id="20-ru">
            <li class="text">Acesso</li>
        </a>

        <a href="javascript:void(0)" class="scene" data-id="9-sada-ru">
            <li class="text">Saída</li>
        </a>
    @endcomponent


    <a href="javascript:void(0)" class="scene" data-id="13-biblioteca">
        <li class="text">Biblioteca</li>
    </a>
    <a href="javascript:void(0)" class="scene" data-id="10-cantina">
        <li class="text">Cantina</li>
    </a>






    <a href="javascript:void(0)" class="scene" data-id="16-laboratrio-12">
        <li class="text">Laboratório 1</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="lab2">
        <li class="text">Laboratório 2</li>
    </a>


    @component('components.panorama.dropdown', ['title' => 'Laboratório 3'])
        <a href="javascript:void(0)" class="scene" data-id="17-laoratrio-34">
            <li class="text">Acesso</li>
        </a>

        <a href="javascript:void(0)" class="scene" data-id="19-laboratrio-03">
            <li class="text">Saída</li>
        </a>

    @endcomponent

    @component('components.panorama.dropdown', ['title' => 'Laboratório 4'])
        <a href="javascript:void(0)" class="scene" data-id="lab4">
            <li class="text">Acesso</li>
        </a>
        <a href="javascript:void(0)" class="scene" data-id="18-laboratrio-04">
            <li class="text">Saída</li>
        </a>
    @endcomponent












@endsection
@section('data_panorama')
    <script>var prefix_DIR = 'ch'</script>
    <script src="{{'../js/panorama/ch/data.js'}}"></script>
@endsection
<script>
    const personalSceneName = "Chapecó";
</script>
