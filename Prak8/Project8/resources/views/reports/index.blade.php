@extends('layouts.app')

@section('content')

<h2 class="mb-4">Laporan Statistik Perkuliahan</h2>


    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Data Mahasiswa</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Mata Kuliah</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->major->name }}</td>
                            <td>
                                <ul class="mb-0">
                                    @foreach($student->subjects as $subject)
                                    <li>
                                        {{ $subject->name }}
                                        ({{ $subject->sks }} SKS)
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Jurusan dengan Mahasiswa Terbanyak</h5>
        </div>

        <div class="card-body">
            <ul class="mb-0 ps-3">
            @foreach($topMajors as $major)
                <li>
                    {{ $major->name }}
                    ({{ $major->students_count }} mahasiswa)
                </li>
            @endforeach
            </ul>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Mata Kuliah dan Mahasiswa yang Diambil</h5>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>Mahasiswa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td>
                            @if($subject->students->count())
                            <ul class="mb-0">
                                @foreach($subject->students as $student)
                                    <li>{{ $student->name }}</li>
                                @endforeach
                            </ul>
                            @else
                                Belum ada mahasiswa
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Total SKS Mahasiswa</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Mahasiswa</th>
                            <th>Total SKS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($totalSKS as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->subjects->sum('sks') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection