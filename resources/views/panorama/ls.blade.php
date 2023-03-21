@extends('layouts.panorama_base')
@section('title', 'Laranjeiras do Sul - Panorama')
@section('btn-voltar', url()->previous())
@section('sceneList')
    <a href="javascript:void(0)" class="scene" data-id="0-caminho-1">

    </a>

    <a href="javascript:void(0)" class="scene" data-id="1-rea-experimental-da-aquicultura">
        <li class="text">Área Experimental</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="2-caminho-3">
        <li class="text"></li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="3-campo-de-futebol">
        <li class="text">Campo de Futebol</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="4-docente-fora">
        <li class="text">Bloco Docente (externo)</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="5-docente-dentro">
        <li class="text">Bloco Docente (interno)</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="6-docente-centro">
        <li class="text">Bloco Docente (interno)</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="7-caminho-4">
        <li class="text"></li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="8-caminho-5">
        <li class="text"></li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="9-caminho-6">
        <li class="text"></li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="10-pomar">
        <li class="text">Pomar</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="11-cvt">
        <li class="text">CVT</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="12-cantina">
        <li class="text">Cantina</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="13-caminho-7">
        <li class="text"></li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="14-a-fora">
        <li class="text">Bloco A (externo)</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="15-a-dentro">
        <li class="text">Bloco A (interno)</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="16-a-centro">
        <li class="text">Bloco A (interno)</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="17-slackline">
        <li class="text">Slackline</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="18-caminho-9">
        <li class="text"></li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="19-campo-de-vlei">
        <li class="text">Campo de Vôlei</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="20-laboratrios">
        <li class="text">Laboratórios</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="21-laboratrio-3">
        <li class="text">Laboratório 3</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="22-laboratrio-3-dentro">
        <li class="text">Laboratório 3 (interno)</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="23-laboratrio-2">
        <li class="text">Laboratório 2</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="24-laboratrio-2-dentro">
        <li class="text">Laboratório 2 (interno)</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="25-laboratrio-1">
        <li class="text">Laboratório 1</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="26-laboratrio-1-dentro">
        <li class="text">Laboratório 1 (interno)</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="27-caminho-11">
        <li class="text"></li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="28-rea-de-tratamento-de-esgoto">
        <li class="text">Tratamento de Esgoto</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="29-almoxarifado">
        <li class="text">Almoxarifado</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="30-galpo-de-mquinas-agrcolas">
        <li class="text">Galpão de Máquinas</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="31-estufas">
        <li class="text">Estufas</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="32-ru-fora">
        <li class="text">Restaurante Universitário (externo)</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="33-ru-dentro">
        <li class="text">Restaurante Universitário (interno)</li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="34-caminho-12">
        <li class="text"></li>
    </a>

    <a href="javascript:void(0)" class="scene" data-id="35-caminho-13">
        <li class="text"></li>
    </a>

@endsection
@section('data_panorama')
    <script>var prefix_DIR = 'ls'</script>
    <script src="{{'../js/panorama/ls/data.js'}}"></script>
@endsection
<script>
    const personalSceneName = "Laranjeiras do Sul";
</script>
