@extends('layouts.app')

@section('content')
     
    <div class="main-container">

        <div class="aside d-flex flex-column text-center justify-content-start">
            <a href="">Prova reindirizzamento</a>
            <a href="">Prova reindirizzamento</a>
            <a href="{{route('admin.dishes.index')}}">Menu</a>
            <a href="{{route('admin.dishes.create')}}">Aggiungi Piatto</a>
        </div>

        <div class="restaurant-info">
            <ul class="mt-5">
                <li>{{$restaurant->type->name}}</li>
                <li>{{ $restaurant->name }}</li>
                <li>{{ $restaurant->piva }}</li>
                <li>{{ $restaurant->address }}</li>
            </ul>
            <div class="img-container">

                <img src="{{ asset('storage/' . $restaurant->photo) }}" alt="">
            </div>
        
        </div>

    </div>

    
@endsection

        