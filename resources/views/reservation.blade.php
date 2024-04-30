
@extends('layouts.main')
@section('title', 'Reservation')
@section('content')
@if(session('successMsg'))
    <div class="alert alert-danger" role="alert">
    	{{ session('successMsg') }}
    </div>
@endif
<div id="ww_5ba0684857abd" v='1.3' loc='id' a='{"t":"responsive","lang":"en","sl_lpl":1,"ids":["wl2935"],"font":"Arial","sl_ics":"one_a","sl_sot":"celsius","cl_bkg":"#0097A7","cl_font":"#FFFFFF","cl_cloud":"#FFFFFF","cl_persp":"#FFFFFF","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722","cl_odd":"#0000000a"}'>More forecasts: <a href="https://oneweather.org/calgary/30_days/" id="ww_5ba0684857abd_u" target="_blank">Calgary weather forecast 30 days</a></div><script async src="https://app2.weatherwidget.org/js/?id=ww_5ba0684857abd"></script>
@include('layouts.weather')
<br>
<div class="container">
    <div id="search-bar">
        <form action="{{route('reservation')}}" method="GET">
            <div class="row">
                <div class='col-sm-3'>
                    <div class="form-group">
                        <label>Check in date: </label>
                        <div class='input-group date'>
                            <input type='date' class="form-control" id="startd" name="start_date" value="{{ session('checkindate') }}" required/>
                        </div>
                    </div>
                </div>
                <div class='col-sm-3'>
                    <div class="form-group">
                        <label>Check out date: </label>
                        <div class='input-group date'>
                            <input type='date' class="form-control" id="endd" name="end_date" value="{{ session('checkoutdate') }}" required/>
                        </div>
                    </div>
                </div>
                <div class='col-sm-2'>
                    <div class="form-group">
                        <label>Adults: </label>
                        <div class='input-group'>
                            <input type='number' class="form-control" name="capacity" value="1" min="1" required/>
                        </div>
                    </div>
                </div>
                <div class='col-sm-2'>
                    <div class="form-group">
                        <label>Children: </label>
                        <div class='input-group'>
                            <input type='number' class="form-control" required value="0" min="0"/>
                        </div>
                    </div>
                </div>
                <div class='col-sm-2'>
                    <br>
                    <button type="submit" class='btn btn-primary'>check</button>
                </div>
            </div>
        </form>
    </div>

    @if (!empty($rooms))
        <table class="table">
            <thead class="black white-text" style="text-align: center;">
                <tr>
                    <th scope="col">Room type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Max Adult No. </th>
                    <th scope="col">Rooms left</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                @foreach($rooms as $room)
                    <tr>
                        <th scope="row" class="align-middle"><img src="{{ asset('resources/images/' . $room->type . '-thumbnail.webp') }}" alt="{{ $room->type }}"></th>
                        <td class="align-middle">{{ $room->type }}</td>
                        <td class="align-middle">{{ $room->capacity }}</td>
                        <td class="align-middle">{{ $room->available_rooms }}</td>

                        <td class="align-middle">
                            @if (Auth::check())
                                <del class="text-secondary">${{ $room->rate * $room->days }}</del>
                                ${{ $room->rate * 0.9 * $room->days }}
                            @else
                                ${{ $room->rate * $room->days }}
                            @endif
                        </td>
                        @if ($room->available_rooms > 0)
                            <td class="align-middle">
                            <form action="{{ route('update.step.completed') }}" method="POST">
                                @csrf
                                <input type="hidden" name="room_type" value="{{ $room->type }}">
                                <input type="hidden" name="price" value="{{ $room->rate * $room->days }}">
                                <button type="submit" class="btn btn-danger me-4" data-mdb-ripple-init>
                                    Order Now!
                                </button>
                            </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="container">
            <img src="{{ asset('resources/images/holiday-resort-04.webp')}}" alt="holiday resort photo">
        </div>
    @endif
</div>
@endsection
@section('scripts')
<script>
    // Set minimum start date and end date
    let minStartDate = new Date().setDate(new Date().getDate() + 1);
    let minStartDateObject = new Date(minStartDate);
    let minEndtDate = new Date().setDate(new Date().getDate() + 2);
    let minEndDateObject = new Date(minEndtDate);

    let startDateInput = document.getElementById('startd');
    let endDateInput = document.getElementById('endd');

    startDateInput.min = minStartDateObject.toISOString().split('T')[0];
    endDateInput.min = minEndDateObject.toISOString().split('T')[0];

    startDateInput.addEventListener('input', function() {
        // When the start date changes, update the minimum value of the end date to the start date plus one day
        let startDate = new Date(startDateInput.value);
        let minEndDate = new Date(startDate);
        minEndDate.setDate(startDate.getDate() + 1);
        endDateInput.min = minEndDate.toISOString().split('T')[0];

        // If the end date is less than the minimum end date, reset the end date to the minimum end date plus one day
        if (new Date(endDateInput.value) < minEndDate) {
            endDateInput.value = minEndDate.toISOString().split('T')[0];
        }
    });

    endDateInput.addEventListener('input', function() {
        // When the end date changes, ensure that it is greater than the start date
        let startDate = new Date(startDateInput.value);
        let endDate = new Date(endDateInput.value);

        if (endDate <= startDate) {
            // If the end date is less than or equal to the start date, set the end date to the start date plus one day
            let minEndDate = new Date(startDate);
            minEndDate.setDate(startDate.getDate() + 1);
            endDateInput.value = minEndDate.toISOString().split('T')[0];
        }
    });

    window.addEventListener('load', function() {
        localStorage.removeItem('autoSavedSql_hotel_reservation.rooms');
    });
</script>
@endsection
