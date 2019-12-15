<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="imagetoolbar" content="false">
		<title>教师备课</title>
		<link rel="stylesheet" href="/layuiadmin/css/font.css">
        <link rel="stylesheet" href="layuiadmin/css/xadmin.css">
	<link rel="stylesheet" href="/css/reset.css">
    <script src="/js/rem.js"></script>
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/swiper.min.css">
    <script src="/js/swiper.min.js"></script>
	</head>
	 <style>
      .swiper-container{
    --swiper-theme-color: #ff6600;
    --swiper-pagination-color: #00ff33;/* 两种都可以 */
  }
	.swiper-slide>div{
        padding-bottom:140%;
}
        .one{
        width:120%;
        height:200%;
}
    </style>
	<body oncontextmenu="return false" bgcolor="" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onselectstart="return false">
	<div style="width:100%;position:fixed;top:0px;z-index:99;">
    <dl style="display:flex;">
        <dt>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="javascript:;"  onclick="window.history.go(-1)"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe697;&nbsp;</i>返回</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/picturejs?id={{$id}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe723;&nbsp;</i>教师用书</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/picture?id={{$id}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe724;&nbsp;</i>学生用书</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/videobox?video_id={{$video}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe719;&nbsp;</i>授课视频</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/pptlistbox?ppt_id={{$ppt}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe74e;&nbsp;</i>PPT课件</a></dd>
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/picturelx?id={{$id}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe69e;&nbsp;</i>巩固练习</a></dd>
        </dt>
    </dl>
</div>
	<div class="big">

        <div class="center">
                <div class="swiper-container">
                        <div class="swiper-wrapper">
				@foreach($data as $k=>$v)
			 <div class="swiper-slide" style="background:url('/tp/teacher/{{$v}}') top center no-repeat;background-size:100% 100%;"><div class="one"></div></div>
                                @endforeach
                        </div>
                        <!-- 如果需要导航按钮 -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                        <div class="swiper-pagination"></div>
                    </div>
          </div>
    </div>
	</body>
	<script>
    var mySwiper = new Swiper ('.swiper-container', {
       loop: true, 
    pagination: {
      el: '.swiper-pagination',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    scrollbar: {
      el: '.swiper-scrollbar',
    },  
  
  })        
</script>
</html>
