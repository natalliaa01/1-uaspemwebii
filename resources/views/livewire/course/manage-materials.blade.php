
    <x-slot name="header">
        <h2 class="h4 mb-0">Materi Kursus: {{ $course->course_name }}</h2>
    </x-slot>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-5">
                {{-- Mengganti <x-bal-card> dengan HTML Bootstrap biasa --}}
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Upload Materi Baru</h6>
                    </div>

                    <div class="card-body">
                        @if (session()->has('success'))
                            {{-- Mengganti <x-bal-alert> --}}
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form wire:submit.prevent="saveMaterial">
                            <div class="mb-3">
                                {{-- Mengganti <x-input-label> --}}
                                <label for="title" class="form-label">Judul Materi</label>
                                {{-- Mengganti <x-text-input> --}}
                                <input id="title" wire:model="title" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" />
                                {{-- Mengganti <x-input-error> --}}
                                @error('title') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                {{-- Mengganti <x-input-label> --}}
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea id="description" wire:model="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="3"></textarea>
                                {{-- Mengganti <x-input-error> --}}
                                @error('description') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                {{-- Mengganti <x-input-label> --}}
                                <label for="file" class="form-label">File Materi (PDF, DOCX, PPTX, ZIP - Max 5MB)</label>
                                <input type="file" id="file" wire:model="file" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}">
                                {{-- Mengganti <x-input-error> --}}
                                @error('file') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                <div wire:loading wire:target="file">Mengunggah...</div>
                            </div>
                            <div class="d-flex justify-content-end">
                                {{-- Mengganti <x-primary-button> --}}
                                <button type="submit" class="btn btn-primary">Upload Materi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                {{-- Mengganti <x-bal-card> dengan HTML Bootstrap biasa --}}
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Materi Tersedia</h6>
                    </div>

                    <div class="card-body">
                        @if($existing_materials->isEmpty())
                            <div class="text-center text-muted py-4">
                                <p class="mt-2">Belum ada materi untuk kursus ini.</p>
                            </div>
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach($existing_materials as $material)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6>{{ $material->title }}</h6>
                                            <small class="text-muted">{{ $material->description }}</small>
                                            @if($material->file_path)
                                                <div class="mt-1">
                                                    <a href="{{ Storage::url($material->file_path) }}" target="_blank" class="badge bg-secondary text-decoration-none">Lihat File</a>
                                                </div>
                                            @endif
                                        </div>
                                        <button class="btn btn-sm btn-danger" wire:click="deleteMaterial({{ $material->id }})" wire:confirm="Anda yakin ingin menghapus materi ini?">Hapus</button>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
