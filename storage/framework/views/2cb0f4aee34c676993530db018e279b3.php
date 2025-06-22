
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="h4 mb-0">Jumlah Peserta per Kursus</h2>
     <?php $__env->endSlot(); ?>

    <div class="container-fluid py-4">
        
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
                            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($course->id); ?></td>
                                    <td><?php echo e($course->course_name); ?></td>
                                    <td><?php echo e($course->instructor->name); ?></td>
                                    <td><span class="badge bg-primary"><?php echo e($course->registrations_count); ?></span></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada kursus tersedia.</td>
                                </tr>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH C:\laragon\www\uaspemwebii\resources\views/livewire/course/participant-count.blade.php ENDPATH**/ ?>