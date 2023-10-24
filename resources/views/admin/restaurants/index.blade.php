@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-5">Ecco la lista dei tuoi ristoranti</h1>
    <div class="d-flex justify-content-center m t-5">
        <ul class="">
            @foreach ($restaurants as $restaurant)
            <li>{{ $restaurant->name }} <a href="{{ route('admin.restaurants.show', $restaurant->id) }}">show</a> <a href="{{ route('admin.restaurants.edit', $restaurant) }}">edit</a></li>
            @endforeach
        </ul>
    </div>
    <div>
        <button><a href="{{ route('admin.restaurants.create') }}">Crea un ristorante</a></button>
       
    </div>
@endsection 
