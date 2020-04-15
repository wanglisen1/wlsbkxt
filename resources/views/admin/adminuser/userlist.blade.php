<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">
<link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<script type="text/javascript" src="/alerttc/js/popup.js"></script>
<style type="text/css">
    .loading {
 position: fixed;
 top: 0;
 bottom: 0;
 right: 0;
 left: 0;
 background-color: #f6ecec;
 opacity: 0.4;
 z-index: 1000;
}
 
.loading .gif {
 position: fixed;
   top :40%;
  left: 45%;
 margin-left: -16px;
 margin-top: -16px;
 z-index: 1001;
}
</style>
<div class="loading hide">
     <div class="gif" >
        <img src="/loadimg.gif" width="200px;">
     </div>
    </div>
<xblock>
    @if($role==1||$role==2||$role==3)
    <button class="layui-btn" onclick="x_admin_show('添加用户','/useradd')"><i class="layui-icon"></i>添加</button>
    @else
    @endif
    <button class="layui-btn" id="sx"><i class="iconfont">&#xe6aa;</i>&nbsp;&nbsp;刷新</button>

    <span class="x-right" style="line-height:40px">本页共有数据：<b style="color:red;">{{$count}}</b> 条</span>
</xblock>
<table class="layui-table">
     @if($role==9)
    <thead>
      <tr>
        <th>用户名</th>
        <th>电话</th>
        <th>邮箱</th>
        <th>加入时间</th>
        <th>角色</th>
        <th>操作</th>
    </tr>
    @else
    <tr>
        <th>用户名</th>
        <th>校区</th>
        <th>电话</th>
        <th>角色</th>
        <th>操作</th>
    </tr>
    </thead>
        @endif

    
@if($role==9)
     @foreach($data as $k=>$v)
     <tbody>
        <td>{{$v['username']}}</td>
        <td>{{$v['tel']}}</td>
        <td>{{$v['email']}}</td>
        <td>{{$v['addtime']}}</td>
        @if($v['role']==26)
        <td>语文教研</td>
        @elseif($v['role']==27)
        <td>数学教研</td>
        @elseif($v['role']==28)
        <td>英语教研</td>
        @endif
        <td class="td-manage">

            <a title="编辑"  onclick="" href="/userlistupdate?jy_id={{$v['u_id']}}">
                <i class="layui-icon">&#xe642;</i>
            </a>
            <a title="删除" class="jydel"  href="javascript:;" jy_id="{{$v['u_id']}}">
                <i class="layui-icon">&#xe640;</i>
            </a>
            <a title="冻结该账户" class="jyuserblock" href="javascript:;" jy_id="{{$v['u_id']}}">
                <i class="iconfont">&nbsp;&#xe82b;</i>
            </a>
        </td>
         </tbody>
        @endforeach
@else
@endif
@if($role==1||$role==2||$role==3)
    @foreach($data1 as $k=>$v)
    <tr>
        <td>{{$v['xz_name']}}</td>
        <td>{{$v['xz_school']}}</td>
        <td>{{$v['xz_phone']}}</td>
        <td>校长</td>
        <td class="td-manage">

            <a title="编辑"  onclick="" href="/userlistupdate?xz_id={{$v['xz_id']}}">
                <i class="layui-icon">&#xe642;</i>
            </a>
            <a title="删除" class="xzdel"  href="javascript:;" xz_id="{{$v['xz_id']}}">
                <i class="layui-icon">&#xe640;</i>
            </a>
            <a title="冻结该账户" class="xzuserblock" href="javascript:;" xz_id="{{$v['xz_id']}}">
                <i class="iconfont">&nbsp;&#xe82b;</i>
            </a>
        </td>
    </tr>
        @endforeach
@endif
@if($role==1||$role==2||$role==3||$role==4)
        @foreach($data2 as $k=>$v)
    <tr>
        <td>{{$v['zg_name']}}</td>
        <td>{{$v['zg_school']}}</td>
        <td>{{$v['zg_phone']}}</td>
        <td>主管</td>
        <td class="td-manage">

            <a title="编辑"  onclick="" href="/userlistupdate?zg_id={{$v['zg_id']}}">
                <i class="layui-icon">&#xe642;</i>
            </a>
            <a title="删除" class="zgdel"  href="javascript:;" zg_id="{{$v['zg_id']}}">
                <i class="layui-icon">&#xe640;</i>
            </a>
            <a title="冻结该账户" class="zguserblock" href="javascript:;" zg_id="{{$v['zg_id']}}">
                <i class="iconfont">&nbsp;&#xe82b;</i>
            </a>
        </td>
    </tr>
        @endforeach
@endif
@if($role==1||$role==2||$role==3||$role==4||$role==5)
         @foreach($data3 as $k=>$v)
    <tr>
        <td>{{$v['js_name']}}</td>
        <td>{{$v['js_school']}}</td>
        <td>{{$v['js_phone']}}</td>
        <td>教师</td>
        <td class="td-manage">

            <a title="编辑"  onclick="" href="/userlistupdate?js_id={{$v['js_id']}}">
                <i class="layui-icon">&#xe642;</i>
            </a>
            <a title="删除" class="jsdel"  href="javascript:;" js_id="{{$v['js_id']}}">
                <i class="layui-icon">&#xe640;</i>
            </a>
            <a title="冻结该账户" class="jsuserblock" href="javascript:;" js_id="{{$v['js_id']}}">
                <i class="iconfont">&nbsp;&#xe82b;</i>
            </a>
        </td>
    </tr>
        @endforeach
    @endif
@if($role==26||$role==27||$role==28)
     @foreach($data4 as $k=>$v)
      <tr>
        <td>{{$v['js_name']}}</td>
        <td>{{$v['js_school']}}</td>
        <td>{{$v['js_phone']}}</td>
        <td>教师</td>
        <td class="td-manage">

            <a title="编辑"  onclick="" href="/userlistupdate?js_id={{$v['js_id']}}">
                <i class="layui-icon">&#xe642;</i>
            </a>
            <a title="删除" class="jsdel"  href="javascript:;" js_id="{{$v['js_id']}}">
                <i class="layui-icon">&#xe640;</i>
            </a>
            <a title="冻结该账户" class="userblock" href="javascript:;" js_id="{{$v['js_id']}}">
                <i class="iconfont">&nbsp;&#xe82b;</i>
            </a>
        </td>
    </tr>
     @endforeach
@endif
    </tbody>
</table>

</div>
<script src="/jquery-3.1.1.min.js"></script>
<script>
        var Popup = new Popup();
</script>
<script>
    $(function(){
        $('div.loading').hide();
        $(".jydel").click(function(){
            var jy_id =$(this).attr('jy_id');
             function confirmData () {
                $('div.loading').show();
                 $.ajax({
                    type: 'post',
                    data: {jy_id: jy_id},
                    dateType: 'json',
                    url: "/userdel",
                    success: function (msg) {
                        if (msg.code == 1) {
                            $('div.loading').hide();
                           window.location.reload()
                        }else{
                            $('div.loading').hide();
                            Popup.alert('HSKMS提示','删除失败');
                            return false;
                        }
                    }
                });   
            }
            var title = 'HSKMS提示',
            text = '您确定删除么？';
            Popup.confirm(title,text,confirmData);
        })
        $(".xzdel").click(function(){
            var xz_id =$(this).attr('xz_id');
             function confirmData () {
                $('div.loading').show();
                 $.ajax({
                    type: 'post',
                    data: {xz_id: xz_id},
                    dateType: 'json',
                    url: "/userdel",
                    success: function (msg) {
                        if (msg.code == 1) {
                            $('div.loading').hide();
                            window.location.reload()
                        }else{
                            $('div.loading').hide();
                            Popup.alert('HSKMS提示','删除失败');
                            return false;
                        }
                    }
                });   
            }
            var title = 'HSKMS提示',
            text = '您确定删除么？';
            Popup.confirm(title,text,confirmData);
        })
        $(".zgdel").click(function(){
            var zg_id =$(this).attr('zg_id');
             function confirmData () {
                $('div.loading').show();
                 $.ajax({
                    type: 'post',
                    data: {zg_id: zg_id},
                    dateType: 'json',
                    url: "/userdel",
                    success: function (msg) {
                        if (msg.code == 1) {
                            $('div.loading').hide();
                            window.location.reload()
                        }else{
                            $('div.loading').hide();
                            Popup.alert('HSKMS提示','删除失败');
                            return false;
                        }
                    }
                });   
            }
            var title = 'HSKMS提示',
            text = '您确定删除么？';
            Popup.confirm(title,text,confirmData);
        })
        $(".jsdel").click(function(){
            var js_id =$(this).attr('js_id');
             function confirmData () {
                $('div.loading').show();
                 $.ajax({
                    type: 'post',
                    data: {js_id: js_id},
                    dateType: 'json',
                    url: "/userdel",
                    success: function (msg) {
                        if (msg.code == 1) {
                            $('div.loading').hide();
                            window.location.reload()
                        }else{
                            $('div.loading').hide();
                            Popup.alert('HSKMS提示','删除失败');
                            return false;
                        }
                    }
                });   
            }
            var title = 'HSKMS提示',
            text = '您确定删除么？';
            Popup.confirm(title,text,confirmData);
        })

        $("#sx").click(function(){
            location.reload();
        })
        $(".jyuserblock").click(function(){
           var jy_id =$(this).attr('jy_id');
             function confirmData () {
                $('div.loading').show();
                 $.ajax({
                    type: 'post',
                    data: {jy_id: jy_id},
                    dateType: 'json',
                    url: "/userblock",
                    success: function (msg) {
                        if (msg.code == 1) {
                            $('div.loading').hide();
                            window.location.reload()
                        }else{
                            $('div.loading').hide();
                            Popup.alert('HSKMS提示','冻结失败');
                            return false;
                        }
                    }
                });   
            }
            var title = 'HSKMS提示',
            text = '您确定冻结该账户么？';
            Popup.confirm(title,text,confirmData);
        })
        $(".xzuserblock").click(function(){
           var xz_id =$(this).attr('xz_id');
             function confirmData () {
                $('div.loading').show();
                 $.ajax({
                    type: 'post',
                    data: {xz_id: xz_id},
                    dateType: 'json',
                    url: "/userblock",
                    success: function (msg) {
                        if (msg.code == 1) {
                            $('div.loading').hide();
                            window.location.reload()
                        }else{
                            $('div.loading').hide();
                            Popup.alert('HSKMS提示','冻结失败');
                            return false;
                        }
                    }
                });   
            }
            var title = 'HSKMS提示',
            text = '您确定冻结该账户么？';
            Popup.confirm(title,text,confirmData);
        })
        $(".zguserblock").click(function(){
           var zg_id =$(this).attr('zg_id');
             function confirmData () {
                $('div.loading').show();
                 $.ajax({
                    type: 'post',
                    data: {zg_id: zg_id},
                    dateType: 'json',
                    url: "/userblock",
                    success: function (msg) {
                        if (msg.code == 1) {
                            $('div.loading').hide();
                            window.location.reload()
                        }else{
                            $('div.loading').hide();
                            Popup.alert('HSKMS提示','冻结失败');
                            return false;
                        }
                    }
                });   
            }
            var title = 'HSKMS提示',
            text = '您确定冻结该账户么？';
            Popup.confirm(title,text,confirmData);
        })
        $(".jsuserblock").click(function(){
           var js_id =$(this).attr('js_id');
             function confirmData () {
                $('div.loading').show();
                 $.ajax({
                    type: 'post',
                    data: {js_id: js_id},
                    dateType: 'json',
                    url: "/userblock",
                    success: function (msg) {
                        if (msg.code == 1) {
                            $('div.loading').hide();
                            window.location.reload()
                        }else{
                            $('div.loading').hide();
                            Popup.alert('HSKMS提示','冻结失败');
                            return false;
                        }
                    }
                });   
            }
            var title = 'HSKMS提示',
            text = '您确定冻结该账户么？';
            Popup.confirm(title,text,confirmData);
        })
         })
</script>