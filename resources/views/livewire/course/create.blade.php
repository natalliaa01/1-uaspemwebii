
    <x-slot name="header">
        <h2 class="h4 mb-0">Tambah Kursus</h2>
    </x-slot>

    <div class="container-fluid py-4">
        {{-- Mengganti <x-bal-card> dengan HTML Bootstrap biasa --}}
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kursus</h6>
            </div>

            <div class="card-body">
                <form wire:submit.prevent="save">
                    <div class="mb-3">
                        {{-- Mengganti <x-input-label> --}}
                        <label for="course_name" class="form-label">Nama Kursus</label>
                        {{-- Mengganti <x-text-input> --}}
                        <input id="course_name" wire:model="course_name" type="text" class="form-control {{ $errors->has('course_name') ? 'is-invalid' : '' }}" />
                        {{-- Mengganti <x-input-error> --}}
                        @error('course_name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        {{-- Mengganti <x-input-label> --}}
                        <label for="duration" class="form-label">Durasi</label>
                        {{-- Mengganti <x-text-input> --}}
                        <input id="duration" wire:model="duration" type="text" placeholder="e.g., 3 jam, 2 hari" class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" />
                        {{-- Mengganti <x-input-error> --}}
                        @error('duration') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        {{-- Mengganti <x-input-label> --}}
                        <label for="instructor_id" class="form-label">Instruktur</label>
                        <select id="instructor_id" wire:model="instructor_id" class="form-select {{ $errors->has('instructor_id') ? 'is-invalid' : '' }}">
                            <option value="">Pilih Instruktur</option>
                            @foreach ($instructors as $instructor)
                                <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                            @endforeach
                        </select>
                        {{-- Mengganti <x-input-error> --}}
                        @error('instructor_id') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        {{-- Mengganti <x-input-label> --}}
                        <label for="cost" class="form-label">Biaya</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            {{-- Mengganti <x-text-input> --}}
                            <input id="cost" wire:model="cost" type="number" step="0.01" min="0" class="form-control {{ $errors->has('cost') ? 'is-invalid' : '' }}" />
                        </div>
                        {{-- Mengganti <x-input-error> --}}
                        @error('cost') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary me-2">Batal</a>
                        {{-- Mengganti <x-primary-button> --}}
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
