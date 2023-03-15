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
            height: 35px;
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
        <h1>Informação - Editar</h1>
        <form action="{{route('information.update', ['information' => $information->id])}}" method="post">
            @csrf
            @method('PUT')

            <x-input value="{{$information->component ?? old('component')}}" label="ID" name="component" placeholder="ID" />
            <x-input value="{{$information->group ?? old('group')}}"  label="GRUPO" name="group" placeholder="Grupo" />
            <x-native-select
                label="Campus"
                :options="[
                            ['name' => $information->campus ?? old('campus'),  'id' => $information->campus ?? old('campus')],
                        ]"
                option-label="name"
                option-value="id"
                wire:model="campus"
            />
            <x-input value="{{$information->identifier_360 ?? old('identifier_360')}}" label="ID 360" name="identifier_360" placeholder="ID 360" />
            <x-input value="{{$information->title ?? old('title')}}" label="TITULO" name="title" placeholder="Titulo" />
            <x-input value="{{$information->cover_image ?? old('cover_image')}}" label="Imagem Capa" name="cover_image" placeholder="Endereço Imagem" />
            <x-textarea label="Descrição" name="description" placeholder=" Descrição">{{$information->description ?? old('description')}} </x-textarea>
            <label class="mt-5 block text-sm font-medium text-gray-700 dark:text-gray-400 text-center">Itens Descrição</label>

            <div style="display: flex; justify-content: center">
                <span id="plus"> +</span>
                <input id="howmany" val="0" readonly="" />
                <span id="minus">-</span>
            </div>


            <div id="boxquantity" class="mb-4">
                @foreach($details as $dt)
                        <x-input value="{{$dt->item ?? old('item')}}" name="item[{{$dt->id}}]" placeholder="ID" />

                @endforeach
            </div>


            <div id="boxtoremove" style="display: none">

            </div>

            <div id="boxtoappend">

            </div>

            <x-button label="Salvar" dark icon="cursor-click" type="submit" class="button-submit"/>
        </form>
    </div>


    <script>

        var count = {{  Illuminate\Support\Js::from($details) }};
        count = count.length;
        console.log(count)
        $('#howmany').val(count);

        $('#plus').click( () => {
            count++;
            $('#howmany').val(count);
            $('#boxtoappend').append('<input name="addbox['+count+']" type="text" id="addbox['+count+']" placeholder="item('+(count)+')" class="mb-2 placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 border border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 form-input block w-full sm:text-sm rounded-md transition ease-in-out duration-100 focus:outline-none shadow-sm"/>');
            /*
            if(!$('#boxtoremove input').length)
                $('#boxtoappend').append('<input name="addbox['+count+']" type="text" id="addbox['+count+']" placeholder="item('+(count)+')"/>');
            else{
                let box = $('#boxtoremove input').last().clone().prop('readonly', false);
                $('#boxquantity').append(box);
                $('#boxtoremove input').last().remove()
            }*/
        })

        $('#minus').click( () => {
            console.log($('#boxtoappend input').length)
            if(count > 0){
                count--;
                $('#howmany').val(count);
                if(! $('#boxtoappend input').length){
                    let clone = $("#boxquantity input").last().clone()
                    let original_str = clone.attr('name')
                    let new_attr = original_str.replace('item', 'remove')
                    $('#boxtoremove').append(clone.attr({'name': new_attr}));
                    $("#boxquantity input").last().remove();
                }
                else{
                    $('#boxtoappend input').last().remove();
                }
            }

        })

    </script>

@endsection
