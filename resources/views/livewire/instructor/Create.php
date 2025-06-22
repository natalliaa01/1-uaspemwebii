<?php

namespace App\Livewire\Instructor;

use App\Models\Instructor;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $email;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:instructors,email',
    ];

    public function save()
    {
        $this->validate();

        Instructor::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Instruktur berhasil ditambahkan.');
        return redirect()->route('instructors.index');
    }

    public function render()
    {
        return view('livewire.instructor.create')->layout('layouts.app', ['title' => 'Tambah Instruktur']);
    }
}