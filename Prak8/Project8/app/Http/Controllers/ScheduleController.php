<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    private $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

    private $times = [
        ['08:00', '10:00'],
        ['10:00', '12:00'],
        ['13:00', '15:00'],
        ['15:00', '17:00'],
        ];
    
    private $rooms = ['1.1', '1.2', '1.3', '1.4', 
                      '2.1', '2.2', '2.3', '2.4'];

    public function index() {
        $schedules = Schedule::with('subject')->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create() {
        $subjects = Subject::all();
        return view('schedules.create', [
            'subjects' => $subjects,
            'days' => $this->days,
            'times' => $this->times,
            'rooms' => $this->rooms,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'subject_id' => 'required',
            'day' => 'required',
            'time' => 'required',
            'room' => 'required',
        ]);

        if (!$request->time || !str_contains($request->time, '-')) {
            return back()->with('error', 'Format jam salah');
        }
        [$start, $end] = array_map('trim', explode('-', $request->time));

        $exists = Schedule::where('day', $request->day)
            ->where('room', $request->room)
            ->where('start', $start)
            ->where('end', $end)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Jadwal bentrok dengan jadwal lain.');
        }

        Schedule::create([
            'subject_id' => $request->subject_id,
            'day' => $request->day,
            'start' => $start,
            'end' => $end,
            'room' => $request->room,
        ]);

        return redirect()->route('schedules.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id) {
        $schedule = Schedule::findOrFail($id);
        $subjects = Subject::all();

        return view('schedules.edit', [
            'schedule' => $schedule,
            'subjects' => $subjects,
            'days' => $this->days,
            'times' => $this->times,
            'rooms' => $this->rooms,
        ]);
    }

    public function update(Request $request, $id) {
        $schedule = Schedule::findOrFail($id);

        $request->validate([
            'subject_id' => 'required',
            'day' => 'required',
            'time' => 'required',
            'room' => 'required',
        ],
        [   'subject_id.required' => "Mat"

            ]
        );

        if (!$request->time || !str_contains($request->time, '-')) {
            return back()->with('error', 'Format jam salah');
        }

        [$start, $end] = array_map('trim', explode('-', $request->time));

        $schedule->update([
            'subject_id' => $request->subject_id,
            'day' => $request->day,
            'start' => $start,
            'end' => $end,
            'room' => $request->room,
        ]);

        return redirect()->route('schedules.index')
                ->with('success', 'Jadwal berhasil diupdate');

    }

    public function destroy($id) {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('schedules.index');
    }

}
