
<!-- room-details.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>roodDetails</title>
</head>
<body>
    
    <h1>Room Details</h1>
    <ul>
        @foreach($roomDetails as $room)
            <li>Room Number: {{ $room['room_number'] }}, Capacity: {{ $room['capacity'] }}, Rate: {{ $room['rate'] }}</li>
        @endforeach
    </ul>

</body>
</html>

