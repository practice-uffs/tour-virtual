@extends('layouts.base')
@section('content')
    <style>
        .inputs{
            margin-top: 20vh;
            width: 30vw;
            margin-left: auto;
            margin-right: auto;
        }

        form > div{
            margin-top: 1em;
        }
        button{
            margin-top: 2em;
            width: 100%;
        }
        h1{
            text-align: center;
            font-family: 'Roboto', sans-serif;
            text-transform: capitalize;
            font-size: larger;
        }
    </style>

    <div class="inputs">
        <h1>Informação - Criar</h1>
        <form action="{{route('information.store')}}" method="post">
                @csrf
            <x-input label="ID" name="component" placeholder="ID" />
            <x-input label="GRUPO" name="group" placeholder="Grupo" />
            <x-input label="CAMPUS" name="campus" placeholder="Campus" />
            <x-input label="ID 360" name="identifier_360" placeholder="ID 360" />
            <x-input label="TITULO" name="title" placeholder="Titulo" />
            <x-input label="Imagem Capa" name="cover_image" placeholder="Endereço Imagem" />
            <x-textarea label="Descrição" name="description" placeholder=" Descrição" />
            <x-button label="Submit" dark icon="cursor-click" type="submit" />
        </form>

    </div>
@endsection
