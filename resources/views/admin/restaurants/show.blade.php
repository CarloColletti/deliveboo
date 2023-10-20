@extends('layouts.app')

@section('content')
    <ul class="mt-5">
        <li>{{ $restaurant->piva     }}</li>
        <li>{{ $restaurant->address }}</li>
    </ul>

    <img src="{{ $restaurant->photo }}" alt="">
@endsection