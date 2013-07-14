<?php if (!defined('THINK_PATH')) exit();?><div class="area-type-lists">
<div class="area-type-list clearfix" style="border:0;height:auto;">
   <p>按地区查找</p>
   <ul>
      <li>
         <a class="first <?php if(($area)  ==  "0"): ?>current<?php endif; ?>" href="<?php echo U('people/Index/index', array('area'=>0,'type'=>$type));?>">全　部</a>
      </li>
      <?php if(!$area){ ?>   <!-- 循环所有省 -->
      <?php if(is_array($allProvince)): ?><?php $i = 0;?><?php $__LIST__ = $allProvince?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li>
         <a <?php if(($area)  ==  $vo["id"]): ?>class="current"<?php endif; ?> href="<?php echo U('people/Index/index', array('area'=>$vo['id'],'type'=>$type));?>"><?php echo ($vo["title"]); ?></a>
      </li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
      <?php }else{ ?>
         <?php if(($parent2["title"])  !=  ""): ?><li><a class="current" href="<?php echo U('people/Index/index', array('area'=>$parent2['area_id'],'type'=>$type));?>"><?php echo ($parent2['title']); ?></a></li><?php else: ?><li><a class="current" href="<?php echo U('people/Index/index', array('area'=>$parent1['id'],'type'=>$type));?>"><?php echo ($parent1['title']); ?></a></li><?php endif; ?>
      <?php } ?>
   </ul>
   <!--  -->
   <?php if($parent2['title'] && $parent1['title']){ ?>
   <ul>
      <li>
         <a class="first <?php if(($area)  ==  "0"): ?>current<?php endif; ?>" href="<?php echo U('people/Index/index', array('area'=>$parent2['area_id'],'type'=>$type));?>">全　部</a>
      </li>
         <li><a class="current" href="<?php echo U('people/Index/index', array('area'=>$parent1['id'],'type'=>$type));?>"><?php echo ($parent1['title']); ?></a></li>
   </ul>
   <?php } ?>
   <!--  -->
   <?php if($city){ ?>
   <ul>
      <?php if(is_array($city)): ?><?php $i = 0;?><?php $__LIST__ = $city?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li>
         <a <?php if(($area)  ==  $vo["id"]): ?>class="current"<?php endif; ?> href="<?php echo U('people/Index/index', array('area'=>$vo['id'],'type'=>$type));?>"><?php echo ($vo["title"]); ?></a>
      </li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
   </ul>
   <?php } ?>
   
</div>
</div>