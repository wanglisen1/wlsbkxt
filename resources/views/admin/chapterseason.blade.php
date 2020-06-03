<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">


<table class="layui-table">
    <thead>
    <tr>
        <th style="text-align:center;">课程类别</th>
	<th style="text-align:center;">课程季度</th>
    <th style="text-align:center;">状态</th>
    </thead>
    <tbody>
     @foreach($data as $k=>$v)
    <tr>
    <td style="text-align:center;">
    @if($v['chasea_sub']=="趣味大语文")
    <span style=""><img src="/ywlogo.png" width="25px;"></span>
    @elseif($v['chasea_sub']=="思维培优数学")
    <span style=""><img src="/sxlogo.png" width="25px;"></span>
    @elseif($v['chasea_sub']=="HS英语")
    <span style=""><img src="/yylogo.png" width="25px;"></span>
    @elseif($v['chasea_sub']=="Phonics自然拼读")
    <span style=""><img src="/yypdlogo.png" width="25px;"></span>
    @endif
            </td>
	<td style="text-align:center;">{{$v['chasea_season']}}</td>
        <td class="td-manage" style="text-align:center;">
    @if($v['is_show']==1)
		<a title="已开放" class="kf"  onclick="" href="javascript:;" chasea_id="{{$v['chasea_id']}}">
        <button class="layui-btn layui-btn-sm">已开放</button>
        </a>
    @else
        <a title="已关闭" class="kf"  onclick="" href="javascript:;" chasea_id="{{$v['chasea_id']}}">
        <button class="layui-btn layui-btn-sm" style="background-color:red">已关闭</button>
        </a>
    @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>


<script src="/jquery-3.1.1.min.js"></script>
<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<script>
 $(function(){
	   $(".kf").click(function(){
	       var chasea_id =$(this).attr('chasea_id');
			$.ajax({
			type: 'post',
			data:{chasea_id:chasea_id},
		       	dateType:'json',
	                url: "/chapterseasonupd",
	               success:function(msg){
	               alert(msg.msg);
                   location.reload();
		          }
			   });
		     })
	           
                // $("#ht").click(function(){
                //    // history.back();=history.go(-1);
                //  })
                //  $("#qj").click(function(){
                //    // history.forward();=history.go(1);
                //  })



		 })

 </script>
