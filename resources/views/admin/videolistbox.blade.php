<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">
<link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<div  id="fh"  style="height:38px;line-height:38px;margin-right:5px;" ><i class="iconfont" style="cursor: pointer;">&#xe697;&nbsp;返回</i></div>
<div>
 <video width="1000" height="600" controls preload="none" style="border:none;" controlslist="nodownload">
  <source src="/{{$data['video_content']}}" type="video/mp4">
</video>
</div>
<script type="text/javascript">
	 $("#fh").click(function(){
                  window.history.back();
                })
</script>
