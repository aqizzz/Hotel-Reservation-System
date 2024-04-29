
@extends('layouts.main')
@section('title', 'Welcome to XX Hotel')

@section('content')

    <div class="container">
        <div class="row">
            @foreach ($roomDetails as $room)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="/images/{{ strtolower(str_replace(' ', '-', $room['roomtype'])) }}.webp" class="card-img-top" alt="{{ $room['roomtype'] }}">
                                          
                        <div class="card-body">
                            <h5 class="card-title">{{ $room['roomtype'] }}</h5>
                            <p class="card-text">Capacity: {{ $room['capacity'] }}</p>
                            <p class="card-text">Rate: {{ $room['rate'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

