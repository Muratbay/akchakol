<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin blogi</title>
</head>
<body>
    <a href="{{ url('logout') }}">shigiw</a>

    <ul> 
        <li><a href="{{ route('reasons.index') }}">Sebebler</a></li>
        <li><a href="{{ route('places.index') }}">Jaylar</a></li>
        <li><a href="{{ route('contacts.index') }}">Buyirtpalar</a></li>   
    </ul>
</body>
</html>