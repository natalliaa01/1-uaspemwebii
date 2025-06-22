<x-slot name="header">
    <h2 class="h4 mb-0">Manajemen Peserta</h2>
</x-slot>

<div class="container-fluid py-4">
    <div class="card shadow">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Peserta</h6>
                <a href="{{ route('participants.create') }}" class="btn btn-primary btn-sm">Tambah Peserta</a>
            </div>
        </div>

        <div class="card-body">
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <input type="text" class="form-control w-25" placeholder="Cari peserta..." wire:model.live="search">
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
                        @forelse ($participants as $participant)
                            <tr>
                                <td>{{ $participant->id }}</td>
                                <td>{{ $participant->name }}</td>
                                <td>{{ $participant->email }}</td>
                                <td>
                                    <a href="{{ route('participants.edit', $participant) }}" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger" wire:click="deleteParticipant({{ $participant->id }})" wire:confirm="Anda yakin ingin menghapus peserta ini?">Hapus</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada peserta ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $participants->links() }}
            </div>
        </div>
    </div>
</div>