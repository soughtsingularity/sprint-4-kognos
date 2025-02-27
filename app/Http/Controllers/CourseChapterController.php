<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompleteChapterRequest;

class CourseChapterController extends Controller
{

    public function show(Course $course, $chapterIndex)
    {

        
        $chapters = $course->getChapters();
        $totalChapters = count($chapters);
        $user = auth()->user();
        $isAdmin = $user->role === 'admin'; 

        $userProgress = 100;

        if($user->role !== 'admin'){

                $userProgress = $user->courses()
                ->where('course_id', $course->id)
                ->first()
                ->pivot
                ->progress ?? 0;

                $requiredProgress = ($chapterIndex / $totalChapters) * 100;
                
            if ($userProgress < $requiredProgress) {
                return redirect()->route('courses.chapter', [$course, max(0, $chapterIndex -1)])
                    ->with('error', 'Debes completar el capítulo antes de continuar');
            }
        }

        return view('courses.chapter', compact('course', 'isAdmin', 'chapterIndex'));
    }

    public function completeChapter(CompleteChapterRequest $request, Course $course, $chapterIndex)
    {
        $user = Auth::user();
        $totalChapters = count($course->getChapters());

        $newProgress = (($chapterIndex + 1) / $totalChapters) * 100;

        $user->courses()->updateExistingPivot($course->id, [
            'progress' => $newProgress
        ]);

        return redirect()->route('courses.chapter', [$course, $chapterIndex + 1])
            ->with('success', 'Capítulo completado');
    }
}
