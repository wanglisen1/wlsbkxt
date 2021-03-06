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
	<style>
      .swiper-container{
    --swiper-theme-color: #ff6600;
    --swiper-pagination-color: #00ff33;/* 两种都可以 */
  }
  @if($sub_name=='KB课程')
	.swiper-slide>div{
	padding-bottom:70%;
}
  @elseif($sub_name=='Phonics自然拼读')
   .swiper-slide>div{
  padding-bottom:120%;
}
  @else
  .swiper-slide>div{
  padding-bottom:140%;
}
  @endif
    </style>
	<body oncontextmenu="return false" bgcolor="" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onselectstart="return false" style="width:100%;height:3000px;">
	<div style="width:100%;position:fixed;top:0px;z-index:99;">
    <dl style="display:flex;">
	<dt>
    <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="javascript:;"  onclick="window.history.go(-1)"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe697;&nbsp;</i>返回</a></dd>
  
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/picture?id={{$id}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe724;&nbsp;</i>
            @if($sub_name=='KB课程')
            <i style="color:red;">KB教学目标</i>
            @elseif($cha_name=='教学目标')
            <i style="color:red;">Phonics教学目标</i>
            @else
            <i style="color:red;">学生用书</i>
            @endif
          </a></dd>
          @if(!empty($res['field_pdfjs']))
<dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/picturejs?id={{$id}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe723;&nbsp;</i>教师用书</a></dd>
  @else
  @endif
  @if(!empty($res['field_pdflx'])) 
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/picturelx?id={{$id}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe69e;&nbsp;</i>
              @if($sub_name=='思维培优数学')
              教材答案
              @else
              巩固练习
              @endif
          </a></dd>
    @else
  @endif
    @if(!empty($res['ppt']))
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="/pptlistbox?ppt_id={{$ppt}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe74e;&nbsp;</i>PPT课件</a></dd>
 @else
  @endif
  @if(!empty($res['video']))
            <dd style="flex:1;text-align:center;border:1px solid #e6e6e6;border-right:0;height:40px;line-height:40px;font-size:19px;background-color:#efeef0;"><a href="videolistbox?video_id={{$video}}"><i class="iconfont" style="font-size:19px;color:#4dacbb;">&#xe719;&nbsp;</i>授课视频</a></dd>
  @else
  @endif

  
        </dt>
    </dl>
</div>
	<div class="big">

        <div class="center">
                <div class="swiper-container">
			<div class="swiper-wrapper">
				@foreach($data as $k=>$v)
			    <div class="swiper-slide" style="background:url('/tp/images/{{$v}}') top center no-repeat;background-size:100% 100%;"><div class="one" style="width:120%;height:100%;"></div></div>
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
