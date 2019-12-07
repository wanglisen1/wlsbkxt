<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<div class="layui-col-md6" style="margin-top: 30px;width: 300px;margin-left: 100px;">
    <label class="layui-form-label" style="margin-left: -100px;margin-bottom:-40px ;">年级：</label>
    <select name="role" id="grade" lay-verify="" style="margin-left:10px; ">
        <option value="">--请选择一个年级--</option>
        @foreach($data1 as $k=>$v)
            <option value="{{$v['g_id']}}">{{$v['grade']}}</option>
        @endforeach
    </select></br></br></br>
</div>
<div class="layui-col-md6" style="margin-top: 30px;width: 300px;margin-left: 100px;">
    <label class="layui-form-label" style="margin-left: -100px;margin-bottom:-40px ;">科目：</label>
    <select name="role" id="season" lay-verify="" style="margin-left:10px; ">
        <option value="">--请选择一个季度--</option>
        <option value="春">春</option>
        <option value="署">署</option>
        <option value="秋">秋</option>
        <option value="寒">寒</option>

    </select></br></br></br>
</div>
<input type="hidden" id="subject" value="1">
<div class="layui-form-item" style="width: 700px;">
    <label class="layui-form-label">课程：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="cla_name" lay-verify="title" autocomplete="off"  class="layui-input" placeholder="请输入要添加的课程名称" >
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
            var cla_name =$("#cla_name").val();
	    var subject =$("#subject").val();
	    var season =$("#season").val();
            if(grade==''){
                alert('请选择一个年级');
                return false;
            }
            if(cla_name==''){
                alert('课程名不能为空');
                return false;
	    }
	    if(season==''){
	    	alert('请选择一个季度');
		return false;
	    }
            $.ajax({
                type: 'post',
                data:{grade:grade,cla_name:cla_name,subject:subject,season:season},
                dateType:'json',
                url: "/classadd",
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
