<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Bul places kestesi</h2>
    <br>
    <a href="{{ route('places.create') }}"> <button>Place qosiw</button></a><br>
    <a href="{{ url('admin') }}"> <button>Back</button></a><br>
    <table border="1">
        <thead>
            <tr>
                <td>Nomeri</td>
                <td>Place ati</td>
                <td>Sayahat waqiti</td>
                <td>Suwret</td>
                <td>Sayahat puli</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
        @forelse($places as $place)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $place->name }}</td>
            <td>{{ $place->time }}</td>
            <td><img src="{{ $place->image }}" width="100px" alt=""></td>
            <td>{{ $place->price }}</td>
            <td><a href="{{ route('places.edit', $place->id) }}"</a>edit</td>
            <td><form action="{{ route('places.destroy',$place->id)}}" method="POST">
            @method('DELETE')    
            @csrf
            <input type="submit" value="delete">
            </form>
            </td>
        </tr>
        @empty
            <br>    magliwmatlar joq<br>
        @endforelse
        </tbody>
</body>
</html>