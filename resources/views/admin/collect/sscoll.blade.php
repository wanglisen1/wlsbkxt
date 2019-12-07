<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<form class="layui-form layui-col-md12 x-so" style="margin-top:20px;" action="/sscoll" method="POST" >
<div style="float:left;width:300px;height:40px;">
	 <div style="width:70px;height:35px;background-color:#2093bf;line-height:35px;border-radius:2px;float:left;margin-left:5px;" align="center" onclick="window.history.back()">
          <i class="iconfont" style="color:#fff;">&#xe697;&nbsp;&nbsp;返回</i>
          </div>
          <div style="width:70px;height:35px;background-color:#2093bf;line-height:35px;border-radius:2px;float:left;margin-left:5px;" id="sx" align="center">
          <i class="iconfont" style="color:#fff;">&#xe6aa;&nbsp;&nbsp;刷新</i>
          </div>
	</div>
        <div style="float:left;margin-left:50px;">
        <span class="x-right" style="line-height:40px">本页共有数据：<b style="color:red;">{{$count}}</b>条</span>
        </div>
</form>
@if($role!=3)
<table class="layui-table">
    <thead>
    <tr>
        <th style="text-align:center;">课程类别</th>
	<th style="text-align:center;">课程阶段</th>
	<th style="text-align:center;">课程季度</th>
        <th style="text-align:center;">课程名称</th>
	<th style="text-align:center;">课节标题</th>
        <th style="text-align:center;">操作</th>
    </thead>
    <tbody>
    @foreach($data as $k=>$v)
        <tr>
            <td style="text-align:center;">{{$v['sub_name']}}</td>
	    <td style="text-align:center;">{{$v['grade']}}</td>
	     <td style="text-align:center;">{{$v['season']}}</td>
            <td style="text-align:center;">{{$v['cla_name']}}</td>
	    <td style="text-align:center;">{{$v['cha_name']}}</td>
		<td class="td-manage" style="text-align:center;">
		 <a href="/picture?id={{$v['cha_id']}}">
                <button class="layui-btn layui-btn-xs" style="background:#30A9BD;"><i class="iconfont" >&#xe74e;&nbsp;&nbsp;观看教材</i></button>
                </a>&nbsp;&nbsp;
        @if($v['is_show']==1)
		 <a title="未完成" class="del"  onclick="" href="javascript:;" cha_id="{{$v['cha_id']}}">
                <button class="layui-btn layui-btn-xs" style="background:#C34A72;"><i class="iconfont">&#xe6b7;&nbsp;&nbsp;未完成</i></button>
                </a>&nbsp;&nbsp;
        @else
        <a title="已完成"  href="javascript:;">
                <button class="layui-btn layui-btn-xs" style=""><i class="iconfont">&#xe6b1;&nbsp;&nbsp;已完成</i></button>
                </a>&nbsp;&nbsp;
        @endif
       
		</td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
<table class="layui-table">
    <thead>
    <tr>
        <th style="text-align:center;">教师</th>
        <th style="text-align:center;">课程类别</th>
    <th style="text-align:center;">课程阶段</th>
    <th style="text-align:center;">课程季度</th>
        <th style="text-align:center;">课程名称</th>
	<th style="text-align:center;">课节标题</th>
	<th style="text-align:center;">备课时间</th>
	<th style="text-align:center;">完成时间</th>
        <th style="text-align:center;">操作</th>
    </thead>
    <tbody>
    @foreach($data as $k=>$v)
        <tr>
            <td style="text-align:center;">{{$v['username']}}</td>
            <td style="text-align:center;">{{$v['sub_name']}}</td>
        <td style="text-align:center;">{{$v['grade']}}</td>
         <td style="text-align:center;">{{$v['season']}}</td>
            <td style="text-align:center;">{{$v['cla_name']}}</td>
	<td style="text-align:center;">{{$v['cha_name']}}</td>
	<td style="text-align:center;">{{$v['collect_time']}}</td>
	<td style="text-align:center;">{{$v['finish_time']}}</td>
        <td class="td-manage" style="text-align:center;">
         <a href="/picture?id={{$v['cha_id']}}">
                <button class="layui-btn layui-btn-xs" style="background:#30A9BD;"><i class="iconfont" >&#xe74e;&nbsp;&nbsp;观看教材</i></button>
                </a>&nbsp;&nbsp;
        @if($v['is_show']==1)
         <a title="未完成">
                <button class="layui-btn layui-btn-xs" style="background:#C34A72;"><i class="iconfont">&#xe6b7;&nbsp;&nbsp;未完成</i></button>
                </a>&nbsp;&nbsp;
        @else
        <a title="已完成"   onclick="" href="javascript:;" >
                <button class="layui-btn layui-btn-xs" style=""><i class="iconfont">&#xe6b1;&nbsp;&nbsp;已完成</i></button>
                </a>&nbsp;&nbsp;
        @endif
         <a title="删除" class="xzsc"  onclick="" href="javascript:;"
        coll_id="{{$v['coll_id']}}">
                <button class="layui-btn layui-btn-xs" style="background:red;"><i class="iconfont">&#xe69d;&nbsp;&nbsp;删除</i></button>
                </a>
        </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif


</div>
<script src="/jquery-3.1.1.min.js"></script>
<script>
    $(function(){
        $(".del").click(function(){
            var cha_id =$(this).attr('cha_id');
             var r = confirm('您确定完成了么？');
             if (r == true) {
            $.ajax({
                type: 'post',
                data:{cha_id:cha_id},
                dateType:'json',
                url: "/collectdel",
                success:function(msg){
                    location.reload();
                }
            });
            } else {

            }
        })
        $("#sx").click(function(){
            location.reload();
        })
        $(".xzsc").click(function(){
            var coll_id =$(this).attr('coll_id');
             var r = confirm('您确定删除么？');
             if (r == true) {
            $.ajax({
                type: 'post',
                data:{coll_id:coll_id},
                dateType:'json',
                url: "/collectxzsc",
                success:function(msg){
                    location.reload();
                }
            });
            } else {

            }
	})
	 $("#sx").click(function(){
		                   window.location.reload()
					                   })
    })
</script>
