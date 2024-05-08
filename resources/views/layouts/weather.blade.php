
<Div>
    @if(isset($errorMessage))
        <p>{{ $errorMessage }}</p>
    @else
       <div class="row">     
            <div class="main-info">
                <div class="weather-top">	
                    <div class="weather-grids">
                        <h3 class="fri">{{ (new DateTime($weather[0]['datetime']))->format('l') }} </h3>
                        <h3>{{ htmlspecialchars((new DateTime($weather[0]['datetime']))->format('d/m/Y')) }}</h3>
                    </div>
                    <div class="weather-grids weather-mdl">
                        <canvas id="{{ $weather[0]['icon'] }}" width="70" height="70"></canvas>
                        <h3>{{ $weather[0]['icon'] }}</h3>
                    </div>
                    <div class="weather-grids">
                        <h4>Max {{ $weather[0]['tempmax'] }}°C</h4>
                    @if($currentConditions)
                        <h2>{{ $currentConditions['temp'] }}°C</h2>
                    @else
                        <h2>{{ $weather[0]['temp'] }}°C</h2>
                    @endif
                        <h4>Min {{ $weather[0]['tempmin'] }}°C</h4>
                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="weather-bottom">	
                <ul>
                    @foreach($weather as $index => $day)
                    <li>
                        <h4>{{ (new DateTime($day['datetime']))->format('D') }}</h4>
                        <figure class="icons">
                            <canvas id="{{ $day['icon'].'-'.$index }}" width="40" height="40"></canvas>
                        </figure>
                        <h5>{{ $day['tempmax'] }}°C</h5>
                        <h6>{{ $day['tempmin'] }}°C</h6>
                    </li>
                    @endforeach
                </ul>
                    <div class="clear"> </div>
                </div>
            </div>
       </div>
    @endif
</Div>