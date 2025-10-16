<?php

namespace App\Http\Controllers;

use App\Models\Timeslot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    public function index()
    {
        $timeslots = Timeslot::all();
        return view('timeslots.index', compact('timeslots'));
    }

    public function create()
    {
        return view('timeslots.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Timeslot::create($request->all());
        return redirect()->route('timeslots.index')->with('success', 'Slot waktu berhasil ditambahkan');
    }

    public function edit(Timeslot $timeslot)
    {
        return view('timeslots.edit', compact('timeslot'));
    }

    public function update(Request $request, Timeslot $timeslot)
    {
        $request->validate([
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $timeslot->update($request->all());
        return redirect()->route('timeslots.index')->with('success', 'Slot waktu berhasil diperbarui');
    }

    public function destroy(Timeslot $timeslot)
    {
        $timeslot->delete();
        return redirect()->route('timeslots.index')->with('success', 'Slot waktu berhasil dihapus');
    }
}
