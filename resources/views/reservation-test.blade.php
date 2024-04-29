
@extends('layouts.main')
@section('title', 'Welcome to XX Hotel')

@section('content')
<img
  class="btn mb-3"
  data-mdb-collapse-init
  data-mdb-ripple-init
  src="{{asset('resources/images/room1-thumbnail.webp')}}"
  alt="Toggle second element"
  aria-expanded="false"
  aria-controls="multiCollapseExample2"
  data-mdb-target="#multiCollapseExample2"
/>

<!-- Image trigger collapse -->
<img
  class="btn mb-3"
  data-mdb-collapse-init
  data-mdb-ripple-init
  src="{{asset('resources/images/room2-thumbnail.webp')}}"
  alt="Toggle both elements"
  aria-expanded="false"
  aria-controls="multiCollapseExample1"
  data-mdb-target="#multiCollapseExample1"
/>

<img
  class="btn mb-3"
  data-mdb-collapse-init
  data-mdb-ripple-init
  src="{{asset('resources/images/room3-thumbnail.webp')}}"
  alt="Toggle both elements"
  aria-expanded="false"
  aria-controls="multiCollapseExample1 multiCollapseExample2"
  data-mdb-target=".multi-collapse"
/>

<img
  class="btn mb-3"
  data-mdb-collapse-init
  data-mdb-ripple-init
  src="{{asset('resources/images/room4-thumbnail.webp')}}"
  alt="Toggle both elements"
  aria-expanded="false"
  aria-controls="multiCollapseExample1 multiCollapseExample2"
  data-mdb-target=".multi-collapse"
/>
<!-- Collapsed content -->
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
      richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
      cred nesciunt sapiente ea proident.
    </div>
  </div>
  <div class="col">
    <div class="collapse multi-collapse mt-3" id="multiCollapseExample2">
      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
      richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
      cred nesciunt sapiente ea proident.
    </div>
  </div>
</div>

@endsection
