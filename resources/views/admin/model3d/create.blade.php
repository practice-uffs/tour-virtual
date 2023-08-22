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
    <a class="btn btn-secondary m-2" href="{{route('model3d.index')}}">Voltar</a>
    <div class="inputs">
        <h1>Informação - Criar</h1>
        <form action="{{route('model3d.store')}}" method="post">
            @csrf
    

            <div class="form-floating mb-3">
                <input class="form-control form-control-sm" name="title" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Titulo</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control form-control-sm" name="configs" id="configs" placeholder="name@example.com">
                <label for="configs">Configurações</label>
            </div>


            <div>
                <div>
                    
                    <input type="file" name="file">
                </div>
            </div>

         
          
            <button type="submit" class="btn btn-dark button-submit"><i class="bi bi-lightning"></i> Criar</button>
        </form>

    </div>


@endsection
