<?php

namespace App\Livewire\Course;

use App\Models\Course;
use App\Models\Instructor;
use Livewire\Component;

class Edit extends Component
{
    public Course $course;
    public $course_name;
    public $duration;
    public $instructor_id;
    public $cost;
    public $instructors;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->course_name = $course->course_name;
        $this->duration = $course->duration;
        $this->instructor_id = $course->instructor_id;
        $this->cost = $course->cost;
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

        $this->course->update([
            'course_name' => $this->course_name,
            'duration' => $this->duration,
            'instructor_id' => $this->instructor_id,
            'cost' => $this->cost,
        ]);

        session()->flash('success', 'Kursus berhasil diperbarui.');
        return redirect()->route('courses.index');
    }

    public function render()
    {
        return view('livewire.course.edit')->layout('layouts.app', ['title' => 'Edit Kursus']);
    }
}