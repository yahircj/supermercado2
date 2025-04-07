<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name')); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body>
    <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="container py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> <!-- Opcional -->
</body>
</html><?php /**PATH /Users/fernandogomez/Herd/SM/resources/views/layouts/app.blade.php ENDPATH**/ ?>