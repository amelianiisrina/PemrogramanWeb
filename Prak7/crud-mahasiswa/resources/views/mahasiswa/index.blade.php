<!DOCTYPE html>
<html>
    <head>
        <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <a href="/mahasiswa/create">+ Tambah Mahasiswa</a>

    <br><br>

    <table border=1 cellpadding="8">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        @foreach($mahasiswa as $m)
        <tr>
            <td>{{ $m->nim }}</td>
            <td>{{ $m->nama }}</td>
            <td>{{ $m->jurusan }}</td>
            <td>{{ $m->alamat }}</td>
            <td>
                <a href="/mahasiswa/{{ $m->id }}/edit">Edit</a>

                <form action="/mahasiswa/{{ $m->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</body>
</html>