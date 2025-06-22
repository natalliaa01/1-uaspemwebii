
    <x-slot name="header">
        <h2 class="h4 mb-0">Edit Instruktur</h2>
    </x-slot>

    <div class="container-fluid py-4">
        {{-- Mengganti <x-bal-card> dengan HTML Bootstrap biasa --}}
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Instruktur</h6>
            </div>

            <div class="card-body">
                <form wire:submit.prevent="save">
                    <div class="mb-3">
                        {{-- Mengganti <x-input-label> --}}
                        <label for="name" class="form-label">Nama Instruktur</label>
                        {{-- Mengganti <x-text-input> --}}
                        <input id="name" wire:model="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" />
                        {{-- Mengganti <x-input-error> --}}
                        @error('name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        {{-- Mengganti <x-input-label> --}}
                        <label for="email" class="form-label">Email Instruktur</label>
                        {{-- Mengganti <x-text-input> --}}
                        <input id="email" wire:model="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" />
                        {{-- Mengganti <x-input-error> --}}
                        @error('email') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('instructors.index') }}" class="btn btn-secondary me-2">Batal</a>
                        {{-- Mengganti <x-primary-button> --}}
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
