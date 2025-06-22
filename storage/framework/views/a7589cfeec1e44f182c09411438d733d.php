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
        <h2 class="h4 mb-0">Tambah Kursus</h2>
     <?php $__env->endSlot(); ?>

    <div class="container-fluid py-4">
        
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kursus</h6>
            </div>

            <div class="card-body">
                <form wire:submit.prevent="save">
                    <div class="mb-3">
                        
                        <label for="course_name" class="form-label">Nama Kursus</label>
                        
                        <input id="course_name" wire:model="course_name" type="text" class="form-control <?php echo e($errors->has('course_name') ? 'is-invalid' : ''); ?>" />
                        
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['course_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback d-block"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="mb-3">
                        
                        <label for="duration" class="form-label">Durasi</label>
                        
                        <input id="duration" wire:model="duration" type="text" placeholder="e.g., 3 jam, 2 hari" class="form-control <?php echo e($errors->has('duration') ? 'is-invalid' : ''); ?>" />
                        
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback d-block"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="mb-3">
                        
                        <label for="instructor_id" class="form-label">Instruktur</label>
                        <select id="instructor_id" wire:model="instructor_id" class="form-select <?php echo e($errors->has('instructor_id') ? 'is-invalid' : ''); ?>">
                            <option value="">Pilih Instruktur</option>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($instructor->id); ?>"><?php echo e($instructor->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </select>
                        
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['instructor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback d-block"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="mb-3">
                        
                        <label for="cost" class="form-label">Biaya</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            
                            <input id="cost" wire:model="cost" type="number" step="0.01" min="0" class="form-control <?php echo e($errors->has('cost') ? 'is-invalid' : ''); ?>" />
                        </div>
                        
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['cost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback d-block"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-secondary me-2">Batal</a>
                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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
<?php endif; ?><?php /**PATH C:\laragon\www\uaspemwebii\resources\views/livewire/course/create.blade.php ENDPATH**/ ?>