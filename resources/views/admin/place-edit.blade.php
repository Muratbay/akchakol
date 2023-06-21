<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Place ozgertiw  bolimi</title>
</head>
<body>
    <form action="{{ route('places.update', $place->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="text" name="name" value="{{ $place->name }}" ><br>
        <input type="text" name="time" value="{{ $place->time }}" ><br>
        <input type="file" name="image" value="{{ $place->image }}" ><br>
        <input type="number" name="price" value="{{ $place->price }}" ><br>
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