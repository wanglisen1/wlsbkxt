<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>ppt播放</title>
</head>
<body>
	<div style="width:100%;position:fixed;top:0px;z-index:99;">
    <dl style="display:flex;">
        <dt>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="javascript:;"  onclick="window.history.go(-1)"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe697;&nbsp;</i>返回</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/picturejs?id={{$id}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe723;&nbsp;</i>教师用书</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/picture?id={{$id}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe724;&nbsp;</i>学生用书</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href=""><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe719;&nbsp;</i>授课视频</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/pptlistbox?ppt_id={{$ppt}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe74e;&nbsp;</i>PPT课件</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/picturelx?id={{$id}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe69e;&nbsp;</i>巩固练习</a></dd>
        </dt>
    </dl>
</div>
	<embed src="/ppt/{{$data['ppt_content']}}" width="1000" height="650"></embed>
</body>
</html>
