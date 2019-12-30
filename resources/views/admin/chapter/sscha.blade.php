<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
@if($role==5||$role==6||$role==7||$role==8)

@else
<form class="layui-form layui-col-md12 x-so" style="margin-top:20px;" action="/sscha" method="POST" >
<div style="float:left;width:300px;height:40px;">
	 @if($ht==1)
	@elseif($ht==2)
	<div style="width:70px;height:35px;background-color:#2093bf;line-height:35px;border-radius:2px;float:left;margin-left:5px;" align="center">
	<a href="/newsousuo?subject={{$sub_name}}&grade={{$grade}}">
	  <i class="iconfont" style="color:#fff;">&#xe697;&nbsp;&nbsp;返回</i>
	</a>
          </div>
	@endif
          <div style="width:70px;height:35px;background-color:#2093bf;line-height:35px;border-radius:2px;float:left;margin-left:5px;" id="sx" align="center">  
	<i class="iconfont" style="color:#fff;">&#xe6aa;&nbsp;&nbsp;刷新</i>
	  </div>
	</div>
	@if($ht==1)
         <div class="layui-input-inline" style="float:left;">
           <select name="season" id="season">
                <option value="">请选择一个季度</option>
                @if($sub_name=="HS英语")
                <option value="SEASON YEAR">YEAR</option>
                @elseif($sub_name=="Phonics自然拼读")
                <option value="SEASON YEAR">SEASON</option>
                @else
                @foreach($res3 as $k=>$v)
                @if($v['is_show']==1)
                <option value="{{$v['chasea_season']}}">{{$v['chasea_season']}}</option>
                @eles
                @endif
                @endforeach
                @endif
           </select>
        </div>
        <div> 
        <input type="text" name="cha_name" id="cha_name"  placeholder="请输入课节名称的关键字" autocomplete="off" class="layui-input" style="width:200px;float:left;margin-left:10px;">
        </div>
        
	<input type="hidden" id="role" name="role" value="{{$role}}">
  <input type="hidden" id="sub_name" name="sub_name" value="{{$sub_name}}">
  <input type="hidden" id="grade" name="grade" value="{{$grade}}">
        <div style="float:left;margin-left:10px;`">
          <button class="layui-btn" id="ss" type="submit" lay-filter="sreach" style="background-color:#a73870;"><i class="layui-icon">&#xe615;</i></button>
	</div>
	</div>
	@else
	@endif
	<div style="float:left;margin-left:50px;">
	<span class="x-right" style="line-height:40px">本页共有数据：<b style="color:red;">{{$count}}</b>条</span>
	</div>	
</form>
@endif
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
            <td style="text-align:center;">
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
	    <td style="text-align:center;">{{$v['grade']}}</td>
	<td style="text-align:center;">{{$v['season']}}</td>
            <td style="text-align:center;">{{$v['cla_name']}}</td>
            <td style="text-align:center;">{{$v['cha_name']}}</td>
            <td class="td-manage" style="text-align:center;">
		<a href="/picture?id={{$v['cha_id']}}&cha_name={{$cha_name}}&season={{$season}}&sub_name={{$sub_name}}&grade={{$grade}}">
		<button class="layui-btn layui-btn-sm" style="background:#2093bf"><i class="iconfont">&#xe74e;&nbsp;查看</i></button>
		</a>&nbsp;
		<a title="开始备课" class="collect"  onclick="" href="javascript:;" cha_id="{{$v['cha_id']}}">
		<button class="layui-btn layui-btn-sm" style="background:#a73870;"><i class="iconfont">&#xe7ce;&nbsp;开始备课</i></button>
		</a>
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
        @else
        @endif
        @else
        @endif  
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

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
	            $("#ss").click(function(){
		            var cha_name = $("#cha_name").val();
                    var season = $("#season").val();
                if(cha_name==''&&season==''){
                alert('您并没有输入搜索信息哦！');
                return false;
              }else{

              }
		    })
               $("#sx").click(function(){
                  window.location.reload()
                })
                
                // $("#ht").click(function(){
                //    // history.back();=history.go(-1);
                //  })
                //  $("#qj").click(function(){
                //    // history.forward();=history.go(1);
                //  })



		 })

 </script>
