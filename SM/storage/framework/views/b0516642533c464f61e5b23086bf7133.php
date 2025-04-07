<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Supermercado</a>
        
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('products.index')); ?>">Productos</a>
                </li>
            </ul>
            
            <div class="d-flex">
                <a href="<?php echo e(route('cart.index')); ?>" class="btn btn-outline-light">
                    Carrito <span class="badge bg-danger"><?php echo e(Cart::count()); ?></span>
                </a>
            </div>
        </div>
    </div>
</nav><?php /**PATH /Users/fernandogomez/Herd/SM/resources/views/layouts/navigation.blade.php ENDPATH**/ ?>