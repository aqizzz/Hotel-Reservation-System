@extends('layouts.main')
@section('title', 'Welcome to Holiday Resort')
@section('content')
@if (Session::has('message'))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }}" id="custom-alert">
        {{ Session::get('message') }}
    </div>
@endif
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif
<div id="carouselExampleCrossfade" class="carousel slide carousel-fade" data-mdb-ride="carousel" data-mdb-carousel-init>
  <div class="carousel-indicators">
    <button
      type="button"
      data-mdb-target="#carouselExampleCrossfade"
      data-mdb-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselExampleCrossfade"
      data-mdb-slide-to="1"
      aria-label="Slide 2"
    ></button>
    <button
      type="button"
      data-mdb-target="#carouselExampleCrossfade"
      data-mdb-slide-to="2"
      aria-label="Slide 3"
    ></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('images/holiday-resort-01.jpg')}}" style="max-width: 100%;" class="d-block w-100" alt="Holiday resort Landscape"/>
      <div class="carousel-caption d-none d-md-block">
        <h2>Welcome to Holiday Resort</h2>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/holiday-resort-02.webp')}}" style="max-width: 100%;" class="d-block w-100" alt="Holiday resort scenery"/>
      <div class="carousel-caption d-none d-md-block">
        <h2>Welcome to Holiday Resort</h2>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/holiday-resort-03.webp')}}"class="d-block w-100" style="max-width: 100%;" alt="Holiday resort hillside"/>
      <div class="carousel-caption d-none d-md-block">
        <h2>Welcome to Holiday Resort</h2>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
  </div>
  <!-- <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleCrossfade" data-mdb-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleCrossfade" data-mdb-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button> -->
</div>
@endsection