<?php

namespace App\Livewire\Registration;

use App\Models\Course;
use App\Models\Participant;
use App\Models\Registration;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public Registration $registration;
    public $course_id;
    public $participant_id;
    public $status;
    public $courses;
    public $participants;

    public function mount(Registration $registration)
    {
        $this->registration = $registration;
        $this->course_id = $registration->course_id;
        $this->participant_id = $registration->participant_id;
        $this->status = $registration->status;
        $this->courses = Course::all();
        $this->participants = Participant::all();
    }

    protected function rules()
    {
        return [
            'course_id' => ['required', 'exists:courses,id', Rule::unique('registrations')->where(function ($query) {
                return $query->where('participant_id', $this->participant_id);
            })->ignore($this->registration->id)],
            'participant_id' => 'required|exists:participants,id',
            'status' => 'required|in:pending,approved,completed,cancelled',
        ];
    }

    protected $messages = [
        'course_id.unique' => 'Peserta ini sudah terdaftar di kursus yang sama.',
    ];

    public function save()
    {
        $this->validate();

        $this->registration->update([
            'course_id' => $this->course_id,
            'participant_id' => $this->participant_id,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Pendaftaran berhasil diperbarui.');
        return redirect()->route('registrations.index');
    }

    public function render()
    {
        return view('livewire.registration.edit')->layout('layouts.app', ['title' => 'Edit Pendaftaran']);
    }
}