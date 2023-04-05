<div class="add-banner-x-area-wrapper index-01 only" data-padding-top="<?php echo e($settings['padding_top']); ?>"  data-padding-bottom="<?php echo e($settings['padding_bottom']); ?>">
    <div class="container custom-container-1318">
        <div class="row">
            <?php $__currentLoopData = $settings['banner_style_two']['subtitle_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subtitle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="<?php echo e($settings['banner_style_two']['column_width_'][$key]); ?> col-sm-6">
                    <div class="add-banner-x-style-01">
                        <a href="<?php echo e(\App\traits\URL_PARSE::url($settings['banner_style_two']['button_url_'][$key])); ?>">
                            <?php echo render_image_markup_by_attachment_id($settings['banner_style_two']['background_image_'][$key], '', 'full', true); ?>

                        </a>

                        <div class="content ex">
                            <span class="sub-title"><?php echo e($subtitle); ?></span>
                            <h4 class="title"><?php echo str_replace('[brk]', '<br/>', $settings['banner_style_two']['title_'][$key]); ?></h4>
                            <div class="btn-wrapper">
                                <a href="<?php echo e(\App\traits\URL_PARSE::url($settings['banner_style_two']['button_url_'][$key])); ?>" class="shop-now-btn-style-01"><?php echo e($settings['banner_style_two']['button_text_'][$key]); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/xgenxchi/public_html/laravel/grenmart/@core/app/Providers/../PageBuilder/views/banner/banner_style_two.blade.php ENDPATH**/ ?>