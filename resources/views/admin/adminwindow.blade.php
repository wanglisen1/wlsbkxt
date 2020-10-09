<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="UTF-8">
<title>TextyleFLIP.js - Flip Text Effect -</title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="/jqwindow/css/style.css">
    <link rel="stylesheet" href="/layuiadmin/css/font.css">
    <link rel="stylesheet" href="/layuiadmin/css/xadmin.css">
    <link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>

    <script src="/layuiadmin/js/jquery.min.js"></script>
    <script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
    <script type="text/javascript" src="/alerttc/js/popup.js"></script>
    <script type="text/javascript" src="/time.js"></script>
<style type="text/css">
 .layui-form-select dl dd.layui-this {
    background-color: #2093bf;
    color: #fff;
}
.layui-input:focus, .layui-textarea:focus {
    border-color: #2093bf!important;
}
</style>
</head>
<body>
@if($role==6||$role==7||$role==8||$role==5)

@else
<div style="padding-left: 158px;height: 79px;margin-top: -100px;}">
<form class="layui-form layui-col-md12 layui-form-item layui-inline" >
            <div class="layui-col-md2" style="margin-right:24px">
            <select  lay-filter="demo" id="subject">
                <option value="">请选择科目</option>
                @if($role==26)
                <option value="趣味大语文">趣味大语文</option>
                @elseif($role==27)
                <option value="思维培优数学">思维培优数学</option>
                @elseif($role==28)
                <option value="KB课程">KB课程</option>
               	<option value="Phonics自然拼读">Phonics自然拼读</option>
                @else
                <option value="趣味大语文">趣味大语文</option>
                <option value="思维培优数学">思维培优数学</option>
                <option value="KB课程">KB课程</option>
               	<option value="Phonics自然拼读">Phonics自然拼读</option>
               	@endif
              </select>
            </div>
            <div class="layui-col-md2" style="margin-right:24px">
            <select  id="grade" >
                <option value="">请选择年级</option>
                <option value="三年级">三年级</option>
                <option value="四年级">四年级</option>
                <option value="五年级">五年级</option>
               <option value="六年级">六年级</option>
              </select>
            </div>
            <div class="layui-col-md2" style="margin-right:24px" id='ycseason'>
            <select   id="season">
                <option value="">请选择季度</option>
               @if($role==3)
                  @if($res1['tzr_chun']==1)
                    <option value="春">春</option>
                  @else
                  @endif
                  @if($res1['tzr_shu']==1)
                    <option value="暑">暑</option>
                  @else
                  @endif
                  @if($res1['tzr_qiu']==1)
                   <option value="秋">秋</option>
                  @else
                  @endif
                  @if($res1['tzr_han']==1)
                   <option value="寒">寒</option>
                  @else
                  @endif
                @elseif($role==4)
                 @if($res1['xz_chun']==1)
                    <option value="春">春</option>
                  @else
                  @endif
                  @if($res1['xz_shu']==1)
                    <option value="暑">暑</option>
                  @else
                  @endif
                  @if($res1['xz_qiu']==1)
                   <option value="秋">秋</option>
                   @else
                  @endif
                  @if($res1['xz_han']==1)
                   <option value="寒">寒</option>
                   @else
                  @endif
                @else
                <option value="春">春</option>
                    <option value="暑">暑</option>
                   <option value="秋">秋</option>
                   <option value="寒">寒</option>
                   @endif
              </select>
            </div>
            <div class="layui-col-md3" style="margin-right:24px;display: flex;">
              <input type="text" name="title" placeholder="搜索关键字"  class="layui-input" id="sou" style="width:80%">
       <div  id="soubtu" class="layui-btn layui-btn-sm" style="background:#2093bf;height:38px;margin-left:5px;line-height:38px;"><i class="iconfont">&#xe6ac;&nbsp;搜索</i></div>
            </div>
           
</form>

</div>

@endif
<div style="text-align:center;margin-top:50px;">
	<p class="ex1" style="color:#30A9BD;">Welcome to</p>
	<p class="ex2" style="color:#30A9BD;">HSKMS</p>
	<p class="desc" style="color:#111111">- KMS校区智能孵化系统 -</p>
</div>


<script src='/jqwindow/js/jquery.min.js'></script>
<script type="text/javascript" src="/alerttc/js/popup.js"></script>
<script src="/jqwindow/js/index.js"></script>
<script>
        var Popup = new Popup();
</script>
<script type="text/javascript">
		 layui.use(['layer', 'jquery', 'form'], function () {
			        var layer = layui.layer,
					$ = layui.jquery,
					form = layui.form;
 
			form.on('select(demo)', function(){
		     	var adminsubject = $("#subject option:selected").val();
		     	if(adminsubject=='KB课程'){
		     		$('#ycseason').hide();
		     		$('#grade').html('<option value="">请选择级别</option>'+
		     			'<option value="K1">K1</option>'+
						'<option value="K2">K2</option>'+
						'<option value="K3">K3</option>'+
						'<option value="K4">K4</option>'+
						'<option value="K5">K5</option>'+
						'<option value="K6">K6</option>')
		     		form.render('select');
		     	}else if(adminsubject=='Phonics自然拼读'){
		     		$('#ycseason').hide();
		     		$('#grade').html('<option value="">请选择级别</option>'+
		     			'<option value="P1">P1</option>'+
						'<option value="P2">P2</option>'+
						'<option value="P3">P3</option>'+
						'<option value="P4">P4</option>')
		     		form.render('select');
		     	}else{
		     		$('#ycseason').show();
		     		$('#grade').html('<option value="">请选择年级</option>'+
		     			'<option value="三年级">三年级</option>'+
						'<option value="四年级">四年级</option>'+
						'<option value="五年级">五年级</option>'+
						'<option value="六年级">六年级</option>')
		     		form.render('select');
		     	
		     	}
			});

		});
	 	$("#soubtu").click(function(){
	 		var adminsubject = $("#subject option:selected").val();
	 		var admingrade = $("#grade option:selected").val();
	 		var season = $("#season option:selected").val();
	 		var sou = $("#sou").val();
	 		
	 		if(adminsubject==''&admingrade!=''){
	 			Popup.alert('HSKMS提示','请依次选择搜索条件搜索！1');
	 			return false;
	 		}else if(adminsubject==''&season!=''){
	 			Popup.alert('HSKMS提示','请依次选择搜索条件搜索！2');
	 			return false;
	 		}else if(adminsubject!=''&admingrade==''&season!=''){
	 			Popup.alert('HSKMS提示','请依次选择搜索条件搜索！3');
	 			return false;
	 		}else if(adminsubject==''&admingrade==''&season==''&sou==''){
	 			Popup.alert('HSKMS提示','请选择或输入搜索条件！4');
	 			return false;
	 		}
	 
	 		window.location="/adminsousuo?sou="+sou+"&adminsubject="+adminsubject+"&admingrade="+admingrade+"&adminseason="+season
	 	})
</script>


</body>

</html>
