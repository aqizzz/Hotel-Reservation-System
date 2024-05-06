

@extends('layouts.main')
@section('title', 'Holiday Resort - Rooms')
 
@section('content')
<br>
 
    <div class="container">
        <div class="row">
            @foreach ($roomDetails as $room)
                <div class="col-md-6 mb-4">
                    <div class="card">                                
                    <img src="{{asset('images/' . $room['roomtype'] . '.webp') }}" alt="{{ $room['roomtype'] }}">
                                         
                        <div class="card-body">
                            <h5 class="card-title">{{ $room['roomtype'] }}</h5>
                            <p class="card-text">Capacity: {{ $room['capacity'] }}</p>
                            <p class="card-text">Rate: {{ $room['rate'] }}</p>
                            <p class="card-text">Description: {{ $room['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
