<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
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
        <option value="2">管理员</option>
        <option value="3">加盟校长</option>
        <option value="4">语文教师</option>
        <option value="5">数学教师</option>
        <option value="6">英语教师</option>
        @elseif($role==2)
            <option value="3">加盟校长</option>
            <option value="4">语文教师</option>
            <option value="5">数学教师</option>
            <option value="6">英语教师</option>
        @elseif($role==3)
            @if($countyw<3)
            <option value="4">语文教师</option>
            @else
            @endif
                @if($countsx<3)
            <option value="5">数学教师</option>
                @else
                @endif
                @if($countyy<3)
            <option value="6">英语教师</option>
                @else
                @endif
        @endif
    </select>
</div></br></br></br></br>

<div class="layui-form-item">
    <div class="layui-input-block">
        <button class="layui-btn" lay-submit lay-filter="component-form-element" id="btn">立即提交</button>
        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
</div>

<script src="/jquery-3.1.1.min.js"></script>
<script>
    $(function(){
        $("#btn").click(function(){
            var tel =$("#tel").val();
            var email =$("#email").val();
            var username =$("#username").val();
            var password =$("#password").val();
            var password1 =$("#password1").val();
            var role =$("#role").val();
            var sex=$('input[name="sex"]:checked').val();
            if(tel==''){
                alert('电话号码不能为空');
                return false;
            }if(email==''){
                alert('邮箱不能为空');
                return false;
            }if(username==''){
                alert('姓名不能为空');
                return false;
            }if(role==''){
                alert('您还没有设置角色');
                return false;
            }if(password==''){
                alert('密码不能为空');
                return false;
            }if(password1==''){
                alert('确认密码不能为空');
                return false;
            } if(password!=password1) {
                alert('确认密码与密码不一致');
                return false;
            }
            $.ajax({
                type: 'post',
                data:{tel:tel,username:username,email:email,sex:sex,password:password,role:role},
                dateType:'json',
                url: "/useradds",
                success:function(msg){
                    alert(msg.msg);
                    if(msg.code==1) {
                        window.location.reload();
                    }
                }
            });
        })
    })
</script>
