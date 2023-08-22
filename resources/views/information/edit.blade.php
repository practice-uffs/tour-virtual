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

            <div class="form-floating mb-3 mt-5">
                <input value="{{$information->component ?? old('component')}}" name="component" class="form-control form-control-sm" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">ID</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control form-control-sm" value="{{$information->group ?? old('group')}}"  name="group" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">GROUP</label>
            </div>




            <!-- Select -->



            <select class="form-select mb-3" name="campus">
                <option selected>{{$information->campus ?? old('campus')}}</option>
            </select>

            {{-- {{$information}} --}}
            <label for="floatingInput">Modelo 3d</label>
            <select class="form-select mb-3" name="model3d" value="{{$information->model3d ?? old('model3d')}}" >
                <option value=null {{$information->model3d == null ? 'selected' : ''}}>Selecione o modelo</option>
                <option value='1' {{$information->model3d == 1 ? 'selected' : ''}}>Bloco A</option>
                <option value='2' {{$information->model3d == 2 ? 'selected' : ''}}>Bloco B</option>
                <option value='3' {{$information->model3d == 3 ? 'selected' : ''}}>Bloco C</option>
                <option value='4' {{$information->model3d == 4 ? 'selected' : ''}}>Biblioteca</option>
                <option value='5' {{$information->model3d == 5 ? 'selected' : ''}}>Laboratório</option>
            </select>




            <div class="form-floating mb-3">
                <input class="form-control form-control-sm" value="{{$information->identifier_360 ?? old('identifier_360')}}" name="identifier_360" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">ID 360</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control form-control-sm"  value="{{$information->title ?? old('title')}}" name="title" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Titulo</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control form-control-sm" id="floatingInput" value="{{$information->cover_image ?? old('cover_image')}}" name="cover_image" placeholder="name@example.com">
                <label for="floatingInput">Imagem Capa</label>
            </div>

            <div class="form-floating">
                <script>
                    function auto_grow(element) {
                        element.style.height = "5px";
                        element.style.height = (element.scrollHeight)+"px";
                    }
                </script>


                <textarea oninput="auto_grow(this)" onclick="auto_grow(this)" style="resize: none; overflow: hidden" name="description" class="form-control form-control-sm"   placeholder="Leave a comment here" id="floatingTextarea">{{$information->description ?? old('description')}}</textarea>
                <label for="floatingTextarea">Descrição</label>
            </div>

            <label class="mt-5 block text-sm font-medium text-gray-700 dark:text-gray-400 text-center">Itens Descrição</label>

            <div style="display: flex; justify-content: center">
                <span id="plus"> +</span>
                <input id="howmany" val="0" readonly="" />
                <span id="minus">-</span>
            </div>


            <div id="boxquantity" class="mb-4">
                @foreach($details as $dt)
                       
                        <a href="{{route('detail.edit', $dt->id)}}">Marcar Localização</a>
                        <x-input value="{{$dt->item ?? old('item')}}" name="item[{{$dt->id}}]" placeholder="ID" />
                @endforeach
            </div>


            <div id="boxtoremove" style="display: none">

            </div>

            <div id="boxtoappend">

            </div>

            <button type="submit" class="btn btn-dark button-submit"><i class="bi bi-pencil-square"></i> Salvar</button>
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

        var count = {{  Illuminate\Support\Js::from($details) }};
        count = count.length;
        console.log(count)
        $('#howmany').val(count);

        $('#plus').click( () => {
            count++;
            $('#howmany').val(count);
            $('#boxtoappend').append('<input name="addbox['+count+']"  id="addbox['+count+']" placeholder="item('+(count)+')" class="form-control mb-2"/>');

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
