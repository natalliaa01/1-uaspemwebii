<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="h4 mb-0">Manajemen Kursus</h2>
     <?php $__env->endSlot(); ?>

    <div class="container-fluid py-4">
        
        <div class="card shadow">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kursus</h6>
                    <a href="<?php echo e(route('courses.create')); ?>" class="btn btn-primary btn-sm">Tambah Kursus</a>
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
                                <th>Nama Kursus</th>
                                <th>Durasi</th>
                                <th>Instruktur</th>
                                <th>Biaya</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($course->id); ?></td>
                                    <td><?php echo e($course->course_name); ?></td>
                                    <td><?php echo e($course->duration); ?></td>
                                    <td><?php echo e($course->instructor->name); ?></td>
                                    <td>Rp<?php echo e(number_format($course->cost, 2, ',', '.')); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('courses.edit', $course)); ?>" class="btn btn-sm btn-info">Edit</a>
                                        <button class="btn btn-sm btn-danger" wire:click="deleteCourse(<?php echo e($course->id); ?>)" wire:confirm="Anda yakin ingin menghapus kursus ini?">Hapus</button>
                                        <a href="<?php echo e(route('courses.materials', $course)); ?>" class="btn btn-sm btn-secondary">Materi</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada kursus ditemukan.</td>
                                </tr>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <?php echo e($courses->links()); ?>

                </div>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\uaspemwebii\resources\views/livewire/course/index.blade.php ENDPATH**/ ?>