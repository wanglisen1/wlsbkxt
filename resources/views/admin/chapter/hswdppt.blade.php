 <!DOCTYPE html>
<html>

        <head>
                <meta charset="UTF-8">
                <meta http-equiv="imagetoolbar" content="false">
                <title>学生用书</title>
        <link rel="stylesheet" href="/layuiadmin/css/font.css">
        <link rel="stylesheet" href="layuiadmin/css/xadmin.css">
     <link rel="stylesheet" href="/css/reset.css">
    <script src="/js/rem.js"></script>
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/swiper.min.css">
    <script src="/js/swiper.min.js"></script>
        </head>
<body oncontextmenu="return false" bgcolor="" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onselectstart="return false" style="width:100%;height:3000px;">
	<div style="width:100%;position:fixed;top:0px;z-index:99;">
    <dl style="display:flex;">
        <dt>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="javascript:;"  onclick="window.history.go(-1)"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe697;&nbsp;</i>返回</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/picturejs?id={{$id}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe723;&nbsp;</i>教师用书</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/picture?id={{$id}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe724;&nbsp;</i>学生用书</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href=""><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe705;&nbsp;</i>教案讲义</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href=""><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe719;&nbsp;</i>授课视频</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/hswdppt?id={{$id}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe74e;&nbsp;</i>PPT课件</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/picturelx?id={{$id}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe69e;&nbsp;</i>巩固练习</a></dd>
        </dt>
    </dl>
</div>
	<div>
		<iframe src="{{$data['ppt']}}" width="960" height="569" style="border:1px solid #aabbcc;max-width: 100%;" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
	</div>
	</body>
	 <script type="text/javascript">
  </script>
</html>
