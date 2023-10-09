<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>change request</title>
</head>
<body>
    <h1> {{$dataMail['title']}} </h1>
    <p>{{$dataMail['body']}}</p>
    <p>Modified Table: {{$dataMail['table']}}</p>
    <p> Editor user: {{$dataMail['from']}} </p>
</body>
</html>