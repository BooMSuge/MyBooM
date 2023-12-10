<?php include 'head.php'; ?>
<style>
    .demo-login-container {
        width: 320px;
        margin: 21px auto 0;
    }

    .demo-login-other .layui-icon {
        position: relative;
        display: inline-block;
        margin: 0 2px;
        top: 2px;
        font-size: 26px;
    }
</style>
        <script src="../layui/layui.js"></script>
        <!-- 工具栏模板 -->
        <script type="text/html" id="actionButtons">
            <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
            <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        </script>
        <!-- 引入 layui.js -->
        <script>
         var loadingIndex = layer.load(2, {
        shade: [0.5, '#fff'], // 设置遮罩的颜色和透明度
        time: 100 // 0.5秒后自动关闭
    });
            layui.use(['form', 'table', 'layer'], function() {
                var table = layui.table;
                var form = layui.form;
                var layer = layui.layer;

                // 从 PHP 脚本获取数据并渲染表格
                function loadTableData() {
                    $.getJSON('../controller/user_list.php', function(data) {
                        table.render({
                            elem: '#userList',
                            cols: [
                                [{
                                        field: 'id',
                                        title: 'ID'
                                    },
                                    {
                                        field: 'username',
                                        title: '用户名'
                                    },
                                    {
                                        field: 'amount',
                                        title: '余额'
                                    },
                                    {
                                        field: 'created_at',
                                        title: '创建时间'
                                    },
                                    {
                                        title: '操作',
                                        align: 'center',
                                        toolbar: '#actionButtons'
                                    }
                                ]
                            ],
                            data: data
                        });
                    });
                }
                loadTableData(); // 初始加载表格数据

                // 监听工具条事件
                table.on('tool(userList)', function(obj) {
                    var data = obj.data; // 获取当前行数据

                    if (obj.event === 'del') {
                        // 删除逻辑
                        layer.confirm('确定删除吗?', function(index) {
                            $.ajax({
                                url: '../controller/delete_user.php',
                                type: 'POST',
                                data: {
                                    id: data.id
                                },
                                success: function(response) {
                                    var res = JSON.parse(response);
                                    if (res.success) {
                                        layer.msg('删除成功', {
                                            icon: 1,
                                            time: 1000
                                        });
                                    } else {
                                        layer.msg('删除失败', {
                                            icon: 2,
                                            time: 1000
                                        });
                                    }
                                    // 不论成功或失败，都跳转
                                    window.location.href = '../admin/user_list.php';
                                }
                            });
                            layer.close(index);
                        });
                    } else if (obj.event === 'edit') {
                        // 弹出编辑表单
                        var editIndex = layer.open({
                            type: 1,
                            title: '编辑用户',
                            content: $('#editUserForm').html(), // 使用 HTML 内容
                            success: function(layero, index) {
                                form.val("editForm", data);
                                form.render();

                                // 监听编辑表单提交
                                form.on('submit(editFormSubmit)', function(formData) {
                                    $.ajax({
                                        url: '../controller/update_user.php',
                                        type: 'POST',
                                        data: formData.field,
                                        success: function(response) {
                                            var res = JSON.parse(response); // 解析 JSON 字符串
                                            layer.msg(res.message, { // 使用返回的消息
                                                icon: res.success ? 1 : 2, // 根据成功或失败选择图标
                                                time: 2000 // 消息显示时间
                                            });
                                             if (res.success) {
        layer.close(editIndex);
        window.location.reload(); // 刷新整个页面
                                            }
                                        },
                                        error: function() {
                                            layer.msg('网络错误或服务器故障', {
                                                icon: 2,
                                                time: 2000
                                            });
                                        }
                                    });
                                    return false;
                                });
                            }
                        });
                    }
                });
            });
        </script>
<div class="layui-body">
    <div style="padding: 15px;">
        <!-- 账号管理部分 -->
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>账号管理</legend>
        </fieldset>

        <!-- 用户列表 -->
        <div id="userList" class="layui-form"></div>

        <!-- 编辑用户的表单，初始时隐藏 -->
        <div id="editUserForm" style="display: none; padding: 20px;">
            <form class="layui-form" action="" lay-filter="editForm">
                <div class="demo-login-container">
                    <input type="hidden" name="id">
                    <div class="layui-form-item">
                        <div class="layui-input-wrap">
                            <div class="layui-input-prefix">
                                <i class="layui-icon layui-icon-username"></i>
                            </div>
                            <input type="text" name="username" value="" lay-verify="required" placeholder="用户名" lay-reqtext="请填写用户名" autocomplete="off" class="layui-input" lay-affix="clear">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-wrap">
                            <div class="layui-input-prefix">
                                <i class="layui-icon layui-icon-password"></i>
                            </div>
                            <input type="password" name="password" value="" lay-verify="required" placeholder="密   码" lay-reqtext="请填写密码" autocomplete="off" class="layui-input" lay-affix="eye">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-wrap">
                            <div class="layui-input-prefix">
                                <i class="layui-icon layui-icon-rmb"></i>
                            </div>
                            <input type="amount" name="amount" value="" placeholder="余  额" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit lay-filter="editFormSubmit">立即提交</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <?php
        include 'foot.php';
        ?>