@extends('layouts.app')

@section('content')
       
        @if(count($dishes) == 0)

        
        <div>Non è presente alcun Piatto per questo ristorante!</div>
        <button><a href="{{route('admin.dishes.create')}}">Aggiungi un Piatto</a></button>

        @else 

        <ul>
            @foreach ($dishes as $dish)
                <li class="list-unstyled">Nome Piatto: {{ $dish->name }}</li>
                <li class="list-unstyled">Descrizione Piatto: {{$dish->description}}</li>
                <li class="list-unstyled">Ingredienti: {{$dish->ingredients}}</li>
                <li class="list-unstyled">Prezzo: {{$dish->price}}</li>
            @endforeach
        </ul>

        @endif

@endsection