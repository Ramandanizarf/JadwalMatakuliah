<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Program;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('program')->get();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $programs = Program::all();
        return view('courses.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:courses,code',
            'name' => 'required',
            'credits' => 'required|integer',
            'program_id' => 'required|exists:programs,id',
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Mata kuliah berhasil ditambahkan');
    }

    public function edit(Course $course)
    {
        $programs = Program::all();
        return view('courses.edit', compact('course', 'programs'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'code' => 'required|unique:courses,code,'.$course->id,
            'name' => 'required',
            'credits' => 'required|integer',
            'program_id' => 'required|exists:programs,id',
        ]);

        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Mata kuliah berhasil diperbarui');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Mata kuliah berhasil dihapus');
    }
}
