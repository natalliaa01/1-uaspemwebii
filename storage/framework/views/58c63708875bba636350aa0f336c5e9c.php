
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="h4 mb-0">Manajemen Pendaftaran</h2>
     <?php $__env->endSlot(); ?>

    <div class="container-fluid py-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pendaftaran</h6>
                    <a href="<?php echo e(route('registrations.create')); ?>" class="btn btn-primary btn-sm">Tambah Pendaftaran</a>
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

                <!--[if BLOCK]><![endif]--><?php if(session()->has('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

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
                            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($registration->id); ?></td>
                                    <td><?php echo e($registration->course->course_name); ?></td>
                                    <td><?php echo e($registration->participant->name); ?></td>
                                    <td><span class="badge bg-<?php echo e($registration->status == 'approved' ? 'success' : ($registration->status == 'pending' ? 'warning' : 'secondary')); ?>"><?php echo e(ucfirst($registration->status)); ?></span></td>
                                    <td><?php echo e($registration->created_at->format('d/m/Y H:i')); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('registrations.edit', $registration)); ?>" class="btn btn-sm btn-info">Edit</a>
                                        <button class="btn btn-sm btn-danger" wire:click="deleteRegistration(<?php echo e($registration->id); ?>)" wire:confirm="Anda yakin ingin menghapus pendaftaran ini?">Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada pendaftaran ditemukan.</td>
                                </tr>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <?php echo e($registrations->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php /**PATH C:\laragon\www\uaspemwebii\resources\views/livewire/registration/index.blade.php ENDPATH**/ ?>