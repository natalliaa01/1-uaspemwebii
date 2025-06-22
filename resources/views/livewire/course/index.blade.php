<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">Manajemen Kursus</h2>
    </x-slot>

    <div class="container-fluid py-4">
        {{-- Mengganti <x-bal-card> dengan HTML Bootstrap biasa --}}
        <div class="card shadow">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kursus</h6>
                    <a href="{{ route('courses.create') }}" class="btn btn-primary btn-sm">Tambah Kursus</a>
                </div>
            </div>

            <div class="card-body">
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <input type="text" class="form-control w-25" placeholder="Cari kursus..." wire:model.live="search">
                    <select class="form-select w-auto" wire:model.live="perPage">
                        <option value="10">10 per halaman</option>
                        <option value="25">25 per halaman</option>
                        <option value="50">50 per halaman</option>
                    </select>
                </div>

                @if (session()->has('success'))
                    {{-- Mengganti <x-bal-alert> --}}
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
                                <th>Nama Kursus</th>
                                <th>Durasi</th>
                                <th>Instruktur</th>
                                <th>Biaya</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($courses as $course)
                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->course_name }}</td>
                                    <td>{{ $course->duration }}</td>
                                    <td>{{ $course->instructor->name }}</td>
                                    <td>Rp{{ number_format($course->cost, 2, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-info">Edit</a>
                                        <button class="btn btn-sm btn-danger" wire:click="deleteCourse({{ $course->id }})" wire:confirm="Anda yakin ingin menghapus kursus ini?">Hapus</button>
                                        <a href="{{ route('courses.materials', $course) }}" class="btn btn-sm btn-secondary">Materi</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada kursus ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </x-app-layout>