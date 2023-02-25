@include('navigation-dropdown')
@extends('layouts.base')
@section('content')
    <style>
        body{
            background-color: #1a202c;
        }
        table, th, td {
            table-layout:fixed;
            text-align: center;
            padding: 10px;
            margin:auto;
        }
        tr:nth-child(even) {
            background-color: #2a2a2a;

        }
        tr:nth-child(odd) {
            background-color: #3a3d42;

        }
        tr{
            color: #f5ffe1;

        }
        th{
            border-right: #130009 1px solid;
            background: #050513;
            color: aliceblue;
        }

        td{
            border-right: #130009 1px solid;
            overflow:hidden;
        }
        table{

            width:90%;
        }

        ul{
            display: flex;
            float:right;
        }
        li{
            margin: 0 1em 1em 1em;
        }
        nav{
            height: 4em;
            margin-bottom: 1em;
        }
        .especial{
            background-color: #0f6674;
        }
        tr{
            border-bottom: solid 1px black;
        }
    </style>
    <nav>

    </nav>
    <table>
        <tr>
            <th>ID</th>
            <th>GROUP</th>
            <th>CAMPUS</th>
            <th>ID-360</th>
            <th>TITULO</th>
            <th>DESCRICAO</th>
            <th>IMAGEM CAPA</th>
            <th>Itens</th>
            <th colspan="2"><a href="{{route('information.create')}}"><x-button   label="Novo"  style="width: 100%;margin: 0; background-color: #2d3748; color:#9fcdff "/></a></th>

        </tr>

        @foreach($data as $information)
            <tr>

                <td>{{$information->component}}</td>
                <td>{{$information->group}}</td>
                <td>{{$information->campus}}</td>
                <td>{{$information->identifier_360}}</td>
                <td>{{$information->title}}</td>
                <td>{{$information->description}}</td>
                <td>{{$information->cover_image}}</td>
                <td>
                    @foreach($information->informationDetail as $key)
                        {{$key->item}}
                        <br>
                    @endforeach
                </td>
                <td class="especial" ><a href="{{route('information.edit', ['information' => $information->id])}}"><x-button.circle primary icon="pencil" /></a></td>
                <td class="especial">

                    <form method="post" action="{{route('information.destroy', ['information' => $information->id])}}">
                        @method("DELETE")
                        @csrf

                        <x-button.circle negative icon="x" type="submit"/>
                    </form>
                </td>

            </tr>

        @endforeach
    </table>
@endsection
