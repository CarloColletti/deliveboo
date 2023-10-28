@extends('layouts.app')

@section('content')
       
        

        @if(count($dishes) == 0)

        
        <div>Non è presente alcun Piatto per questo ristorante!</div>
        <button><a href="{{route('admin.dishes.create')}}">Aggiungi un Piatto</a></button>
        

        @else 

        <h1 class="text-center p-4">Questi sono tutti piatti del ristorante</h1>

            <ul class="dishes-info">
                @foreach ($dishes as $dish)
                {{-- Modale Eliminiazione Piatto --}}
                
                <div class="modal fade" id="exampleModal-{{ $dish->id }}" tabindex="-1" aria-labelledby="exampleModalLabel-{{ $dish->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-{{ $dish->id }}">Eliminazione Piatto</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Sei sicuro di voler eliminare il Piatto : <strong>{{$dish->name}}</strong> ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                          <form action="{{route('admin.dishes.destroy' , $dish->slug)}}" method="POST">
                            @csrf
                            @method('DELETE')
                          <button type="submit" class="btn btn-danger">Conferma</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
            
    
        
    
            {{-- /Modale eliminazione Piatto --}}
                <div class="dish-container">
                   
                    <li class="list-unstyled"><em>Nome Piatto</em>: <strong>{{ $dish->name }}</strong></li>
                    <li class="list-unstyled"><em>Descrizione Piatto</em>: <strong>{{$dish->description}}</strong></li>
                    <li class="list-unstyled"><em>Ingredienti</em>: <strong>{{$dish->ingredients}}</strong></li>
                    <li class="list-unstyled mb-3"><em>Prezzo</em>: <strong> &euro; {{$dish->price}}</strong></li>
                    <div class="img-container">
                        <img src="{{ asset('storage/' . $dish->image) }}" alt="">
                    </div>
                    <div class="d-flex  justify-content-around mt-2">

                        <div>
                            <a href="{{route('admin.dishes.edit', $dish->slug)}}" class="btn btn-info">Modifica Piatto</a>
                        </div>
                        <div>
                            <button class="btn btn-danger my-link" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $dish->id }}">Elimina Piatto</button>
                        </div>

                    </div>
                </div>
                @endforeach
            </ul>

        

        @endif



@endsection