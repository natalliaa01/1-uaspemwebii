<?php

namespace App\Livewire\Course;

use App\Models\Course;
use App\Models\Instructor;
use Livewire\Component;

class Create extends Component
{
    public $course_name;
    public $duration;
    public $instructor_id;
    public $cost;
    public $instructors;

    public function mount()
    {
        $this->instructors = Instructor::all();
    }

    protected $rules = [
        'course_name' => 'required|string|max:255',
        'duration' => 'required|string|max:255',
        'instructor_id' => 'required|exists:instructors,id',
        'cost' => 'required|numeric|min:0',
    ];

    public function save()
    {
        $this->validate();

        Course::create([
            'course_name' => $this->course_name,
            'duration' => $this->duration,
            'instructor_id' => $this->instructor_id,
            'cost' => $this->cost,
        ]);

        session()->flash('success', 'Kursus berhasil ditambahkan.');
        return redirect()->route('courses.index');
    }

    public function render()
    {
        return view('livewire.course.create')->layout('layouts.app', ['title' => 'Tambah Kursus']);
    }
}