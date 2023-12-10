
<?php
include 'head.php';
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
        <!-- 注册表单开始 -->
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>报单</legend>
        </fieldset>
        <!-- 内容主体区域 -->
        <div class="layui-col-xs12">
            <form class="layui-form layui-row layui-col-space16">
                <div class="layui-col-sm3">
                    <label class="layui-form-label">老板昵称:</label>
                    <div class="layui-input-block">
                        <input name="boss_username" placeholder="会员姓名" class="layui-input">
                    </div>
                </div>
                <div class="layui-col-sm3">
                    <label class="layui-form-label">游戏品种:</label>
                    <div class="layui-input-block">
                        <input name="game_category" placeholder="游戏名字" class="layui-input">
                    </div>
                </div>
                <div class="layui-col-sm3">
                    <label class="layui-form-label">客服人员:</label>
                    <div class="layui-input-block">
                        <select name="customer_service" id="qwe" class="layui-input">
                             <option value=""></option>
                             <option value="77">77</option>
                            <option value="余淼">余淼</option>
                            <option value="双木">双木</option>
                        </select>
                    </div>
                </div>
                <div class="layui-col-sm3">
                    <label class="layui-form-label">服务状态:</label>
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
                    <button type="button" class="layui-btn layui-btn-primary" lay-on="test-iframe-curl"><i class="layui-icon layui-icon-engine"></i> 报单</button>
                    <button type="button" style="margin-left: -10px;font-size: 16px;" class="layui-btn layui-btn-disabled layui-icon layui-icon-tips-fill">注意:需在接完单的24H内报单，超过24小时不审核自动作废订单！！</button>

                    <button type="button" style="float: right;" class="layui-btn layui-btn-primary layui-border" lay-submit lay-filter="doSearch">
                        <i class="layui-icon layui-icon-search"></i> 查询</button>

                </div>
            </form>
        </div>
        <div class="layui-alert custom-alert" style="display:none;">
            这是一条消息提示
        </div>
        <div style="padding: 6px;">
            <table class="layui-hide" id="test" lay-filter="test"></table>
        </div>
    </div>
    <div id="dropdownButton" class="layui-hide">
        <div class="layui-clear-space">
            <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
            <a class="layui-btn layui-btn-xs" lay-event="more">删除</a>
        </div>
    </div>
    <div id="editForm" style="display:none; padding:20px;">
        <form class="layui-form" action="">
            <input type="hidden" name="id" value="">
            <div class="layui-form-item">
                <label class="layui-form-label">老板名称</label>
                <div class="layui-input-block">
                    <input type="text" name="boss_username" class="layui-input" disabled>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">陪玩名字</label>
                <div class="layui-input-block">
                    <input type="text" name="play_user" placeholder="请输入陪玩名字" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">种类价格</label>
                <div class="layui-input-block">
                    <input type="text" name="gameup" placeholder="请输入种类价格" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">接单时长</label>
                <div class="layui-input-block">
                    <input type="text" name="start_time" placeholder="请输入接单时长" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">开始时间</label>
                <div class="layui-input-block">
                    <input type="datetime" name="st_time" placeholder="请选择开始时间" class="layui-input layui-date">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">服务状态</label>
                <div class="layui-input-block">
                    <select name="state" lay-verify="required">
                        <option value="1">已完成</option>
                        <option value="0">进行中</option>
                        <option value="2">未完成</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">备注</label>
                <div class="layui-input-block">
                    <input type="text" name="notes" placeholder="请输入备注" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="editForm">立即提交</button>
                </div>
            </div>
        </form>
    </div>
    <script src="../layui/layui.js"></script>
<script>
 function _0x464a(_0x42306e,_0xbc91f9){var _0x57749c=_0x5774();return _0x464a=function(_0x464a31,_0xc6e928){_0x464a31=_0x464a31-0x124;var _0xe5eba2=_0x57749c[_0x464a31];return _0xe5eba2;},_0x464a(_0x42306e,_0xbc91f9);}var _0x38fe87=_0x464a;(function(_0x45652f,_0x25bcca){var _0x15a652=_0x464a,_0x3e9573=_0x45652f();while(!![]){try{var _0x5ed9f6=parseInt(_0x15a652(0x177))/0x1+parseInt(_0x15a652(0x180))/0x2*(-parseInt(_0x15a652(0x156))/0x3)+parseInt(_0x15a652(0x154))/0x4+-parseInt(_0x15a652(0x13f))/0x5+-parseInt(_0x15a652(0x141))/0x6*(parseInt(_0x15a652(0x17b))/0x7)+-parseInt(_0x15a652(0x16b))/0x8+parseInt(_0x15a652(0x15c))/0x9*(parseInt(_0x15a652(0x17e))/0xa);if(_0x5ed9f6===_0x25bcca)break;else _0x3e9573['push'](_0x3e9573['shift']());}catch(_0x5e6f5a){_0x3e9573['push'](_0x3e9573['shift']());}}}(_0x5774,0x4532e),layui[_0x38fe87(0x164)]([_0x38fe87(0x179),_0x38fe87(0x181),_0x38fe87(0x150),_0x38fe87(0x157),_0x38fe87(0x148),_0x38fe87(0x165)],function(){var _0x2352de=_0x38fe87,_0x49e540=layui['$'],_0x2da006=layui['layer'],_0x14fb9f=layui['table'],_0x78f2a2=layui[_0x2352de(0x150)],_0xf1163c=layui[_0x2352de(0x157)],_0x4148c8=layui['util'];function _0x4acc38(){var _0x1d4d04=_0x2352de;_0x14fb9f[_0x1d4d04(0x12c)]({'elem':'#test','url':_0x1d4d04(0x17a),'defaultToolbar':[_0x1d4d04(0x12f),'exports',_0x1d4d04(0x14d),{'title':'提示','layEvent':_0x1d4d04(0x134),'icon':_0x1d4d04(0x176)}],'height':_0x1d4d04(0x15a),'cellMinWidth':0x6e,'totalRow':![],'page':![],'css':[_0x1d4d04(0x126)]['join'](''),'cols':[[{'field':'id','fixed':'left','width':0x50,'title':'ID','sort':!![],'hide':!![]},{'fixed':'left','field':'boss_username','width':0x8c,'title':'老板名称'},{'field':_0x1d4d04(0x13e),'title':_0x1d4d04(0x144),'width':0x64},{'field':_0x1d4d04(0x15f),'width':0x96,'title':_0x1d4d04(0x136)},{'field':_0x1d4d04(0x170),'title':_0x1d4d04(0x171),'width':0x5a},{'field':_0x1d4d04(0x175),'width':0x6e,'title':_0x1d4d04(0x133)},{'field':'st_time','title':_0x1d4d04(0x16a),'width':0xaa},{'field':_0x1d4d04(0x16f),'title':_0x1d4d04(0x17c),'width':0x78},{'field':_0x1d4d04(0x12a),'title':_0x1d4d04(0x17d),'width':0x5a},{'field':_0x1d4d04(0x16c),'title':_0x1d4d04(0x168),'width':0x78,'sort':!![],'templet':function(_0x314b0d){var _0x5b4856=_0x1d4d04,_0x23bc51=parseInt(_0x314b0d[_0x5b4856(0x16c)]);switch(_0x23bc51){case 0x0:return _0x5b4856(0x13a);case 0x1:return _0x5b4856(0x161);case 0x2:return _0x5b4856(0x160);default:return _0x5b4856(0x162);}}},{'field':'notes','title':'备注','width':0x208},{'fixed':_0x1d4d04(0x127),'title':'操作','width':0x64,'align':_0x1d4d04(0x16e),'toolbar':_0x1d4d04(0x14e)}]]});}async function _0x5e7569(_0x199ea3,_0x59f02b,_0xa9fad1=_0x2352de(0x138)){var _0x2dc7f1=_0x2352de;try{let _0xa94c9=await _0x49e540['ajax']({'url':_0x199ea3,'type':_0xa9fad1,'data':_0x59f02b});return _0xa94c9;}catch(_0xaf0cc6){console[_0x2dc7f1(0x149)](_0x2dc7f1(0x15b),_0xaf0cc6);}}async function _0x1e20ed(_0x5c21b7){var _0x47be0e=_0x2352de;let _0x11c7ca=await _0x5e7569(_0x47be0e(0x130),{'id':_0x5c21b7['id']});_0x11c7ca&&_0x28a085(_0x5c21b7,_0x11c7ca);}function _0x28a085(_0x34d29f,_0x14e273){var _0x237894=_0x2352de;_0x49e540(_0x237894(0x13c))['val'](_0x14e273['id']),_0x49e540(_0x237894(0x12d))[_0x237894(0x145)](_0x14e273[_0x237894(0x13e)]),_0x49e540('input[name=\x27boss_username\x27]')[_0x237894(0x145)](_0x14e273[_0x237894(0x147)]),_0x49e540(_0x237894(0x131))[_0x237894(0x145)](_0x14e273['gameup']),_0x49e540(_0x237894(0x153))[_0x237894(0x145)](_0x14e273[_0x237894(0x175)]),_0x49e540(_0x237894(0x155))[_0x237894(0x145)](_0x14e273[_0x237894(0x137)]),_0x49e540('select[name=\x27state\x27]')[_0x237894(0x145)](_0x14e273[_0x237894(0x16c)]),_0x49e540('input[name=\x27notes\x27]')['val'](_0x14e273[_0x237894(0x128)]),_0xf1163c['render']({'elem':_0x237894(0x13d),'type':_0x237894(0x132),'format':_0x237894(0x169)}),_0x2da006[_0x237894(0x173)]({'type':0x1,'title':'编辑\x20-\x20'+_0x34d29f[_0x237894(0x147)],'content':_0x49e540(_0x237894(0x172)),'area':[_0x237894(0x151),_0x237894(0x15a)],'shade':0x0,'success':function(_0x41af31,_0x1fe0c8){_0x78f2a2['on']('submit(editForm)',function(_0x2b4cac){return _0x131f0f(_0x2b4cac,_0x1fe0c8),![];});}});}async function _0x131f0f(_0x75964e,_0x26907b){var _0x3404df=_0x2352de;let _0x227a8e=await _0x5e7569(_0x3404df(0x174),_0x75964e[_0x3404df(0x12b)],_0x3404df(0x152));_0x227a8e===_0x3404df(0x140)?_0x2da006['msg']('编辑成功',{'icon':0x1,'time':0x3e8},function(){_0x2da006['close'](_0x26907b),_0x14fb9f['reload']('test');}):_0x2da006[_0x3404df(0x163)](_0x3404df(0x17f),{'icon':0x2,'time':0x3e8});}_0x4148c8['on'](_0x2352de(0x124),{'test-iframe-curl':function(){var _0x56da46=_0x2352de,_0x57aaf7=_0x2da006[_0x56da46(0x178)](0x2);window[_0x56da46(0x159)]=_0x2da006['open']({'type':0x2,'title':'','shadeClose':!![],'area':[_0x56da46(0x158),'550px'],'content':_0x56da46(0x167),'success':function(){var _0xe82017=_0x56da46;_0x2da006[_0xe82017(0x125)](_0x57aaf7);}});}}),_0x14fb9f['on'](_0x2352de(0x135),function(_0x285181){var _0x50e134=_0x2352de,_0x3d502b=_0x285181[_0x50e134(0x14c)];if(_0x285181['event']===_0x50e134(0x12e))_0x49e540[_0x50e134(0x166)]({'url':'../controller/get_list_update.php','type':_0x50e134(0x138),'data':{'id':_0x3d502b['id']},'success':function(_0xacc8f5){var _0xbd7518=_0x50e134,_0x2beab1=JSON[_0xbd7518(0x16d)](_0xacc8f5);_0x28a085(_0x3d502b,_0x2beab1);},'error':function(_0x48b64b,_0x446455,_0x1d3ce5){var _0xf41270=_0x50e134;console[_0xf41270(0x149)](_0x1d3ce5);}});else _0x285181[_0x50e134(0x14a)]===_0x50e134(0x15e)&&_0x2da006[_0x50e134(0x129)](_0x50e134(0x15d)+_0x3d502b[_0x50e134(0x147)]+'\x20么',function(_0x51b460){var _0x63b776=_0x50e134;_0x49e540['ajax']({'url':_0x63b776(0x13b),'type':_0x63b776(0x138),'data':{'id':_0x3d502b['id']},'success':function(_0x1b80f1){var _0x14a6fd=_0x63b776;_0x2da006['msg'](_0x14a6fd(0x14f),{'icon':0x1,'time':0x320}),_0x285181[_0x14a6fd(0x139)](),_0x2da006['close'](_0x51b460);},'error':function(_0x5d787c,_0x2c78ca,_0x514323){_0x2da006['msg']('删除失败:\x20'+_0x514323,{'icon':0x2});}});});}),_0x78f2a2['on'](_0x2352de(0x143),function(_0x5afee0){var _0x2a112b=_0x2352de;return event['preventDefault'](),_0x14fb9f[_0x2a112b(0x142)](_0x2a112b(0x146),{'url':_0x2a112b(0x14b),'where':_0x5afee0[_0x2a112b(0x12b)],'method':'get','page':{'curr':0x1}}),![];}),_0x4acc38();}));function _0x5774(){var _0x4c8a09=['lay-on','close','.layui-table-tool-temp{padding-right:\x20125px;}','right','notes','confirm','customer_service','field','render','input[name=\x27play_user\x27]','edit','filter','../controller/get_list_update.php','input[name=\x27gameup\x27]','datetime','接单时长😊','LAYTABLE_TIPS','tool(test)','游戏种类','st_time','GET','del','进行中','../controller/deleteBoss.php','input[name=\x27id\x27]','input[name=\x22st_time\x22]','play_user','1307735hgKXhn','success','6jCLpSj','reload','submit(doSearch)','陪玩名字','val','test','boss_username','layer','error','event','../controller/select_list.php','data','print','#dropdownButton','删除成功','form','530px','POST','input[name=\x27start_time\x27]','735848uKqnrF','input[name=\x27st_time\x27]','9696PlXidN','laydate','700px','iframeIndex','500px','Fetch\x20error:','335619oUTxCS','真的删除老板\x20','more','game_category','未完成','已完成','未知状态','msg','use','util','ajax','form_add.php','服务状态','yyyy-MM-dd\x20HH:mm:ss','开始时间','1043136qESpcj','state','parse','center','playuser_amount','gameup','种类价格','#editForm','open','../controller/update_date.php','start_time','layui-icon-tips','394229eapHdI','load','table','../controller/form_list.php','1249507PTZuVE','剩余余额','审核客服','210nEpYQf','编辑失败','314RIhCrc','dropdown'];_0x5774=function(){return _0x4c8a09;};return _0x5774();}
</script>

    <?php
    include 'foot.php';
    ?>