<style>

    .contribua_form-container{
        width: 100%;
        height: 100%;
        margin: 0 auto;
        display: none;
        background-color: rgba(12, 0, 0, 0.52);
        position: fixed;
        z-index: 1;
    }

    .contribua_form {
        min-width: 600px;
        width: 500px;
        min-height: 150px;
        margin: 100px auto;
        background: #f3f3f3;
        position: relative;
        padding: 35px 35px;
        border-radius: 5px;
        -webkit-box-shadow: 0 0 4px 4px rgb(0 0 0 / 20%);
        -moz-box-shadow: 0  4px 4px rgba(0, 0, 0, 0.2);
        box-shadow: 0 0 4px 4px rgb(0 0 0 / 20%);
    }

    .contribua_form h5 {
        color: #83ad9b;;
        font-size: 20px;
        text-align: center;
        height: 1em;

        margin: 0 0 1.5em;
        font-family: sans-serif;

    }

    .contribua_form label {
        color: #555555;
        font-weight: bolder;
    }

    .contribua_form-text {
        width: 100%;
        color: #555555;
        border: 1px solid rgba(21, 34, 56, 0.22);
        border-radius: 3px;
        font-size: 14px;
        padding: 14px 10px;
        margin-bottom: 16px;
    }

    .contribua_form-btn {
        border: none;
        width: 100%;
        height: 42px;
        background: #83ad9b;
        color: #ffffff;
        font-weight: bold;
        border-radius: 3px;
    }

    .contribua_form-input {
        border: none;
        color: #706f6f;
        border-radius: 3px;
        margin-bottom: 15px;
    }

    .contribua_form input:focus, .contribua_form select:focus, .contribua_form textarea:focus{
        outline: none;
    }

    .contribua_form select {
        background-color: #ffffff;
    }
    #close_contribua_form{
        color: #706f6f;
        position: absolute;
        top: 0.5em;
        right: 0.5em;
        font-weight: bold;
        opacity: 1;
    }
    .contribua_form-erros{
        color: #ff2528;
        font-weight: normal;

    }

</style>

@if($errors->any())
    <script>
        $('.popup').hide();
    </script>

@endif

<form class="contribua_form-container" action="{{ route('contribua.send', ['campus' => $campus_name])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="contribua_form">
        @if(\Session::has('contribua'))<h3 style="color: #25b109; text-align: center">Foto Enviada com sucesso!</h3>
        <script>
            $('.popup').hide();
            $('.contribua_form-container').show();
            setTimeout(function () {
                window.location.replace('{{ url()->previous() }}');
            }, 2000);
        </script>
        @else

        <a href='' id="close_contribua_form" class='close'><i class="bi bi-x-lg"></i></a>
        <h5>Compartilhe fotos do campi {{$campus_name}}</h5>
        @if($errors->has('nome'))
            <script>
                $('.contribua_form-container').show();
            </script>
            <p class="contribua_form-erros">{{ $errors->first('nome') }}</p>
        @endif
        <input id="contribua_form_name" type="text" name="nome" placeholder="Autor da Foto" value="{{old('nome') ?? ''}}" class="contribua_form-text">
        @if($errors->has('email'))
                <script>
                    $('.contribua_form-container').show();
                </script>
            <p class="contribua_form-erros">{{ $errors->first('email') }}</p>
        @endif
        <input value="{{old('email') ?? ''}}" id="contribua_form_email" type="text" name="email" placeholder="Email" class="contribua_form-text">

        @if($errors->has('type'))
                <script>
                    $('.contribua_form-container').show();
                </script>
            <p class="contribua_form-erros">{{ $errors->first('type') }}</p>
        @endif

        <select id="contribua_form_type" class="contribua_form-text" name="type">
        <option value="">A foto é referente a qual estrutura de {{$campus_name}}?</option>
        @foreach($result as $title => $value)
            <option value="{{$title}}">{{$title}}</option>
        @endforeach
        </select>



        @if($errors->has('imagem'))
                <script>
                    $('.contribua_form-container').show();
                </script>
            <p class="contribua_form-erros">{{ $errors->first('imagem') }}</p>
        @endif
        <input class="contribua_form-input" type="file" name="imagem" id="image-input">

        @if($errors->has('contribua'))
                <script>
                    $('.contribua_form-container').show();
                </script>
            <p class="contribua_form-erros">{{ $errors->first('contribua') }}</p>
        @endif
        <textarea id="contribua_form_contribua" style="resize: none" name="comentario" placeholder="Espaço para comentários..." class="contribua_form-text">{{old('contribua') ?? ''}}</textarea>

        <button type="submit" class="contribua_form-btn">Enviar</button>
        @endif
    </div>
</form>

<script>


$('.btn-contribua').click( function (){
    if(!$('#legenda').hasClass('ocultar'))
        $("#btn-legenda").trigger('click');
    $('#contribua_form_name').val('');
    $('#contribua_form_email').val('');
    $('#contribua_form_type').val('');
    $('#contribua_form_contribua').val('');
    $('.contribua_form-erros').remove()
    $('.contribua_form-container').show();
    return false;
})
    $('#close_contribua_form').click( function () {
        $('.contribua_form-container').hide()
        return false;
    })
</script>