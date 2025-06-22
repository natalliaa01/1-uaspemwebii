<?php

namespace App\Livewire\Instructor;

use App\Models\Instructor;
use Livewire\Component;

class Edit extends Component
{
    public Instructor $instructor;
    public $name;
    public $email;

    public function mount(Instructor $instructor)
    {
        $this->instructor = $instructor;
        $this->name = $instructor->name;
        $this->email = $instructor->email;
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email,' . $this->instructor->id,
        ];
    }

    public function save()
    {
        $this->validate();

        $this->instructor->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Instruktur berhasil diperbarui.');
        return redirect()->route('instructors.index');
    }

    public function render()
    {
        return view('livewire.instructor.edit')->layout('layouts.app', ['title' => 'Edit Instruktur']);
    }
}