<!DOCTYPE html>
<html>
<head>
    <title>rudolfleopold.at</title>
</head>
<body>
    <h4>{{ $mailData['name'] }}({{$mailData['email']}}) sent you a message from rudolfleopold.at</h4>

    Message :
    <p>{{ $mailData['message'] }}</p>
</body>
</html>
