<?php if (!defined('THINK_PATH')) exit(); if(is_array($addons_info)): $i = 0; $__LIST__ = $addons_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$SilderInfo): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
    <div class="index-banner-list__item">
        <img src="<?php echo ($SilderInfo["path"]); ?>" alt="">
        <h4><?php echo ($SilderInfo["title"]); ?></h4>
        <p><?php echo ($SilderInfo["sildertext"]); ?></p>
        <span><?php echo ($SilderInfo["content"]); ?></span>
    </div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>