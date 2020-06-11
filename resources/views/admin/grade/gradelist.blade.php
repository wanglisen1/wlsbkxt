<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<style type="text/css">
    .layui-btn {
         background-color: #F43B5F;
    }
</style>
<xblock>
    <button class="layui-btn" onclick="x_admin_show('添加用户','/gradeaddlist')"><i class="layui-icon"></i>添加</button>
    <button class="layui-btn" id="sx"><i class="iconfont">&#xe6aa;</i>&nbsp;&nbsp;刷新</button>

    <span class="x-right" style="line-height:40px">本页共有数据：<b style="color:red;">{{$count}}</b> 条</span>
</xblock>
<table class="layui-table">
    <thead>
    <tr>
        <th>科目</th>
        <th>年级阶段名称</th>
        <th>年级添加时间</th>
        <th>年级阶段状态</th>
        <th>操作</th>
    </thead>
    <tbody>
    @foreach($data as $k=>$v)
        <tr>
            <td>{{$v['sub_name']}}</td>
            <td>{{$v['grade']}}</td>
            <td>{{$v['add_time']}}</td>
            <td>启用</td>
            <td class="td-manage">
                <a title="编辑"  onclick="" href="/gradelistupdate?id={{$v['g_id']}}">
                    <i class="layui-icon">&#xe642;</i>
                </a>
                <a title="禁用" class="del" onclick="" href="javascript:;" g_id="{{$v['g_id']}}">
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
            var g_id =$(this).attr('g_id');
            $.ajax({
                type: 'post',
                data:{g_id:g_id},
                dateType:'json',
                url: "/gradedel",
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
