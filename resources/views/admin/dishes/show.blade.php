@extends('layouts.app')

@section('content')
     
    <div class="main-container">

        <div class="aside d-flex flex-column text-center justify-content-start">
            <a href="{{route('admin.dishes.index')}}">Torna al menù</a>
            <a href="{{route('admin.dishes.edit', compact('dish'))}}">Modifica Piatto</a>
            
        </div>
            

        <div class="restaurant-info">
            <ul class="mt-5">
                <li class="restaurant-name">{{ $dish->name }}</li>
                <li><span class="fst-italic">Tipologia Ristorante:</span> <span class="fw-bold">{{$dish->description}}</span></li>
                <li><span class="fst-italic">Partita IVA:</span> <span class="fw-bold">{{ $dish->ingredients }}</span></li>
                <li><span class="fst-italic">Indirizzo Ristorante:</span> <span class="fw-bold">{{ $dish->price }}</span></li>
            </ul>
            
        
        </div>

        
    </div>

    

    
@endsection

        