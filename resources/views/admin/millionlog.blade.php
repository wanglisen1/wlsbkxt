<html>
<head>
    <title>轻课平台登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<style>
    *{ margin: 0;padding: 0;  }
     html,body{width: 100%;height: 100%;    background-color: #39a2be;  }
    #btn{  width: 65%;  height: 0.39rem;  border-radius: 50px;  line-height: 0.39rem;  color: #fff;  background: #39a2be;  text-align: center;
        margin: 0 auto;  font-size: 0.2rem;  margin-bottom: 0.3rem;  }
    .ma{ width: 65%;  height: 0.39rem;  border-radius: 50px;  display: flex;  align-items: center;
        justify-content: center;  background: #f7f8fa;  text-align: center;  margin: 0 auto;  margin-bottom: 0.15rem; margin-top: 2.1rem  }
    #ma{ border: none;  font-size: 0.18rem;  width: 90%;  background: #f7f8fa;  margin-left:0.25rem ;  }
    /*PC端*/
    .pc{
        width: 100%;
        /* max-width: 1920px; */
        height: 100%;
        min-width: 1920px;
        background: url('/qkpt/hswdpcbg1.jpg')   center top;
        background-size:cover;
        background-repeat: no-repeat;
        overflow: hidden;
        /* background: url(a.jpg) no-repeat;background-size: 100%; */
    }

    .bg{
        width: 1200px;
        min-width: 1200px;
        /* height: 100px;*/
        /* border: 1px solid slategrey;  */
        margin: 0 auto;
        margin-top: 180px;
        display: flex;
        justify-content: space-between;

    }
    .mapc{display: flex; align-items: center;width: 260px;height: 45px;;  border-radius: 50px;border: 1px solid #d6d7d7;
        justify-content: center;  background: #f7f8fa;  text-align: center;  margin: 0 auto;  margin-bottom: 35px;
        margin-top: 80px;
    }
    #pcma{  border: none;  font-size: 18px;  width: 98%;   margin-left:25px ; background: #f7f8fa  }
    #pcbtn{width: 260px;  height: 39px;  border-radius: 50px;  line-height: 39px;  color: #fff;  background: #41a6d5;  text-align: center;
        margin: 0 auto;  font-size: 20px ; cursor:pointer; }
    input:focus{outline:none;}
    .sj{
        height:6.67rem;
        width:100%;
        background:url("/qkpt/hswdqkbg.jpg") no-repeat;  background-size: 100% 100%;
        overflow: hidden;
        background-color: #41a6d5;

    }
    .loginbg{
        width: 3.16rem;
        height: 5.78rem;
        background:url("/qkpt/hswdqkbg2.png") no-repeat;  background-size: 100% auto;
        margin: 0 auto;
        margin-top: 0.64rem;
        text-align: center;
        overflow: hidden;
    }
    .mimli_tap{
        width: 100%;
        display: flex;
        justify-content: space-around;
        font-size: 0.14rem;
        margin-top: 0.55rem;
    }
</style>
<body>
<div class="sj">
    <div class="loginbg">
    <h2 style="color: #e15b88;font-size: 0.26rem;margin-top: 0.15rem;margin-bottom: 0.05rem">天津校区即将开业</h2>
    <h2 style="color: #e15b88;font-size: 0.26rem;margin-bottom: 0.1rem">欢迎体验精品课程</h2>
    <p style="font-size: 0.16rem">京城名师·优质趣味课程</p>

        <div class="ma">
            <div>
                <img src="/qkpt/jhicon.png" alt="" style="width: 0.2rem;">
            </div>
            <div style="width: 70%;">
                <input type="text" id="ma" placeholder="请输入激活码" >
            </div>
        </div>
        <div id="btn">登 录</div>
        <div class="mimli_tap">
             <div>
                 <img src="/qkpt/hswdcode.jpg" alt="" style="margin-top: 0.1rem;width: 0.5rem;height: 0.5rem">
             </div>
            <div style="text-align: left;margin-top: 10px">
                <p>扫码即刻报名咨询</p>
                <p>电话：010-60157069</p>
                <p>北京市大兴区西红门CDD创意港楼</p>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="pc">


    <div class="bg">
        <div style="margin-top: 71px; margin-left: 159px;text-align: center;">
            <h2 style="color: #e15b88;font-size: 70px;margin-top: 25px;margin-bottom: 15px">天津校区即将开业</h2>
            <h2 style="color: #e15b88;font-size: 70px;margin-bottom: 15px">欢迎体验精品课程</h2>
            <p style="font-size: 36px;background-color: #ffedf3">京 城 名 师 · 优 质 课 程</p>
            <div class="mapc">
                <div>
                    <img src="/qkpt/jhicon.png" alt="" style="width:20px">
                </div>
                <div style="width: 191px ">
                    <input type="text" id="pcma" placeholder="请输入激活码" >
                </div>
            </div>
            <div id="pcbtn">登 录</div>
        </div>
        <div style="margin-top: 80px;">
            <div style="margin-left: 40px;margin-bottom: 20px;">
                <img src="/qkpt/hswdcode.jpg" alt="" width="100px" height="100px">
            </div>
            <div style="font-size: 25px;">
                <p style="margin-bottom: 20px;">扫码即刻报名咨询</p>
                <p style="margin-bottom: 20px;">电话：010-60157069</p>
                <p style="margin-bottom: 20px;">北京市大兴区西红门CDD创意港楼</p>
            </div>
        </div>

    </div>
</div>
</body>
<html>
<script src="/jquery-3.1.1.min.js"></script>
<script>
    
        (function (doc, win) {
        var docEl = doc.documentElement,
                resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
                recalc = function () {
                    var clientWidth = docEl.clientWidth;
                    console.log(clientWidth)
                    if (!clientWidth) return;
                        docEl.style.fontSize = 100 * (clientWidth / 375) + 'px';
                };

        if (!doc.addEventListener) return;
        win.addEventListener(resizeEvt, recalc, false);
        doc.addEventListener('DOMContentLoaded', recalc, false);
    })(document, window);
    $(function(){

        $("#btn").click(function(){
            var ma =$("#ma").val();
            if(ma==''){
                alert('激活码不能为空');
                return false;
            }
            $.ajax({
                type: 'post',
                data:{ma:ma},
                dateType:'json',
                url: "/bwlogincl",
                success:function(msg){
                    alert(msg.msg);
                    $("#ma").val("")
                    if(msg.code==1) {
                        var sub = msg.data;
                        window.location = '/million';
                    }
                }
            });
        })
        $("#pcbtn").click(function(){
            var ma =$("#pcma").val();
            if(ma==''){
                alert('激活码不能为空');
                return false;
            }
            $.ajax({
                type: 'post',
                data:{ma:ma},
                dateType:'json',
                url: "/bwlogincl",
                success:function(msg){
                    alert(msg.msg);
                    $("#pcma").val("")
                    if(msg.code==1) {
                        var sub = msg.data;
                        window.location = '/million';
                    }
                }
            });
        })


        /**
         * 判断访问类型是PC端还是手机端
         */
        function isMobile() {
            var userAgentInfo = navigator.userAgent;

            var mobileAgents = [ "Android", "iPhone", "SymbianOS", "Windows Phone", "iPad","iPod"];

            var mobile_flag = false;

            //根据userAgent判断是否是手机
            for (var v = 0; v < mobileAgents.length; v++) {

                if (userAgentInfo.indexOf(mobileAgents[v]) > 0) {
                    mobile_flag = true;
                    break;
                }
            }
            var screen_width = window.screen.width;
            var screen_height = window.screen.height;
            //根据屏幕分辨率判断是否是手机
            if(screen_width < 500 && screen_height < 800){
                mobile_flag = true;
            }

            return mobile_flag;
        }
        var mobile = isMobile(); // true为手机端，false为PC
        console.log(mobile)
        if(mobile){
            $('.pc').css('display','none')
            if(window.screen.width<376){
               // $('.ma').css({"margin-top" : "180px"})
            }

        }else {
            $('.sj').css('display','none')
            $('html').css('background','#f5f5f5')
        }
    })






</script>