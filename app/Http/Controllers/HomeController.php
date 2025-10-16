<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil peran dari pengguna yang sedang login
        $userRole = Auth::user()->role;
        
     
        
        $adminRoles = ['admin', 'petugas', 'dosen'];

        if (in_array($userRole, $adminRoles)) {
            return redirect()->route('dashboard');
        } else {
            $schedules = Schedule::with(['course', 'lecturer', 'room', 'timeslot'])->get();
            return view('user_dashboard', ['schedules' => $schedules]);
        }
    }
}

