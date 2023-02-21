@extends('layouts.base')
@section('content')
    <style>
        table, th, td {

            text-align: center;
            padding: 10px;
            margin:auto;
        }
        tr:nth-child(even) {
            background-color: #008e0e;

        }
        tr:nth-child(odd) {
            background-color: #00650e;

        }
        tr{
            color: #f5ffe1;

        }
        th{
            border-right: #130009 1px solid;
            background: #0b2e13;
            color: aliceblue;
        }

        td{
            border-right: #130009 1px solid;
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
            box-shadow: #120013 1px 1px 1px;
            margin-bottom: 1em;
        }
    </style>
    <nav>
        <ul style="display:flex">
            <li><a href="{{route('information.create')}}">Novo</a></li>
        </ul>

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

        </tr>

        @foreach($data as $information)
            <tr>
                <td>{{$information->id_componente}}</td>
                <td>{{$information->group}}</td>
                <td>{{$information->campus}}</td>
                <td>{{$information->id_360}}</td>
                <td>{{$information->titulo}}</td>
                <td>{{$information->descricao}}</td>
                <td>{{$information->img_capa}}</td>
                <td><a href="{{route('information.edit', ['information' => $information->id])}}">Editar</a></td>
                <td>

                    <form method="post" action="{{route('information.destroy', ['information' => $information->id])}}">
                        @method("DELETE")
                        @csrf

                        <button type="submit"> Excluir</button>
                    </form>
                </td>

            </tr>

        @endforeach
    </table>
@endsection
