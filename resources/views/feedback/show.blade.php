@include('navigation-dropdown')
@extends('layouts.base')
@section('content')
    <style>
        #feedback{

        }
    </style>
    <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
    <a class="btn btn-secondary m-2" href="{{route('feedback.index')}}">Voltar</a>
    <div style="width: 50%; margin: 3em auto">
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="email" class="form-control" readonly value="{{$data->nome}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" readonly value="{{$data->email}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo</label>
            @if($data->type == 0)
                <input type="email" class="form-control" readonly value="Duvida">
            @elseif($data->type == 1)
                <input type="email" class="form-control" readonly value="Critica">
            @elseif($data->type == 2)
                <input type="email" class="form-control" readonly value="Sugestão">
            @endif

        </div>
        <div class="mb-3">
            <label class="form-label">Feedback</label>
            <textarea id="feedback" class="form-control" readonly>{{$data->feedback}}</textarea>
        </div>
    </div>
    <script>
        let feedback = $('#feedback');
        let value = (feedback.text().length / 50) * 18 + 'px'
        console.log(value)
        feedback.css('height', value)

    </script>
@endsection
