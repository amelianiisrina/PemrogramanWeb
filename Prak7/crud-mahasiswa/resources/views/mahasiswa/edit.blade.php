<!DOCTYPE html>
<html>
    <head>
        <title>Edit Data</title>
    </head>
    
    <body>
        <h1>Edit Data Mahasiswa</h1>

        <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST">
            @csrf
            @method('PUT')

            <input name="nim" value="{{ $mahasiswa->nim }}"><br><br>
            <input name="nama" value="{{ $mahasiswa->nama }}"><br><br>
            <input name="jurusan" value="{{ $mahasiswa-> jurusan }}"><br><br>
            <input name="alamat" value="{{ $mahasiswa->alamat }}"><br><br>

            <button>Update</button>
        </form>

        <br>

        <a href="/mahasiswa">Kembali</a>
</body>
</html>