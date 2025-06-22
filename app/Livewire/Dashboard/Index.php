<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Course; // Pastikan model Course diimpor
use App\Models\Instructor; // Pastikan model Instructor diimpor
use App\Models\Registration; // Pastikan model Registration diimpor

class Index extends Component
{
    public $totalCourses;
    public $totalInstructors;
    public $totalRegistrations;

    public function mount()
    {
        $this->totalCourses = Course::count();
        $this->totalInstructors = Instructor::count();
        $this->totalRegistrations = Registration::count();
    }

    public function render()
    {
        return view('livewire.dashboard.index');
    }
}