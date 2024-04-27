
@extends('layouts.main')
@section('title', 'Welcome to XX Hotel')

@section('content')
    
    <h1>Room Details</h1>
    <ul>
        @foreach($roomDetails as $room)
            <li>Room Number: {{ $room['room_number'] }}, Capacity: {{ $room['capacity'] }}, Rate: {{ $room['rate'] }}</li>
        @endforeach
    </ul>
@endsection
