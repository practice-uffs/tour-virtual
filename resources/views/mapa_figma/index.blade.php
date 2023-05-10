@include('navigation-dropdown')
@extends('layouts.base')
@section('content')

    <a class="btn btn-secondary m-2" href="{{route('admin.index')}}">Voltar</a>
    <h1 class="fs-4 text-center mt-5 mb-4">Mapas Figma</h1>
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


        <table class="table">
            <thead>
            <tr>
                <th scope="col">Imagem</th>
                <th scope="col">Campus</th>
                <th scope="col">Atualizado em</th>
                <th scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($data))
                @foreach($data as $d)
                    <tr>
                        <td><img src="{{url('img/slider/'.$d->image_link)}}" width="50px" height="auto"/></td>
                        <td>{{$d->name}}</td>
                        <td>{{date('d-m-Y H:i:s', strtotime($d->updated_at))}}</td>
                        <td>
                            <div>
                                <a class="btn btn-primary" href="{{route('figma_map.edit',['figma_map' => $d->id])}}">Atualizar Mapa</a>
                                <div>
                                <form id="image-form" method="post" action="{{ route('image.upload', ['figma_map' => $d->id])}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="imagem" id="image-input">
                                    <button class="btn btn-primary" id="submit-btn" type="submit" disabled>Enviar imagem</button>
                                </form>
                                <script>
                                    const imageInput = document.getElementById("image-input");
                                    const submitBtn = document.getElementById("submit-btn");
                                    const imageForm = document.getElementById("image-form");

                                    imageInput.addEventListener("change", function() {
                                        if (imageInput.value) {
                                            submitBtn.disabled = false;
                                            imageForm.addEventListener("submit", function() {
                                                submitBtn.disabled = true;
                                            });
                                        } else {
                                            submitBtn.disabled = true;
                                        }
                                    });
                                </script>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
@endsection
