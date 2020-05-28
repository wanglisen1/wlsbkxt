<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>翰师问鼎-备课平台登陆页面</title>
	<link rel="stylesheet" href="/loginmodel/css/login.css" />
	<link rel="shortcut icon" href="/layuiadmin/hslogo.ico" type="/layuiadmin/image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>
	
</head>
<style type="text/css">
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
</style>
<body>

<div class="content">
	<div class="loading hide">
	 <div class="gif" >
	 	<img src="/loadimg.gif" width="200px;">
	 </div>
	</div>
	<div class="login" style="margin-right:10%;width:20%;margin-top:-2%;height:380px;">

		<div class="title">欢迎登陆HSKMS备课管理平台</div>
		<div class="locon">

			<div class="line">
				<img class="smallImg" src="/loginmodel/img/icon3.png" />
				<input placeholder="请输入用户名" type="text" name="uname" id="uname" />
			</div>
			<div class="line">
				<img class="smallImg" src="/loginmodel/img/icon3.png" />
				<input placeholder="请输入您的手机号" type="text" name="tel" id="tel" />
			</div>
			<div class="line">
				<img class="smallImg" src="/loginmodel/img/icon4.png" />
				<input placeholder="请输入您的密码" type="password"  name="pass" id="password"/>
			</div>
			<button type="button" class="logBut" id="btn">登&nbsp;&nbsp;录</button></br></br>
			<a class="txt2" href="/updatepwd" style="color:#00BFFF;margin-left:-10px;">
				修改密码
			</a>
		</div>
	</div>
</div>
</body>

</html>
<script type="text/javascript" src="/alerttc/js/popup.js"></script>
<script src="/jquery-3.1.1.min.js"></script>
<script>
		var Popup = new Popup();
</script>
<script>
	$(function(){
		$('div.loading').hide();
		$("#btn").click(function(){
			var uname =$("#uname").val();
			var tel =$("#tel").val();
			var pwd =$("#password").val();

			if(tel==''){
				Popup.alert('HSKMS提示','手机号不能为空！');
				return false;
			}if(pwd==''){
				Popup.alert('HSKMS提示','密码不能为空！');
				return false;
			}if(uname==''){
				Popup.alert('HSKMS提示','用户名不能为空！');
				return false;
			}
			 $('div.loading').show();
			$.ajax({
				type: 'post',
				data:{tel:tel,pwd:pwd,uname:uname},
				dateType:'json',
				url: "/loginadd",
				success:function(msg){
					if(msg.code==1) {
						window.location = '/admin';
						$('div.loading').hide();
					}else{
						 $('div.loading').hide();
						Popup.alert('HSKMS提示',msg.msg);
						return false;

					}
				}
			});
		})
	})
</script>
