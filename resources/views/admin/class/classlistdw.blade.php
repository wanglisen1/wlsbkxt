<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<form class="layui-form layui-col-md12 x-so" style="margin-top:20px;" action="/sscladw" method="POST" >
        <div style="float:left;">
          <button class="layui-btn"    lay-filter="sreach"><i class="iconfont">&#xe6aa;</i>&nbsp;&nbsp;刷新</button>
        </div>
        <div class="layui-input-inline" style="margin-left:200px;float:left;">
	    <select name="grade" id="grade">
		<option value="">请选择一个级别</option>
		@if($role==1)
              <option value="三年级">三年级</option>
              <option value="四年级">四年级</option>
              <option value="五年级">五年级</option>
	      <option value="六年级">六年级</option>
		<option value="K1">K1</option>
              <option value="K2">K2</option>
              <option value="K3">K3</option>
              <option value="K4">K4</option>
              <option value="K5">K5</option>
              <option value="K6">K6</option>
              <option value="L1">L1</option>
              <option value="L2">L2</option>
              <option value="L3">L3</option>
	      <option value="L4">L4</option>
		@elseif($role==2)
              <option value="三年级">三年级</option>
              <option value="四年级">四年级</option>
              <option value="五年级">五年级</option>
              <option value="六年级">六年级</option>
                <option value="K1">K1</option>
              <option value="K2">K2</option>
              <option value="K3">K3</option>
              <option value="K4">K4</option>
              <option value="K5">K5</option>
              <option value="K6">K6</option>
              <option value="L1">L1</option>
              <option value="L2">L2</option>
              <option value="L3">L3</option>
	      <option value="L4">L4</option>
		@elseif($role==3)
		<option value="三年级">三年级</option>
              <option value="四年级">四年级</option>
              <option value="五年级">五年级</option>
              <option value="六年级">六年级</option>
                <option value="K1">K1</option>
              <option value="K2">K2</option>
              <option value="K3">K3</option>
              <option value="K4">K4</option>
              <option value="K5">K5</option>
              <option value="K6">K6</option>
              <option value="L1">L1</option>
              <option value="L2">L2</option>
              <option value="L3">L3</option>
	      <option value="L4">L4</option>
		@elseif($role==4)
		<option value="三年级">三年级</option>
              <option value="四年级">四年级</option>
              <option value="五年级">五年级</option>
	      <option value="六年级">六年级</option>
		@elseif($role==5)
		<option value="三年级">三年级</option>
              <option value="四年级">四年级</option>
              <option value="五年级">五年级</option>
              <option value="六年级">六年级</option>
		@elseif($role==6)
		<option value="K1">K1</option>
              <option value="K2">K2</option>
              <option value="K3">K3</option>
              <option value="K4">K4</option>
              <option value="K5">K5</option>
              <option value="K6">K6</option>
              <option value="L1">L1</option>
              <option value="L2">L2</option>
              <option value="L3">L3</option>
              <option value="L4">L4</option>
		@endif
            </select>
	  </div>
	@if($role==1)
	<div class="layui-input-inline" style="float:left;">
	    <select name="season" id="season">
              <option value="">请选择一个季度</option>
              <option value="春">春</option>
              <option value="署">署</option>
              <option value="秋">秋</option>
              <option value="寒">寒</option>
            </select>
	  </div>
	@elseif($role==2)
	<div class="layui-input-inline" style="float:left;">
            <select name="season" id="season">
              <option value="">请选择一个季度</option>
              <option value="春">春</option>
              <option value="署">署</option>
              <option value="秋">秋</option>
              <option value="寒">寒</option>
            </select>
	  </div>
	@elseif($role==3)
	<div class="layui-input-inline" style="float:left;">
            <select name="season" id="season">
              <option value="">请选择一个季度</option>
              <option value="春">春</option>
              <option value="署">署</option>
              <option value="秋">秋</option>
              <option value="寒">寒</option>
            </select>
	  </div>
	@elseif($role==4)
	<div class="layui-input-inline" style="float:left;">
            <select name="season" id="season">
              <option value="">请选择一个季度</option>
              <option value="春">春</option>
              <option value="署">署</option>
              <option value="秋">秋</option>
              <option value="寒">寒</option>
            </select>
	  </div>
	@elseif($role==5)
	<div class="layui-input-inline" style="float:left;">
            <select name="season" id="season">
              <option value="">请选择一个季度</option>
              <option value="春">春</option>
              <option value="署">署</option>
              <option value="秋">秋</option>
              <option value="寒">寒</option>
            </select>
	  </div>
	@elseif($role==6)
	@endif
        <input type="hidden" id="role" name="role" value="{{$role}}">
        <div style="float:left;">
          <button class="layui-btn" id="ss" type="submit" lay-filter="sreach" ><i class="layui-icon">&#xe615;</i></button>
        </div>
        <div style="float:left;margin-left:250px;">
        <span class="x-right" style="line-height:40px">本页共有数据：<b style="color:red;">{{$count}}</b> 条</span>
        </div>
</form>
<table class="layui-table">
    <thead>
    <tr>
        <th>科目</th>
	<th>级别</th>
	<th>季度</th>
        <th>课程名称</th>
        <th>操作</th>
    </thead>
    <tbody>
    @foreach($data as $k=>$v)
        <tr>
	    <td>
	@if($v['sub_name']=="趣味大语文")
                <span style=""><img src="/ywlogo.png" width="25px;"></span>
                @elseif($v['sub_name']=="思维培优数学")
                <span style=""><img src="/sxlogo.png" width="25px;"></span>
                @elseif($v['sub_name']=="HS英语")
                <span style=""><img src="/yylogo.png" width="25px;"></span>
                @elseif($v['sub_name']=="Phonics自然拼读")
                <span style=""><img src="/yypdlogo.png" width="25px;"></span>
                @endif
 {{$v['sub_name']}}</td>
	    <td>{{$v['grade']}}</td>
	    <td>{{$v['season']}}</td>
            <td>{{$v['cla_name']}}</td>
            <td class="td-manage">
                <a title="查看课节"  onclick="" href="/chapclalist?id={{$v['cla_id']}}">
                  <u style="color:#2093bf;"> 查看课节</u>
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
            var cla_id =$(this).attr('cla_id');
            $.ajax({
                type: 'post',
                data:{cla_id:cla_id},
                dateType:'json',
                url: "/classdel",
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
