<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<table class="layui-table">
    <thead>
    <tr>
	<th style="text-align:center;">类别</th>
	<th style="text-align:center;">年级</th>
	<th style="text-align:center;">季度</th>
        <th style="text-align:center;">名称</th>
        <th style="text-align:center;">操作</th>
    </thead>
    <tbody>
    @foreach($data as $k=>$v)
        <tr>
	    <td style="text-align:center;">
             @if($v['ppt_sub']=="趣味大语文")
    <span style=""><img src="/ywlogo.png" width="25px;"></span>
    @elseif($v['ppt_sub']=="思维培优数学")
    <span style=""><img src="/sxlogo.png" width="25px;"></span>
    @elseif($v['ppt_sub']=="KB课程")
    <span style=""><img src="/kblogo.png" width="25px;"></span>
    @elseif($v['ppt_sub']=="Phonics自然拼读")
    <span style=""><img src="/yypdlogo.png" width="25px;"></span>
    @endif
        {{$v['ppt_sub']}}
    </td>
	    <td style="text-align:center;">{{$v['ppt_grade']}}</td>
	   <td style="text-align:center;">{{$v['ppt_season']}}</td>
	<td style="text-align:center;">{{$v['ppt_title']}}</td>
            <td class="td-manage" style="text-align:center;">
		<a href="/pptlistbox?ppt_id={{$v['ppt_id']}}">
		<button class="layui-btn layui-btn-sm" style="background:#2093bf"><i class="iconfont">&#xe74e;&nbsp;查看</i></button>
		</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


