
@extends('layouts.main')
@section('title', 'Holiday Resort - Reservation')
@section('content')
@if(session('successMsg'))
    <div class="alert alert-danger" role="alert">
    	{{ session('successMsg') }}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
@include('layouts.weather')
<br><br>
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
                        <th scope="row" class="align-middle"><img src="{{ asset('images/' . $room->type . '-thumbnail.webp') }}" alt="{{ $room->type }}"></th>
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
            <img src="{{ asset('images/holiday-resort-04.webp')}}" alt="holiday resort photo">
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

    $(document).ready(function() {
        $('#startd').on('change', function() {
            var date = $(this).val();
            $.ajax({
                url: '/reservation', 
                method: 'GET',
                data: {
                    date: date
                },
                success: function(response) {
                    $('#error-message').empty();
                },
                error: function(xhr, status, error) {
                    $('#error-message').text('Failed to fetch weather information');
                    console.error(xhr.responseText);
                }
            });
        });
    });


    var icons1 = new Skycons({"color": "#FFD700"}),
        list  = [
            "clear-day", "clear-day-0", "clear-day-1", "clear-day-2", "clear-day-3", "clear-day-4", "clear-day-5", "clear-day-6"
        ],
        i;

    for(i = 0; i < list.length; i++) {
        icons1.set(list[i], "clear-day");
    }

    icons1.play();

    var icons2 = new Skycons({"color": "#f5f5f5"}),
        list  = [
            "partly-cloudy-day", "partly-cloudy-day-0", "partly-cloudy-day-1", "partly-cloudy-day-2", "partly-cloudy-day-3", "partly-cloudy-day-4", "partly-cloudy-day-5", "partly-cloudy-day-6"
        ],
        i;

    for(i = 0; i < list.length; i++) {
        icons2.set(list[i], "partly-cloudy-day");
    }

    icons2.play();

    var icons3 = new Skycons({"color": "#f5f5f5"}),
        list  = [
            "rain", "rain-0", "rain-1", "rain-2", "rain-3", "rain-4", "rain-5", "rain-6"
        ],
        i;

    for(i = 0; i < list.length; i++) {
        icons3.set(list[i], "rain");
    }

    icons3.play();

    var icons4 = new Skycons({"color": "#f5f5f5"}),
        list  = [
            "clear-night", "clear-night-0", "clear-night-1", "clear-night-2", "clear-night-3", "clear-night-4", "clear-night-5", "clear-night-6"
        ],
        i;

    for(i = 0; i < list.length; i++) {
        icons4.set(list[i], "clear-night");
    }

    icons4.play();

    var icons5 = new Skycons({"color": "#f5f5f5"}),
        list  = [
            "partly-cloudy-night", "partly-cloudy-night-0", "partly-cloudy-night-1", "partly-cloudy-night-2", "partly-cloudy-night-3", "partly-cloudy-night-4", "partly-cloudy-night-5", "partly-cloudy-night-6"
        ],
        i;

    for(i = 0; i < list.length; i++) {
        icons5.set(list[i], "partly-cloudy-night");
    }

    icons5.play();

    var icons6 = new Skycons({"color": "#f5f5f5"}),
        list  = [
            "cloudy", "cloudy-0", "cloudy-1", "cloudy-2", "cloudy-3", "cloudy-4", "cloudy-5", "cloudy-6"
        ],
        i;

    for(i = 0; i < list.length; i++) {
        icons6.set(list[i], "cloudy");
    }

    icons6.play();

    var icons7 = new Skycons({"color": "#f5f5f5"}),
        list  = [
            "sleet", "sleet-0", "sleet-1", "sleet-2", "sleet-3", "sleet-4", "sleet-5", "sleet-6"
        ],
        i;

    for(i = 0; i < list.length; i++) {
        icons7.set(list[i], "sleet");
    }

    icons7.play();

    var icons8 = new Skycons({"color": "#f5f5f5"}),
        list  = [
            "snow", "snow-0", "snow-1", "snow-2", "snow-3", "snow-4", "snow-5", "snow-6"
        ],
        i;

    for(i = 0; i < list.length; i++) {
        icons8.set(list[i], "snow");
    }

    icons8.play();

    var icons9 = new Skycons({"color": "#f5f5f5"}),
        list  = [
            "wind", "wind-0", "wind-1", "wind-2", "wind-3", "wind-4", "wind-5", "wind-6"
        ],
        i;

    for(i = 0; i < list.length; i++) {
        icons9.set(list[i], "wind");
    }

    icons9.play();

    var icons10 = new Skycons({"color": "#f5f5f5"}),
        list  = [
            "fog", "fog-0", "fog-1", "fog-2", "fog-3", "fog-4", "fog-5", "fog-6"
        ],
        i;

    for(i = 0; i < list.length; i++) {
        icons10.set(list[i], "fog");
    }

    icons10.play();
</script>
@endsection
