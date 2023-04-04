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
            white-space: nowrap;
            overflow: hidden;
            width: 10px;
            height: 10px;
            text-overflow: ellipsis;


        }
        table{

            width:70%;
        }

        ul{
            display: flex;
            float:right;
        }
        li{
            margin: 0 1em 1em 1em;
        }

        .especial{
            background-color: #2f2f2f;
            border-right: #3d3d3d 1px solid;
            border-bottom: #3d3d3d 1px solid;
        }

    </style>
    <a class="btn btn-secondary m-2" href="{{route('admin.index')}}">Voltar</a>
    <table>
        <tr>
            <th>TIPO</th>
            <th>FEEDBACK</th>
            <th>DATA</th>
            <th>VISUALIZAR</th>
            <th>EXCLUIR</th>

        </tr>

        @foreach($data as $d)
            <tr>
                <td>
                @if($d->type == 0)
                    Duvida
                    @elseif($d->type == 1)
                    Critica
                    @elseif($d->type == 2)
                    Sugestão
                </td>
                @endif

                <td>{{$d->feedback}}</td>
                <td>{{date('d-m-Y H:i:s', strtotime($d->created_at))}}</td>
                <td class="especial" ><a style="text-decoration: none; color: #c0c0c0" href="{{route('feedback.show', ['feedback' => $d->id])}}"><i class="bi bi-eye-fill"></i></a></td>
                <td class="especial">

                    <form method="post" action="{{route('feedback.destroy', ['feedback' => $d->id])}}">
                        @method("DELETE")
                        @csrf
                        <x-button.circle negative icon="x" type="submit"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
