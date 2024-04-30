<Div>
    @if(isset($errorMessage))
        <p>{{ $errorMessage }}</p>
    @else
       <div class="row">
                <center><span>Weather in {{ $cityName }}: </span><span> {{ $temp }}°C </span><span>  {{ $description }}</span></center>
       </div>
    @endif
</Div>