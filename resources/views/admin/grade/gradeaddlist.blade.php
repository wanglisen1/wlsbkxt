<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<style type="text/css">
    .layui-btn {
         background-color: #F43B5F;
    }
</style>
<div class="layui-col-md6" style="margin-top: 80px;width: 300px;margin-left: 100px;">
    <label class="layui-form-label" style="margin-left: -100px;margin-bottom:-40px ;">科目：</label>
    <select name="role" id="subject" lay-verify="" style="margin-left:10px; ">
        <option value="">--请选择一个科目--</option>
        @foreach($data as $k=>$v)
        <option value="{{$v['s_id']}}">{{$v['sub_name']}}</option>
       @endforeach
    </select></br></br></br>
</div>
<div class="layui-form-item" style="width: 700px;">
    <label class="layui-form-label">年级：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="grade" lay-verify="title" autocomplete="off"  class="layui-input" placeholder="请输入年级名称" >
    </div>
</div>


<div class="layui-form-item">
    <div class="layui-input-block">
        <button class="layui-btn" lay-submit lay-filter="component-form-element" id="btn">立即提交</button>
    </div>
</div></br></br></br></br>

<script src="/jquery-3.1.1.min.js"></script>
<script>
    $(function(){
        $("#btn").click(function(){
            var grade =$("#grade").val();
	    var subject =$("#subject").val();
            if(grade==''){
                alert('年级不能为空');
                return false;
            }
            if(subject==''){
                alert('科目不能为空');
                return false;
	    }

            $.ajax({
                type: 'post',
                data:{grade:grade,subject:subject},
                dateType:'json',
                url: "/gradeadd",
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
