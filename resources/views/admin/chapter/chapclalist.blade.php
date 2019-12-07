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
