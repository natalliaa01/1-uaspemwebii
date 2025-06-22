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
        <h2 class="h4 mb-0">Materi Kursus: <?php echo e($course->course_name); ?></h2>
     <?php $__env->endSlot(); ?>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-5">
                
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Upload Materi Baru</h6>
                    </div>

                    <div class="card-body">
                        <!--[if BLOCK]><![endif]--><?php if(session()->has('success')): ?>
                            
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e(session('success')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <form wire:submit.prevent="saveMaterial">
                            <div class="mb-3">
                                
                                <label for="title" class="form-label">Judul Materi</label>
                                
                                <input id="title" wire:model="title" type="text" class="form-control <?php echo e($errors->has('title') ? 'is-invalid' : ''); ?>" />
                                
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback d-block"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <div class="mb-3">
                                
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea id="description" wire:model="description" class="form-control <?php echo e($errors->has('description') ? 'is-invalid' : ''); ?>" rows="3"></textarea>
                                
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback d-block"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <div class="mb-3">
                                
                                <label for="file" class="form-label">File Materi (PDF, DOCX, PPTX, ZIP - Max 5MB)</label>
                                <input type="file" id="file" wire:model="file" class="form-control <?php echo e($errors->has('file') ? 'is-invalid' : ''); ?>">
                                
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback d-block"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                <div wire:loading wire:target="file">Mengunggah...</div>
                            </div>
                            <div class="d-flex justify-content-end">
                                
                                <button type="submit" class="btn btn-primary">Upload Materi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Materi Tersedia</h6>
                    </div>

                    <div class="card-body">
                        <!--[if BLOCK]><![endif]--><?php if($existing_materials->isEmpty()): ?>
                            <div class="text-center text-muted py-4">
                                <p class="mt-2">Belum ada materi untuk kursus ini.</p>
                            </div>
                        <?php else: ?>
                            <ul class="list-group list-group-flush">
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $existing_materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6><?php echo e($material->title); ?></h6>
                                            <small class="text-muted"><?php echo e($material->description); ?></small>
                                            <!--[if BLOCK]><![endif]--><?php if($material->file_path): ?>
                                                <div class="mt-1">
                                                    <a href="<?php echo e(Storage::url($material->file_path)); ?>" target="_blank" class="badge bg-secondary text-decoration-none">Lihat File</a>
                                                </div>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                        <button class="btn btn-sm btn-danger" wire:click="deleteMaterial(<?php echo e($material->id); ?>)" wire:confirm="Anda yakin ingin menghapus materi ini?">Hapus</button>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </ul>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
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
<?php endif; ?><?php /**PATH C:\laragon\www\uaspemwebii\resources\views/livewire/course/manage-materials.blade.php ENDPATH**/ ?>