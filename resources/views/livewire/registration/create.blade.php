
    <x-slot name="header">
        <h2 class="h4 mb-0">Tambah Pendaftaran</h2>
    </x-slot>

    <div class="container-fluid py-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pendaftaran</h6>
            </div>

            <div class="card-body">
                <form wire:submit.prevent="save">
                    <div class="mb-3">
                        <label for="course_id" class="form-label">Kursus</label>
                        <select id="course_id" wire:model="course_id" class="form-select {{ $errors->has('course_id') ? 'is-invalid' : '' }}">
                            <option value="">Pilih Kursus</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                            @endforeach
                        </select>
                        @error('course_id') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="participant_id" class="form-label">Peserta</label>
                        <select id="participant_id" wire:model="participant_id" class="form-select {{ $errors->has('participant_id') ? 'is-invalid' : '' }}">
                            <option value="">Pilih Peserta</option>
                            @foreach ($participants as $participant)
                                <option value="{{ $participant->id }}">{{ $participant->name }} ({{ $participant->email }})</option>
                            @endforeach
                        </select>
                        @error('participant_id') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Pendaftaran</label>
                        <select id="status" wire:model="status" class="form-select {{ $errors->has('status') ? 'is-invalid' : '' }}">
                            <option value="pending">Pending</option>
                            <option value="approved">Disetujui</option>
                            <option value="completed">Selesai</option>
                            <option value="cancelled">Dibatalkan</option>
                        </select>
                        @error('status') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('registrations.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
