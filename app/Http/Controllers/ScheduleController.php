<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Room;
use App\Models\Timeslot;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['course', 'lecturer', 'room', 'timeslot'])->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        // Ambil semua data yang diperlukan untuk dropdown
        $courses = Course::all();
        $lecturers = Lecturer::all();
        $rooms = Room::all();
        $timeslots = Timeslot::all();
        return view('schedules.create', compact('courses', 'lecturers', 'rooms', 'timeslots'));
    }

    /**
     * Method ini yang menangani penyimpanan data dari form Anda.
     */
    public function store(Request $request)
    {
        // Lakukan validasi pada input
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'lecturer_id' => 'required|exists:lecturers,id',
            'room_id' => 'required|exists:rooms,id',
            'timeslot_id' => 'required|exists:timeslots,id',
            'semester' => 'nullable|string|max:255',
            'class' => 'nullable|string|max:255',
        ]);

        // Buat jadwal baru dengan data yang sudah divalidasi
        Schedule::create($validatedData);

        return redirect()->route('schedules.index')->with('success', 'Jadwal baru berhasil ditambahkan.');
    }

    public function edit(Schedule $schedule)
    {
        $courses = Course::all();
        $lecturers = Lecturer::all();
        $rooms = Room::all();
        $timeslots = Timeslot::all();
        return view('schedules.edit', compact('schedule', 'courses', 'lecturers', 'rooms', 'timeslots'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'lecturer_id' => 'required|exists:lecturers,id',
            'room_id' => 'required|exists:rooms,id',
            'timeslot_id' => 'required|exists:timeslots,id',
            'semester' => 'nullable|string|max:255',
            'class' => 'nullable|string|max:255',
        ]);

        $schedule->update($validatedData);
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
