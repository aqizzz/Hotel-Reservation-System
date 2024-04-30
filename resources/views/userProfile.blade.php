@extends('layouts.main')
@section('title', 'User profile')
@section('content')
@if (session('successMsg'))
    <div class="alert alert-success">
        {{ session('successMsg') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<br>
<div class="container">
  <form action="{{ route('updateProfile') }}" method="POST">
  @csrf
    <div class="row">
      <div class="col-md-3 mb-3">
          <label for="userName">User name</label>
          <input type="text" id="userName" value="{{ $user->name }}" name="name" class="form-control profileUser" disabled="true">
      </div>
      <div class="col-md-6 mb-3">
        <label for="">Email</label>
        <input type="text" value="{{$user->email}}" name="email" class="form-control mb-3 profileUser" disabled="true">
      </div>
      <div class="col-md-3 mb-3">
      <span>&nbsp; </span><br>
      <button type="button" id="editUserBtn" class="btn btn-primary" >Edit</button><span>&nbsp; &nbsp; &nbsp; </span>
      <button type="submit" id="updateBtn" class="btn btn-primary" >Update</button>
      </div>
    </div>
    
  </form>
</div>

@if (!empty($bookings))
<center><h3>Orders</h3></center>
      <table class="table">
          <thead class="black white-text" style="text-align: center;">
              <tr>
                  <th scope="col">Order No.</th>
                  <th scope="col">Room type</th>
                  <th scope="col">Guest Name</th>
                  <th scope="col">Guest Phone</th>
                  <th scope="col">Checkin Date</th>
                  <th scope="col">Checkout Date</th>
                  <th scope="col">Order Created</th>
              </tr>
          </thead>
          <tbody style="text-align: center;">
              @foreach($bookings as $booking)
                <form action="{{ route('updateGuest', ['id' => $booking->id]) }}" method="POST">
                  @csrf
                  <tr>
                      <th scope="row" class="align-middle">{{ $booking->id }}</th>
                      <td class="align-middle">{{ $booking->room_type }}</td>
                      <td class="align-middle"><input type="text" value="{{ $booking->guest_name }}" name="guest_name"></td>
                      <td class="align-middle"><input type="text" value="{{ $booking->guest_phone }}" name="guest_phone"></td>
                      <td class="align-middle ">{{ $booking->check_in_date }}</td>
                      <td class="align-middle">{{ $booking->check_out_date }}</td>
                      <td class="align-middle">{{ $booking->created_at }}</td>

                      <td class="align-middle">
                        <button type="submit" class="btn btn-raised btn-danger btn-sm">
                            Update guest
                        </button>
                    </td>
                </form>
                  <td class="align-middle">
                      <form action="{{ route('delete', ['id' => $booking->id]) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-dark btn-sm">Cancel Order</button>
                      </form>
                  </td>
                </tr>
              @endforeach
          </tbody>
      </table>
  @endif

@if (!empty($history))
<center><h3>Order History</h3></center>
    <table class="table">
        <thead class="black white-text" style="text-align: center;">
            <tr>
                <th scope="col">Order No.</th>
                <th scope="col">Room type</th>
                <th scope="col">Guest Name</th>
                <th scope="col">Guest Phone</th>
                <th scope="col">Checkin Date</th>
                <th scope="col">Checkout Date</th>
                <th scope="col">Order Created</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @foreach($history as $booking)
                <tr>
                    <th scope="row" class="align-middle">{{ $booking->id }}</th>
                    <td class="align-middle">{{ $booking->room_type }}</td>
                    <td class="align-middle"><input type="text" value="{{ $booking->guest_name }}" name="guest_name"></td>
                    <td class="align-middle"><input type="text" value="{{ $booking->guest_phone }}" name="guest_phone"></td>
                    <td class="align-middle ">{{ $booking->check_in_date }}</td>
                    <td class="align-middle">{{ $booking->check_out_date }}</td>
                    <td class="align-middle">{{ $booking->created_at }}</td>
                </td>
              </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('editUserBtn').addEventListener('click', function(event) {
      event.preventDefault();

      let inputs = document.querySelectorAll('.profileUser'); 

      inputs.forEach(function(input) { 
        input.disabled = false; 
      });
    });
  });
</script>
@endsection