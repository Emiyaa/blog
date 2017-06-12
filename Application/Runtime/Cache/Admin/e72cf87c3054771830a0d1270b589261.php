<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
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
    <script type="text/javascript">
        // 选择或者反选 checkbox
        function CheckSelect(thisform) {
            // 遍历 form
            for (var i = 0; i < thisform.elements.length; i++) {
                // 提取控件
                var checkbox = thisform.elements[i];
                // 检查是否是指定的控件
                if (checkbox.name === "id[]" && checkbox.type === "checkbox" && checkbox.checked === false) {
                    // 正选
                    checkbox.checked = true;
                }
                else if (checkbox.name === "id[]" && checkbox.type === "checkbox" && checkbox.checked === true) {
                    // 反选
                    checkbox.checked = false;
                }
            }
        }
    </script>
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
                <li><a href="#">管理员</a></li>
                <li><a href="#">修改密码</a></li>
                <li><a href="#">退出</a></li>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/blog/index.php/Admin/Index">首页</a><span
                    class="crumb-step">&gt;</span><span class="crumb-name">博文管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/blog/index.php/Admin/Active/add" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="search-sort">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option>
                                    <option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="common-text"
                                       type="text">
                            </td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form action="/blog/index.php/Admin/Active/del" id="delList" method="get">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/blog/index.php/Admin/Active/insert"><i class="icon-font"></i>新增栏目</a>
                        <button type="submit" onclick="return confirm('您确定要删除所有选择选项吗？');"><i class="icon-font"></i>批量删除</button>
                        <!--<a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>-->
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%">
                                <input class="allChoose" name="" type="checkbox" title="反选"
                                       onClick="CheckSelect(this.form);return false;"/>
                            </th>
                            <th>ID</th>
                            <th>标题</th>
                            <th>发布人</th>
                            <th>是否推荐</th>
                            <th>缩略图</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        <!--循环输出数据-->
                        <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td class="tc"><input name="id[]" value="<?php echo ($vo["id"]); ?>" type="checkbox"></td>
                                <td><?php echo ($vo["id"]); ?></td>
                                <td title="title"><a target="_blank" href="#" title="title"><?php echo ($vo["bk_title"]); ?></a></td>
                                <td><?php echo ($vo["bk_author"]); ?></td>
                                <td>
                                    <?php if($vo['recommend'] != '0'): ?><i style="color: red;">已推荐</i>
                                        <?php else: ?>
                                        未推荐<?php endif; ?>
                                </td>
                                <td>
                                    <?php if($vo['bk_pic'] != null): ?><img src="/blog<?php echo ($vo["bk_pic"]); ?>" height="30"/>
                                        <?php else: ?>
                                        暂无图片<?php endif; ?>
                                </td>
                                <td><?php echo ($vo["time"]); ?></td>
                                <td>
                                    <a class="link-update" href="/blog/index.php/Admin/Active/edit/id/<?php echo ($vo["id"]); ?>">修改</a>
                                    <a class="link-del" href="/blog/index.php/Admin/Active/del/id/<?php echo ($vo["id"]); ?>"
                                       onclick="return confirm('您确定要删除 <?php echo ($vo["bk_title"]); ?> 博文吗？');">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>

                    <div class="list page b-page">
                        <?php echo ($page); ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>