

@extends('layouts.main')
@section('title', 'Welcome to XX Hotel')
 
@section('content')
<br>
<<<<<<< HEAD

=======
 
>>>>>>> 506e489a578a85c9206eb36f035128035f6b3b42
    <div class="container">
        <div class="row">
            @foreach ($roomDetails as $room)
                <div class="col-md-6 mb-4">
<<<<<<< HEAD
                    <div class="card">                                 
                    <img src="{{asset('resources/images/' . $room['roomtype'] . '.webp') }}" alt="{{ $room['roomtype'] }}">
                                          
=======
                    <div class="card">                                
                    <img src="{{asset('resources/images/' . $room['roomtype'] . '.webp') }}" alt="{{ $room['roomtype'] }}">
                                         
>>>>>>> 506e489a578a85c9206eb36f035128035f6b3b42
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
