@include('navigation-dropdown ')
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
        .filtro{
            text-align: center;
            display: block;
            width:30%;
            height: 9em;
            margin-bottom: 1em;
            margin-left: auto;
            margin-right: auto;

        }
        .filtro select{
            text-align: center;
            border-radius: 0.5em;
            width: 14em;
            height: 3em;
            margin-bottom: 0.5em;
        }
        .filtro select:focus{
            border-color: #727272;
            box-shadow: 0 0 1px 1px #727272;
        }
        .filtro button{
            padding: 0.5em;
            border: solid  1px black;
            border-radius: 0.5em;
            color: #d7d7d7;
            background-color: #3d3d3d;
        }
        .especial{
            background-color: #2f2f2f;
            border-right: #3d3d3d 1px solid;
            border-bottom: #3d3d3d 1px solid;
        }

    </style>
    <div class="filtro">
        <form action="{{ route('information.index') }}" method="GET">
            <br>
            <label>
                <select name="filter" id="filter">
                    <option value="">Todos</option>
                    <option value="CH">Chapecó</option>
                    <option value="CL">Cerro Largo</option>
                    <option value="ER">Erechim</option>
                    <option value="LS">Laranjeiras do Sul</option>
                    <option value="PF">Passo Fundo</option>
                    <option value="RE">Realeza</option>
                </select>
            </label>
            <button type="submit" >Filtrar</button>
        </form>
    </div>
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
    <script>
        $(document).ready(function() {
            const oldFilter = '{{ $filter}}';
            console.log(oldFilter);
            if(oldFilter !== '') {
                $('#filter').val(oldFilter);
            }
        });
    </script>
@endsection
