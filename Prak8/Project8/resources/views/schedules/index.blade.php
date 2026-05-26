@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Jadwal Perkuliahan</h2>
    <a href="{{ route('schedules.create') }}" class="btn btn-primary">Tambah Jadwal</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama Mata Kuliah</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Ruang</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{ $schedule->subject->name }}</td>
                <td>{{ $schedule->day }}</td>
                <td>{{ $schedule->start }} - {{ $schedule->end }}</td>
                <td>{{ $schedule->room }}</td>
                <td>
                    <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                            Hapus
                        </buton>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
