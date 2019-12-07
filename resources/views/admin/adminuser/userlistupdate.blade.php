<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<div class="layui-form-item" style="width:700px;margin:0 auto;margin-top: 50px;">
    <label class="layui-form-label">姓名：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="username" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['username']}}">
    </div>
</div></br></br>
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">电话：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="tel" lay-verify="title" autocomplete="off" placeholder="请输入名字" class="layui-input" value="{{$data['tel']}}">
    </div>
</div></br></br>
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">邮箱：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="email" lay-verify="title" autocomplete="off" placeholder="请输入邮箱" class="layui-input" value="{{$data['email']}}">
    </div>
</div></br></br>
<div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto">
    <div class="layui-col-md12">
        <label class="layui-form-label">性别：</label>
        @if($data['sex']==1)
            <input type="radio" name="sex" id="sex" value="2" title="男">
            <input type="radio" name="sex" id="sex" value="1" title="女" checked>
        @elseif($data['sex']==2)
            <input type="radio" name="sex" id="sex" value="2" title="男"checked>
            <input type="radio" name="sex" id="sex" value="1" title="女" >
        @endif
    </div>
</div></br></br></br></br>
<div class="layui-col-md6" >
    <label class="layui-form-label" style="margin-left:490px;">角色：</label>
    <select name="role" id="role" lay-verify="" style="width:300px;margin-left:600px;margin-top:-40px;">
        @if($data['role']==1)
        <option value="1" selected = "selected">总管理员</option>
        <option value="2" >管理员</option>
        <option value="3">加盟校长</option>
        <option value="4">语文教师</option>
            <option value="5">数学教师</option>
            <option value="6">英语教师</option>
        @elseif($data['role']==2)
            <option value="1" >总管理员</option>
            <option value="2" selected = "selected">管理员</option>
            <option value="3">加盟校长</option>
            <option value="4">教师</option>
            <option value="5">数学教师</option>
            <option value="6">英语教师</option>
        @elseif($data['role']==3)
            <option value="1" >总管理员</option>
            <option value="2" >管理员</option>
            <option value="3" selected = "selected">加盟校长</option>
            <option value="4">教师</option>
            <option value="5">数学教师</option>
            <option value="6">英语教师</option>
        @elseif($data['role']==4)
            <option value="1" >总管理员</option>
            <option value="2" >管理员</option>
            <option value="3" >加盟校长</option>
            <option value="4" selected = "selected">语文教师</option>
            <option value="5">数学教师</option>
            <option value="6">英语教师</option>
        @elseif($data['role']==5)
            <option value="1" >总管理员</option>
            <option value="2" >管理员</option>
            <option value="3" >加盟校长</option>
            <option value="4">语文教师</option>
            <option value="5" selected = "selected">数学教师</option>
            <option value="6">英语教师</option>
        @elseif($data['role']==6)
            <option value="1" >总管理员</option>
            <option value="2" >管理员</option>
            <option value="3" >加盟校长</option>
            <option value="4">语文教师</option>
            <option value="5">数学教师</option>
            <option value="6"  selected = "selected">英语教师</option>
        @endif
    </select>
</div></br></br></br></br>
<input type="hidden" id="uid" value="{{$data['u_id']}}">
<div class="layui-col-md6" style="margin-left:650px;">
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-radius" id="btn" >修改信息</button>
    </div>
</div>
<script src="/jquery-3.1.1.min.js"></script>
<script>
    $(function(){
        $("#btn").click(function(){
            var tel =$("#tel").val();
            var email =$("#email").val();
            var username =$("#username").val();
            var sex=$('input[name="sex"]:checked').val();
            var role =$("#role").val();
            var id =$("#uid").val();

            if(tel==''){
                alert('电话号码不能为空');
                return false;
            }if(email==''){
                alert('邮箱不能为空');
                return false;
            }if(username==''){
                alert('姓名不能为空');
                return false;
            }
            $.ajax({
                type: 'post',
                data:{tel:tel,username:username,email:email,sex:sex,role:role,id:id},
                dateType:'json',
                url: "/userupdate",
                success:function(msg){
                    alert(msg.msg);
                    if(msg.code==1) {
                        window.location = '/userlist';
                    }
                }
            });
        })
    })
</script>
