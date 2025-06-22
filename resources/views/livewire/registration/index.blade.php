<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">Manajemen Pendaftaran</h2>
    </x-slot>

    <div class="container-fluid py-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pendaftaran</h6>
                    <a href="{{ route('registrations.create') }}" class="btn btn-primary btn-sm">Tambah Pendaftaran</a>
                </div>
            </div>

            <div class="card-body">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <input type="text" class="form-control w-25" placeholder="Cari pendaftaran..." wire:model.live="search">
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
                                <th>Kursus</th>
                                <th>Peserta</th>
                                <th>Status</th>
                                <th>Tanggal Daftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($registrations as $registration)
                                <tr>
                                    <td>{{ $registration->id }}</td>
                                    <td>{{ $registration->course->course_name }}</td>
                                    <td>{{ $registration->participant->name }}</td>
                                    <td><span class="badge bg-{{ $registration->status == 'approved' ? 'success' : ($registration->status == 'pending' ? 'warning' : 'secondary') }}">{{ ucfirst($registration->status) }}</span></td>
                                    <td>{{ $registration->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('registrations.edit', $registration) }}" class="btn btn-sm btn-info">Edit</a>
                                        <button class="btn btn-sm btn-danger" wire:click="deleteRegistration({{ $registration->id }})" wire:confirm="Anda yakin ingin menghapus pendaftaran ini?">Hapus</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada pendaftaran ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $registrations->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>