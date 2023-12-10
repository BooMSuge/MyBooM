<?php
session_start();
// 检查是否为普通用户
if (!isset($_SESSION['user']) || $_SESSION['users_type'] != 'user') {
    header("Location: ../login.html"); // 重定向到登录页面
    exit();
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> SK陪玩电竞 </title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../layui/css/layui.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .layui-nav {
            background-color: rgba(255, 255, 255, 255);
            color: #000;
        }

        /* 修改导航项和图标的字体颜色 */
        .layui-nav a {
            color: #333 !important;
            /* 将颜色更改为您喜欢的官方颜色，使用 !important 来确保覆盖其他样式 */
        }

    </style>
</head>
<body>
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo layui-hide-xs layui-bg-white">SK陪玩电竞</div>
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item layui-hide layui-show-sm-inline-block">
                        <img src="https://img2.baidu.com/it/u=2331303309,61008372&fm=253&fmt=auto&app=138&f=JPEG?w=500&h=500" class="layui-nav-img">
                        <?php echo $_SESSION['user']; ?>
                    <dl class="layui-nav-child">
                         <dd><?php echo $_SESSION['muontr']; ?></dd>
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
                        <a class="" href="javascript:;"><span class='layui-hide-xs'>
                                <i class="layui-icon layui-icon-template-1" style="font-size: 14px;padding:10px"></i>系统管理</span></a>
                        <dl class="layui-nav-child">
                            <dd><a href="user.php"><i class="layui-icon layui-icon-home" style="font-size: 14px;padding:10px"></i>
                                    个人信息</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>