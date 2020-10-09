<!-- <!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>翰师问鼎-备课平台登陆页面</title>
	<link rel="stylesheet" href="/loginmodel/css/login.css" />
	<link rel="shortcut icon" href="/layuiadmin/hslogo.ico" type="/layuiadmin/image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>
	
</head>
<body>
<style type="">
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
				<img class="smallImg" src="/loginmodel/img/icon2.png" />
				<input placeholder="请输入您的手机号" type="text" name="tel" id="tel" />
			</div>
			<div class="line">
				<img class="smallImg" src="/loginmodel/img/icon4.png" />
				<input placeholder="请输入您的密码" type="password"  name="pass" id="password"/>
			</div>
			<button type="button" class="logBut" id="btn">登&nbsp;&nbsp;录</button></br></br>
		<a class="txt2" href="/updatepwd" style="color:#00BFFF;margin-left:-10px;">
				修改密码
		</div>
	</div>
</div>
</body>

</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>翰师问鼎-备课平台登陆页面</title>
    <link rel="stylesheet" type="text/css" href="/loginmodel2/css/login.css">
    <link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>
    <script type="text/javascript" src="/loginmodel2/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".name input").focus(function(){
                $(this).prev("i").css({"background-image":"url(/loginmodel2/img/user2.png)"});
            });
            $(".name input").blur(function(){
                $(this).prev("i").css({"background-image":"url(/loginmodel2/img/user1.png)"});
            });
            $(".password input").focus(function(){
                $(this).prev("i").css({"background-image":"url(/loginmodel2/img/password2.png)"});
            });
            $(".password input").blur(function(){
                $(this).prev("i").css({"background-image":"url(/loginmodel2/img/password1.png)"});
            });
            $(".tel input").focus(function(){
                $(this).prev("i").css({"background-image":"url(/loginmodel2/img/usertel1.png)"});
            });
            $(".tel input").blur(function(){
                $(this).prev("i").css({"background-image":"url(/loginmodel2/img/usertel.png)"});
            });
        });
    </script>
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
</head>
<body>
    <div class="container">
    	<div class="loading hide">
	 <div class="gif" >
	 	<img src="/loadimg.gif" width="200px;">
	 </div>
	</div>
        <div class="wrap">
            <header ><em><img src="/loginmodel2/img/hslogo.png" width="45"></em><span>北京翰师问鼎教育科技有限公司</span><span style="margin-left:535px;">KMS校区智能孵化系统</span></header>
            <article>
                <section>
                    <aside>
                        <em>
                            <img src="/loginmodel2/img/loginlogo.png">
                        </em>
                         <div class="dl">
                            <p class="name"><i></i><input type="text" name="userName" id="uname"  class="userName" placeholder="请输入用户名" style="border:0;" autocomplete="off"></p> 
                            <p class="tel"><i></i><input type="text" name="tel" id="tel"  class="tel" placeholder="请输入手机号" style="border:0;" autocomplete="off"></p>
                            <p class="password" ><i></i><input type="password" id="password"  class="pwd" placeholder="请输入密码" style="border:0;"></p>
                            <button id="btn">登录</button>
                        </div>
                    </aside>
                   
                </section>               
            </article>
            <footer>
                <p style="font-size:20px;">本网站版权归北京翰师问鼎教育科技有限公司所有。</p>
            </footer>
        </div>
    </div>
</body>
</html>

<script type="text/javascript" src="/alerttc/js/popup.js"></script>
<script src="/jquery-3.1.1.min.js"></script>
<script>
		var Popup = new Popup();
</script>
<script language="JavaScript"> 
  if (window != top) 
    top.location.href = location.href; 
</script>
<script>
	$(function(){
		$('div.loading').hide();
		$("#btn").click(function(){
			var uname =$("#uname").val();
			var tel =$("#tel").val();
			var pwd =$("#password").val();
			var reg = /(1[3-9]\d{9}$)/;
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
			 if (!reg.test(tel)){
                Popup.alert('HSKMS提示','请输入正确格式的手机号码！');
                return false;
            }
			 $('div.loading').show();
			$.ajax({
				type: 'post',
				data:{tel:tel,pwd:pwd,uname:uname},
				dateType:'json',
				url: "/loginadd",
				success:function(msg){
					console.log(msg)
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
		$(document).keydown(function(event){
			 if(event.keyCode == 13){
 			 	var uname =$("#uname").val();
			var tel =$("#tel").val();
			var pwd =$("#password").val();
			var reg = /(1[3-9]\d{9}$)/;
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
			 if (!reg.test(tel)){
                Popup.alert('HSKMS提示','请输入正确格式的手机号码！');
                return false;
            }
			 $('div.loading').show();
			$.ajax({
				type: 'post',
				data:{tel:tel,pwd:pwd,uname:uname},
				dateType:'json',
				url: "/loginadd",
				success:function(msg){
					console.log(msg)
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
 			}
});
	})
</script>
