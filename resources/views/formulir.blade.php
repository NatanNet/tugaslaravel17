<!DOCTYPE html>
<html>
<head>
    <title>Request dengan Input Laravel</title>
</head>
<body>
    <form action="/formulir/proses" method="post">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama">
        <br>
        <label>Email:</label>
        <input type="text" name="alamat">
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
