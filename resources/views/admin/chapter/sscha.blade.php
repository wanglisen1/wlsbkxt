<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">
<link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>
<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
  </head>
  <body class="form-wrap" >
<style id="LAY_layadmin_theme">.layui-side-menu,.layadmin-pagetabs .layui-tab-title li:after,.layadmin-pagetabs .layui-tab-title li.layui-this:after,.layui-layer-admin .layui-layer-title,.layadmin-side-shrink .layui-side-menu .layui-nav>.layui-nav-item>.layui-nav-child{background-color:#20222A !important;}.layui-nav-tree .layui-this,.layui-nav-tree .layui-this>a,.layui-nav-tree .layui-nav-child dd.layui-this,.layui-nav-tree .layui-nav-child dd.layui-this a{background-color:#009688 !important;}.layui-layout-admin .layui-logo{background-color:#20222A !important;}
        .loading {
             position: fixed;
             top: 0;
             bottom: 0;
             right: 0;
             left: 0;
             background-color: #f6ecec;
             opacity: 0.4;
             z-index: 1000;
            }
             
            .loading .gif {
             position: fixed;
               top :40%;
              left: 45%;
             margin-left: -16px;
             margin-top: -16px;
             z-index: 1001;
            }
            .layui-form-select dl dd.layui-this {
    background-color: #2093bf;
    color: #fff;
}
.layui-input:focus, .layui-textarea:focus {
    border-color: #2093bf!important;
}
</style>
<div class="loading hide">
     <div class="gif" >
        <img src="/loadimg.gif" width="200px;">
     </div>
    </div>
@if($role==5||$role==6||$role==7||$role==8)

@else
<form class="layui-form layui-col-md12 x-so"  action="/sscha" method="POST" >

<div style="float:left;width:240px;height:40px;">
  @if($souxl=='')
     
    @else
<div style="width:70px;height:35px;background-color:#2093bf;line-height:35px;border-radius:2px;float:left;margin-left:5px; margin-top:2px" id="fh" align="center">  
       <i class="iconfont" style="color:#fff;">&#xe697;&nbsp;返回</i>
    </div>
    @endif
    <div style="width:70px;height:35px;background-color:#2093bf;line-height:35px;border-radius:2px;float:left;margin-left:5px; margin-top:2px" id="sx" align="center">  
	     <i class="iconfont" style="color:#fff;">&#xe6aa;&nbsp;&nbsp;刷新</i>
	  </div>
    
	</div>
            @if($sub_name=="KB课程"||$sub_name=="Phonics自然拼读")
            @else
            <div class="layui-col-md6" style="width:150px;margin-right:24px">
            <select id="mySelect" lay-filter="demo">
                @if($souxl=='')
                    <option value="">请选择一个季度</option>
                @else
                  <option value="{{$souxl}}">{{$souxl}}</option>
                @endif
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
            @endif
            <div class="layui-col-md6" style="width:150px">
              <input type="text" name="title" placeholder="搜索关键字"  class="layui-input" id="sou">
            </div>
            <div id="soubtu" style="width:70px;height:35px;background-color:#2093bf;line-height:35px;border-radius:2px;float:left;margin-left:5px; margin-top:2px"  align="center">  
	<i class="iconfont" style="color:#fff;">&#xe6ac;&nbsp;&nbsp;搜索</i>
	  </div>
          <input type="hidden" name="" id="adminsubject" value="{{$sub_name}}"> 
        <input type="hidden" name="" id="admingrade" value="{{$grade}}"> 
        <input type="hidden" name="" id="qwe" value="{{$souxl}}">     
            
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
		<a href="/picture?id={{$v['cha_id']}}">
		<button class="layui-btn layui-btn-sm" style="background:#2093bf"><i class="iconfont">&#xe74e;&nbsp;查看</i></button>
		</a>&nbsp;
    @if($role==5||$role==6)
		<a title="开始备课" class="collect"  onclick="" href="javascript:;" cha_id="{{$v['cha_id']}}">
		<button class="layui-btn layui-btn-sm" style="background:#a73870;"><i class="iconfont">&#xe7ce;&nbsp;开始备课</i></button>
		</a>
    @else
    @endif
        @if($role==1)
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
</body>
<script type="text/javascript" src="/alerttc/js/popup.js"></script>
<script src="/jquery-3.1.1.min.js"></script>
<script>
        var Popup = new Popup();
</script>
<script>
 $(function(){
  var adminsubject = $("#adminsubject").val();
 var admingrade = $("#admingrade").val();
 var seasons = ''; 
    $('div.loading').hide();
	   $(".collect").click(function(){
	       var cha_id =$(this).attr('cha_id');
            function confirmData () {
                $('div.loading').show();
                 $.ajax({
                    type: 'post',
                    data: {cha_id: cha_id},
                    dateType: 'json',
                    url: "/collectadd",
                    success: function (msg) {
                        if (msg.code == 1) {
                            $('div.loading').hide();
                            window.location.reload()
                        }else{
                           $('div.loading').hide();
                            Popup.alert('HSKMS提示','备课失败');
                            return false;
                        }
                    }
                });   
            }
            var title = 'HSKMS提示',
            text = '您确定开始备课吗？';
            Popup.confirm(title,text,confirmData);
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
               $("#fh").click(function(){
                  window.history.back();
                })
                
                layui.use(['layer', 'jquery', 'form'], function () {
			        var layer = layui.layer,
					$ = layui.jquery,
					form = layui.form;
 
			form.on('select(demo)', function(data){
		      	console.log(data.value)
            season = data.value;
                  // $.ajax({
                  //     type: "post",
                  //     url: "/newsousuo",
                  //     data: {season:data.value},
                  //     success: function (response) {
                  //        console.log(response);
                  //     }
                  // });
             if(data.value=="春"){
              window.location="/adminsousuo?adminseason=春&adminsubject="+adminsubject+"&admingrade="+admingrade
             }else if(data.value=="暑"){
              window.location="/adminsousuo?adminseason=暑&adminsubject="+adminsubject+"&admingrade="+admingrade
             }else if(data.value=="秋"){
              window.location="/adminsousuo?adminseason=秋&adminsubject="+adminsubject+"&admingrade="+admingrade
             }else if(data.value=="寒"){
              window.location="/adminsousuo?adminseason=寒&adminsubject="+adminsubject+"&admingrade="+admingrade
             }
			});

		});

$("#soubtu").click(function(){
  var sou=$("#sou").val();
  var qwe=$("#qwe").val();
  if(sou==''){
    Popup.alert('HSKMS提示','搜索条件不能为空！');
  }else{
    if(qwe==''){
      window.location="/adminsousuo?sou="+sou+"&adminsubject="+adminsubject+"&admingrade="+admingrade+"&adminseason="+seasons
    }else{
      window.location="/adminsousuo?sou="+sou+"&adminsubject="+adminsubject+"&admingrade="+admingrade+"&adminseason="+qwe
    }
    
  }
  
})

		 })

 </script>
