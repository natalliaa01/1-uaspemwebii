<?php

namespace App\Livewire\Registration;

use App\Models\Registration;
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

    public function deleteRegistration(Registration $registration)
    {
        $registration->delete();
        session()->flash('success', 'Pendaftaran berhasil dihapus.');
    }

    public function render()
    {
        $registrations = Registration::query()
            ->with(['course', 'participant'])
            ->when($this->search, function ($query) {
                $query->whereHas('course', function ($q) {
                    $q->where('course_name', 'like', '%' . $this->search . '%');
                })->orWhereHas('participant', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->paginate($this->perPage);

        return view('livewire.registration.index', [
            'registrations' => $registrations,
        ])->layout('layouts.app', ['title' => 'Manajemen Pendaftaran']);
    }
}