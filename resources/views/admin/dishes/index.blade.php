@extends('layouts.app')

@section('content')
       
        

        @if(count($dishes) == 0)

        
        <div>Non è presente alcun Piatto per questo ristorante!</div>
        <button><a href="{{route('admin.dishes.create')}}">Aggiungi un Piatto</a></button>
        

        @else 

        
        
            <ul class="dish-info d-flex gap-3">
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
                          <form action="{{route('admin.dishes.destroy' , compact('dish'))}}" method="POST">
                            @csrf
                            @method('DELETE')
                          <button type="submit" class="btn btn-danger">Conferma</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
            
    
        
    
            {{-- /Modale eliminazione Piatto --}}
                <div>
                   
                    <li class="list-unstyled">Nome Piatto: {{ $dish->name }}</li>
                    <li class="list-unstyled">Descrizione Piatto: {{$dish->description}}</li>
                    <li class="list-unstyled">Ingredienti: {{$dish->ingredients}}</li>
                    <li class="list-unstyled">Prezzo: {{$dish->price}}</li>
                    <div class="img-container">
                        <img src="{{ asset('storage/' . $dish->image) }}" alt="">
                    </div>
                    <div class="d-flex  justify-content-around mt-2">

                        <div>
                            <a href="{{route('admin.dishes.edit', compact('dish'))}}" class="btn btn-info">Modifica Piatto</a>
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