<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Livewire\Component;

class ParticipantCount extends Component
{
    public $courses;

    public function mount()
    {
        $this->courses = Course::withCount('registrations')->get();
    }

    public function render()
    {
        return view('livewire.course.participant-count')->layout('layouts.app', ['title' => 'Jumlah Peserta per Kursus']);
    }
}