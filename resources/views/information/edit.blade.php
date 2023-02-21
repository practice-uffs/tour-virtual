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
        <h1>Informação - Editar</h1>
        <form action="{{route('information.update', ['information' => $information->id])}}" method="post">
            @csrf
            @method('PUT')

            <x-input value="{{$information->id_componente ?? old('id_componente')}}" label="ID" name="id_componente" placeholder="ID" />
            <x-input value="{{$information->group ?? old('group')}}"  label="GRUPO" name="group" placeholder="Grupo" />
            <x-input value="{{$information->campus ?? old('campus')}}" label="CAMPUS" name="campus" placeholder="Campus" />
            <x-input value="{{$information->id_360 ?? old('id_360')}}" label="ID 360" name="id_360" placeholder="ID 360" />
            <x-input value="{{$information->titulo ?? old('titulo')}}" label="TITULO" name="titulo" placeholder="Titulo" />
            <x-input value="{{$information->img_capa ?? old('img_capa')}}" label="Imagem Capa" name="img_capa" placeholder="Endereço Imagem" />
            <x-textarea label="Descrição" name="descricao" placeholder=" Descrição">{{$information->descricao ?? old('descricao')}} </x-textarea>
            <x-button label="Submit" dark icon="cursor-click" type="submit" />
        </form>

    </div>
@endsection
