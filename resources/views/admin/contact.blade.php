<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact bolimi</title>
</head>
<body>
    <a href="{{ url('/admin') }}">admin panel</a>
    <table  border="1">
        <thead>
            <tr>
                <td>Buyirpashilar</td>
                <td> Ati </td>
                <td> email </td>
                <td> Telefoni </td>
                <td> Sayahatshilar sani </td>
                <td> karta waqiti </td>
                <td> karta nomeri </td>
                <td> Delete </td>
            </tr>
        </thead>
        <tbody>
        @forelse($contacts as $contact)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->count }}</td>
            <td>{{ $contact->card_term }}</td>
            <td>{{ $contact->card_number }}</td>
            <td><form action="{{ route('contacts.destroy',$contact->id)}}" method="POST">
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