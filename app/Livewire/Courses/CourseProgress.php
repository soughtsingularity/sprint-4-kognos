<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseProgress extends Component
{
    public $course;
    public $chapters; 
    public $progress = 0;
    public $completedChapters = [];
    public $currentChapterIndex = 0;
    public $isAdmin;

    public function mount(Course $course, $isAdmin)
    {
        $this->course = $course;
        $this->chapters = $course->getChapters(); 
        $this->completedChapters = $this->loadCompletedChapters();
        $this->progress = $this->calculateProgress();
        $this->currentChapterIndex = 0; 
        $this->isAdmin = $isAdmin;
    }
    
    private function loadCompletedChapters()
    {
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
    
    public function markChapterComplete()
    {
        if (!in_array($this->currentChapterIndex, $this->completedChapters)) {
            $this->completedChapters[] = $this->currentChapterIndex;
        }
        $this->progress = $this->calculateProgress();
    
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
    
    public function completeCourse()
    {
        $this->progress = 100;
        $this->completedChapters = range(0, count($this->chapters) - 1);
    
        Auth::user()->courses()->updateExistingPivot($this->course->id, ['progress' => 100]);
        $this->assignMedal();
    }

    private function assignMedal()
    {
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
        $chapter = $this->chapters[$this->currentChapterIndex] ?? null;
    
        return view('livewire.courses.course-progress', [
            'chapter' => $chapter,
            'progress' => $this->progress
        ]);
    }
}

