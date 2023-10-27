@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
       Bentornato {{ Auth::user()->name  }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div>
                        <a href="{{ route('admin.restaurants.index') }}" class="p-5 text-decoration-none text-uppercase">Vai al tuo ristorante</a>
                    </div>
                </div>
                <div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
