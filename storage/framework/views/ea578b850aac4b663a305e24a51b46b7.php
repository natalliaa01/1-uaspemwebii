<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<body class="bal-kit">
    <div class="min-vh-100 d-flex flex-column">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand fw-semibold" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'SISTEM KURSUS')); ?>

                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/')); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?>

                                </a>
                                <ul class="dropdown-menu">
                                    <!--[if BLOCK]><![endif]--><?php if(Route::has('profile.edit')): ?>
                                        <li><a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>">Profile</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <!--[if BLOCK]><![endif]--><?php if(Route::has('logout')): ?>
                                        <li>
                                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="dropdown-item">Logout</button>
                                            </form>
                                        </li>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </ul>
                            </li>
                        <?php else: ?>
                            <!--[if BLOCK]><![endif]--><?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                                </li>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
                                </li>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <!--[if BLOCK]><![endif]--><?php if(isset($header)): ?>
            <header class="bg-white shadow-sm">
                <div class="container py-3">
                    <?php echo e($header); ?>

                </div>
            </header>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!-- Flash Messages -->
        <!--[if BLOCK]><![endif]--><?php if(session('success')): ?>
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php if(session('error')): ?>
            <div class="container mt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php if($errors->any()): ?>
            <div class="container mt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!-- Page Content -->
        <main class="flex-grow-1">
            <?php echo e($slot ?? ($content ?? '')); ?>

        </main>

        <!-- Footer -->
        <footer class="bg-light border-top py-4 mt-auto">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-muted mb-0">&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Laravel')); ?>. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <small class="text-muted">
                            Built with <span class="text-danger">&hearts;</span> using
                            <span class="text-primary fw-semibold">BAL Kit</span>
                        </small>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH C:\laragon\www\uaspemwebii\resources\views/layouts/app.blade.php ENDPATH**/ ?>