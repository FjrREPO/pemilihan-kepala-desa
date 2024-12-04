<!-- resources/views/pemilih/vote.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan Kandidat</title>
</head>
<body>
    <h2>Daftar Kandidat</h2>
    @foreach($candidates as $candidate)
        <div>
            <h3>{{ $candidate->nama }}</h3>
            <p><strong>Visi:</strong> {{ $candidate->visi }}</p>
            <p><strong>Misi:</strong> {{ $candidate->misi }}</p>
            <form action="{{ route('pemilih.vote') }}" method="POST">
                @csrf
                <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                <button type="submit">Pilih</button>
            </form>
        </div>
        <hr>
    @endforeach
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
