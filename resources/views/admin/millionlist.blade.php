<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<style>
    .layui-form-select dl dd.layui-this {
        background-color: #2093bf;
        color: #fff;
    }
    .layui-input:focus, .layui-textarea:focus {
        border-color:#2093bf!important;
    }
</style>
<form class="layui-form layui-col-md12 "  action="" method="POST" >
<div class="layui-card layui-form" lay-filter="component-form-element">
<div class="layui-card-body layui-row layui-col-space10">

    <select class="school"  lay-filter="demo" >
        @if($schold=='')
        <option value="">请选择一个校区</option>
        @else
            <option value="{{$schold}}">{{$scholdname}}</option>
            @endif
        @foreach($school as $k=>$v)
        <option value="{{$v->bw_school}}">{{$v->school_name}}</option>
        @endforeach
    </select>

    @if($bs==2)
        <select id="subject" lay-filter="demo1" >
            @if($subold=='')
            <option value="">请选择一个科目</option>
            @else
                <option value="{{$subold}}">{{$suboldname}}</option>
            @endif
            @foreach($sub as $k=>$v)
                <option value="{{$v->bw_sub}}">{{$v->subject}}</option>
            @endforeach
        </select>

    @else
    @endif
    <div  >
        <div style="float:left;" class="layui-col-md4">
        <input type="text" name="title" id="idnum" placeholder="请输入编号" autocomplete="off" class="layui-input">
        </div>
        <div  id="soubtu" class="layui-btn layui-col-md1" style="background:#2093bf;height:38px;margin-left:5px;line-height:38px;float:left;"><i class="iconfont">&#xe6ac;&nbsp;搜索</i></div>
    </div>

</div>
</div>
</form>
<table class="layui-table">
    <thead>
    <tr>
        <th>编号</th>
        <th>科目</th>
        <th>激活码</th>
        <th>激活码登陆次数</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($res1 as $k=>$v)
        <tr>
                    <td>{{$v->bw_id}}</td>
                    <td>{{$v->subject}}</td>
                    <td>{{$v->bw_ma}}</td>
                    <td>{{$v->login_count}}</td>
                    <td> 	<a title="点击查看登陆时间"   onclick="" href="/millionlistxq?bw_id={{$v->bw_id}}" >
                            <button class="layui-btn layui-btn-sm" style="background:#F43B5F;"><i class="iconfont">&#xe6e6;&nbsp;点击查看登陆时间</i></button>
                        </a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<script>
    var school = '';
    var subject = '';
    layui.use(['layer', 'jquery', 'form'], function () {
        var layer = layui.layer,
            $ = layui.jquery,
            form = layui.form;

        form.on('select(demo)', function(data){
            console.log(data.value)
            school = data.value;
            window.location="/screensch?sch="+school+"&sub="+subject;
        });
        form.on('select(demo1)', function(data){
            console.log(data.value)
            school = $('.school').val();
            subject = data.value;
            window.location="/screensch?sch="+school+"&sub="+subject;
        });

    });
    $("#soubtu").click(function() {
        var idnum = $("#idnum").val();
        if(idnum!=''){
            window.location="/millionlist?idnum="+idnum;
        }else{
            return false;
        }

    })
</script>
