@extends('layouts.app')

@section('content')

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<h2>Edit Jadwal</h2>

<div class="card">
    <div class="card-body">
        <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Mata Kuliah</label>
                <select name="subject_id" class="form-control">
                    @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}"
                        {{ $schedule->subject_id == $subject->id ? 'selected' : ''}}>
                        {{ $subject->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Hari</label>
                <select name="day" class="form-control">
                    @foreach($days as $day)
                    <option value="{{ $day }}"
                        {{ $schedule->day == $day ? 'selected' : '' }}>
                        {{ $day }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Jam</label>
                <select name="time" class="form-control">
                    @foreach($times as $t)
                    <option value="{{ $t[0] }}-{{ $t[1] }}"
                        {{ ($schedule->start . '-' . $schedule->end) == $t[0] . '-' . $t[1] ? 'selected' : '' }}>
                        {{ $t[0] }} - {{ $t[1] }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Ruang</label>
                <select name="room" class="form-control">
                    @foreach($rooms as $room)
                    <option value="{{ $room }}"
                        {{ $schedule->room == $room ? 'selected' : '' }}>
                        {{ $room }}
                    </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
