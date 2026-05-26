@extends('layouts.app')

@section('content')
<h2>Tambah Jadwal</h2>

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-body">

        <form action="{{ route('schedules.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Mata Kuliah</label>
                <select name="subject_id" class="form-control">
                    @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">
                        {{ $subject->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Hari</label>
                <select name="day" class="form-control">
                    @foreach($days as $day)
                    <option value="{{ $day }}">
                        {{ $day }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Jam</label>
                <select name="time" class="form-control">
                    @foreach($times as $time)
                    <option value="{{ $time[0] }}-{{ $time[1] }}">
                        {{ $time[0] }} - {{ $time[1] }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Ruang</label>
                <select name="room" class="form-control">
                    @foreach($rooms as $room)
                    <option value="{{ $room }}">
                        {{ $room }}
                    </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('schedules.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>
@endsection