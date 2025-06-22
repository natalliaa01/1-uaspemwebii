<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">Manajemen Instruktur</h2>
    </x-slot>

    <div class="container-fluid py-4">
        {{-- Mengganti <x-bal-card> dengan HTML Bootstrap biasa --}}
        <div class="card shadow"> {{-- Ini menggantikan <x-bal-card> --}}
            <div class="card-header py-3"> {{-- Ini menggantikan <x-slot name="header"> --}}
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Instruktur</h6>
                    <a href="{{ route('instructors.create') }}" class="btn btn-primary btn-sm">Tambah Instruktur</a>
                </div>
            </div>

            <div class="card-body"> {{-- Ini menggantikan isi utama dari <x-bal-card> --}}
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <input type="text" class="form-control w-25" placeholder="Cari instruktur..." wire:model.live="search">
                    <select class="form-select w-auto" wire:model.live="perPage">
                        <option value="10">10 per halaman</option>
                        <option value="25">25 per halaman</option>
                        <option value="50">50 per halaman</option>
                    </select>
                </div>

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($instructors as $instructor)
                                <tr>
                                    <td>{{ $instructor->id }}</td>
                                    <td>{{ $instructor->name }}</td>
                                    <td>{{ $instructor->email }}</td>
                                    <td>
                                        <a href="{{ route('instructors.edit', $instructor) }}" class="btn btn-sm btn-info">Edit</a>
                                        <button class="btn btn-sm btn-danger" wire:click="deleteInstructor({{ $instructor->id }})" wire:confirm="Anda yakin ingin menghapus instruktur ini?">Hapus</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada instruktur ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $instructors->links() }}
                </div>
            </div>
        </div> {{-- Penutup div card --}}
    </div>
</x-app-layout>