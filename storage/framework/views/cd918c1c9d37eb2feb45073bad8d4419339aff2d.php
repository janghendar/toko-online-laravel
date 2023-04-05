<div class="add-banner-x-long-area-wrapper" data-padding-top="<?php echo e($padding_top); ?>"  data-padding-bottom="<?php echo e($padding_bottom); ?>">
    <div class="container custom-container-1318">
        <div class="row">
            <div class="col-lg-12">
                <div class="add-banner-x-long">
                    <a href="<?php echo e(\App\traits\URL_PARSE::url($button_url)); ?>">
                        <?php echo render_image_markup_by_attachment_id($background_image, '', 'full', false); ?>

                    </a>
                    <div class="content-1">
                        <span class="total-wrap"><?php echo str_replace(['[sp]', '[/sp]'], ['<span class="sale">','</span>'], $sale_text); ?></span>
                    </div>
                    <div class="content-2">
                        <h1 class="title"><?php echo str_replace('[brk]', '<br/>', $title); ?></h1>
                        <div class="btn-wrapper">
                            <a href="<?php echo e(\App\traits\URL_PARSE::url($button_url)); ?>" class="btn-default transparent-btn-1"><?php echo e($button_text); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/xgenxchi/public_html/laravel/grenmart/@core/app/Providers/../PageBuilder/views/banner/banner_style_one.blade.php ENDPATH**/ ?>