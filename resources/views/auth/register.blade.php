<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Pemilih</title>
</head>
<body>
    <h2>Pendaftaran Pemilih</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <label>NIK:</label>
            <input type="text" name="nik" required>
        </div>
        <div>
            <label>Nama:</label>
            <input type="text" name="nama" required>
        </div>
        <div>
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" required>
        </div>
        <div>
            <label>Alamat:</label>
            <input type="text" name="alamat" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>Konfirmasi Password:</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
</body>
</html>
