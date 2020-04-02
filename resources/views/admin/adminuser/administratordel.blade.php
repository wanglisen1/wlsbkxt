<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">
<link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<script type="text/javascript" src="/alerttc/js/popup.js"></script>
<xblock>
    <button class="layui-btn" id="sx"><i class="iconfont">&#xe6aa;</i>&nbsp;&nbsp;刷新</button>
    <span class="x-right" style="line-height:40px">共有数据：<b style="color:red;">{{$count}}</b> 条</span>
</xblock>
<table class="layui-table">
    <thead>
    <tr>

        <th>ID</th>
        <th>登录名</th>
        <th>手机</th>
        <th>邮箱</th>
        <th>性别</th>
        <th>角色</th>
        <th>加入时间</th>
        <th>操作</th>
    </thead>
    <tbody>
    @foreach($data as $k=>$v)
        <tr>
            <td >{{$v['u_id']}}</td>
            <td>{{$v['username']}}</td>
            <td>{{$v['tel']}}</td>
            <td>{{$v['email']}}</td>
            @if($v['sex']==2)
                <td>男</td>
            @elseif($v['sex']==1)
                <td>女</td>
            @endif
            @if($v['role']==1)
                <td>总管理员</td>
            @elseif($v['role']==2)
                <td>管理员</td>
            @elseif($v['role']==3)
                <td>加盟校长</td>
            @elseif($v['role']==4)
                <td>语文教师</td>
            @elseif($v['role']==5)
                <td>数学教师</td>
            @elseif($v['role']==6)
                <td>英语教师</td>
            @endif
            <td>{{$v['addtime']}}</td>
            <td class="td-manage">
                        <button class="layui-btn upd"  u_id="{{$v['u_id']}}" style="background:#2093bf;">启用</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="page">
   <span class="pagejump" >
            {{$data->links()}}
    </span>
</div>

</div>
<script src="/jquery-3.1.1.min.js"></script>
<script>
        var Popup = new Popup();
</script>
<script>
    $(function(){
        $(".upd").click(function(){
            var u_id =$(this).attr('u_id');
            $.ajax({
                type: 'post',
                data:{u_id:u_id},
                dateType:'json',
                url: "/Administratordels",
                success:function(msg){
                    //Popup.alert('HSKMS提示',msg.msg);
                    location.reload();
                }
            });
        })
        $("#sx").click(function(){
            location.reload();
        })
    })


</script>
