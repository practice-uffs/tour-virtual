@include('navigation-dropdown')
@extends('layouts.base')
@section('content')

    <div class="container d-flex w-50 mt-5">
        <div class="card mr-4" style="width: 18rem;">
            <img src="https://cdn-icons-png.flaticon.com/512/32/32175.png" class="" alt="..." height="50px" width="100%" >
            <div class="card-body">
                <h5 class="card-title fs-4">Informação</h5>
                <p class="card-text">Informações da sidebar do mapa</p>
                <a href="{{route('information.index')}}" class="btn btn-primary mt-2">Acessar</a>
            </div>
        </div>
        <div class="card mr-4" style="width: 18rem;">
            <img src="https://cdn-icons-png.flaticon.com/512/2879/2879209.png" class="card-img-top img-thumbnail" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-4">Mapas Figma</h5>
                <p class="card-text">Sincronize com os mapas de cada campus</p>
                <a href="{{route('figma_map.index')}}" class="btn btn-primary mt-2">Acessar</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="{{'img/icon/feedback-icon.svg'}}" class="card-img-top img-thumbnail" alt="...">
            <div class="card-body">
                <h5 class="card-title fs-4">Feedback</h5>
                <p class="card-text">Feedbacks dos usuários</p>
                <a href="{{route('feedback.index')}}" class="btn btn-primary mt-2">Acessar</a>
            </div>
        </div>
    </div>

@endsection
