<x-slot name="header">
    <h2 class="h4 mb-0">Tambah Peserta</h2>
</x-slot>

<div class="container-fluid py-4">
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Peserta</h6>
        </div>

        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Peserta</label>
                    <input id="name" wire:model="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" />
                    @error('name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Peserta</label>
                    <input id="email" wire:model="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" />
                    @error('email') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('participants.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>