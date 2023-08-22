@include('navigation-dropdown')
@extends('layouts.base')
@section('content')

    <a class="btn btn-secondary m-2" href="{{route('admin.index')}}">Voltar</a>
    <h1 class="fs-4 text-center mt-5 mb-4">Modelos 3d</h1>
    <div class="container w-50">
        <!-- Alerta Sucesso / Falha-->
        <div  style="display: none">
            <a id="qlqcoisa" href="javascript:;"></a>
        </div>
        <div class="alert " id="alert" style="display: none">
            <script>
                $("#qlqcoisa").click(function showAlert() {
                    $("#alert").fadeTo(2000, 500).slideUp(500, function() {
                        $("#alert").slideUp(500);
                    });
                });
            </script>
            @if (\Session::has('success'))
                <script>
                    $("#alert").removeClass('alert-danger')
                    $("#alert").addClass('alert-success')
                    $("#qlqcoisa").trigger('click');
                </script>
                <h2>{!!\Session::get('success')  !!}</h2>
            @endif
            @if($errors->any())
                <script>
                    $("#alert").removeClass('alert-success')
                    $("#alert").addClass('alert-danger')
                    $("#qlqcoisa").trigger('click');
                </script>
                <h2>{{$errors->first()}}</h2>
            @endif
        </div>
        <!-- Fim Alerta Sucesso / Falha-->

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
                        <td>{{$d->name}}</td>
                        <td>{{date('d-m-Y H:i:s', strtotime($d->updated_at))}}</td>
                        <td>
                            <div>
                                <a class="btn btn-primary" href="{{route('campus.refresh',['figma_map' => $d->id])}}">Atualizar Mapa</a>
                                <a class="btn btn-primary" href="{{route('campus.edit',['figma_map' => $d->id])}}">Editar</a>
                                
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
@endsection
