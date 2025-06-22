 <?php $__env->slot('header', null, []); ?> 
    <h2 class="h4 mb-0">Tambah Peserta</h2>
 <?php $__env->endSlot(); ?>

<div class="container-fluid py-4">
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Peserta</h6>
        </div>

        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Peserta</label>
                    <input id="name" wire:model="name" type="text" class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback d-block"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Peserta</label>
                    <input id="email" wire:model="email" type="email" class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" />
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback d-block"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="d-flex justify-content-end">
                    <a href="<?php echo e(route('participants.index')); ?>" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\uaspemwebii\resources\views/livewire/participant/create.blade.php ENDPATH**/ ?>