<div class="add-banner-y-area-wrapper index-02" data-padding-top="<?php echo e($settings['padding_top']); ?>"  data-padding-bottom="<?php echo e($settings['padding_bottom']); ?>">
    <div class="container custom-container-1318">
        <div class="row">
            <?php $__currentLoopData = $settings['banner_style_five']['background_image_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="add-banner-y-style-01">
                        <a href="<?php echo e(\App\traits\URL_PARSE::url($settings['banner_style_five']['button_url_'][$key])); ?>">
                            <?php echo render_image_markup_by_attachment_id($image, '', 'full', true, false); ?>

                        </a>
                        <div class="content">
                            <span class="sub-title"><?php echo e($settings['banner_style_five']['subtitle_'][$key]); ?></span>
                            <h4 class="title"><?php echo e($settings['banner_style_five']['title_'][$key]); ?></h4>
                            <h5 class="offer-title"><?php echo e($settings['banner_style_five']['discount_text_'][$key]); ?></h5>
                            <div class="btn-wrapper">
                                <a href="<?php echo e(\App\traits\URL_PARSE::url($settings['banner_style_five']['button_url_'][$key])); ?>" class="shop-now-btn-style-01"><?php echo e($settings['banner_style_five']['button_text_'][$key]); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\grenmart\@core\app\Providers/../PageBuilder/views/banner/banner_style_five.blade.php ENDPATH**/ ?>