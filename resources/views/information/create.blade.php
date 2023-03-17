@include('navigation-dropdown')
@extends('layouts.base')

@section('content')
    <style>
        .inputs{
            margin-top: 10vh;
            width: 30vw;
            margin-left: auto;
            margin-right: auto;
        }


        form > div{
            margin-top: 1em;
        }
        .button-submit{
            margin-top: 2em;
            width: 100%;
        }
        h1{
            text-align: center;
            font-family: 'Roboto', sans-serif;
            text-transform: capitalize;
            font-size: larger;
        }

        #howmany{
            width: 30px;
            text-align: center;

        }
        #boxquantity input{
            width: 100%;
            border-radius: 0.5em;
            margin-bottom: 0.5em;
        }

        #plus, #minus{
            cursor: pointer;
        }
        #howmany:focus{
            border: none;
            outline: none;

        }

    </style>
    <a class="btn btn-secondary m-2" href="{{route('information.index')}}">Voltar</a>
    <div class="inputs">
        <h1>Informação - Criar</h1>
        <form action="{{route('information.store')}}" method="post">
                @csrf
            <div class="form-floating mb-3 mt-5">
                <input value="{{old('component') ?? ''}}" name="component" class="form-control form-control-sm" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">ID</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control form-control-sm" value="{{ old('group') ?? ''}}"  name="group" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">GROUP</label>
            </div>




            <!-- Select -->



            <select class="form-select mb-3" name="campus">
                <option selected value="">{{old('campus') ?? "Selecione o campus"}}</option>
                <option value="CL">Cerro Largo</option>
                <option value="CH">Chapecó</option>
                <option value="ER">Erechim</option>
                <option value="LS">Laranjeiras do Sul</option>
                <option value="PF">Passo Fundo</option>
                <option value="RE">Realeza</option>
            </select>



            <div class="form-floating mb-3">
                <input class="form-control form-control-sm" value="{{old('identifier_360') ?? ''}}" name="identifier_360" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">ID 360</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control form-control-sm"  value="{{old('title') ?? ''}}" name="title" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Titulo</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control form-control-sm" id="floatingInput" value="{{ old('cover_image') ?? ''}}" name="cover_image" placeholder="name@example.com">
                <label for="floatingInput">Imagem Capa</label>
            </div>

            <div class="form-floating">
                <script>
                    function auto_grow(element) {
                        element.style.height = "5px";
                        element.style.height = (element.scrollHeight)+"px";
                    }
                </script>
                <textarea oninput="auto_grow(this)" onclick="auto_grow(this)" style="resize: none; overflow: hidden" name="description" class="form-control form-control-sm"   placeholder="Leave a comment here" id="floatingTextarea">{{old('description') ?? ''}}</textarea>
                <label for="floatingTextarea">Descrição</label>
            </div>
            <label class="mt-5 block text-sm font-medium text-gray-700 dark:text-gray-400 text-center">Itens Descrição</label>
            <div style="display: flex; justify-content: center">
                <span id="plus"> +</span>
                <input id="howmany" val="0" readonly="" />
                <span id="minus">-</span>
            </div>

            <div id="boxquantity" ></div>
            <button type="submit" class="btn btn-dark button-submit"><i class="bi bi-lightning"></i> Criar</button>
        </form>

    </div>

    <script>
        $("#floatingTextarea").on("keypress",function(e) {
            var key = e.keyCode;

            if (key === 13) {
                document.getElementById("tfloatingTextarea").value =document.getElementById("floatingTextarea").value + "\n";
                return false;
            }
            else {
                return true;
            }
        });
    </script>


    <script>

        var count = 0;
        $('#howmany').val(count);

        $('#plus').click( () => {
            count++;
            $('#howmany').val(count);
            $('#boxquantity').append('<input class="form-control mb-2" name="boxid['+count+']" type="text" id="boxid['+count+']" placeholder="item('+(count)+')"/>');
        })

        $('#minus').click( () => {
            if(count > 0){
                count--;
                $('#howmany').val(count);
                $("#boxquantity input").last().remove();
            }

        })

    </script>

@endsection
