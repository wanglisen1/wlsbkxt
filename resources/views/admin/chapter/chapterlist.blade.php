<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<form class="layui-form layui-col-md12 x-so" style="margin-top:20px;" action="/sscha" method="POST" > 
	<div style="float:left;">
          <button class="layui-btn" lay-filter="sreach"><i class="iconfont">&#xe6aa;</i>&nbsp;&nbsp;刷新</button>
        </div>
        <div> 
        <input type="text" name="cha_name" id="cha_name"  placeholder="请输入课节名称的关键字" autocomplete="off" class="layui-input" style="width:15%;float:left;margin-left:200px;">
        </div>
        <div class="layui-input-inline" style="float:left;">
            <select name="grade" id="grade">
	      <option value="">--请选择一个级别--</option>
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
	<input type="hidden" id="role" name="role" value="{{$role}}">
        <div style="float:left;">
          <button class="layui-btn" id="ss" type="submit" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
	</div>
	<div style="float:left;margin-left:250px;">
	<span class="x-right" style="line-height:40px">本页共有数据：<b style="color:red;">{{$count}}</b> 条</span>
	</div>	
</form>
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
            <td>{{$v['cha_name']}}</td>
	    <td class="td-manage">
		<a href="/picture?id={{$v['cha_id']}}">
		<button class="layui-btn layui-btn-xs" style="background:#30A9BD;font-size:5px;"><i class="iconfont" style="font-size:5px;">&#xe74e;&nbsp;&nbsp;开始备课</i></button>
		</a>&nbsp;&nbsp;
		<a title="收藏" class="collect"  onclick="" href="javascript:;" cha_id="{{$v['cha_id']}}">
		<button class="layui-btn layui-btn-xs" style="background:#C34A72;"><i class="iconfont">&#xe7ce;&nbsp;&nbsp;收藏</i></button>
		</a>&nbsp;&nbsp;
		@if($role==1&&2)
		@if($v['field_pdfjs']==''&&$v['field_pdflx']=='')
		<a title="添加教师用书"  onclick="" href="/teacherbook?id={{$v['cha_id']}}">
                    <i class="iconfont">&#xe6b9;</i>
                </a>&nbsp;&nbsp;
		<a title="添加练习册"  onclick="" href="/workbook?id={{$v['cha_id']}}">
                    <i class="iconfont">&#xe6b9;</i>
                </a>
		@elseif($v['field_pdfjs']=='')
		  <a title="添加教师用书"  onclick="" href="/teacherbook?id={{$v['cha_id']}}">
                    <i class="iconfont">&#xe6b9;</i>
		</a>&nbsp;&nbsp;
		@elseif($v['field_pdflx']=='')
		<a title="添加练习册"  onclick="" href="/workbook?id={{$v['cha_id']}}">
                    <i class="iconfont">&#xe6b9;</i>
		</a>
		@endif
		@else
		@endif	
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="page">
	<span>
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
