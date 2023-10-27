@extends('layouts.app')

@section('content')
     
    <div class="main-container">

        <div class="aside d-flex flex-column text-center justify-content-start">
            <a href="{{route('admin.dishes.index')}}">Menu</a>
            <a href="{{route('admin.dishes.create')}}">Aggiungi Piatto</a>
            <a href="{{route('admin.restaurants.edit' , $restaurant->slug)}}">Modifica informazioni Ristorante</a>
            <button class="btn btn-danger my-link" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Elimina Ristorante</button>
        </div>

        <div class="restaurant-info">
            <ul class="mt-5">
                <li class="restaurant-name">{{ $restaurant->name }}</li>
                <li><span class="fst-italic">Tipologia Ristorante:</span> <span class="fw-bold">{{$restaurant->type->name}}</span></li>
                <li><span class="fst-italic">Partita IVA:</span> <span class="fw-bold">{{ $restaurant->piva }}</span></li>
                <li><span class="fst-italic">Indirizzo Ristorante:</span> <span class="fw-bold">{{ $restaurant->address }}</span></li>
            </ul>
            <div class="img-container">

                <img src="{{ asset('storage/' . $restaurant->photo) }}" alt="">
            </div>
        
        </div>

    </div>

    
    {{-- Modale Eliminazione ristorante --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminazione Ristorante</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Sei sicuro di voler eliminare il Ristorante : <strong>{{$restaurant->name}}</strong> ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
              <form action="{{route('admin.restaurants.destroy', $restaurant->slug)}}" method="POST">
                @csrf
                @method('DELETE')
              <button type="submit" class="btn btn-danger">Conferma</button>
            </form>
            </div>
          </div>
        </div>
      </div>

    
@endsection

        