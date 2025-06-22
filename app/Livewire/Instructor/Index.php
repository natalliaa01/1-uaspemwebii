<?php

namespace App\Livewire\Instructor;

use App\Models\Instructor;
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

    public function deleteInstructor(Instructor $instructor)
    {
        $instructor->delete();
        session()->flash('success', 'Instruktur berhasil dihapus.');
    }

    public function render()
    {
        $instructors = Instructor::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->perPage);

        return view('livewire.instructor.index', [
            'instructors' => $instructors,
        ])->layout('layouts.app', ['title' => 'Manajemen Instruktur']); // Menggunakan layout BAL Kit
    }
}