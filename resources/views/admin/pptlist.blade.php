<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<form class="layui-form layui-col-md12 x-so" style="margin-top:20px;" action="/sscha" method="POST" >
          <div style="width:70px;height:35px;background-color:#2093bf;line-height:35px;border-radius:2px;float:left;margin-left:5px;" id="sx" align="center">  
	<i class="iconfont" style="color:#fff;">&#xe6aa;&nbsp;&nbsp;刷新</i>
	  </div>
	<!--
         <div class="layui-input-inline" style="float:left;">
           <select name="subject" id="subject">
                <option value="">请选择一个科目</option>
                <option value="趣味大语文">趣味大语文</option>
                <option value="思维培优数学">思维培优数学</option>
                <option value="春">HS戏剧英语</option>
                <option value="署">自然拼读</option>
                <option value="秋">秋</option>
                <option value="寒">寒</option>
           </select>
        </div>
        <div style="float:left;margin-left:10px;`">
          <button class="layui-btn" id="ss" type="submit" lay-filter="sreach" style="background-color:#a73870;"><i class="layui-icon">&#xe615;</i></button>
	</div>
	-->
	<!-- <div style="float:left;margin-left:50px;">
	<span class="x-right" style="line-height:40px">本页共有数据：<b style="color:red;">{{$count}}</b>条</span>
	</div> -->
</form>
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
	    <td style="text-align:center;">{{$v['ppt_sub']}}</td>
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


