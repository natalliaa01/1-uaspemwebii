<?php

namespace App\Livewire\Course;

use App\Models\Course;
use App\Models\Material;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageMaterials extends Component
{
    use WithFileUploads;

    public Course $course;
    public $title;
    public $description;
    public $file;
    public $existing_materials;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,zip|max:5120', // Max 5MB
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->loadMaterials();
    }

    public function loadMaterials()
    {
        $this->existing_materials = $this->course->materials;
    }

    public function saveMaterial()
    {
        $this->validate();

        $filePath = null;
        if ($this->file) {
            $filePath = $this->file->store('materials', 'public');
        }

        $this->course->materials()->create([
            'title' => $this->title,
            'description' => $this->description,
            'file_path' => $filePath,
        ]);

        $this->reset(['title', 'description', 'file']);
        $this->loadMaterials();
        session()->flash('success', 'Materi berhasil diunggah.');
    }

    public function deleteMaterial(Material $material)
    {
        if ($material->file_path) {
            \Storage::disk('public')->delete($material->file_path);
        }
        $material->delete();
        $this->loadMaterials();
        session()->flash('success', 'Materi berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.course.manage-materials')->layout('layouts.app', ['title' => 'Materi Kursus: ' . $this->course->course_name]);
    }
}