<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Koneksi Database</title>
</head>
<body>
    <h2>Status Koneksi Database</h2>
    <p>{{ $message }}</p>
    <p>{{ $tables }}</p>

    <a href="{{ route('admin.dashboard') }}">Kembali ke Dashboard Admin</a>
</body>
</html>
