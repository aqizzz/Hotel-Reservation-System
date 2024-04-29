<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Weather Information</title>
</head>
<body>
    @if(isset($errorMessage))
        <p>{{ $errorMessage }}</p>
    @else
        <p>Weather in : {{ $cityName }}</p>
        <p>Temperature: {{ $temp }}</p>
        <p>Description: {{ $description }}</p>
    @endif
</body>
</html>
