

































<div class="header-wrapper-index-03" data-padding-top="<?php echo e($settings['padding_top']); ?>"  data-padding-bottom="<?php echo e($settings['padding_bottom']); ?>">
    <div class="container custom-container-1720">
        <div class="row">
            <div class="col-lg-12">
                <!-- header area start -->
                <div class="header-area-wrapper">
                    <div class="header-area index-01 index-03">
                        <div class="header-slider-inst-index-01">
                            <?php $__currentLoopData = $settings['header_style_three']['background_image_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="single-slider-item bg lazy"
                                        <?php echo render_background_image_markup_by_attachment_id($settings['header_style_three']['background_image_'][$loop->index], 'full', true); ?>

                                >
                                    <div class="content">
                                        <h5 class="sub-title"><?php echo e(html_entity_decode($settings['header_style_three']['title_'][$loop->index])); ?></h5>
                                        <h1 class="title"><?php echo e(html_entity_decode($settings['header_style_three']['subtitle_'][$loop->index])); ?></h1>
                                        <div class="offer-title"><p><?php echo $settings['header_style_three']['description_'][$loop->index]; ?></p></div>
                                        <div class="btn-wrapper">
                                            <a href="<?php echo e(url($settings['header_style_three']['button_url_'][$loop->index])); ?>" class="btn-default transparent-btn-1"><?php echo e($settings['header_style_three']['button_text_'][$loop->index]); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <!-- header area end -->
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\grenmart\@core\app\Providers/../PageBuilder/views/header/header_slider_three.blade.php ENDPATH**/ ?>