<?php if (!defined('THINK_PATH')) exit();?>
<ul>   
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$po): $mod = ($i % 2 );++$i;?><li>
        <a href="<?php echo ($po["link"]); ?>">
            <img src="<?php echo ($po["path"]); ?>" alt="" width="190" height="69" title="<?php echo ($po["title"]); ?>">
        </a>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>