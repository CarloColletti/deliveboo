@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row border border-secondary border-opacity-25 shadow rounded-2">


            <div class="container py-3 px-5">

                {{-- update or create --}}
                <div class="row text-center py-2 border border-secondary border-opacity-25 shadow rounded-3">
                    @if ($dish->id)
                        <h2 class="fw-semibold">
                            Stai Modificando: {{ $dish->name }}
                        </h2>
                    @else
                        <h2 class="fw-semibold">
                            Crea un nuovo Piatto
                        </h2>
                    @endif

                </div>


                {{-- init form --}}

                @if ($dish->id)
                    <form action="{{ route('admin.dishes.update', $dish->slug) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data"
                            class="mt-5">
                @endif

                @csrf


                {{-- section INPUT  --}}
                <div class="row my-4 py-2 border border-secondary border-opacity-25 shadow rounded-3">

                    <div class="col-8 px-4">

                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        {{-- NAME INPUT --}}
                        <div class="mb-4">
                            <label class="text-uppercase fw-bold" for="name">Nome *</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') ?? $dish->name }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- //NAME IMPUT --}}

                        {{-- Description IMPUT --}}
                        <div class="mb-4">
                            <label class="text-uppercase fw-bold" for="description">Descrizione</label>
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                                name="description" required>{{ old('description') ?? $dish->description }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- //description IMPUT --}}

                        {{-- ingredinti IMPUT --}}
                        <div class="mb-4">
                            <label class="text-uppercase fw-bold" for="ingredients">ingredienti</label>


                            <textarea id="ingredients" type="text" class="form-control @error('ingredients') is-invalid @enderror"
                                name="ingredients" required>{{ old('ingredients') ?? $dish->ingredients }}</textarea>


                            @error('ingredients')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- //ingredients IMPUT --}}

                        {{-- Price INPUT --}}

                        <div class="mb-4">
                            <label class="text-uppercase fw-bold" for="price">Prezzo</label>


                            <input id="price" type="number" min="0"
                                class="form-control @error('price') is-invalid @enderror" name="price"
                                value="{{ old('price') ?? $dish->price }}" required>



                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- /PRICE INPUT --}}

                        {{-- IMAGES INPUT --}}
                        <div class="mb-4">
                            <div class="form-group py-3 d-flex flex-column">
                                <label class="text-uppercase fw-bold" for="image">Scegli foto *</label>
                                <input class="py-2" type="file" class="form-control" id="image" name="image"
                                    required>
                                <div id="image-validation-message"></div>
                            </div>
                        </div>
                        {{-- //IMAGES INPUT --}}

                    </div>
                </div>


                {{-- section operation --}}
                <div class="row my-4 py-3 border border-secondary border-opacity-25 shadow rounded-3 text-center">
                    <div class="col-12">
                        {{-- create or edit button submit --}}
                        @if ($dish->id)
                            {{-- edit --}}
                            <button id="submit" type="submit" class="btn btn-primary">Modifica Piatto</button>
                        @else
                            {{-- create --}}
                            <button id="submit" type="submit" class="btn btn-primary">Aggiungi Piatto</button>
                        @endif
                        {{-- //create or edit button submit --}}

                        <a href="{{ route('admin.dishes.index') }}" class="btn btn-danger ms-3">Torna Indietro</a>
                    </div>
                </div>
                </form>

                {{-- end form --}}

            </div>
        </div>
    </div>
@endsection
