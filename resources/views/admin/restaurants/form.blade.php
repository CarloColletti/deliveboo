@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row border border-secondary border-opacity-25 shadow rounded-2">


            <div class="container py-3 px-5">

                {{-- update or create --}}
                <div class="row text-center py-2 border border-secondary border-opacity-25 shadow rounded-3">
                    @if ($restaurant->id)
                        <h2 class="fw-semibold">
                            Stai Modificando: {{ $restaurant->name }}
                        </h2>
                    @else
                        <h2 class="fw-semibold">
                            Crea un nuovo ristorante
                        </h2>
                    @endif

                </div>


                {{-- init form --}}

                @if ($restaurant->id)
                    <form action="{{ route('admin.restaurants.update', $restaurant->slug) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
                @endif

                @csrf


                {{-- section INPUT  --}}
                <div class="row my-4 py-2 border border-secondary border-opacity-25 shadow rounded-3">

                    <div class="col-8 px-4">
                        {{-- TYPE INPUT --}}
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        @if ($restaurant->id)
                        @else
                            <div class="py-3">
                                <div class="text-uppercase fw-bold py-3">Tipologie Ristorante :</div>
                                <div class="d-flex">
                                    @foreach ($types as $type)
                                        <div class="form-check text-center px-4">
                                            <input type="checkbox" name="types[]" value="{{ $type->id }}"
                                                class="form-check-input"
                                                {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                                            <label for="" class="form-check-label">{{ $type->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- //TYPE INPUT --}}

                        {{-- NAME INPUT --}}
                        <div class="mb-4">
                            <label class="text-uppercase fw-bold" for="name">Nome</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') ?? $restaurant->name }}" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- //NAME IMPUT --}}

                        {{-- ADDRESS IMPUT --}}
                        <div class="mb-4">
                            <label class="text-uppercase fw-bold" for="address">Indirizzo</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') ?? $restaurant->address }}" required>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- //ADDRESS IMPUT --}}

                        {{-- PIVA IMPUT --}}
                        <div class="mb-4">
                            <label class="text-uppercase fw-bold" for="piva">Partita IVA</label>
                            <input id="piva" type="text" min="1" max="11"
                                class="form-control @error('piva') is-invalid @enderror" name="piva"
                                value="{{ old('piva') ?? $restaurant->piva }}" required>

                            @error('piva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- //PIVA IMPUT --}}

                        {{-- IMAGES INPUT --}}
                        <div class="mb-4">
                            <div class="form-group py-3 d-flex flex-column">
                                <label class="text-uppercase fw-bold" for="photo">Scegli foto *</label>
                                <input class="py-2" type="file" class="form-control" id="photo" name="photo"
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
                        @if ($restaurant->id)
                            {{-- edit --}}
                            <button id="submit" type="submit" class="btn btn-primary">Modifica Ristorante</button>
                        @else
                            {{-- create --}}
                            <button id="submit" type="submit" class="btn btn-primary">Crea un nuovo
                                ristorante</button>
                        @endif
                        {{-- //create or edit button submit --}}

                        <a href="{{ route('admin.restaurants.index') }}" class="btn btn-danger ms-3">
                            Torna Indietro
                        </a>
                    </div>
                </div>
                </form>

                {{-- end form --}}

            </div>
        </div>
    </div>
@endsection
