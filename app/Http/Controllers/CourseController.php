<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;

class CourseController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $isAdmin = $user->role === 'admin'; 
        $courses = Course::all(); 
    
        return view('courses.index', compact('courses', 'isAdmin'));
    }
    

    # User Actions
    public function enroll(Course $course)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return back()->with('error', 'Los administradores no pueden inscribirse en cursos.');
        }        

        if(!$user->courses()->where('course_id', $course->id)->exists()){
            $user->courses()->attach($course->id, ['progress' =>0 , 'medal'=> 'none']);
            return back()->with('succes', 'Te has apuntado al curso');
        }

        return back()->with('error', 'Ya estás apuntado en el curso');
    }

    public function unenroll(Course $course)
    {
        $user = Auth::user();

        if($user->courses()->where('course_id', $course->id)->exists()){
            $user->courses()->detach($course->id);
            return back()->with('succes', 'Te has desapuntado del curso');
        }

        return back()->with('error', 'No estabas inscrito en este curso');


    }

    # Admin Actions
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
