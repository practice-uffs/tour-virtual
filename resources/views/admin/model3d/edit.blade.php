@include('navigation-dropdown')
@extends('layouts.base')
@section('content')

    <a class="btn btn-secondary m-2" href="{{route('admin.index')}}">Voltar</a>
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


        
            @if(isset($data))
                <div class="row" style="align-self:center">
                    <h3>Campus {{$data->name}}</h3>
                    <div ><img src="{{url('img/geral/'.$data->image_link)}}" width="500" height="500" /></div>
                    <h5 class="">Atualizado em {{date('d-m-Y H:i:s', strtotime($data->updated_at))}}</h5>
                </div>
               
               

                
                    <div>
                        <div>
                        <form id="{{'image-form.'.$data->campus}}" method="post" action="{{ route('image.upload', ['figma_map' => $data->id])}}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="imagem" id="{{'image-input.'.$data->campus}}">
                            <button class="btn btn-primary" id="{{'submit-btn.'.$data->campus}}" type="submit" disabled>Enviar imagem</button>
                        </form>
                        <script>
                            const {{'imageInput'.$data->campus}} = document.getElementById('{{"image-input.".$data->campus}}');
                            const {{'submitBtn'.$data->campus}} = document.getElementById('{{"submit-btn.".$data->campus}}');
                            const {{'imageForm'.$data->campus}} = document.getElementById('{{"image-form.".$data->campus}}');

                            {{'imageInput'.$data->campus}}.addEventListener("change", function() {
                                if ({{'imageInput'.$data->campus}}.value) {
                                    {{'submitBtn'.$data->campus}}.disabled = false;
                                    {{'imageForm'.$data->campus}}.addEventListener("submit", function() {
                                    {{'imageForm'.$data->campus}}.disabled = true;
                                });
                            } else {
                                {{'submitBtn'.$data->campus}}.disabled = true;
                            }
                            });
                        </script>
                    </div>
                </div>
                
            @endif
            </tbody>
        </table>
@endsection
