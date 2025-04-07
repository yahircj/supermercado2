<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-8">
        <h2>Productos Destacados</h2>
        <div class="row">
            <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <?php echo $__env->make('client.products.card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Ofertas Especiales</div>
            <div class="card-body">
                <!-- Contenido de ofertas -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/fernandogomez/Desktop/SMYahir/Sin título/supermercado2/SM/resources/views/client/home.blade.php ENDPATH**/ ?>