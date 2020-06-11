<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">
<link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<style type="text/css">
    .layui-form-select dl dd.layui-this {
    background-color: #2093bf;
    color: #fff;
  }
  .layui-input:focus, .layui-textarea:focus {
    border-color: #2093bf!important;
}
</style>
<form class="layui-form layui-col-md12 x-so"  action="/sscha" method="POST" >
<div style="float:left;height:40px;">
    @if($souxl=='')
     
    @else
<div  id="fh" class="layui-btn layui-btn-sm" style="background:#2093bf;height:38px;line-height:38px;float:left;margin-right:5px;"><i class="iconfont">&#xe697;&nbsp;返回</i></div>
    @endif
    <div  id="sx" class="layui-btn layui-btn-sm" style="background:#2093bf;height:38px;line-height:38px;float:left"><i class="iconfont">&#xe6aa;&nbsp;刷新</i></div>
</div>      
   @if($subject=="KB课程"||$subject=="Phonics自然拼读")
            @else
            <div class="layui-col-md6" style="width:150px;margin-right:24px;margin-left:100px;">
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
    <div  id="soubtu" class="layui-btn layui-btn-sm" style="background:#2093bf;height:38px;margin-left:5px;line-height:38px;float:left;"><i class="iconfont">&#xe6ac;&nbsp;搜索</i></div>
            </div>
          <input type="hidden" name="" id="adminsubject" value="{{$subject}}"> 
        <input type="hidden" name="" id="admingrade" value="{{$grade}}"> 
        <input type="hidden" name="" id="qwe" value="{{$souxl}}"> 
            
    <div style="float:left;margin-left:50px;">
    <span class="x-right" style="line-height:40px">本页共有数据：<b style="color:red;">{{$count}}</b>条</span>
    </div>
</form>
<table class="layui-table">
    <thead>
    <tr>
	<th style="text-align:center;">类别</th>
	<th style="text-align:center;">年级</th>
	<th style="text-align:center;">季度</th>
        <th style="text-align:center;">名称</th>
        <th style="text-align:center;">操作</th>
    </thead>
    <tbody>
    @foreach($data as $k=>$v)
        <tr>
	    <td style="text-align:center;">
             @if($v['ppt_sub']=="趣味大语文")
    <span style=""><img src="/ywlogo.png" width="25px;"></span>
    @elseif($v['ppt_sub']=="思维培优数学")
    <span style=""><img src="/sxlogo.png" width="25px;"></span>
    @elseif($v['ppt_sub']=="KB课程")
    <span style=""><img src="/kblogo.png" width="20px;"></span>
    @elseif($v['ppt_sub']=="Phonics自然拼读")
    <span style=""><img src="/yypdlogo.png" width="25px;"></span>
    @endif
        {{$v['ppt_sub']}}
    </td>
	    <td style="text-align:center;">{{$v['ppt_grade']}}</td>
	   <td style="text-align:center;">{{$v['ppt_season']}}</td>
	<td style="text-align:center;">{{$v['ppt_title']}}</td>
            <td class="td-manage" style="text-align:center;">
		<a href="/pptlistbox?ppt_id={{$v['ppt_id']}}">
		<button class="layui-btn layui-btn-sm" style="background:#2093bf"><i class="iconfont">&#xe74e;&nbsp;查看</i></button>
		</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script type="text/javascript" src="/alerttc/js/popup.js"></script>
<script>
        var Popup = new Popup();
</script>
<script type="text/javascript">
  var adminsubject = $("#adminsubject").val();
  var admingrade = $("#admingrade").val();
   var seasons = ''; 
  layui.use(['layer', 'jquery', 'form'], function () {
          var layer = layui.layer,
          $ = layui.jquery,
          form = layui.form;
 
      form.on('select(demo)', function(data){
            console.log(data.value)
            season = data.value;
             if(data.value=="春"){
              window.location="/sspptlist?adminseason=春&adminsubject="+adminsubject+"&admingrade="+admingrade
             }else if(data.value=="暑"){
              window.location="/sspptlist?adminseason=暑&adminsubject="+adminsubject+"&admingrade="+admingrade
             }else if(data.value=="秋"){
              window.location="/sspptlist?adminseason=秋&adminsubject="+adminsubject+"&admingrade="+admingrade
             }else if(data.value=="寒"){
              window.location="/sspptlist?adminseason=寒&adminsubject="+adminsubject+"&admingrade="+admingrade
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
      window.location="/sspptlist?sou="+sou+"&adminsubject="+adminsubject+"&admingrade="+admingrade+"&adminseason="+seasons
    }else{
      window.location="/sspptlist?sou="+sou+"&adminsubject="+adminsubject+"&admingrade="+admingrade+"&adminseason="+qwe
    }
    
  }
  
})
   $("#sx").click(function(){
                  window.location.reload()
                })
               $("#fh").click(function(){
                  window.history.back();
                })
</script>
