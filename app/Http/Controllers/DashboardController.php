<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\Course;
use App\Models\Room;
use App\Models\Schedule;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard dengan data statistik.
     */
    public function index()
    {
        // Menghitung total data dari setiap model
        $lecturerCount = Lecturer::count();
        $courseCount   = Course::count();
        $roomCount     = Room::count();
        $scheduleCount = Schedule::count();

        // Mengirim semua data yang sudah dihitung ke view
        return view('dashboard', compact(
            'lecturerCount',
            'courseCount',
            'roomCount',
            'scheduleCount'
        ));
    }
}
