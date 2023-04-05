<div class="filter-style-block-preloader lds-ellipsis">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<?php if($products->count() < 1): ?>
    <h2 class="title text-center w-100 py-5">No Product Found</h2>
<?php endif; ?>

<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="custom-col px-2 pb-3">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.product.product_filter_style_two_items','data' => ['item' => $item]]); ?>
<?php $component->withName('frontend.product.product_filter_style_two_items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/xgenxchi/public_html/laravel/grenmart/@core/resources/views/frontend/partials/product_filter_style_two.blade.php ENDPATH**/ ?>