@extends('layouts.app')

@section('content')
        <ul>
            @foreach ($dishes as $dish)
                <li>{{ $dish->name }}</li>
            @endforeach
        </ul>
@endsection