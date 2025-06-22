<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">Jumlah Peserta per Kursus</h2>
    </x-slot>

    <div class="container-fluid py-4">
        {{-- Mengganti <x-bal-card> dengan HTML Bootstrap biasa --}}
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Peserta Kursus</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kursus</th>
                                <th>Instruktur</th>
                                <th>Jumlah Peserta Terdaftar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($courses as $course)
                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->course_name }}</td>
                                    <td>{{ $course->instructor->name }}</td>
                                    <td><span class="badge bg-primary">{{ $course->registrations_count }}</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada kursus tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>