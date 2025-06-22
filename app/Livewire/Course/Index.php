<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteCourse(Course $course)
    {
        $course->delete();
        session()->flash('success', 'Kursus berhasil dihapus.');
    }

    public function render()
    {
        $courses = Course::query()
            ->with('instructor')
            ->when($this->search, function ($query) {
                $query->where('course_name', 'like', '%' . $this->search . '%')
                      ->orWhereHas('instructor', function ($q) {
                          $q->where('name', 'like', '%' . $this->search . '%');
                      });
            })
            ->paginate($this->perPage);

        return view('livewire.course.index', [
            'courses' => $courses,
        ])->layout('layouts.app', ['title' => 'Manajemen Kursus']);
    }
}