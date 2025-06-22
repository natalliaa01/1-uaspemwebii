<?php

namespace App\Livewire\Participant;

use App\Models\Participant;
use Livewire\Component;

class Edit extends Component
{
    public Participant $participant;
    public $name;
    public $email;

    public function mount(Participant $participant)
    {
        $this->participant = $participant;
        $this->name = $participant->name;
        $this->email = $participant->email;
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email,' . $this->participant->id,
        ];
    }

    public function save()
    {
        $this->validate();

        $this->participant->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Peserta berhasil diperbarui.');
        return redirect()->route('participants.index');
    }

    public function render()
    {
        return view('livewire.participant.edit')->layout('layouts.app', ['title' => 'Edit Peserta']);
    }
}