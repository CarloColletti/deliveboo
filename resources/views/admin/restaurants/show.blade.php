@extends('layouts.app')

@section('content')
    <ul class="mt-5">
        
        <li>{{ $restaurants[0]->name }}</li>
        <li>{{ $restaurants[0]->piva }}</li>
        <li>{{ $restaurants[0]->address }}</li>
    </ul>
    <img src="{{ asset('storage/' . $restaurants[0]->photo) }}" alt="">
@endsection