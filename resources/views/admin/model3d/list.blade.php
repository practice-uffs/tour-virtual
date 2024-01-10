@include('navigation-dropdown')
@extends('layouts.base')
@section('content')

    {{-- <a class="btn btn-secondary m-2" href="{{route('admin.index')}}">Voltar</a> --}}
    <h1 class="fs-4 text-center mt-5 mb-4">Modelos 3d</h1>
    <div class="container w-50">
        <!-- Alerta Sucesso / Falha-->
        <div  style="display: none">
        </div>


        <a href="{{route('model3d.create')}}">
            <button style="width: 50%; height:35px; margin: 0; background-color: #3b3b3b; color:#d7d7d7; border-radius: 5px;">Adicionar
            </button>
        </a> 
        <table class="table">
            <thead>
            <tr>
                <th scope="col-md-10">Nome</th>
                <th scope="col-md-2">Atualizado em</th>
                <th scope="col-md-2">Ação</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($data))
                @foreach($data as $d)
                    <tr>
                        <td>{{$d->title}}</td>
                        <td>{{date('d-m-Y H:i:s', strtotime($d->updated_at))}}</td>
                        <td>
                            <div>
                                 {{-- <a class="btn btn-primary" href="{{route('model3d.edit',['model3d' => $d->id])}}">Marcação de Salas</a>  --}}
                                {{-- <a class="btn btn-primary" href="{{route('campus.edit',['figma_map' => $d->id])}}">Editar</a>  --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
         </table>  
@endsection
