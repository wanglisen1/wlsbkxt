<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">
<link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<script type="text/javascript" src="/alerttc/js/popup.js"></script>
<style type="text/css">
    .loading {
 position: fixed;
 top: 0;
 bottom: 0;
 right: 0;
 left: 0;
 background-color: #f6ecec;
 opacity: 0.4;
 z-index: 1000;
}
 
.loading .gif {
 position: fixed;
   top :40%;
  left: 45%;
 margin-left: -16px;
 margin-top: -16px;
 z-index: 1001;
}
.layui-btn {
         background-color: #F43B5F;
    }
</style>
<div class="loading hide">
     <div class="gif" >
        <img src="/loadimg.gif" width="200px;">
     </div>
    </div>
<xblock>
    <button class="layui-btn" onclick="x_admin_show('添加用户','/useradd')"><i class="layui-icon"></i>添加</button>
    <button class="layui-btn" id="sx"><i class="iconfont">&#xe6aa;</i>&nbsp;&nbsp;刷新</button>

    <span class="x-right" style="line-height:40px">本页共有数据：<b style="color:red;">{{$count}}</b> 条</span>
</xblock>
<table class="layui-table">
    <thead>
    <tr>
        <th>登录名</th>
        <th>手机</th>
        <th>校区</th>
        <th>校长总额</th>
        <th>主管总额</th>
        <th>教师总额</th>
        <th>操作</th>
    </thead>
    <tbody>
    @foreach($data as $k=>$v)
    <tr>
        <td>{{$v['tzr_name']}}</td>
        <td>{{$v['tzr_phone']}}</td>
        <td>{{$v['tzr_school']}}</td>
        <td>{{$v['tzr_xz']}}</td>
        <td>{{$v['tzr_zg']}}</td>
        <td>{{$v['tzr_js']}}</td>
        <td class="td-manage">

            <a title="查看所属员工"  onclick="" href="/tzrclassify?id={{$v['tzr_id']}}">
                <i class="iconfont">&#xe6e6;&nbsp;</i>
            </a>
            <a title="编辑"  onclick="" href="/userlistupdate?tzr_id={{$v['tzr_id']}}">
                <i class="layui-icon">&#xe642;</i>
            </a>
            <a title="删除" class="del"  href="javascript:;" tzr_id="{{$v['tzr_id']}}">
                <i class="layui-icon">&#xe640;</i>
            </a>
            <a title="冻结" class="userblock"  href="javascript:;" tzr_id="{{$v['tzr_id']}}">
                <i class="iconfont">&nbsp;&#xe82b;</i>
            </a>

        </td>
    </tr>
        @endforeach
    </tbody>
</table>
<div class="page">
   <span class="pagejump" >
            {{$data->links()}}
    </span>
</div>

</div>
<script src="/jquery-3.1.1.min.js"></script>
<script>
        var Popup = new Popup();
</script>
<script>
    $(function(){
        $('div.loading').hide();
        $(".del").click(function(){
            var tzr_id =$(this).attr('tzr_id');
            //alert(u_id);return false;
             function confirmData () {
                $('div.loading').show();
                 $.ajax({
                    type: 'post',
                    data: {tzr_id:tzr_id},
                    dateType: 'json',
                    url: "/userdel",
                    success: function (msg) {
                        if (msg.code == 1) {
                            $('div.loading').hide();
                            location.reload();
                        }else{
                            $('div.loading').hide();
                            Popup.alert('HSKMS提示','删除失败');
                            return false;
                        }
                    }
                });   
            }
            var title = 'HSKMS提示',
            text = '您确定删除该投资人么？删除之后所属账户都将删除';
            Popup.confirm(title,text,confirmData);
        })
        $(".userblock").click(function(){
            var tzr_id =$(this).attr('tzr_id');
            //alert(u_id);return false;
             function confirmData () {
                $('div.loading').show();
                 $.ajax({
                    type: 'post',
                    data: {tzr_id:tzr_id},
                    dateType: 'json',
                    url: "/userblock",
                    success: function (msg) {
                        if (msg.code == 1) {
                            $('div.loading').hide();
                            location.reload();
                        }else{
                            $('div.loading').hide();
                            Popup.alert('HSKMS提示','删除失败');
                            return false;
                        }
                    }
                });   
            }
            var title = 'HSKMS提示',
            text = '您确定冻结该投资人么？冻结之后所属账户都将冻结';
            Popup.confirm(title,text,confirmData);
        })
        $("#sx").click(function(){
            location.reload();
        })
    })
</script>
