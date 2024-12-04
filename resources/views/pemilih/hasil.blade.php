<!-- resources/views/pemilih/hasil.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemilihan</title>
</head>
<body>
    <h2>Hasil Pemilihan</h2>
    <ul>
        @foreach($results as $candidate)
            <li>
                {{ $candidate->nama }} - {{ $candidate->votes_count }} Suara
            </li>
        @endforeach
    </ul>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
