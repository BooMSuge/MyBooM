<?php
include 'user_head.php';
?>
<style>
    .custom-search .layui-input-inline {
        margin-right: 10px;
    }

    .custom-search .layui-btn {
        margin-right: 10px;
    }

    .custom-alert {
        margin-bottom: 10px;
    }

    .search-input {
        width: auto;
        /* 调整文本框宽度 */
    }

    .search-button {
        width: 80px;
        /* 搜索按钮宽度 */
    }

    .layui-table-tool {
        position: relative;
        width: 100%;
        min-height: 44px;
        line-height: 0px;
        padding: 0px 10px;
        border-width: 0px;
        border-bottom-width: 1px;
    }
</style>
<div class="layui-body">
    <div style="padding: 15px;">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>查询</legend>
        </fieldset>
        <!-- 内容主体区域 -->
        <div class="layui-col-xs12">
            <form class="layui-form layui-row layui-col-space16">
                <div class="layui-col-sm4">
                    <label class="layui-form-label">游戏品种：</label>
                    <div class="layui-input-block">
                        <input name="game_category" class="layui-input">
                    </div>
                </div>
                <div class="layui-col-sm4">
                    <label class="layui-form-label">客服人员：</label>
                    <div class="layui-input-block">
                        <input name="customer_service" id="qwe" class="layui-input">
                    </div>
                </div>
                <div class="layui-col-sm4">
                    <label class="layui-form-label">服务状态</label>
                    <div class="layui-input-block">
                        <select name="state">
                            <option value=""></option>
                            <option value="1">已完成</option>
                            <option value="0">进行中</option>
                            <option value="2">未完成</option>
                        </select>
                    </div>
                </div>
                <div class="layui-btn-container layui-col-xs12">
                    <button type="button" style="float: right;" class="layui-btn layui-btn-primary layui-border layui-icon layui-icon-search" lay-submit lay-filter="doSearch">
                        查询
                    </button>

                </div>
            </form>
        </div>
        <div style="padding: 6px;">
            <table class="layui-hide" id="test" lay-filter="test"></table>
        </div>
    </div>
    <script src="../layui/layui.js"></script>
    <script>
var _0x2967a7=_0x42df;(function(_0x284eb9,_0x5c069){var _0x56bb85=_0x42df,_0x585ad4=_0x284eb9();while(!![]){try{var _0x4b86cf=parseInt(_0x56bb85(0x1f9))/0x1*(-parseInt(_0x56bb85(0x1f6))/0x2)+parseInt(_0x56bb85(0x206))/0x3+parseInt(_0x56bb85(0x20a))/0x4+parseInt(_0x56bb85(0x1f1))/0x5*(-parseInt(_0x56bb85(0x1e0))/0x6)+-parseInt(_0x56bb85(0x1e6))/0x7+-parseInt(_0x56bb85(0x200))/0x8+-parseInt(_0x56bb85(0x1f4))/0x9*(-parseInt(_0x56bb85(0x1f2))/0xa);if(_0x4b86cf===_0x5c069)break;else _0x585ad4['push'](_0x585ad4['shift']());}catch(_0x57a5d6){_0x585ad4['push'](_0x585ad4['shift']());}}}(_0x4182,0xd5367),layui[_0x2967a7(0x1f3)](['table',_0x2967a7(0x1e8),_0x2967a7(0x1ec),_0x2967a7(0x20c)],function(){var _0x17a131=_0x2967a7,_0x568844=layui['$'],_0x57f057=layui['layer'],_0x502429=layui[_0x17a131(0x1f5)],_0x5beabf=layui[_0x17a131(0x1ea)],_0xe37dc9=layui[_0x17a131(0x1e8)],_0x4b6927=layui['form'],_0x32fee2=layui['laydate'];_0x5beabf['render']({'elem':_0x17a131(0x1db),'url':_0x17a131(0x203),'toolbar':'#toolbarDemo','defaultToolbar':[_0x17a131(0x1fa),_0x17a131(0x1fd),_0x17a131(0x1ef),{'title':'提示','layEvent':_0x17a131(0x204),'icon':_0x17a131(0x209)}],'height':'500px','css':[_0x17a131(0x20d)][_0x17a131(0x1de)](''),'cellMinWidth':0x6e,'totalRow':![],'page':![],'cols':[[{'field':'id','fixed':_0x17a131(0x1eb),'width':0x50,'title':'ID','sort':!![],'hide':!![]},{'fixed':_0x17a131(0x1eb),'field':'boss_username','width':0x64,'title':_0x17a131(0x1fc),'hide':!![]},{'field':_0x17a131(0x1df),'title':_0x17a131(0x1e3),'width':0xb4},{'field':_0x17a131(0x208),'width':0xb4,'title':_0x17a131(0x1f7)},{'field':_0x17a131(0x1dd),'title':_0x17a131(0x1e9),'width':0x50},{'field':_0x17a131(0x1e5),'width':0x64,'title':_0x17a131(0x202)},{'field':_0x17a131(0x1dc),'title':_0x17a131(0x1ed),'width':0xb4},{'field':_0x17a131(0x20f),'title':_0x17a131(0x1ff),'width':0xb4},{'field':_0x17a131(0x1fb),'title':_0x17a131(0x20e),'width':0x96,'sort':!![],'templet':function(_0x179ea1){var _0x59ad8c=_0x17a131,_0x37cb18=parseInt(_0x179ea1[_0x59ad8c(0x1fb)]);switch(_0x37cb18){case 0x0:return _0x59ad8c(0x1ee);case 0x1:return _0x59ad8c(0x1f8);case 0x2:return _0x59ad8c(0x1fe);default:return _0x59ad8c(0x207);}}},{'field':_0x17a131(0x1e2),'title':_0x17a131(0x205),'width':0x7d},{'field':_0x17a131(0x1f0),'title':'备注','hide':!![],'width':0x29c}]]}),_0x4b6927['on'](_0x17a131(0x20b),function(_0x5eded5){var _0x20306f=_0x17a131;return _0x5beabf[_0x20306f(0x1e7)]('test',{'url':_0x20306f(0x1e4),'where':_0x5eded5[_0x20306f(0x201)],'method':_0x20306f(0x1e1),'page':{'curr':0x1}}),![];});}));function _0x42df(_0x2e4294,_0x37035e){var _0x418226=_0x4182();return _0x42df=function(_0x42df4f,_0x628e7f){_0x42df4f=_0x42df4f-0x1db;var _0x1cea41=_0x418226[_0x42df4f];return _0x1cea41;},_0x42df(_0x2e4294,_0x37035e);}function _0x4182(){var _0x2348c9=['exports','未完成','审核客服','6245536bPXqcY','field','接单时长😊','../controller/user_form_list.php','LAYTABLE_TIPS','剩余余额','3290364cOtunj','未知状态','game_category','layui-icon-tips','5052712XpPGVM','submit(doSearch)','laydate','.layui-table-tool-temp{padding-right:\x20125px;}','服务状态','customer_service','#test','st_time','gameup','join','play_user','424146sZSDRo','get','playuser_amount','陪玩名字','../controller/user_select_list.php','start_time','4367132aAjPpG','reload','dropdown','种类价格','table','left','form','开始时间','进行中','print','notes','5fnmthJ','380140pFGtTk','use','144PISTxc','util','14JeHIvK','游戏种类','已完成','88516fUwGxl','filter','state','老板名称'];_0x4182=function(){return _0x2348c9;};return _0x4182();}
    </script>

    <?php
    include 'foot.php';
    ?>