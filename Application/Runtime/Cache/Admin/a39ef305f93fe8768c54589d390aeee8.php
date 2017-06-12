<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="/blog/Public/Admin/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/blog/Public/Admin/css/main.css"/>
<script type="text/javascript" src="/blog/Public/Admin/js/libs/modernizr.min.js"></script>

<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="/blog/index.php/Admin/Index" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/blog/index.php/Admin/Index">首页</a></li>
                <li><a href="/blog" target="/Home">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">欢迎您:<?php echo $_SESSION['username'];?></a></li>
                <li><a href="/blog/index.php/Admin/Login/edit/id/<?php echo $_SESSION['id'];?>">修改密码</a></li>
                <li><a href="/blog/index.php/Admin/Login/logout">注销</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
    <div class="sidebar-title">
        <h1>菜单</h1>
    </div>
    <div class="sidebar-content">
        <ul class="sidebar-list">
            <li>
                <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                <ul class="sub-menu">
                    <li><a href="/blog/index.php/Admin/Cate/lists"><i class="icon-font">&#xe008;</i>栏目管理</a></li>
                    <!--<li><a href="/blog/index.php/Admin/Cate/lists"><i class="icon-font">&#xe005;</i>栏目管理</a></li>-->
                    <!--<li><a href="/blog/index.php/Admin/Cate/lists"><i class="icon-font">&#xe006;</i>分类管理</a></li>-->
                    <!--<li><a href="/blog/index.php/Admin/Cate/lists"><i class="icon-font">&#xe004;</i>留言管理</a></li>-->
                    <!--<li><a href="/blog/index.php/Admin/Cate/lists"><i class="icon-font">&#xe012;</i>评论管理</a></li>-->
                    <!--<li><a href="/blog/index.php/Admin/Cate/lists"><i class="icon-font">&#xe052;</i>友情链接</a></li>-->
                    <!--<li><a href="/blog/index.php/Admin/Cate/lists"><i class="icon-font">&#xe033;</i>广告管理</a></li>-->
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                <ul class="sub-menu">
                    <li><a href="/blog/index.php/Admin/Hpage/lists"><i class="icon-font">&#xe017;</i>首页管理</a></li>
                    <li><a href="/blog/index.php/Admin/Active/lists"><i class="icon-font">&#xe005;</i>博文管理</a></li>
                    <li><a href="/blog/index.php/Admin/About"><i class="icon-font">&#xe046;</i>关于</a></li>
                    <!--<li><a href="/blog/index.php/Admin/Cate/system"><i class="icon-font">&#xe045;</i>数据还原</a></li>-->
                </ul>
            </li>
        </ul>
    </div>
</div>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span
                    class="crumb-step">&gt;</span><span style="color: red;">修改密码</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo ($users["id"]); ?>"/>
                    <input type="hidden" name="username" value="<?php echo ($users["username"]); ?>">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <th><i class="require-red">*</i>原密码：</th>
                            <td>
                                <input class="common-text required" name="oldpassword" size="50" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>新密码：</th>
                            <td>
                                <input class="common-text required" name="password" size="50"
                                       type="text">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>确认密码：</th>
                            <td>
                                <input class="common-text required" name="cnewpassword" size="50"
                                       type="text">
                            </td>
                        </tr>

                        <tr>
                            <th></th>
                            <td>
                                <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>