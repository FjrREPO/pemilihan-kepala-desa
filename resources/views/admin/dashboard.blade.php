<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <h2>Dashboard Admin</h2>

    <h3>Daftar Pemilih</h3>
    @if ($pemilih->isEmpty())
        <p>Tidak ada pemilih terdaftar.</p>
    @else
        <ul>
            @foreach($pemilih as $user)
                <li>
                    {{ $user->nama }} - {{ $user->email }}
                    
                    
                    <!-- Form untuk menghapus pemilih -->
                    <form action="{{ route('admin.delete', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

    <h3>Tambah Kandidat</h3>
    <form action="{{ route('admin.addCandidate') }}" method="POST">
        @csrf
        <div>
            <label>Nama Kandidat:</label>
            <input type="text" name="nama" required>
        </div>
        <div>
            <label>Visi:</label>
            <textarea name="visi" required></textarea>
        </div>
        <div>
            <label>Misi:</label>
            <textarea name="misi" required></textarea>
        </div>
        <button type="submit">Tambah</button>
    </form>

    <br>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
