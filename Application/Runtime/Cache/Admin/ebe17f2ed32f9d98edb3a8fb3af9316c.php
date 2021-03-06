<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <script type="text/javascript">
        // 选择或者反选 checkbox
        function CheckSelect(thisform) {
            // 遍历 form
            for (var i = 0; i < thisform.elements.length; i++) {
                // 提取控件
                var checkbox = thisform.elements[i];
                // 检查是否是指定的控件
                if (checkbox.name === "cb" && checkbox.type === "checkbox" && checkbox.checked === false) {
                    // 正选
                    checkbox.checked = true;
                }
                else if (checkbox.name === "cb" && checkbox.type === "checkbox" && checkbox.checked === true) {
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
                    <!--<li><a href="/blog/index.php/Admin/Cate/lists"><i class="icon-font">&#xe008;</i>作品管理</a></li>-->
                    <li><a href="/blog/index.php/Admin/Cate/lists"><i class="icon-font">&#xe005;</i>栏目管理</a></li>
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
                    <li><a href="/blog/index.php/Admin/Active/lists"><i class="icon-font">&#xe037;</i>博文管理</a></li>
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
                    class="crumb-step">&gt;</span><span class="crumb-name">栏目管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/blog/index.php/Admin/Cate/add" method="post">
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
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/blog/index.php/Admin/About/insert"><i class="icon-font"></i>新增栏目</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
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
                            <th>发布内容</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        <!--循环输出数据-->
                        <?php if(is_array($msgs)): $i = 0; $__LIST__ = $msgs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td class="tc"><input name="cb" value="<?php echo ($vo["bk_id"]); ?>" type="checkbox"></td>
                                <td><?php echo ($vo["bk_id"]); ?></td>
                                <td title="title"><a target="_blank" href="#" title="title"><?php echo ($vo["bk_title"]); ?></a></td>
                                <td><?php echo ($vo["bk_author"]); ?></td>
                                <td><?php echo ($vo["bk_content"]); ?></td>
                                <td><?php echo ($vo["time"]); ?></td>
                                <td>
                                    <a class="link-update" href="/blog/index.php/Admin/About/edit/id/<?php echo ($vo["bk_id"]); ?>">修改</a>
                                    <a class="link-del" href="/blog/index.php/Admin/About/del/id/<?php echo ($vo["bk_id"]); ?>"
                                       onclick="return confirm('您确定要删除<?php echo ($vo["bk_title"]); ?>博文吗？');">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>


                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>