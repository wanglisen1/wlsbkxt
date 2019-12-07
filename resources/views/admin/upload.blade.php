<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>


<style>
    .file {
        position: relative;
        display: inline-block;
        background: #D0EEFF;
        border: 1px solid #99D3F5;
        border-radius: 4px;
        padding: 4px 12px;
        overflow: hidden;
        color: #1E88C7;
        text-decoration: none;
        text-indent: 0;
        line-height: 20px;
    }
    .file input {
        position: absolute;
        font-size: 100px;
        right: 0;
        top: 0;
        opacity: 0;
    }
    .file:hover {
        background: #AADFFD;
        border-color: #78C3F3;
        color: #004974;
        text-decoration: none;
    }
</style>


<form action="/uploadpdf" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <a href="javascript:;" class="file">选择文件
    <input type="file" name="file" id="file" >
    </a>
    <input type="text" id="wb"  style="width:300px;;height:20px;border-style: none;border-bottom: 1px solid beige" >
    <a href="javascript:;" class="file" id="qqq">点击上传
    <input type="submit" >
    </a>
</form>
<script src="/jquery-3.1.1.min.js"></script>
<script>
    $(function(){
        $("#qqq").hide();
        $("#file").change(function(){
            var qq=$("#file").val();
            $("#wb").val(qq);//填充内容
            var wb =$("#wb").val();
            var hz = wb.substr(wb.lastIndexOf("."));
            if(hz!='.jpg'){
               alert('只能上传pdf文件');
                return false;
            }
            $("#qqq").show();
        })
    })

</script>




