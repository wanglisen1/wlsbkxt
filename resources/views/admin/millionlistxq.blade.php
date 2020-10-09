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
<table class="layui-table">
    <thead>
    <tr>
        <th style="font-size:20px;">登陆时间</th>
    </tr>
    </thead>
    <tbody>
@foreach($data as $k=>$v)
    <tr>
        <td style="font-size:16px;">{{$k}}</td>
    </tr>
    @foreach($v as $kk=>$vv)
    <tr>
        <td style="padding-left: 50px;"> {{substr($vv,strpos($vv, ' '))}}</td>
    </tr>
    @endforeach


@endforeach
    </tbody>
</table>