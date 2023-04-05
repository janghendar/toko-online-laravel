<div class="featured-product-area-wrapper index-01" data-padding-top="<?php echo e($settings['padding_top']); ?>"  data-padding-bottom="<?php echo e($settings['padding_bottom']); ?>">
    <div class="container custom-container-1318">
        <div class="row extra">
            <div class="col-8 col-sm-6 col-md-6 col-lg-6">
                <div class="section-title-wrapper-02">
                    <h2 class="section-title"><?php echo e($section_title); ?></h2>
                </div>
            </div>
            <div class="col-4 col-sm-6 col-md-6 col-lg-6">
                <div class="btn-wrapper text-right">
                    <a href="<?php echo e($button_url); ?>" class="btn-default transparent-btn-2"><?php echo e($button_text); ?>

                        <i class="las la-arrow-right icon"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row extra">
            <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.product.product-card-02','data' => ['product' => $product]]); ?>
<?php $component->withName('frontend.product.product-card-02'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH F:\xampp\htdocs\grenmart-api\@core\app\Providers/../PageBuilder/views/product/product_grid_one.blade.php ENDPATH**/ ?>