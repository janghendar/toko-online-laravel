

<!-- add-x area start -->
<div class="add-banner-x-area-wrapper index-03">
    <div class="container custom-container-1720">
        <div class="row">
            <?php $__currentLoopData = $settings['banner_style_six']['background_image_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="add-banner-x-style-01">
                        <a href="<?php echo e(\App\traits\URL_PARSE::url($settings['banner_style_six']['button_url_'][$key])); ?>">
                            <?php echo render_image_markup_by_attachment_id($image, '', 'full', true, false); ?>

                        </a>
                        <div class="content">
                            <h4 class="title"><?php echo e($settings['banner_style_six']['title_'][$key]); ?></h4>
                            <span class="sub-title"><?php echo e($settings['banner_style_six']['subtitle_'][$key]); ?></span>
                            <div class="btn-wrapper">
                                <a href="<?php echo e(\App\traits\URL_PARSE::url($settings['banner_style_six']['button_url_'][$key])); ?>" class="shop-now-btn-style-01"><?php echo e($settings['banner_style_six']['button_text_'][$key]); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!-- add-x area end -->
<?php /**PATH C:\xampp\htdocs\grenmart\@core\app\Providers/../PageBuilder/views/banner/banner_style_six.blade.php ENDPATH**/ ?>