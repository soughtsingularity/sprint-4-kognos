<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompleteChapterRequest;

class CourseProgress extends Component
{
    public $course;
    public $chapters; 
    public $progress = 0;
    public $completedChapters = [];
    public $currentChapterIndex = 0;
    public $lastChapter = false;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->chapters = $course->getChapters(); 
        $this->completedChapters = $this->loadCompletedChapters();
        $this->progress = $this->calculateProgress();
        $this->currentChapterIndex = 0; 
    }
    
    private function loadCompletedChapters()
    {
        if(!Auth::check()){
            return [];
        }

        $progressPercent = Auth::user()->courses()
            ->where('course_id', $this->course->id)
            ->first()
            ->pivot
            ->progress ?? 0;
    
        $total = count($this->chapters);
        $completedCount = (int) round(($progressPercent/100) * $total);
    
        return $completedCount > 0 ? range(0, $completedCount - 1) : [];
    }

    private function calculateProgress()
    {
        $total = count($this->chapters);
        $completed = count($this->completedChapters);
        if ($total === 0) return 0;
    
        return min(($completed / $total) * 100, 100);
    }

    public function calculateProgressToNextChapter()
    {
        $total = count($this->chapters);
        $completed = count($this->completedChapters);
        if ($total === 0) return 0;
    
        return min((($completed + 1) / $total) * 100, 100);
    }
    
    public function markChapterComplete()
    {
        if(!Auth::check()){
            return;
        }

        if (!in_array($this->currentChapterIndex, $this->completedChapters)) {
            $this->completedChapters[] = $this->currentChapterIndex;
        }

        $this->progress = $this->calculateProgress();

        if($this->currentChapterIndex + 1 === count($this->chapters)){
            $this->lastChapter = true;
        }
    
        Auth::user()->courses()->updateExistingPivot($this->course->id, ['progress' => $this->progress]);
    
        $this->assignMedal();
    }
    
    public function nextChapter()
    {
        if ($this->currentChapterIndex < count($this->chapters) - 1) {
            $this->currentChapterIndex++;
        }
    }
    
    
    public function previousChapter()
    {
        if ($this->currentChapterIndex > 0) {
            $this->currentChapterIndex--;
        }
    }

    public function completeChapter(CompleteChapterRequest $request, Course $course, $chapterIndex)
    {
        $user = Auth::user();
        $totalChapters = count($course->getChapters());

        $newProgress = (($chapterIndex + 1) / $totalChapters) * 100;

        $user->courses()->updateExistingPivot($course->id, [
            'progress' => $newProgress
        ]);

        return redirect()->route('courses.chapter', [$course, $chapterIndex + 1])->with('success', 'Capítulo completado');
    }
    
    public function completeCourse()
    {
        if(!Auth::check()){
            return;
        }

        $this->progress = 100;
        $this->completedChapters = range(0, count($this->chapters) - 1);
    
        Auth::user()->courses()->updateExistingPivot($this->course->id, ['progress' => 100]);
        $this->assignMedal();

        return redirect()->route('user.dashboard', Auth::user())->with('success', $this->course->title .'completado');
    }

    private function assignMedal()
    {
        if(!Auth::check()){
            return;
        }

        $medal = 'none';

        if ($this->progress >= 100) {
            $medal = 'gold';
        } elseif ($this->progress >= 75) {
            $medal = 'silver';
        } elseif ($this->progress >= 50) {
            $medal = 'bronze';
        }

        Auth::user()->courses()->updateExistingPivot($this->course->id, ['medal' => $medal]);
    }

    public function render()
    {
        return view('livewire.courses.course-progress', [
            'chapter' => $this->chapters[$this->currentChapterIndex] ?? null,
            'progress' => $this->progress,
            'completedChapters' => $this->completedChapters,
            'currentChapterIndex' => $this->currentChapterIndex, 
        ]);
    }
    
}

