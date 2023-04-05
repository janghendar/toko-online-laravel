<div class="support-area-wrapper index-02" data-padding-top="<?php echo e($settings['padding_top']); ?>"  data-padding-bottom="<?php echo e($settings['padding_bottom']); ?>">
    <div class="container custom-container-1318">
        <div class="row support-item-wrap">
            <?php $__currentLoopData = $settings['header_eleven']['title_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-lg-3">
                    <div class="single-support-item">
                        <div class="icon-box">
                            <i class="<?php echo e($settings['header_eleven']['button_icon_'][$key]); ?> icon"></i>
                        </div>
                        <div class="content">
                            <h5 class="title"><?php echo e($title); ?></h5>
                            <p class="info"><?php echo e($settings['header_eleven']['description_'][$key]); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/xgenxchi/public_html/laravel/grenmart/@core/app/Providers/../PageBuilder/views/iconbox/iconbox-02.blade.php ENDPATH**/ ?>