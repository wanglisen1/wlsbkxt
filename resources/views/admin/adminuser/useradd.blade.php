<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">
<link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<script type="text/javascript" src="/alerttc/js/popup.js"></script>
<style>
	.layui-col-md12 input{background-color:#2093bf}
</style>
<div class="layui-form-item" style="margin-top: 50px;width: 700px;">
    <label class="layui-form-label">电话：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="tel" lay-verify="title" autocomplete="off"  class="layui-input" placeholder="请输入电话" >
    </div>
</div>
<div class="layui-form-item" style="width: 700px;">
    <label class="layui-form-label">名称：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="username" lay-verify="title" autocomplete="off"  class="layui-input" placeholder="请输入名称">
    </div>
</div>
<div class="layui-form-item" style="width: 700px;">
    <label class="layui-form-label">邮箱：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="email" lay-verify="title" autocomplete="off"  class="layui-input" placeholder="请输入邮箱">
    </div>
</div>
<div class="layui-form-item" style="width: 700px;">
    <label class="layui-form-label">密码：</label>
    <div class="layui-input-block" >
        <input type="password" name="title" id="password" lay-verify="title" autocomplete="off"  class="layui-input" placeholder="请输入密码">
    </div>
</div>
<div class="layui-form-item" style="width: 700px;">
    <label class="layui-form-label">确认密码：</label>
    <div class="layui-input-block" >
        <input type="password" name="title" id="password1" lay-verify="title" autocomplete="off"  class="layui-input" placeholder="请输入确认密码">
    </div>
</div>

<div class="layui-card layui-form" lay-filter="component-form-element" >
    <div class="layui-col-md12">
        <label class="layui-form-label">性别：</label>
        <input type="radio" name="sex" id="sex" value="2" title="男" checked>
        <input type="radio" name="sex" id="sex" value="1" title="女">
    </div>
</div></br></br></br>
<div class="layui-col-md6" style="width: 600px;margin-left: 100px;">
    <select name="role" id="role" lay-verify="">
        <option value="">请赋予一个角色</option>
        @if($role==1)
        <option value="26">总部教研(语文)</option>
        <option value="27">总部教研(数学)</option>
        <option value="28">总部教研(英语)</option>
        <option value="3">投资人</option>
        <option value="4">校长</option>
        <option value="56">语文主管</option>
        <option value="57">数学主管</option>
        <option value="58">英语主管</option>
        <option value="6">语文教师</option>
        <option value="7">数学教师</option>
        <option value="8">英语教师</option>
        @elseif($role==3)
            @if($countxz<$addxz)
            <option value="4">加盟校长</option>
            @else
            @endif

            <option value="56">语文主管</option>
        <option value="57">数学主管</option>
        <option value="58">英语主管</option>
            @if($countjs<$addjs)
            <option value="6">语文教师</option>
            <option value="7">数学教师</option>
            <option value="8">英语教师</option>
            @else
            @endif
        @else
           
        @endif
    </select>
</div></br></br></br></br>
<!-- <div class="layui-col-md6" style="width: 600px;margin-left: 100px;" id="xsbb">
    <select name="xsjcbb" id="xsjcbb" lay-verify="">
        <option value="">请选择数学教材版本</option>
        <option value="人教版">人教版</option>
        <option value="冀教版">冀教版</option>
        <option value="北师大">北师大</option>
        <option value="苏教版">苏教版</option>
        <option value="鲁教版">鲁教版</option>
    </select>
    </br></br>
</div> -->
<!-- <div class="layui-card layui-form" lay-filter="component-form-element" >
             <input type="checkbox" name="" title="人教版" checked>
              <input type="checkbox" name="" title="冀教版"> 
              <input type="checkbox" name="" title="北师大"> 
              <input type="checkbox" name="" title="苏教版"> 
              <input type="checkbox" name="" title="鲁教版"> 
        </div> -->
<div class="layui-form-item">
    <div class="layui-input-block">
        <button class="layui-btn" lay-submit lay-filter="component-form-element" id="btn">立即提交</button>
        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
</div>

<script src="/jquery-3.1.1.min.js"></script>
<script>
        var Popup = new Popup();
</script>
<script>
    $(function(){
        // $('#xsbb').hide();
        // $('#role').change(function(){
        //     var tzr = $(this).val();
        //      if(tzr==3){
        //          $('#xsbb').show();
        //          return false;
        //      }else{
        //          $('#xsbb').hide();
        //          return false;
        //      }
             
        //      });
        $("#btn").click(function(){
            var tel =$("#tel").val();
            var email =$("#email").val();
            var username =$("#username").val();
            var password =$("#password").val();
            var password1 =$("#password1").val();
            var role =$("#role").val();
            // var xsjcbb =$("#xsjcbb").val();
            var sex=$('input[name="sex"]:checked').val();
            if(tel==''){
                 Popup.alert('HSKMS提示','电话号码不能为空！');
                return false;
            }if(email==''){
                Popup.alert('HSKMS提示','邮箱不能为空！');
                return false;
            }if(username==''){
                Popup.alert('HSKMS提示','姓名不能为空！');
                return false;
            }if(role==''){
                Popup.alert('HSKMS提示','您还没有设置角色！');
                return false;
            }if(password==''){
                Popup.alert('HSKMS提示','密码不能为空！');
                return false;
            }if(password1==''){
                Popup.alert('HSKMS提示','确认密码不能为空！');
                return false;
            }if(password!=password1){
                Popup.alert('HSKMS提示','确认密码与密码不一致！');
                return false;
            }

            $.ajax({
                type: 'post',
                data:{tel:tel,username:username,email:email,sex:sex,password:password,role:role},
                dateType:'json',
                url: "/useradds",
                success:function(msg){
                    //Popup.alert('HSKMS提示',msg.msg);
                    if(msg.code==1) {
                        window.location.reload();
                    }
                }
            });
        })
    })
</script>
