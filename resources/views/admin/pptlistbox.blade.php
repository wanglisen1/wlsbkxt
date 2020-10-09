<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>ppt播放</title>
</head>
<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">
<link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<body>
<div  id="fh"  style="height:38px;line-height:38px;margin-right:5px;" ><i class="iconfont" style="cursor: pointer;">&#xe697;&nbsp;返回</i></div>
<embed src="/ppt/{{$data['ppt_content']}}" width="1100" height="600"></embed>
</body>
</html>
<script>
	$("#fh").click(function(){
		window.history.back();
	})
</script>
