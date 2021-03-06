<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN" prefix="og: http://ogp.me/ns#">
<head>
    <title>博客</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href='/blog/Public/Home/style/style.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/blog/Public/Home/style/font.css">
<script type="text/javascript" src="/blog/Public/Home/style/jquery-1.11.3.min.js"></script>
<style type="text/css">
    img.wp-smiley,
    img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 .07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
    }
</style>
<script>
    $(function ($) {
        $('[data-ga]').click(function () {
            var e = $(this).attr('data-ga').split('|');
            ga('send', 'event', e[0], e[1], e[2]);
        });
    });

    $(function () {
        'use strict';
        var $window = $(window);
        $window.scroll(checkAnchorBar);
        checkAnchorBar();

        function checkAnchorBar() {
            var $anchorBar = $('.anchor-bar');
            var scrollTop = $window.scrollTop();

            var $anchorStartElem = $('header');
            var attachedClass = 'attached';

            var threshold = $anchorStartElem.offset().top + $anchorStartElem.height();

            if (!$anchorBar.hasClass(attachedClass) && scrollTop >= threshold) {
                $anchorBar.addClass(attachedClass);
            } else if ($anchorBar.hasClass(attachedClass) && scrollTop < threshold) {
                $anchorBar.removeClass(attachedClass);
            }
        }
    });
</script>

<!-- Desktop Header -->

    <style type="text/css">
        .b-page {
            background: #fff;
            box-shadow: 0px 1px 2px 0px #E2E2E2;
        }

        .page {
            width: 95%;
            padding: 30px 15px;
            background: #FFF;
            text-align: right;
            overflow: hidden;
        }

        .page .first,
        .page .prev,
        .page .current,
        .page .num,
        .page .current,
        .page .next,
        .page .end {
            padding: 8px 16px;
            margin: 0px 5px;
            display: inline-block;
            color: #008CBA;
            border: 1px solid #F2F2F2;
            border-radius: 5px;
        }

        .page .first:hover,
        .page .prev:hover,
        .page .current:hover,
        .page .num:hover,
        .page .current:hover,
        .page .next:hover,
        .page .end:hover {
            text-decoration: none;
            background: #F8F5F5;
        }

        .page .current {
            background-color: #008CBA;
            color: #FFF;
            border-radius: 5px;
            border: 1px solid #008CBA;
        }

        .page .current:hover {
            text-decoration: none;
            background: #008CBA;
        }

        .page .not-allowed {
            cursor: not-allowed;
        }
    </style>
</head>

<body class="p-blog zh">
<!-- 导航啦开始 -->
<header>
    <div class="header">
        <div class="logo">
            <div class="title">
                <a href="#">
                    <!--<img src=""-->
                         <!--alt="" title="" width="126"-->
                         <!--height="45"/>-->
                    <h1>Emiyaa的博客</h1>
                </a>
            </div>

        </div>
        <nav class="navbar" role="navigation">
            <ul class="nav">
                <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <a href="/blog/index.php/Home/<?php if($vo['id'] == 1): ?>Index<?php elseif($vo['id'] == 2): ?>Active<?php elseif($vo['id'] == 3): ?>About<?php endif; ?>/index"
                        <?php if($cateids['id'] == $vo['id']): ?>class="active"<?php endif; ?>
                        ><?php echo ($vo["column"]); ?>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </nav>
    </div>
</header>

<div class="anchor-bar">
    <ul class="nav">
        <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                <a href="/blog/index.php/Home/<?php if($vo['id'] == 1): ?>Index<?php elseif($vo['id'] == 2): ?>Active<?php elseif($vo['id'] == 3): ?>About<?php endif; ?>/index"
                <?php if($cateids['id'] == $vo['id']): ?>class="active"<?php endif; ?>
                ><?php echo ($vo["column"]); ?>
                </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        <li>
            <a class="download" data-ga="download|anchor-bar|ts|" href="<?php echo U('Admin/Login/login');?>">登录</a>
            <a class="download" data-ga="download|anchor-bar|ts|" href="https://github.com/Emiyaa/blog">免费下载</a>
        </li>
    </ul>
</div>
<!-- 导航栏结束 -->

<div class="body">
    <div class="wrapper cls">
        <div class="main">
            <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list">
                    <ul>
                        <li>
                            <h1 class="title">
                                <a href="/blog/index.php/Home/Index/article/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["bk_title"]); ?></a>
                            </h1>
                            <div class="info">
                                <span><?php echo ($vo["time"]); ?></span>
                                <!--<?php echo (date( "Y-m-d" , $vo["time "])); ?>-->
                            </div>
                            <div class="thumb">
                                <a href="/blog/index.php/Home/Index/article/id/<?php echo ($vo["id"]); ?>">
                                    <?php if($vo[bk_pic] != null): ?><img width="1200" height="630"
                                             src="/blog<?php echo ($vo["bk_pic"]); ?>"
                                             class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                             alt=""/>
                                        <?php else: ?>
                                        <img width="1200" height="630"
                                             src="/blog/Uploads/null.gif"
                                             class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                             alt=""/><?php endif; ?>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="list page b-page">
                <?php echo ($page); ?>
            </div>
        </div>

        <div class="sticky-content-spacer">
    <div id="sidebar" class="side">
        <!-- Desktop Sidebar -->

        <div class="widget-download">
            <div class="free-download">
                <img class="ts-logo" width="228"
                     src=""
                     alt="编程交流"/>
                <a class="title"
                   href="//shang.qq.com/wpa/qunwpa?idkey=8c3378b70b6bf234fbd261f83986dbdedcd47906242ea535a6e23296bf1e23a0">加入我们</a>
                <span class="os">点击上述按钮加入我们</span>
            </div>
        </div>


        <!-- 热门文章 -->
        <div class="pop">
            <div class="title">热门文章</div>
            <ul>
                <?php if(is_array($recommend)): $i = 0; $__LIST__ = $recommend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <div class="thumb"><a href="/blog/index.php/Home/Active/article/id/<?php echo ($vo["id"]); ?>">
                            <img width="1350" height="675"
                                 src="/blog<?php echo ($vo["bk_pic"]); ?>"
                                 class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                 sizes="(max-width: 1350px) 100vw, 1350px"/></a>
                        </div>
                        <h2 class="topic"><a href="/blog/index.php/Home/Active/article/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["bk_title"]); ?></a></h2>
                        <div class="clear"></div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <!-- 热门文章end -->

        <!--<div class="fb-page" data-href="https://www.facebook.com/360safe" data-width="293" data-height="320"-->
             <!--data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"-->
             <!--data-show-facepile="true" data-show-posts="true">-->
            <!--<div class="fb-xfbml-parse-ignore">-->
                <!--<blockquote cite=""><a href="">360-->
                    <!--Total Security</a></blockquote>-->
            <!--</div>-->
        <!--</div>-->
    </div>
</div>
        <div class="clear"></div>
    </div>
</div>

<div id="fb-root"></div>

<footer>
    <div class="footer">
        <div class="row">
            <dl>
                <dt>联系我们</dt>
                <dd>
                    <span class="">© 2017 By <a href="tencent://message/?uin=960062036&Site=&Menu=yes">Emiyaa</a></span>
                    <!--<a class="email-link" href="tencent://message/?uin=960062036&Site=&Menu=yes">联系作者</a>-->
                </dd>
            </dl>
        </div>
    </div>
</footer>
</body>
</html>