
@extends('layouts.main')
@section('content')
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif
    <!-- <form action="{{ route('submitReservation') }}" method="POST" id="reservationForm"> -->
    <form action="" method="POST" id="reservationForm">
        @csrf
        <div class="form-outline mb-4">
            <input type="text" id="name" name="name" class="form-control" required />
            <label class="form-label" for="name">Name</label>
        </div>

        <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control" required />
            <label class="form-label" for="email">Email address</label>
        </div>

        <div class="form-outline mb-4">
            <input type="tel" id="phone" name="phone" class="form-control" required />
            <label class="form-label" for="phone">Phone number</label>
        </div>

        <div class="form-outline mb-4">
            <input type="date" id="checkInDate" name="checkInDate" class="form-control" required />
            <label class="form-label" for="checkInDate">Check-in Date</label>
        </div>

        <div class="form-outline mb-4">
            <input type="date" id="checkOutDate" name="checkOutDate" class="form-control" required />
            <label class="form-label" for="checkOutDate">Check-out Date</label>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Submit Reservation</button>
    </form>


@endsection
