<div class="card h-100">
    <img src="<?php echo e($product->images->first()->image_path ?? 'https://via.placeholder.com/300'); ?>" 
         class="card-img-top" 
         alt="<?php echo e($product->name); ?>">
    
    <div class="card-body">
        <h5 class="card-title"><?php echo e($product->name); ?></h5>
        <p class="text-muted"><?php echo e($product->category->name); ?></p>
        <p class="card-text">$<?php echo e(number_format($product->price, 2)); ?></p>
        
        <?php if($product->stock > 0): ?>
            <form action="<?php echo e(route('cart.add', $product)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-primary">
                    Añadir al carrito
                </button>
            </form>
        <?php else: ?>
            <button class="btn btn-secondary" disabled>Agotado</button>
        <?php endif; ?>
    </div>
</div><?php /**PATH /Users/fernandogomez/Herd/SM/resources/views/client/products/card.blade.php ENDPATH**/ ?>