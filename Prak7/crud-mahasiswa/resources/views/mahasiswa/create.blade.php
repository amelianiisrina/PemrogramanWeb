<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <br><br>

    <form action="/mahasiswa" method="POST">
        @csrf 

        <input name="nim" placeholder="NIM"><br><br>
        <input name="nama" placeholder="Nama"><br><br>
        <input name="jurusan" placeholder="Jurusan"><br><br>
        <input name="alamat" placeholder="Alamat"><br><br>

        <button>Simpan</button>
    </form>
    <br>

    <a href="/mahasiswa">Kembali</a>
</body>
</html>

