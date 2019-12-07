<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<div class="layui-form-item" style="width:700px;margin:0 auto;margin-top: 50px;">
    <label class="layui-form-label">电话：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="tel" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['tel']}}">
    </div>
</div></br></br>
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">名字：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="username" lay-verify="title" autocomplete="off" placeholder="请输入名字" class="layui-input" value="{{$data['username']}}">
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
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">身份：</label>
    @if($data['role']==1)
        <label class="layui-form-label">总管理员</label>
    @elseif($data['role']==2)
        <label class="layui-form-label">管理员</label>
    @elseif($data['role']==3)
        <label class="layui-form-label">加盟校长</label>
    @elseif($data['role']==4)
        <label class="layui-form-label">教师</label>
    @endif
</div></br></br></br>

<div class="layui-col-md6" style="margin-left:650px;">
            <div class="layui-btn-container">
                <button class="layui-btn layui-btn-radius" id="btn">修改信息</button>
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
                data:{tel:tel,username:username,email:email,sex:sex},
                dateType:'json',
                url: "/pimupdate",
                success:function(msg){
                    alert(msg.msg);
                }
            });
        })
    })
</script>
