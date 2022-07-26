<!DOCTYPE html>
<html>
<head>
    <title>{{env('APP_NAME')}}</title>
</head>
<body>
    <h3>{{ $mailData['name'] }} ({{$mailData['email']}}) {{$mailData['default_message']}}</h3>
    <p>{{ $mailData['message'] }}</p>

    <h2>Message :</h2>
    <p>{{$mailData['default_end']}}</p>
</body>
</html>
