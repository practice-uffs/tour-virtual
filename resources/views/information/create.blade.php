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
            <x-input label="ID" name="component" placeholder="ID" />
            <x-input label="GRUPO" name="group" placeholder="Grupo" />
            <x-native-select
                label="Campus"
                :options="[
                            ['name' => 'Cerro Largo',  'id' => 'CL'],
                            ['name' => 'Chapecó', 'id' => 'CH'],
                            ['name' => 'Erechim',   'id' => 'ER'],
                            ['name' => 'Laranjeiras do Sul',    'id' => 'LS'],
                            ['name' => 'Passo Fundo',    'id' => 'PF'],
                            ['name' => 'Realeza',    'id' => 'RE'],
                        ]"
                option-label="name"
                option-value="id"
                wire:model="campus"
            />
            <x-input label="ID 360" name="identifier_360" placeholder="ID 360" />
            <x-input label="TITULO" name="title" placeholder="Titulo" />
            <x-input label="Imagem Capa" name="cover_image" placeholder="Endereço Imagem" />
            <x-textarea label="Descrição" name="description" placeholder=" Descrição" />
            <label class="mt-5 block text-sm font-medium text-gray-700 dark:text-gray-400 text-center">Itens Descrição</label>
            <div style="display: flex; justify-content: center">
                <span id="plus"> +</span>
                <input id="howmany" val="0" readonly="" />
                <span id="minus">-</span>
            </div>

            <div id="boxquantity" ></div>
            <x-button label="Criar" dark icon="cursor-click" type="submit" class="button-submit"/>
        </form>

    </div>

    <script>

        var count = 0;
        $('#howmany').val(count);

        $('#plus').click( () => {
            count++;
            $('#howmany').val(count);
            $('#boxquantity').append('<input name="boxid['+count+']" type="text" id="boxid['+count+']" placeholder="item('+(count)+')"/>');
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
