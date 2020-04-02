<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">
<link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<script type="text/javascript" src="/alerttc/js/popup.js"></script>
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
@if($tzr==2)
    @if($data['role']==56||$data['role']==57||$data['role']==58||$data['role']==6||$data['role']==7||$data['role']==8)
    @if($data['role']==56||$data['role']==57||$data['role']==58)
    @else
    <input type="hidden" id="num" value="{{$num['addjs']}}">
    @endif
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">课节：</label>
    <div class="layui-input-block" >
        <input type="text" name="addjs" id="addjs" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['addjs']}}">
    </div>
</div></br></br>
    @else
    @endif
@elseif($tzr==1)
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">校长：</label>
    <div class="layui-input-block" >
        <input type="text" name="addxz" id="addxz" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['addxz']}}">
    </div>
</div></br></br>
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">主管：</label>
    <div class="layui-input-block" >
        <input type="text" name="addzg" id="addzg" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['addzg']}}">
    </div>
</div></br></br>
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">教师：</label>
    <div class="layui-input-block" >
        <input type="text" name="addjs" id="addjs" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['addjs']}}">
    </div>
</div></br></br>
@else
@endif
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
<input type="hidden" id="uid" value="{{$data['u_id']}}">
<input type="hidden" id="tzr" value="{{$data['addjs']}}">
<div class="layui-col-md6" style="margin-left:650px;">
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-radius" id="btn" >修改信息</button>
    </div>
</div>
<script src="/jquery-3.1.1.min.js"></script>
<script>
        var Popup = new Popup();
</script>
<script>
    $(function(){
        $("#btn").click(function(){
            var tel =$("#tel").val();
            var email =$("#email").val();
            var username =$("#username").val();
            var sex=$('input[name="sex"]:checked').val();
            var role =$("#role").val();
            var id =$("#uid").val();
            var addjs =$("#addjs").val();
            var addxz =$("#addxz").val();
            var addzg =$("#addzg").val();
            var tzr = $("#tzr").val();
            var num = $("#num").val();
            if(addjs>=num){
                Popup.alert('HSKMS提示','教师的课节不能大于等于主管的课节！');
                   //alert('教师的课节不能大于等于主管的课节！');
                return false;
            }
            
            if(tel==''){
                Popup.alert('HSKMS提示','电话号码不能为空！');

                return false;
            }if(email==''){
                Popup.alert('HSKMS提示','邮箱不能为空！');
                return false;
            }if(username==''){
                Popup.alert('HSKMS提示','姓名不能为空！');
                return false;
            }if(addjs==''){
                Popup.alert('HSKMS提示','可见课节不能为空！');
                return false;
            }
            $.ajax({
                type: 'post',
                data:{tel:tel,username:username,email:email,sex:sex,role:role,id:id,addjs:addjs,addxz:addxz,addzg:addzg},
                dateType:'json',
                url: "/userupdate",
                success:function(msg){
                    //Popup.toast('HSKMS提示！msg.msg',3);
                   //Popup.alert('HSKMS提示',msg.msg);
                    if(msg.code==1) {
                        if(tzr==1){
                            window.location = '/usertzrlist';
                        }else{
                            window.location = '/userlist';
                        }
                        
                    }
                }
            });
        })
    })
</script>
