<style>

    .feedback_form-container{
        width: 100%;
        height: 100%;
        margin: 0 auto;
        display: none;
        background-color: rgba(12, 0, 0, 0.52);
        position: fixed;
        z-index: 1;
    }

    .feedback_form {
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

    .feedback_form h5 {
        color: #555555;;
        font-size: 20px;
        text-align: center;
        height: 1em;

        margin: 0 0 1.5em;
        font-family: sans-serif;

    }

    .feedback_form label {
        color: #555555;
        font-weight: bolder;
    }

    .feedback_form-text {
        width: 100%;
        color: #555555;
        border: 1px solid rgba(21, 34, 56, 0.22);
        border-radius: 3px;
        font-size: 14px;
        padding: 14px 10px;
        margin-bottom: 16px;
    }

    .feedback_form-btn {
        border: none;
        width: 100%;
        height: 42px;
        background: #152238;
        color: #ffffff;
        font-weight: bold;
    }

    .feedback_form input:focus, .feedback_form select:focus, .feedback_form textarea:focus{
        outline: none;
    }

    .feedback_form select {
        background-color: #ffffff;
    }
    #close_feedback_form{
        color: #706f6f;
        position: absolute;
        top: 0.5em;
        right: 0.5em;
        font-weight: bold;
        opacity: 1;
    }
    .feedback_form-erros{
        color: #ff2528;
        font-weight: normal;

    }

</style>

@if($errors->any())
    <script>
        $('.popup').hide();
    </script>

@endif

<form class="feedback_form-container" action="{{route('feedback.send')}}" method="POST">
    @csrf
    <div class="feedback_form">
        @if(\Session::has('feedback'))<h3 style="color: #25b109; text-align: center">Feedback Enviado!</h3>
        <script>
            $('.popup').hide();
            $('.feedback_form-container').show();
            setTimeout(function () {
                window.location.replace('{{ url()->previous() }}');
            }, 2000);
        </script>
        @else

        <a href='' id="close_feedback_form" class='close'><i class="bi bi-x-lg"></i></a>
        <h5>Feedback</h5>
        @if($errors->has('nome'))
            <script>
                $('.feedback_form-container').show();
            </script>
            <p class="feedback_form-erros">{{ $errors->first('nome') }}</p>
        @endif
        <input id="feedback_form_name" type="text" name="nome" placeholder="Nome completo" value="{{old('nome') ?? ''}}" class="feedback_form-text">
        @if($errors->has('email'))
                <script>
                    $('.feedback_form-container').show();
                </script>
            <p class="feedback_form-erros">{{ $errors->first('email') }}</p>
        @endif
        <input value="{{old('email') ?? ''}}" id="feedback_form_email" type="text" name="email" placeholder="Email" class="feedback_form-text">

        @if($errors->has('type'))
                <script>
                    $('.feedback_form-container').show();
                </script>
            <p class="feedback_form-erros">{{ $errors->first('type') }}</p>
        @endif
        <select id="feedback_form_type" class="feedback_form-text" name="type" >

            <option value="">Selecione o tipo do feedback</option>
            <option value="0">Dúvidas</option>
            <option value="1">Críticas</option>
            <option value="2">Sugestões</option>
        </select>
        @if($errors->has('feedback'))
                <script>

                    $('.feedback_form-container').show();
                </script>
            <p class="feedback_form-erros">{{ $errors->first('feedback') }}</p>
        @endif
        <textarea id="feedback_form_feedback" style="resize: none" name="feedback" placeholder="Envie seu feedback ..." class="feedback_form-text">{{old('feedback') ?? ''}}</textarea>

        <button type="submit" class="feedback_form-btn">Enviar</button>
        @endif
    </div>
</form>

<script>


$('.btn-feedback').click( function (){
    if(!$('#legenda').hasClass('ocultar'))
        $("#btn-legenda").trigger('click');
    $('#feedback_form_name').val('');
    $('#feedback_form_email').val('');
    $('#feedback_form_type').val('');
    $('#feedback_form_feedback').val('');
    $('.feedback_form-erros').remove()
    $('.feedback_form-container').show();
    return false;
})
    $('#close_feedback_form').click( function () {
        $('.feedback_form-container').hide()
        return false;
    })
</script>