
@extends('layouts.main')
@section('title', 'Welcome to XX Hotel')

@section('content')
<br>
@if(session('successMsg'))
    <div class="alert alert-danger" role="alert">
    	{{ session('successMsg') }}
    </div>
@endif
<div class="container">
    <div id="search-bar">
        <form action="{{route('reservation')}}" method="GET">
            <div class="row">
                <div class='col-sm-3'>
                    <div class="form-group">
                        <label>Check in date: </label>
                        <!--指定 date标记-->
                        <div class='input-group date'>
                            <input type='date' class="form-control" name="start_date" required/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class='col-sm-3'>
                    <div class="form-group">
                        <label>Check out date: </label>
                        <!--指定 date标记-->
                        <div class='input-group date'>
                            <input type='date' class="form-control" name="end_date" required/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class='col-sm-2'>
                    <div class="form-group">
                        <label>Adults: </label>
                        <div class='input-group'>
                            <input type='number' class="form-control" name="capacity" value="1" required/>
                        </div>
                    </div>
                </div>
                <div class='col-sm-2'>
                    <div class="form-group">
                        <label>Children: </label>
                        <div class='input-group'>
                            <input type='number' class="form-control" required value="0"/>
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
            <thead class="black white-text">
                <tr>
                    <th scope="col">Room type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Max Adult No. </th>
                    <th scope="col">Rooms left</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <th scope="row">{{ $room->type }}</th>
                        <td></td>
                        <td>{{ $room->capacity }}</td>
                        <td>{{ $room->available_rooms }}</td>
                        <td>
                            <button data-mdb-ripple-init type="button" class="btn btn-danger me-4">
                                <a href="{{ route('register') }}" style="text-decoration: none; color: white;">Order Now!</a>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif
</div>
@endsection

