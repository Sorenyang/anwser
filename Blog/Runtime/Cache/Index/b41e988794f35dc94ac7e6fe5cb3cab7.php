<?php if (!defined('THINK_PATH')) exit();?> <div class="ibody">
  <header>
    <h1>如影随形</h1>
    <h2>影子是一个会撒谎的精灵，它在虚空中流浪和等待被发现之间;在存在与不存在之间....</h2>
    <div class="logo"><a href="/"></a></div>

    <nav id="topnav"><a href="__GROUP__">首页</a><a href="<?php echo U(GROUP_NAME.'/List/index');?>">博文日志</a><a href="<?php echo U(GROUP_NAME.'/Image/index');?>">精彩图集</a><a href="<?php echo U(GROUP_NAME.'/About/index');?>">关于我</a></nav>
  </header>






<!doctype html>
<html>
<head>
<meta charset="UTF8">

<meta name="keywords" content="个人博客模板,博客模板,响应式" />
<meta name="description" content="如影随形主题的个人博客模板，神秘、俏皮。" />
<link href="__PUBLIC__/css/base.css" rel="stylesheet">

<link href="__PUBLIC__/css/media.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->


<link href="__PUBLIC__/css/style.css" rel="stylesheet">
<title>慢生活</title>
</head>
<body>

  <article>
    <h2 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="1/">慢生活</a></h2>
    <div class="template">
     
      
        <img style="width:400px;height:400px;border:1px solid " src="__PUBLIC__/images/<?php echo ($img["images"]); ?>"></a><span><?php echo ($img["alt"]); ?></span></li>
      
  
     
    </div>
   
  </article>
 <aside>
    <div class="avatar"><a href="<?php echo U(GROUP_NAME.'/About/index');?>"><span>关于我</span></a></div>
    <div class="topspaceinfo">
      <h1>宁可一思进，莫在一思停。</h1>
      <p>世界很大，学会做一名旅者，安静观察、静心旅行。</p>
    </div>
   <div class="about_c">
      <p> 网名：sai_young | 不二 | 拔刀央</p>
      <p> 职业：程序猿 </p>
      <p> 籍贯：四川—绵阳 </p>
      <p> 电话：13693415396</p>
      <p> 邮箱：yingsantai@sina.com</p>
    </div>
    
    



    <div class="tj_news">
      <h2>
        <p class="tj_t2">点击排行</p>
      </h2>
      <ul class="ph_n">
      <?php if(is_array($hots)): foreach($hots as $key=>$v): ?><li><span class="num1"><?php echo ($key+1); ?></span><a href="<?php echo U('Index/List/show',array('id'=>$v['id']));?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>  
      </ul>
     


      <h2>
        <p class="tj_t1">最新发布</p>
      </h2>
      <ul>
      <?php if(is_array($new)): foreach($new as $key=>$b): ?><li><a href="<?php echo U('Index/List/show',array('id'=>$v['id']));?>"><?php echo ($b["title"]); ?></a></li><?php endforeach; endif; ?>  
      </ul>


    </div>

     <div class="links">
      <h2>
        <p>友情链接</p>
      </h2>
      <ul>
        <li><a href="http://www.thinkphp.cn/">ThinkPHP</a></li>
        <li><a href="">百度</a></li>
      </ul>
    </div>
     <div class="copyright">
      <ul>
        <p> Design by <a href="www.yangqq.com">DanceSmile</a></p>
        <p>蜀ICP备11002373号-1</p>
        </p>
      </ul>
    </div>


   
  </aside>
  <script src="js/silder.js"></script>
  <div class="clear"></div>
  <!-- 清除浮动 --> 
</div>
</body>
</html>