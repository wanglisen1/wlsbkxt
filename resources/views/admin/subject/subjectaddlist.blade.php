<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>

<div class="layui-form-item" style="margin-top: 50px;width: 700px;">
    <label class="layui-form-label">科目：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="subject" lay-verify="title" autocomplete="off"  class="layui-input" placeholder="请输入科目名称" >
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
            var subject =$("#subject").val();
            if(subject==''){
                alert('科目不能为空');
                return false;
            }
            $.ajax({
                type: 'post',
                data:{subject:subject},
                dateType:'json',
                url: "/subjectadd",
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
