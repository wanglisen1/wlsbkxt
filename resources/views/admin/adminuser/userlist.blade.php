<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<style>
    .pagination li{
        float:left;
        margin:10px 10px 10px 10px;

    }
    .pagination{
        display:inline-block;padding-left:0;margin:20px 0;border-radius:4px
    }
    .pagination>li{display:inline}
    .pagination>li>a,
    .pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#337ab7;text-decoration:none;background-color:#fff;border:1px solid #ddd}
    .pagination>li:first-child>a,
    .pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}
    .pagination>li:last-child>a,
    .pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}
    .pagination>li>a:focus,
    .pagination>li>a:hover,
    .pagination>li>span:focus,
    .pagination>li>span:hover{z-index:2;color:#23527c;background-color:#eee;border-color:#ddd}
    .pagination>.active>a,
    .pagination>.active>a:focus,
    .pagination>.active>a:hover,
    .pagination>.active>span,
    .pagination>
    .active>span:focus,
    .pagination>
    .active>span:hover{z-index:3;color:#fff;cursor:default;background-color:#337ab7;border-color:#337ab7}
    .pagination>
    .disabled>a,
    .pagination>
    .disabled>a:focus,
    .pagination>
    .disabled>a:hover,
    .pagination>
    .disabled>span,
    .pagination>
    .disabled>span:focus,
    .pagination>
    .disabled>span:hover{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}
    .pagination-lg>li>a,
    .pagination-lg>li>span{padding:10px 16px;font-size:18px;line-height:1.3333333}
    .pagination-lg>li:first-child>a,
    .pagination-lg>li:first-child>span{border-top-left-radius:6px;border-bottom-left-radius:6px}
    .pagination-lg>li:last-child>a,
    .pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}
    .pagination-sm>li>a,
    .pagination-sm>li>span{padding:5px 10px;font-size:12px;line-height:1.5}
    .pagination-sm>li:first-child>a,
    .pagination-sm>li:first-child>span{border-top-left-radius:3px;border-bottom-left-radius:3px}
</style>
<xblock>
    <button class="layui-btn" onclick="x_admin_show('添加用户','/useradd')"><i class="layui-icon"></i>添加</button>
    <button class="layui-btn" id="sx"><i class="iconfont">&#xe6aa;</i>&nbsp;&nbsp;刷新</button>

    <span class="x-right" style="line-height:40px">本页共有数据：<b style="color:red;">{{$count}}</b> 条</span>
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
        <td>{{$v['u_id']}}</td>
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
        <th>{{$v['addtime']}}</th>
        <td class="td-manage">

            <a title="编辑"  onclick="" href="/userlistupdate?id={{$v['u_id']}}">
                <i class="layui-icon">&#xe642;</i>
            </a>
            <a title="删除" class="del" onclick="" href="javascript:;" u_id="{{$v['u_id']}}">
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
    $(function(){

        $(".del").click(function(){
            var u_id =$(this).attr('u_id');
            $.ajax({
                type: 'post',
                data:{u_id:u_id},
                dateType:'json',
                url: "/userdel",
                success:function(msg){
                    alert(msg.msg);
                    location.reload();
                }
            });
        })
        $("#sx").click(function(){
            location.reload();
        })
    })
</script>
