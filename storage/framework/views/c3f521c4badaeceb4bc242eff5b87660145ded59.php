<div class="header-area-wrapper index-02" data-padding-top="<?php echo e($padding_top); ?>" data-padding-bottom="<?php echo e($padding_bottom); ?>">
    <div class="header-slider-inst-index-02">
        <div class="single-slider-item bg-index-02 lazy"
                <?php echo render_background_image_markup_by_attachment_id($background_image, 'full', true); ?>

        >
            <div class="shape" style="background-image: url('<?php echo e(asset('assets/frontend/img/header/shape.png')); ?>')"></div>
            <div class="container custom-container-1318">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-area">
                            <div class="content">
                                <h5 class="sub-title"><?php echo e(html_entity_decode($subtitle)); ?></h5>
                                <h1 class="title"><?php echo e(html_entity_decode($title)); ?></h1>
                                <p class="info"><?php echo $description; ?></p>
                                <div class="btn-wrapper">
                                    <a href="<?php echo e($button_url); ?>" class="btn-default transparent-btn-1-reverse rounded-btn"><?php echo e($button_text); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\grenmart\@core\app\Providers/../PageBuilder/views/header/header_slider_two.blade.php ENDPATH**/ ?>