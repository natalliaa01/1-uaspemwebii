<?php

namespace App\Livewire\Participant;

use App\Models\Participant;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $email;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:participants,email',
    ];

    public function save()
    {
        $this->validate();

        Participant::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Peserta berhasil ditambahkan.');
        return redirect()->route('participants.index');
    }

    public function render()
    {
        return view('livewire.participant.create')->layout('layouts.app', ['title' => 'Tambah Peserta']);
    }
}