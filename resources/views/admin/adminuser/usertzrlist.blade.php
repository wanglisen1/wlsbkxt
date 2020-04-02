<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">
<link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<script type="text/javascript" src="/alerttc/js/popup.js"></script>
<xblock>
    <button class="layui-btn" onclick="x_admin_show('添加用户','/useradd')"><i class="layui-icon"></i>添加</button>
    <button class="layui-btn" id="sx"><i class="iconfont">&#xe6aa;</i>&nbsp;&nbsp;刷新</button>

    <span class="x-right" style="line-height:40px">本页共有数据：<b style="color:red;">{{$count}}</b> 条</span>
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
        <th>校长总额</th>
        <th>主管总额</th>
        <th>教师总额</th>
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
        <td>投资人</td>
        <td>{{$v['addtime']}}</td>
        <td>{{$v['addxz']}}</td>
        <td>{{$v['addzg']}}</td>
        <td>{{$v['addjs']}}</td>
        <td class="td-manage">

            <a title="查看所属员工"  onclick="" href="/tzrclassify?id={{$v['u_id']}}">
                <i class="iconfont">&#xe6e6;&nbsp;</i>
            </a>
            <a title="编辑"  onclick="" href="/userlistupdate?id={{$v['u_id']}}&tzr=1">
                <i class="layui-icon">&#xe642;</i>
            </a>
            <a title="删除" class="del"  href="javascript:;" u_id="{{$v['u_id']}}">
                <i class="layui-icon">&#xe640;</i>
            </a>

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
        $(".del").click(function(){
            var u_id =$(this).attr('u_id');
            //alert(u_id);return false;
             function confirmData () {
                 $.ajax({
                    type: 'post',
                    data: {u_id:u_id},
                    dateType: 'json',
                    url: "/userdel",
                    success: function (msg) {
                        if (msg.code == 1) {
                            location.reload();
                        }else{
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
    })
</script>
