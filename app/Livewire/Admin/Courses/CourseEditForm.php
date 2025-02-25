<?php

namespace App\Livewire\Admin\Courses;

use Livewire\Component;
use App\Models\Course;

class CourseEditForm extends Component
{
    public $course;
    public $title;
    public $description;
    public $content = [];

    public function mount($courseId)
    {
        $this->course = Course::findOrFail($courseId); // Buscar el curso por ID
        $this->title = $this->course->title;
        $this->description = $this->course->description;
        $this->content = json_decode($this->course->content, true);
    }

    public function addChapter()
    {
        $this->content[] = [
            'chapter' => count($this->content) + 1,
            'title' => '',
            'videos' => []
        ];
    }

    public function removeChapter($index)
    {
        unset($this->content[$index]);
        $this->content = array_values($this->content);
    }

    public function addVideo($chapterIndex)
    {
        $this->content[$chapterIndex]['videos'][] = ['title' => '', 'url' => ''];
    }

    public function removeVideo($chapterIndex, $videoIndex)
    {
        unset($this->content[$chapterIndex]['videos'][$videoIndex]);
        $this->content[$chapterIndex]['videos'] = array_values($this->content[$chapterIndex]['videos']);
    }

    private function convertYoutubeUrl($url)
    {
        $pattern = '/(?:youtube\\.com\\/.*(?:\\?|&)v=|youtu\\.be\\/)([a-zA-Z0-9_-]+)/';
        
        if (preg_match($pattern, $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        if (preg_match('/youtube\.com\/playlist\?list=([a-zA-Z0-9_-]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/videoseries?list=' . $matches[1];
        }
    
        return $url;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|min:5|max:255',
            'description' => 'required|string|min:5|max:255',
            'content' => 'required|array|min:1',
            'content.*.title' => 'required|string|min:5|max:255',
            'content.*.videos' => 'required|array|min:1',
            'content.*.videos.*.title' => 'required|string|min:5|max:255',
            'content.*.videos.*.url' => 'required|url',
        ]);

        foreach ($validatedData['content'] as &$chapter) {
            foreach ($chapter['videos'] as &$video) {
                $video['url'] = $this->convertYoutubeUrl($video['url']);
            }
        }

        $this->course->update([
            'title' => $this->title,
            'description' => $this->description,
            'content' => json_encode($this->content),
        ]);
        
        return redirect()->route('admin.courses.index')->with('success', 'Curso actualizado correctamente');
    }
    public function render()
    {
        return view('livewire.admin.courses.course-edit-form');
    }
}
