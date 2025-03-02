<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseChapterController extends Controller
{

    public function show(Course $course, $chapterIndex)
    {

        
        $chapters = $course->getChapters();
        $totalChapters = count($chapters);
        $user = auth()->user();

        $userProgress = 100;

        if($user && $user->role !== 'admin'){

                $userProgress = $user->courses()
                ->where('course_id', $course->id)
                ->first()
                ->pivot
                ->progress ?? 0;

                $requiredProgress = ($chapterIndex / $totalChapters) * 100;
                
            if ($userProgress < $requiredProgress) {
                return redirect()->route('courses.chapter', [$course, max(0, $chapterIndex -1)])->with('error', 'Debes completar el capítulo antes de continuar');
            }
        }

        return view('courses.chapter', compact('course','chapterIndex'));
    }
}
