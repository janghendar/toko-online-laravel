<div class="fruits-area-wrapper index-01" data-padding-top="<?php echo e($settings['padding_top']); ?>"  data-padding-bottom="<?php echo e($settings['padding_bottom']); ?>">
    <div class="container custom-container-1318">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title-wrapper-02">
                    <h2 class="section-title"><?php echo e($banner_title); ?></h2>
                </div>
            </div>
        </div>
        <div class="row extra <?php if(isset($row_direction) && $row_direction == 'opposite'): ?> flex-row-reverse <?php endif; ?>">
            <div class="col-sm-5 col-md-4 col-lg-3">
                <div class="add-banner-y-style-01">
                    <a href="<?php echo e(url($button_url)); ?>">
                        <?php echo render_image_markup_by_attachment_id($banner_image, '', 'grid', true); ?>

                    </a>
                    <div class="content">
                        <span class="sub-title"><?php echo e($banner_subtitle); ?></span>
                        <h4 class="title"><?php echo e($banner_title); ?></h4>
                        <div class="btn-wrapper">
                            <a href="<?php echo e(url($button_url)); ?>" class="shop-now-btn-style-01"><?php echo e($button_text); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 col-md-8 col-lg-9">
                <div class="row custom-product-slider-inst">
                    <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-12">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.product.product-card','data' => ['product' => $product]]); ?>
<?php $component->withName('frontend.product.product-card'); ?>
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
        </div>
    </div>
</div>
<?php /**PATH /home/xgenxchi/public_html/laravel/grenmart/@core/app/Providers/../PageBuilder/views/product/product_slider_two.blade.php ENDPATH**/ ?>