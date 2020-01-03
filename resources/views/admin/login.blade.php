<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>翰师问鼎-备课系统登陆页面</title>
	<link rel="stylesheet" href="/loginmodel/css/login.css" />
	<link rel="shortcut icon" href="/layuiadmin/hslogo.ico" type="/layuiadmin/image/x-icon" />
</head>

<body>

<div class="content">
	<div class="login" style="margin-right:10%;width:20%;margin-top:-2%;height:380px;">
		<div class="title">欢迎登陆HSKMS备课管理系统</div>
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
<script src="/jquery-3.1.1.min.js"></script>
<script>
	$(function(){
		$("#btn").click(function(){
			var uname =$("#uname").val();
			var tel =$("#tel").val();
			var pwd =$("#password").val();

			if(tel==''){
				alert('电话号码不能为空');
				return false;
			}if(pwd==''){
				alert('密码不能为空');
				return false;
			}if(uname==''){
				alert('用户名不能为空');
				return false;
			}
			$.ajax({
				type: 'post',
				data:{tel:tel,pwd:pwd,uname:uname},
				dateType:'json',
				url: "/loginadd",
				success:function(msg){
					alert(msg.msg);
					if(msg.code==1) {
						window.location = '/admin';
					}
				}
			});
		})
	})
</script>
