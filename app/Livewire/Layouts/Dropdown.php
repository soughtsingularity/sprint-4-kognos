<?php

namespace App\Livewire\Layouts;

use Livewire\Component;

class Dropdown extends Component
{
    public $isOpen = false;

    public function toggleDropdown()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function closeDropdown()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.layouts.dropdown');
    }
}


