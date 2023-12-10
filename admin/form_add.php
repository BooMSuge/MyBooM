<link href="../layui/css/layui.css" rel="stylesheet">
<script src="../layui/jquery.min.js"></script>
<script src="../layui/layui.js"></script>

<script>
    // 在页面加载时显示加载动画
    var loadingIndex = layer.load(2, {
        shade: [0.5, '#fff'], // 设置遮罩的颜色和透明度
        time: 500 // 0.5秒后自动关闭
    });

    layui.use(['form', 'layer'], function() {
        var form = layui.form;
        var layer = layui.layer;

        // 加载和填充下拉选择框
        function fetchDataAndFillSelects() {
            fetch('../controller/get_users.php')
                .then(response => response.json())
                .then(responseData => {
                    if (responseData) {
                        fillSelect('#bossUsernameSelect', responseData.playusers, 'username');
                        fillSelect('#customerServiceSelect', responseData.users, 'username');
                        fillSelect('#gameCategorySelect', responseData.gameCategories, 'game_name');
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function fillSelect(selector, options, valueField) {
            var select = $(selector);
            select.empty();
            options.forEach(function(option) {
                select.append(new Option(option[valueField], option[valueField]));
            });
            form.render('select');
        }

        fetchDataAndFillSelects();

        // 表单提交事件监听器
        form.on('submit(formDemo)', function(data) {
            var formData = new FormData(data.form); // 使用 data.form 获取表单 DOM

            $.ajax({
                type: 'POST',
                url: '../controller/est_users.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // 隐藏加载动画
                    layer.close(loadingIndex);

                    layer.alert('提交报单成功', function(alertIndex) {
                        layer.close(alertIndex); // 关闭弹出的alert
                        parent.layer.close(parent.iframeIndex); // 关闭iframe
                        window.parent.location.reload(); // 刷新父页面
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error occurred:', xhr, status, error);
                    // 隐藏加载动画
                    layer.close(loadingIndex);

                    layer.msg('提交报单失败: ' + (xhr.statusText || error));
                }
            });
            return false; // 阻止表单默认提交行为
        });
    });
</script>
<div style="padding: 15px;">
    <!-- 注册表单开始 -->
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>提交表单</legend>
    </fieldset>
    <div class="layui-row">
        <form class="layui-form" id="orderForm" lay-filter="formDemo">
            <div class="layui-col-xs6">
                <!-- 老板昵称选择 -->
                <div class="layui-form-item">
                    <label class="layui-form-label">老板昵称：</label>
                    <div class="layui-input-block">
                        <select name="boss_username" id="bossUsernameSelect" class="layui-input"></select>
                    </div>
                </div>
                <hr>
                <!-- 时长输入 -->
                <div class="layui-form-item">
                    <label class="layui-form-label">时长：</label>
                    <div class="layui-input-block">
                        <input type="text" name="start_time" lay-verify="required" placeholder="时长（小时）" class="layui-input" lay-verify="required">
                    </div>
                </div>
                <hr>
                <!-- 游戏种类选择 -->
                <div class="layui-form-item">
                    <label class="layui-form-label">游戏种类：</label>
                    <div class="layui-input-block">
                        <select name="game_category" id="gameCategorySelect" class="layui-input"></select>
                    </div>
                </div>
            </div>

            <div class="layui-col-xs5">
                <!-- 单价输入 -->
                <div class="layui-form-item">
                    <label class="layui-form-label">单价：</label>
                    <div class="layui-input-block">
                        <input type="text" name="gameup" lay-verify="required" placeholder="单价" class="layui-input" lay-verify="required">
                    </div>
                </div>
                <hr>
                <!-- 审核客服选择 -->
                <div class="layui-form-item">
                    <label class="layui-form-label">客服人员：</label>
                    <div class="layui-input-block">
                        <select name="customer_service" id="customerServiceSelect" class="layui-input"></select>
                    </div>
                </div>
                <hr>
                <!-- 备注输入 -->
                <div class="layui-form-item">
                    <label class="layui-form-label">备注：</label>
                    <div class="layui-input-block">
                        <input type="text" name="notes" placeholder="备注" class="layui-input">
                    </div>
                </div>
            </div>
            <div class="layui-col-xs11">
                <button type="submit" style="float: right;" class="layui-btn" lay-submit lay-filter="formDemo">提交报单</button>
            </div>
        </form>
    </div>