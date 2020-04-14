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
                @elseif($v['role']==26)
                <td>总部教研（语文）</td>
                @elseif($v['role']==27)
                <td>总部教研（数学）</td>
                @elseif($v['role']==28)
                <td>总部教研（英语）</td>
                @elseif($v['role']==3)
                <td>投资人</td>
                @elseif($v['role']==4)
                <td>加盟校长</td>
                @elseif($v['role']==5)
                <td>主管</td>
                @elseif($v['role']==6)
                <td>教师</td>
            @endif
            <td>{{$v['addtime']}}</td>
            <td class="td-manage">
                <a title="启用该账户" class="userblockupd" href="javascript:;" u_id="{{$v['u_id']}}">
                <i class="iconfont" style="font-size:25px;">&nbsp;&#xe6b1;</i>
            </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
<script src="/jquery-3.1.1.min.js"></script>
<script>
        var Popup = new Popup();
</script>
<script>
    $(function(){
        $(".userblockupd").click(function(){
            var u_id =$(this).attr('u_id');
             function confirmData () {
                 $.ajax({
                    type: 'post',
                    data: {u_id: u_id},
                    dateType: 'json',
                    url: "/administratordels",
                    success: function (msg) {
                        if (msg.code == 1) {
                            window.location.reload()
                        }else{
                            Popup.alert('HSKMS提示','解除冻结失败');
                            return false;
                        }
                    }
                });   
            }
            var title = 'HSKMS提示',
            text = '您确定解除冻结该账户么？';
            Popup.confirm(title,text,confirmData);
        })
        $("#sx").click(function(){
            location.reload();
        })
    })


</script>
