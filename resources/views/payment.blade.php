@extends('layouts.main')
@section('title', 'Reservation')

@section('content')
@if(Session::has('message'))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
        {{ Session::get('message') }}
    </div>
@endif
<div class="container">
  <br>
  @if (!Auth::check())
    <center><h5 class="text-danger">please login to get 10% discount!</h5>
    <p>Don't have an account? <a href="{{ route('register') }}" class="register-link">Register</a></p></center>
    <hr class="hr" />
  @endif
  <p>Reservation information:</p>

  <p><strong>Room Type: </strong>{{session('room_type')}} {{session('days')}} nights</p>

  <div class="row">
      <div class='col-sm-6'>
        <p><strong>Checkin date: </strong>{{session('checkindate')}}</p>
      </div>
      <div class='col-sm-6'>
        <p><strong>Checkout date: </strong>{{session('checkoutdate')}}</p>
      </div>
  </div>
  <p><strong>Total price: </strong>
    @if (Auth::check())
      ${{session('price') * 0.9}}
    @else
      ${{session('price')}}
    @endif
  </p>
  <hr class="hr" />
  <form action="{{ route('checkout') }}" method="POST">
  @csrf
  <p>Guest Information:</p>
    <div class="row">
      <div class='col-sm-6'>
        <label for="">Room Guest Name*</label>
        <input type="text" name="guestName" id="guestName" class="form-control mb-3" required>
      </div>
      <div class='col-sm-6'>
        <label for="">Room Guest Phone*</label>
        <input type="text" name="guestPhone" id="guestPhone" class="form-control mb-3" required>
      </div>
    </div>

    <div class="container p-0">
        <div class="card px-4">
            <p class="h8 py-3">Payment Details</p>
            <div class="row gx-3">
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Card Holder Name</p>
                        <input class="form-control mb-3" type="text" placeholder="Name">
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Card Number</p>
                        <input class="form-control mb-3" type="text" placeholder="1234 5678 435678">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Expiry</p>
                        <input class="form-control mb-3" type="text" placeholder="MM/YYYY">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">CVV/CVC</p>
                        <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary mb-3"  type="submit" >
                        <span class="ps-3">Pay</span>
                        <span class="fas fa-arrow-right"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <br>
  </form>
</div>
<br>

@endsection