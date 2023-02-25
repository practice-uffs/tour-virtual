@include('navigation-dropdown')
@extends('layouts.base')
@section('content')
    <style>

        table, th{
            table-layout:fixed;
            text-align: center;
            padding: 10px;
            margin:auto;
        }
        tr:nth-child(even) {
            background-color: #eeeeee;

        }
        tr:nth-child(odd) {
            background-color: #f6f6f6;

        }
        tr{
            color: #3b3b3b;

        }
        th{

            background: #212123;
            color: aliceblue;
        }

        td{
            table-layout:fixed;
            text-align: center;
            padding: 10px;

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
            height: 2em;
            margin-bottom: 1em;
        }
        .especial{
            background-color: #2f2f2f;
            border-right: #3d3d3d 1px solid;
            border-bottom: #3d3d3d 1px solid;
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
            <th colspan="2">
                <a href="{{route('information.create')}}">
                    <button  style="width: 50%; height:35px; margin: 0; background-color: #3b3b3b; color:#d7d7d7; border-radius: 5px;">NOVO
                    </button>
                </a>
            </th>


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
