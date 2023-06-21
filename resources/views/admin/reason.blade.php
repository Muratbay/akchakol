<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Reasons</title>
</head>
<body>
    <a href="{{ route('reasons.create') }}"> <button>sebeb qosiw</button></a><br>
    <a href="{{ url('admin') }}"> <button>Back</button></a><br>
    <table border="1">
        <thead>
            <tr>
                <td>Nomeri</td>
                <td>Title</td>
                <td>Discription</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
        @forelse($reasons as $reason)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $reason->title }}</td>
            <td>{{ $reason->discription }}</td>
            <td><a href="{{ route('reasons.edit', $reason->id) }}"</a>edit</td>
            <td><form action="{{ route('reasons.destroy',$reason->id)}}" method="POST">
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