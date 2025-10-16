<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LecturerController extends Controller
{
    /**
     * Menampilkan daftar semua dosen.
     * INI METHOD YANG HILANG.
     */
    public function index()
    {
        $lecturers = Lecturer::all();
        return view('lecturers.index', compact('lecturers'));
    }

    /**
     * Menampilkan form untuk membuat dosen baru.
     */
    public function create()
    {
        return view('lecturers.create');
    }

    /**
     * Menyimpan dosen baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nidn' => 'required|unique:lecturers,nidn',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:lecturers,email',
            'phone' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $validatedData['photo_path'] = $path;
        }

        Lecturer::create($validatedData);
        return redirect()->route('lecturers.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data dosen.
     */
    public function edit(Lecturer $lecturer)
    {
        return view('lecturers.edit', compact('lecturer'));
    }

    /**
     * Memperbarui data dosen di database.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $validatedData = $request->validate([
            'nidn' => 'required|unique:lecturers,nidn,'.$lecturer->id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:lecturers,email,'.$lecturer->id,
            'phone' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($lecturer->photo_path) {
                Storage::disk('public')->delete($lecturer->photo_path);
            }
            $path = $request->file('photo')->store('photos', 'public');
            $validatedData['photo_path'] = $path;
        }

        $lecturer->update($validatedData);
        return redirect()->route('lecturers.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    /**
     * Menghapus data dosen dari database.
     */
    public function destroy(Lecturer $lecturer)
    {
        if ($lecturer->photo_path) {
            Storage::disk('public')->delete($lecturer->photo_path);
        }

        $lecturer->delete();
        return redirect()->route('lecturers.index')->with('success', 'Dosen berhasil dihapus.');
    }
}

