<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<xblock>
    <button class="layui-btn" id="sx"><i class="iconfont">&#xe6aa;</i>&nbsp;&nbsp;刷新</button>
    <span class="x-right" style="line-height:40px">本页共有数据：<b style="color:red;">{{$count}}</b> 条</span>
</xblock>
<table class="layui-table">
    <thead>
    <tr>
        <th>课程类别</th>
	<th>课程阶段</th>
	<th>课程季度</th>
        <th>课程名称</th>
        <th>课节标题</th>
        <th>操作</th>
    </thead>
    <tbody>
    @foreach($data as $k=>$v)
        <tr>
            <td>{{$v['sub_name']}}</td>
	    <td>{{$v['grade']}}</td>
	   <td>{{$v['season']}}</td>
	    <td>{{$v['cla_name']}}</td>
		<td>{{$v['cha_name']}}</td>

		 <td class="td-manage">
	<a href="/picture?id={{$v['cha_id']}}">
                <button class="layui-btn layui-btn-xs" style="background:#30A9BD;"><i class="iconfont">&#xe74e;&nbsp;&nbsp;开始备课</i></button>
                </a>&nbsp;&nbsp;
                <a title="收藏" class="collect"  onclick="" href="javascript:;" cha_id="{{$v['cha_id']}}">
                <button class="layui-btn layui-btn-xs" style="background:#C34A72;"><i class="iconfont">&#xe7ce;&nbsp;&nbsp;收藏</i></button>
                </a>&nbsp;&nbsp;
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
        $(".collect").click(function(){
            var cha_id =$(this).attr('cha_id');
            $.ajax({
                type: 'post',
                data:{cha_id:cha_id},
                dateType:'json',
                url: "/collectadd",
                success:function(msg){
                    alert(msg.msg);
                }
            });
        })
        $("#sx").click(function(){
            location.reload();
        })
    })
</script>
