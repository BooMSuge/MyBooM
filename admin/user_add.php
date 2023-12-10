<?php
include 'head.php';
?>
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
<div class="layui-body">
    <div style="padding: 15px;">
        <!-- 注册表单开始 -->
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>注册新账号</legend>
        </fieldset>

        <form class="layui-form" id="userAddForm">
            <div class="demo-login-container">
                <div class="layui-form-item">
                    <div class="layui-input-wrap">
                        <div class="layui-input-prefix">
                            <i class="layui-icon layui-icon-username"></i>
                        </div>
                        <input type="text" name="username" required lay-verify="required" placeholder="用户名" lay-reqtext="请填写用户名" autocomplete="off" class="layui-input" lay-affix="clear">
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
                            <i class="layui-icon layui-icon-password"></i>
                        </div>
                        <input type="password" name="confirmPassword" required lay-verify="required" placeholder="请确认密码" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
        </form>
        <!-- 注册表单结束 -->
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#userAddForm').on('submit', function(e) {
            e.preventDefault(); // 阻止表单默认提交
            $.ajax({
                url: '../controller/user_add.php', // PHP 处理脚本路径
                type: 'POST',
                data: $(this).serialize(), // 序列化表单数据
                success: function(response) {
                    // 这里的 response 是 PHP 脚本返回的数据
                    layer.alert(response); // 弹出消息
                }
            });
        });
    });
</script>
<?php
include 'foot.php';
?>