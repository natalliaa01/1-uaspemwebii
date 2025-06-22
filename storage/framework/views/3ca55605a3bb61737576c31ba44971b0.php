 <?php $__env->slot('header', null, []); ?> 
    <h2 class="h4 mb-0">Manajemen Peserta</h2>
 <?php $__env->endSlot(); ?>

<div class="container-fluid py-4">
    <div class="card shadow">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Peserta</h6>
                <a href="<?php echo e(route('participants.create')); ?>" class="btn btn-primary btn-sm">Tambah Peserta</a>
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($participant->id); ?></td>
                                <td><?php echo e($participant->name); ?></td>
                                <td><?php echo e($participant->email); ?></td>
                                <td>
                                    <a href="<?php echo e(route('participants.edit', $participant)); ?>" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger" wire:click="deleteParticipant(<?php echo e($participant->id); ?>)" wire:confirm="Anda yakin ingin menghapus peserta ini?">Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada peserta ditemukan.</td>
                            </tr>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <?php echo e($participants->links()); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\uaspemwebii\resources\views/livewire/participant/index.blade.php ENDPATH**/ ?>