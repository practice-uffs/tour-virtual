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

            <x-input value="{{$information->component ?? old('component')}}" label="ID" name="component" placeholder="ID" />
            <x-input value="{{$information->group ?? old('group')}}"  label="GRUPO" name="group" placeholder="Grupo" />
            <x-input value="{{$information->campus ?? old('campus')}}" label="CAMPUS" name="campus" placeholder="Campus" />
            <x-input value="{{$information->identifier_360 ?? old('identifier_360')}}" label="ID 360" name="identifier_360" placeholder="ID 360" />
            <x-input value="{{$information->title ?? old('title')}}" label="TITULO" name="title" placeholder="Titulo" />
            <x-input value="{{$information->cover_image ?? old('cover_image')}}" label="Imagem Capa" name="cover_image" placeholder="Endereço Imagem" />
            <x-textarea label="Descrição" name="description" placeholder=" Descrição">{{$information->description ?? old('description')}} </x-textarea>
            @foreach($details as $dt)
                <x-input value="{{$dt->item ?? old('item')}}" label="ID" name="item" placeholder="ID" />

            @endforeach
            <x-button label="Submit" dark icon="cursor-click" type="submit" />

        </form>

    </div>
@endsection
