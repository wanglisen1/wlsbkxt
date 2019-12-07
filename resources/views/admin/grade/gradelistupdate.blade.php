<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<div class="layui-col-md6" style="margin-top: 30px;width: 300px;margin-left: 600px;">
    <label class="layui-form-label" style="margin-left: -100px;margin-bottom:-40px ;">学科：</label>
    <select name="role" id="subject" lay-verify="" style=" ">
        <option value="{{$data['s_id']}}" >{{$data['sub_name']}}</option>
        @foreach($data1 as $k=>$v)
            <option value="{{$v['s_id']}}">{{$v['sub_name']}}</option>
        @endforeach
    </select></br></br></br>
</div>
<div class="layui-form-item" style="width:700px;margin:0 auto;margin-top: 50px;">
    <label class="layui-form-label">年级：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="grade" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['grade']}}">
    </div>
</div></br></br>
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">添加时间：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="add_time" lay-verify="title" autocomplete="off" placeholder="请输入名字" class="layui-input" value="{{$data['add_time']}}">
    </div>
</div></br></br>

<input type="hidden" id="gid" value="{{$data['g_id']}}">
<div class="layui-col-md6" style="margin-left:650px;">
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-radius" id="btn">修改信息</button>
    </div>
</div>
<script src="/jquery-3.1.1.min.js"></script>
<script>
    $(function(){
        $("#btn").click(function(){
            var grade =$("#grade").val();
            var add_time =$("#add_time").val();
            var id =$("#gid").val();
            var subject =$("#subject").val();
            if(grade==''){
                alert('年级不能为空');
                return false;
            }
            $.ajax({
                type: 'post',
                data:{grade:grade,add_time:add_time,id:id,subject:subject},
                dateType:'json',
                url: "/gradeupdate",
                success:function(msg){
                    alert(msg.msg);
                    if(msg.code==1) {
                        window.location = '/gradelist';
                    }
                }
            });
        })
    })
</script>