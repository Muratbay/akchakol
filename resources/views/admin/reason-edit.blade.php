<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Sebebler ozgertiw beti</title>
</head>
<body>
    <form action="{{ route('reasons.update', $reason->id) }}" method="POST">
        @method('PUT')
        @csrf
        <input type="text" name="title" value="{{ $reason->title }}"><br>
        <input type="text" name="discription" value="{{ $reason->discription }}"><br>
        <input type="submit" name="jiberiw">
   
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
    </form>
   
</body>
</html>