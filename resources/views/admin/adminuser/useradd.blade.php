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
<div class="layui-col-md6" style="width: 600px;margin-left: 100px;margin-top:10px;">
    <select name="role" id="role" lay-verify="">
        <option value="">请选择您开通用户的角色</option>
        @if($roles==1)
        <option value="26">总部教研(语文)</option>
        <option value="27">总部教研(数学)</option>
        <option value="28">总部教研(英语)</option>
        <option value="3">投资人</option>
        <option value="4">校长</option>
        <option value="5">主管</option>
        <option value="6">教师</option>
       @elseif($roles==2)
       <option value="26">总部教研(语文)</option>
       <option value="27">总部教研(数学)</option>
       <option value="28">总部教研(英语)</option>
        <option value="3">投资人</option>
        <option value="4">校长</option>
        <option value="5">主管</option>
        <option value="6">教师</option>
        @elseif($roles==3)
        <option value="4">校长</option>
        <option value="5">主管</option>
        <option value="6">教师</option>
        @elseif($roles==4)
        <option value="5">主管</option>
        <option value="6">教师</option>
        @elseif($roles==5)
        <option value="6">教师</option>
        @elseif($roles==26||$roles==27||$roles==28)
        <option value="5">主管</option>
        <option value="6">教师</option>
        @endif
    </select>
</div></br></br></br></br>
<input type="hidden" id="roles" value="{{$roles}}">


<div class="layui-col-md6" style="width: 600px;margin-left: 100px;margin-top:10px;" id="sytzr">
    <select name="xztzr" id="xztzr" lay-verify="">
        <option value="">请选择要开通的账号属于哪个投资人</option>
        @foreach($res as $k=>$v)
        <option value="{{$v['tzr_id']}}">{{$v['tzr_name']}}({{$v['tzr_school']}})</option>
        @endforeach
        </select></br></br>
</div>
<div class="layui-col-md6" style="width: 600px;margin-left: 100px;margin-top:10px;" id="ycsubject">
    <select name="subject" id="subject" lay-verify="">
        <option value="">请选择科目</option>
        @if($roles==26)
        <option value="趣味大语文">语文</option>
        @elseif($roles==27)
        <option value="思维培优数学">数学</option>
        @elseif($roles==28)
        <option value="HS英语">英语</option>
        @else
        <option value="趣味大语文">语文</option>
        <option value="思维培优数学">数学</option>
        <option value="HS英语">英语</option>
        @endif
        </select></br></br>
</div>
<div class="layui-form-item" style="width: 700px;" id="ycschool">
    <label class="layui-form-label">校区：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="school" lay-verify="title" autocomplete="off"  class="layui-input" placeholder="请输入校区" >
    </div>
</div>
<div class="layui-form-item" style="width: 700px;">
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
</div></br></br>

 <div id="ycseason">
        <div class="layui-card layui-form" lay-filter="component-form-element" >
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(春):</label>
              <input type="checkbox"  id="spring" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
          <div class="layui-card layui-form" lay-filter="component-form-element">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(暑):</label>
              <input type="checkbox" id="heat" lay-skin="switch"  lay-text="开启|关闭" >
          </div>
          </div>
          <div class="layui-card layui-form" lay-filter="component-form-element">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(秋):</label>
              <input type="checkbox" id="autumn" lay-skin="switch"  lay-text="开启|关闭" >
          </div>
          </div>
          <div class="layui-card layui-form" lay-filter="component-form-element">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(寒):</label>
              <input type="checkbox" id="cold" lay-skin="switch"  lay-text="开启|关闭" >
          </div>
        </div></br></br></br></br>
    </div>
<div id="yczgsubject">
    <div class="layui-card layui-form" lay-filter="component-form-element" >
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">语文:</label>
              <input type="checkbox"  id="yw" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
    </div>
    <div class="layui-card layui-form" lay-filter="component-form-element" >
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">数学:</label>
              <input type="checkbox"  id="sx" lay-skin="switch"  lay-text="开启|关闭" >
          </div>
    </div>
    <div class="layui-card layui-form" lay-filter="component-form-element" >
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">英语:</label>
              <input type="checkbox"  id="yy" lay-skin="switch"  lay-text="开启|关闭" >
          </div>
    </div>
</div>
<div id="ycgrade">
    <div class="layui-card layui-form" lay-filter="component-form-element" >
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">三年级:</label>
              <input type="checkbox"  id="sangrade" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
    </div>
    <div class="layui-card layui-form" lay-filter="component-form-element" >
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">四年级:</label>
              <input type="checkbox"  id="sigrade" lay-skin="switch"  lay-text="开启|关闭" >
          </div>
    </div>
    <div class="layui-card layui-form" lay-filter="component-form-element" >
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">五年级:</label>
              <input type="checkbox"  id="wugrade" lay-skin="switch"  lay-text="开启|关闭" >
          </div>
    </div>
    <div class="layui-card layui-form" lay-filter="component-form-element" >
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">六年级:</label>
              <input type="checkbox"  id="liugrade" lay-skin="switch"  lay-text="开启|关闭" >
          </div>
    </div>
</div>
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
          $('#ycschool').hide();
          $('#ycseason').hide();
          $('#ycsubject').hide();
          $('#yczgsubject').hide();
          $('#sytzr').hide();
          $('#ycgrade').hide();
          $("#role").change(function(){
             var role = $("#role").val();   
             var roles = $("#roles").val();
                if(roles==1||roles==2){
                    if(role==26||role==27||role==28){
                             $('#ycschool').hide();
                             $('#ycseason').hide();
                             $('#ycsubject').hide();
                             $('#yczgsubject').hide();
                             $('#sytzr').hide();
                             $('#ycgrade').hide();
                    }else if(role==3){
                             $('#ycschool').hide();
                             $('#ycseason').hide();
                             $('#ycsubject').hide();
                             $('#yczgsubject').hide();
                             $('#sytzr').hide();
                             $('#ycgrade').hide();
                        $('#ycschool').show();
                        $('#ycseason').show();
                    }else if(role==4){
                             $('#ycschool').hide();
                             $('#ycseason').hide();
                             $('#ycsubject').hide();
                             $('#yczgsubject').hide();
                             $('#sytzr').hide();
                             $('#ycgrade').hide();
                        $('#sytzr').show();
                    }else if(role==5){
                             $('#ycschool').hide();
                             $('#ycseason').hide();
                             $('#ycsubject').hide();
                             $('#yczgsubject').hide();
                             $('#sytzr').hide();
                             $('#ycgrade').hide();
                        $('#sytzr').show();
                        $('#yczgsubject').show();
                    }else if(role==6){
                             $('#ycschool').hide();
                             $('#ycseason').hide();
                             $('#ycsubject').hide();
                             $('#yczgsubject').hide();
                             $('#sytzr').hide();
                             $('#ycgrade').hide();
                        $('#sytzr').show();
                        $('#ycsubject').show();
                        $('#ycgrade').show();
                    }
                    

                }else if(roles==26||roles==27||roles==28){
                    if(role==5){
                             $('#ycschool').hide();
                             $('#ycseason').hide();
                             $('#ycsubject').hide();
                             $('#yczgsubject').hide();
                             $('#sytzr').hide();
                             $('#ycgrade').hide();
                        $('#sytzr').show();
                        $('#yczgsubject').show();
                    }else if(role==6){
                             $('#ycschool').hide();
                             $('#ycseason').hide();
                             $('#ycsubject').hide();
                             $('#yczgsubject').hide();
                             $('#sytzr').hide();
                             $('#ycgrade').hide();
                        $('#sytzr').show();
                        $('#ycsubject').show();
                        $('#ycgrade').show();
                    }
                }else if(roles==3){
                    if(role==4){
                             $('#ycschool').hide();
                             $('#ycseason').hide();
                             $('#ycsubject').hide();
                             $('#yczgsubject').hide();
                             $('#sytzr').hide();
                             $('#ycgrade').hide();
                    }else if(role==5){
                             $('#ycschool').hide();
                             $('#ycseason').hide();
                             $('#ycsubject').hide();
                             $('#yczgsubject').hide();
                             $('#sytzr').hide();
                             $('#ycgrade').hide();
                        $('#yczgsubject').show();
                    }else if(role==6){
                             $('#ycschool').hide();
                             $('#ycseason').hide();
                             $('#ycsubject').hide();
                             $('#yczgsubject').hide();
                             $('#sytzr').hide();
                             $('#ycgrade').hide();
                        $('#ycsubject').show();
                        $('#ycgrade').show();
                    }
                }else if(roles==4){
                    if(role==5){
                             $('#ycschool').hide();
                             $('#ycseason').hide();
                             $('#ycsubject').hide();
                             $('#yczgsubject').hide();
                             $('#sytzr').hide();
                             $('#ycgrade').hide();
                        $('#yczgsubject').show();
                    }else if(role==6){
                             $('#ycschool').hide();
                             $('#ycseason').hide();
                             $('#ycsubject').hide();
                             $('#yczgsubject').hide();
                             $('#sytzr').hide();
                             $('#ycgrade').hide();
                        $('#ycsubject').show();
                        $('#ycgrade').show();
                    }
                }else if(roles==5){
                    if(role==6){
                             $('#ycschool').hide();
                             $('#ycseason').hide();
                             $('#ycsubject').hide();
                             $('#yczgsubject').hide();
                             $('#sytzr').hide();
                             $('#ycgrade').hide();
                        $('#ycsubject').show();
                        $('#ycgrade').show();
                    }
                }
            
           })
         $("#btn").click(function(){
            var school =$("#school").val();
            var tel =$("#tel").val();
            var email =$("#email").val();
            var username =$("#username").val();
            var password =$("#password").val();
            var password1 =$("#password1").val();
            var role =$("#role").val();
            var sex=$('input[name="sex"]:checked').val();
            var xztzr = $("#xztzr").val();
            var subject = $("#subject").val();
            var roles = $("#roles").val();
    
                 if($('#spring').is(':checked')) {
                        var spring = 1;
                    }else{
                        var spring = 2;
                    }
                    if($('#heat').is(':checked')) {
                        var heat = 1;
                    }else{
                        var heat = 2;
                    }
                    if($('#autumn').is(':checked')) {
                        var autumn = 1;
                    }else{
                        var autumn = 2;
                    }
                    if($('#cold').is(':checked')) {
                        var cold = 1;
                    }else{
                        var cold = 2;
                    }

                    if($('#yw').is(':checked')) {
                        var yw = 1;
                    }else{
                        var yw = 2;
                    }
                     if($('#sx').is(':checked')) {
                        var sx = 1;
                    }else{
                        var sx = 2;
                    }
                     if($('#yy').is(':checked')) {
                        var yy = 1;
                    }else{
                        var yy = 2;
                    }

                if($('#sangrade').is(':checked')) {
                        var sangrade = 1;
                    }else{
                        var sangrade = 2;
                    }
                     if($('#sigrade').is(':checked')) {
                        var sigrade = 1;
                    }else{
                        var sigrade = 2;
                    }
                     if($('#wugrade').is(':checked')) {
                        var wugrade = 1;
                    }else{
                        var wugrade = 2;
                    }
                    if($('#liugrade').is(':checked')) {
                        var liugrade = 1;
                    }else{
                        var liugrade = 2;
                    }

            if(role==''){
                Popup.alert('HSKMS提示','您还没有设置角色！');
                return false;
            }if(tel==''){
                 Popup.alert('HSKMS提示','校区不能为空！');
                return false;
            }if(tel==''){
                 Popup.alert('HSKMS提示','电话号码不能为空！');
                return false;
            }if(email==''){
                Popup.alert('HSKMS提示','邮箱不能为空！');
                return false;
            }if(username==''){
                Popup.alert('HSKMS提示','姓名不能为空！');
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

            if(roles==1||roles==2||roles==26||roles==27||roles==28){
                if(role==4||role==5||role==6){
                    if(xztzr==''){
                    Popup.alert('HSKMS提示','所属投资人不能为空！');
                    return false;
                    }
                }
                
            }
            $.ajax({
                type: 'post',
                data:{school:school,tel:tel,username:username,email:email,sex:sex,password:password,role:role,spring:spring,heat:heat,autumn:autumn,cold:cold,xztzr:xztzr,yw:yw,sx:sx,yy:yy,subject:subject,sangrade:sangrade,sigrade:sigrade,wugrade:wugrade,liugrade:liugrade,roles:roles},
                dateType:'json',
                url: "/useradds",
                success:function(msg){
                    alert(msg.msg);
                    //Popup.alert('HSKMS提示',msg.msg);
                    if(msg.code==1) {
                        window.location.reload();
                    }
                }
            });
        })
    })
</script>
