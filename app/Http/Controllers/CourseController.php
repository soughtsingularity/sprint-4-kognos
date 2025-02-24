<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }


    public function create()
    {
        return view('admin.courses.create');
    }

 
    public function store(StoreCourseRequest $request)
    {
        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.courses.index')->with('succes', 'Curso creado correcamente');
    }


    public function show(Course $course)
    {
        //
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(StoreCourseRequest $request, Course $course)
    {
        $course->update($request->all());

        return redirect()->route('admin.courses.index')->with('succes', 'Curso actualizado correcamente');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('succes', 'Curso eliminado correcamente');
    }
}
