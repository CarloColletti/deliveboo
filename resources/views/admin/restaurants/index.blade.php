@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-5">A quanto pare non hai un ristorante, <br> crealo in pochi semplici passi</h1>
    {{-- <div class="d-flex justify-content-center m t-5">
        <ul class="">
            
            <li>{{ $restaurant->name }} <a href="{{ route('admin.restaurants.show', $restaurant->id) }}">show</a> <a href="{{ route('admin.restaurants.edit', $restaurant) }}">edit</a></li> 
           
        </ul>
    </div>
    <div> --}}
        <div class="mt-5 d-flex justify-content-center">
            <button class=""><a class="link-unstyled" href="{{ route('admin.restaurants.create') }}">Crea un ristorante</a></button>
        </div>

       
    </div>
@endsection 
