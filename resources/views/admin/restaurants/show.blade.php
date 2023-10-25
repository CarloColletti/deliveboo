@extends('layouts.app')

@section('content')
    <ul class="mt-5">
        
        <li>{{ $restaurant->name }}</li>
        <li>{{ $restaurant->piva }}</li>
        <li>{{ $restaurant->address }}</li>
    </ul>
    <img src="{{ asset('storage/' . $restaurant->photo) }}" alt="">


    <div>
        <a href="{{route('admin.dishes.create')}}">Aggiungi Piatto</a>
    </div>

    <div>
        <a href="{{route('admin.dishes.index')}}">Menu</a>
    </div>
@endsection

        