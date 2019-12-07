<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8" />
        <title>翰师问鼎-修改登陆密码页面</title>
        <link rel="stylesheet" href="/loginmodel/css/login.css" />
        <link rel="shortcut icon" href="/layuiadmin/hslogo.ico" type="/layuiadmin/image/x-icon" />
</head>

<body>

<div class="content" >
        <div class="login" style="width: 20%;margin-top:-5%;margin-right:10%;">
                <div class="title">修改密码</div>
                <div class="locon">
                        <div class="line">
                                <img class="smallImg" src="/loginmodel/img/icon3.png" />
                                <input placeholder="请输入您的手机号" type="text" name="tel" id="tel" />
                        </div>
						<div class="line">
                                <img class="smallImg" src="/loginmodel/img/icon4.png" />
                                <input placeholder="请输入您的现密码" type="password"  name="pass" id="oldpassword"/>
                        </div>
                        <div class="line">
                                <img class="smallImg" src="/loginmodel/img/icon4.png" />
                                <input placeholder="请输入您的新密码" type="password"  name="pass" id="password"/>
                        </div>
						 <div class="line">
                                <img class="smallImg" src="/loginmodel/img/icon4.png" />
                                <input placeholder="确认新密码" type="password"  name="pass" id="password1"/>
                        </div>
                        <button type="button" class="logBut" id="btn">修&nbsp;&nbsp;改</button></br></br>

                       <a class="txt2" href="/" style="color:#00BFFF;margin-left:-10px;">
                                返回登陆界面
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
            var tel =$("#tel").val();
            var pwd =$("#password").val();
            var pwd1 =$("#password1").val();
            var oldpassword =$("#oldpassword").val();
            if(pwd!=pwd1) {
                alert('确认密码与密码不一致');
                return false;
            }if(tel==''){
				alert('电话号码不能为空');
                return false;
            }if(pwd==''){
                alert('密码不能为空');
                return false;
            }if(oldpassword==''){
                alert('现密码不能为空');
                return false;
            }
            $.ajax({
                type: 'post',
                data:{tel:tel,pwd:pwd,oldpassword:oldpassword},
                dateType:'json',
                url: "/updatepwds",
                success:function(msg){
                    alert(msg.msg);
                }
            });
        })
    })
</script>
