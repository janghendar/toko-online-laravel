<div class="add-banner-x-area-wrapper index-02" data-padding-top="<?php echo e($settings['padding_top']); ?>"  data-padding-bottom="<?php echo e($settings['padding_bottom']); ?>">
    <div class="container custom-container-1318">
        <div class="row">
            <div class="col-sm-9 col-md-6 col-lg-6">
                <div class="add-banner-x-style-01">
                    <a href="<?php echo e(\App\traits\URL_PARSE::url($left_button_url)); ?>">
                        <?php echo render_image_markup_by_attachment_id($left_background_image, '', 'full', true); ?>

                    </a>
                    <div class="content">
                        <span class="offer-title"><?php echo e($left_subtitle); ?></span>
                        <h4 class="title"><?php echo str_replace('[brk]', '<br/>', $left_title); ?></h4>
                        <span class="sub-title"><?php echo e($left_discount_text); ?></span>
                        <div class="btn-wrapper">
                            <a href="<?php echo e(\App\traits\URL_PARSE::url($left_button_url)); ?>" class=""><?php echo e($left_button_text); ?> <i class="las la-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-md-6 col-lg-6">
                <div class="add-banner-x-style-01">
                    <a href="<?php echo e(url($right_button_url)); ?>">
                        <?php echo render_image_markup_by_attachment_id($right_background_image, '', 'full', true); ?>

                    </a>
                    <div class="content">
                        <span class="offer-title"><?php echo e($right_subtitle); ?></span>
                        <h4 class="title"><?php echo str_replace('[brk]', '<br/>', $right_title); ?></h4>
                        <span class="sub-title"><?php echo e($right_discount_text); ?></span>
                        <div class="btn-wrapper">
                            <a href="<?php echo e(\App\traits\URL_PARSE::url($right_button_url)); ?>" class=""><?php echo e($right_button_text); ?> <i class="las la-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\grenmart\@core\app\Providers/../PageBuilder/views/banner/banner_style_three.blade.php ENDPATH**/ ?>