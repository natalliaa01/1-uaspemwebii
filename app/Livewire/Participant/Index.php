<?php

namespace App\Livewire\Participant;

use App\Models\Participant;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = ['search' => ['except' => ''], 'perPage'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteParticipant(Participant $participant)
    {
        $participant->delete();
        session()->flash('success', 'Peserta berhasil dihapus.');
    }

    public function render()
    {
        $participants = Participant::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->perPage);

        return view('livewire.participant.index', [
            'participants' => $participants,
        ])->layout('layouts.app', ['title' => 'Manajemen Peserta']);
    }
}