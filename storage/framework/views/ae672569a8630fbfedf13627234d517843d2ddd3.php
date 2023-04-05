<div class="count-down-area-wrapper bg" data-padding-top="<?php echo e($settings['padding_top']); ?>"  data-padding-bottom="<?php echo e($settings['padding_bottom']); ?>"
     <?php echo render_background_image_markup_by_attachment_id($background_image, 'full', false); ?>

>
    <div class="top-shape" style="background-image: url(<?php echo e(asset('assets/frontend/img/banner/countdown-top.png')); ?>)"></div>
    <div class="bottom-shape" style="background-image: url(<?php echo e(asset('assets/frontend/img/banner/countdown-bottom.png')); ?>)">
    </div>
    <div class="left-shape">
        <?php echo render_image_markup_by_attachment_id($left_front_image, '', 'full', true); ?>

    </div>
    <div class="right-shape">
        <?php echo render_image_markup_by_attachment_id($right_front_image, '', 'full', true); ?>

    </div>
    <div class="container custom-container-1318">
        <div class="row">
            <div class="col-lg-12">
                <div class="count-down-inner">
                    <div class="content">
                        <span class="offer"><?php echo e($subtitle); ?></span>
                        <h3 class="title"><?php echo e(str_replace('[brk]', '<br/>', $title)); ?></h3>
                        
                        <div class="flash-countdown-1 flash-countdown-style-1" data-date="<?php echo e(\Carbon\Carbon::parse($end_date)->format('Y-m-d h:i:s')); ?>">
                            <div class="single-box">
                                <span class="counter-days item time">00</span>
                                <span class="label item"><?php echo e(__('Day')); ?></span>
                            </div>
                            <div class="colon-wrap">
                                <span class="colon">:</span>
                            </div>
                            <div class="single-box">
                                <span class="counter-hours item time">00</span> 
                                <span class="label item"><?php echo e(__('Hour')); ?></span>
                            </div>
                            <div class="colon-wrap">
                                <span class="colon">:</span>
                            </div>
                            <div class="single-box">
                                <span class="counter-minutes item time">00</span> 
                                <span class="label item"><?php echo e(__('Min')); ?></span>
                            </div>
                            <div class="colon-wrap">
                                <span class="colon">:</span>
                            </div>
                            <div class="single-box">
                                <span class="counter-seconds item time">00</span> 
                                <span class="label item"><?php echo e(__('Sec')); ?></span>
                            </div>
                        </div>
                        <div class="btn-wrapper">
                            <a href="<?php echo e(\App\traits\URL_PARSE::url($button_url)); ?>" class="btn-default shop-now-btn-style-01 rounded-btn"><?php echo e($button_text); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\grenmart\@core\app\Providers/../PageBuilder/views/banner/banner_style_four.blade.php ENDPATH**/ ?>