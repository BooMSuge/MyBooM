<?php
session_start();

// 检查是否为管理员
if (!isset($_SESSION['admin']) || $_SESSION['user_type'] != 'admin') {
    header("Location: ../login.html"); // 重定向到登录页面
    exit();
}

// ... 其余的 index.php 代码 ...
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>后台管理界面 - SK陪玩电竞</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../layui/css/layui.css" rel="stylesheet">
    <script src="../layui/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<style>
:root {
    --primary-color: #fff; /* 主题颜色，纯白色 */
    --text-color: #333; /* 主要文字颜色，深灰色 */
    --background-color: #fff; /* 背景颜色，纯白色 */
}

/* 通用按钮样式 */


/* 主体字体样式 */
body {
    font-family: 'Roboto', sans-serif;
    background-color: var(--background-color);
    color: var(--text-color);
}

/* 通用导航栏样式 */
.layui-nav {
    background-color: var(--primary-color);
    color: var(--text-color);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* 导航项和图标字体颜色 */
.layui-nav a {
    color: var(--text-color) !important;
}

/* 左侧导航栏宽度 */
.layui-side {
    min-width: 200px;
}
/* 选中项的颜色 */
.active {
    color: var(--primary-color);
}

/* 表头样式 */
.layui-table thead tr {
    background-color: var(--primary-color);
    color: var(--text-color);
}
.layui-nav .layui-nav-child dd a:active {
    color: #fff !important; /* 例如: #ff0000 */
}

</style>



</head>

<body>
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo layui-hide-xs layui-bg-white"><a href="/admin">SK陪玩电竞</a></div>
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item layui-hide layui-show-sm-inline-block">
                    <a href="javascript:;">
                        <img src="https://img2.baidu.com/it/u=2331303309,61008372&fm=253&fmt=auto&app=138&f=JPEG?w=500&h=500" class="layui-nav-img">
                        <?php echo $_SESSION['admin']; ?>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="../admin/user_list.php">账号管理</a></dd>
                        <dd><a href="../controller/out_login.php">退出登录</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
        <div class="layui-side layui-bg-white">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
              <ul class="layui-nav layui-nav-tree" lay-filter="test">
    <li class="layui-nav-item layui-nav-itemed">
        <a href="javascript:;"><i class="layui-icon layui-icon-template-1"></i> 系统管理</a>
        <dl class="layui-nav-child">
            <!-- 子导航项 -->
            <dd layui-icon-app><a href="index.php"><i class="layui-icon layui-icon-app"></i> 报单管理</a></dd>
        </dl>
    </li>
    <li class="layui-nav-item layui-nav-itemed">
        <a href="javascript:;"><i class="layui-icon layui-icon-user"></i> 账号管理</a>
        <dl class="layui-nav-child">
            <!-- 子导航项 -->
            <dd><a href="user_add.php"><i class="layui-icon layui-icon-addition"></i> 账号添加</a></dd>
            <dd><a href="user_list.php"><i class="layui-icon layui-icon-username"></i> 账号列表</a></dd>
        </dl>
    </li>
</ul>

            </div>
        </div>
           <script src="../layui/layui.js"></script>

