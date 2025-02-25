<?php

namespace App\Livewire\Admin\Courses;

use Livewire\Component;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;

class CourseCreateForm extends Component
{
    public $title;
    public $description;
    public $content = [];

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
    
    public function save()
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
    
        Course::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'content' => json_encode($validatedData['content']) 
        ]);

        return redirect()->route('admin.courses.index')->with('succes', 'Curso creado con éxito');
    }

    public function render()
    {
        return view('livewire.admin.courses.course-create-form');
    }
}
