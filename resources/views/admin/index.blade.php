@include('navigation-dropdown')
@extends('layouts.base')
@section('content')
    <div class="container">
        <div class="row">
            <a href="{{route('information.index')}}" class="card col-md-4" style="text-decoration: none; color: black">
                <img src="https://cdn-icons-png.flaticon.com/512/32/32175.png" class="" alt="..." height="50px" width="50px" style="align-self: center; margin-top: 30px">
                <div class="card-body">
                    <h5 class="card-title fs-4">Blocos e Estruturas</h5>
                    <p class="card-text">Informações da sidebar do mapa</p>
                
                </div>
            </a>
            <a href="{{route('campus.index')}}" class="card col-md-4" style="text-decoration: none; color: black">
                <img src="https://cdn-icons-png.flaticon.com/512/2879/2879209.png" height="50px" width="50px" style="align-self: center; margin-top: 30px" alt="...">
                <div class="card-body">
                    <h5 class="card-title fs-4">Campi da UFFS</h5>
                    <p class="card-text">Sincronize com os mapas de cada campus e controle outras informações</p>
                    
                </div>
            </a>
            <a href="{{route('feedback.index')}}"  class="card col-md-4" style="text-decoration: none; color: black">
                <img src="{{'img/icon/feedback-icon.svg'}}"  height="50px" width="50px" style="align-self: center; margin-top: 30px" alt="...">
                <div class="card-body">
                    <h5 class="card-title fs-4">Feedback</h5>
                    <p class="card-text">Feedbacks dos usuários</p>
                
                </div>
            </a>
            <a href="{{route('model3d.index')}}" class="card col-md-4" style="text-decoration: none; color: black">
                <img src="https://cdn-icons-png.flaticon.com/512/2879/2879209.png" height="50px" width="50px" style="align-self: center; margin-top: 30px" alt="...">
                <div class="card-body">
                    <h5 class="card-title fs-4">Modelos 3D</h5>
                    <p class="card-text">Gerencie os modelos das edificações da UFFS</p>
                    
                </div>
            </a>
        </div>
    </div>

@endsection
