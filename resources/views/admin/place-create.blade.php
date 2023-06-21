<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Place create bolimi</title>
</head>
<body>
    <form action="{{ route('places.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="place ati"><br>
        <input type="number" name="time" placeholder="sayahat waqiti"><br>
        <input type="file" name="image" placeholder="suwret"><br>
        <input type="number" name="price" placeholder="sayahat puli"><br>
        <input type="submit" name="jiberiw">
    </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>