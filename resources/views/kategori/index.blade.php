<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori</title>
</head>
<body>
    <h2>Data Kategori</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Created At</th>
        </tr>
        @foreach($kategori as $k)
        <tr>
            <td>{{ $k->kategori_id }}</td>
            <td>{{ $k->kategori_nama }}</td>
            <td>{{ $k->created_at }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
