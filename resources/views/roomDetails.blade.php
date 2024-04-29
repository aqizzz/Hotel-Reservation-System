
@extends('layouts.main')
@section('title', 'Welcome to XX Hotel')

@section('content')
    
    <!-- <h1>Room Details</h1>
    <ul>
        @foreach($roomDetails as $room)
            <li>Room Number: {{ $room['room_number'] }}, Capacity: {{ $room['capacity'] }}, Rate: {{ $room['rate'] }}</li>
        @endforeach
    </ul> -->



    <h1 class="text-center my-5">Room Details</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="../images/room1.webp" class="card-img-top" alt="Room 1">
                    <div class="card-body">
                        <h5 class="card-title">Room 101</h5>
                        <p class="card-text">Description for Room 1</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="../images/room2.webp" class="card-img-top" alt="Room 2">
                    <div class="card-body">
                        <h5 class="card-title">Room 102</h5>
                        <p class="card-text">Description for Room 2</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="../images/room3.webp" class="card-img-top" alt="Room 3">
                    <div class="card-body">
                        <h5 class="card-title">Room 103</h5>
                        <p class="card-text">Description for Room 3</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img src="../images/room4.webp" class="card-img-top" alt="Room 4">
                    <div class="card-body">
                        <h5 class="card-title">Room 104</h5>
                        <p class="card-text">Description for Room 4</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

   


@endsection


