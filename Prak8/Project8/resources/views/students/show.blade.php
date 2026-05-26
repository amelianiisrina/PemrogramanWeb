@extends('layouts.app')

@section('content')
<h2>Detail Data Mahasiswa</h2>

<div class="card">
    <div class="card-body">
        <p><strong>NIM:</strong> {{ $student->nim }}</p>
        <p><strong>Nama:</strong> {{ $student->name }}</p>
        <p><strong>Alamat:</strong> {{ $student->address }}</p>
        <p><strong>Jurusan:</strong> {{ $student->major->name }}</p>

        <p><strong>Mata Kuliah:</strong></P>
        <ul>
            @foreach($student->subjects as $subject)
            <li>
                {{ $subject->name }} ({{ $subject->sks }} SKS)
            </li>
            @endforeach
        </ul>

        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>
</div>
@endsection