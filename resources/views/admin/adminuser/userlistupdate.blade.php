<link rel="shortcut icon" href="/layuiadmin/favicon.ico" type="/layuiadmin/image/x-icon" />
<link rel="stylesheet" href="/layuiadmin/css/font.css">
<link rel="stylesheet" href="/layuiadmin/css/xadmin.css">
<link rel="stylesheet" type="text/css" href="/alerttc/css/popup.css"/>

<script src="/layuiadmin/js/jquery.min.js"></script>
<script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>
<script type="text/javascript" src="/alerttc/js/popup.js"></script>
@if($ycrole==3)
    <div class="layui-form-item" style="width:700px;margin:0 auto;margin-top: 50px;">
        <label class="layui-form-label">姓名：</label>
        <div class="layui-input-block" >
            <input type="text" name="title" id="username" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['tzr_name']}}" disabled>
        </div>
    </div></br></br>

    <div class="layui-form-item" style="width:700px;margin:0 auto">
        <label class="layui-form-label">校区：</label>
        <div class="layui-input-block" >
            <input type="text" name="title" id="school" lay-verify="title" autocomplete="off" placeholder="请输入校区" class="layui-input" value="{{$data['tzr_school']}}">
        </div>
    </div></br></br>

    <div class="layui-form-item" style="width:700px;margin:0 auto">
        <label class="layui-form-label">电话：</label>
        <div class="layui-input-block" >
            <input type="text" name="title" id="tel" lay-verify="title" autocomplete="off" placeholder="请输入邮箱" class="layui-input" value="{{$data['tzr_phone']}}" disabled>
        </div>
    </div></br></br>

    <div class="layui-form-item" style="width:700px;margin:0 auto">
        <label class="layui-form-label">校长总额：</label>
        <div class="layui-input-block" >
            <input type="text" name="addjs" id="tzr_xz" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['tzr_xz']}}">
        </div>
    </div></br></br>

    <div class="layui-form-item" style="width:700px;margin:0 auto">
        <label class="layui-form-label">主管总额：</label>
        <div class="layui-input-block" >
            <input type="text" name="addjs" id="tzr_zg" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['tzr_zg']}}">
        </div>
    </div></br></br>

    <div class="layui-form-item" style="width:700px;margin:0 auto">
        <label class="layui-form-label">教师总额：</label>
        <div class="layui-input-block" >
            <input type="text" name="addjs" id="tzr_js" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['tzr_js']}}">
        </div>
    </div></br></br>

    @if($data['tzr_chun']==1)
    <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(春):</label>
              <input type="checkbox"  id="chun" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
    </div>
    @else
    <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(春):</label>
              <input type="checkbox"  id="chun" lay-skin="switch"  lay-text="开启|关闭" >
          </div>
    </div>
    @endif
    @if($data['tzr_shu']==1)
    <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(暑):</label>
              <input type="checkbox"  id="shu" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
    </div>
    @else
     <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
                <div class="layui-col-md12">
                  <label class="layui-form-label" style="margin-top:-10px;">课程(暑):</label>
                  <input type="checkbox"  id="shu" lay-skin="switch"  lay-text="开启|关闭" >
              </div>
     </div>
    @endif
    @if($data['tzr_qiu']==1)
    <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(秋):</label>
              <input type="checkbox"  id="qiu" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
    </div>
    @else
    <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(秋):</label>
              <input type="checkbox"  id="qiu" lay-skin="switch"  lay-text="开启|关闭" >
          </div>
    </div>
    @endif
    @if($data['tzr_han']==1)
    <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(寒):</label>
              <input type="checkbox"  id="han" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
    </div>
    @else
    <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(寒):</label>
              <input type="checkbox"  id="han" lay-skin="switch"  lay-text="开启|关闭" >
          </div>
    </div>
    @endif
    <div class="layui-col-md6" style="margin-left:600px;">
        <div class="layui-btn-container">
            <button class="layui-btn layui-btn-radius" id="btn" >修改信息</button>
        </div>
    </div>


@elseif($ycrole==4)
    <div class="layui-form-item" style="width:700px;margin:0 auto;margin-top: 50px;">
    <label class="layui-form-label">姓名：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="username" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['xz_name']}}" disabled>
    </div>
</div></br></br>
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">校区：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="school" lay-verify="title" autocomplete="off" placeholder="请输入校区" class="layui-input" value="{{$data['xz_school']}}">
    </div>
</div></br></br>
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">电话：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="tel" lay-verify="title" autocomplete="off" placeholder="请输入邮箱" class="layui-input" value="{{$data['xz_phone']}}" disabled>
    </div>
</div></br></br>
    @if($data['xz_chun']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(春):</label>
              <input type="checkbox"  id="xzchun" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    @endif
    @if($data['xz_shu']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(暑):</label>
              <input type="checkbox"  id="xzshu" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    @endif
    @if($data['xz_qiu']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(秋):</label>
              <input type="checkbox"  id="xzqiu" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    @endif
    @if($data['xz_han']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(寒):</label>
              <input type="checkbox"  id="xzhan" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    @endif
<div class="layui-col-md6" style="margin-left:600px;">
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-radius" id="xzbtn" >修改信息</button>
    </div>
</div>
</div>


@elseif($ycrole==5)
    <div class="layui-form-item" style="width:700px;margin:0 auto;margin-top: 50px;">
    <label class="layui-form-label">姓名：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="username" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['zg_name']}}" disabled>
    </div>
</div></br></br>
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">校区：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="school" lay-verify="title" autocomplete="off" placeholder="请输入校区" class="layui-input" value="{{$data['zg_school']}}">
    </div>
</div></br></br>
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">电话：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="tel" lay-verify="title" autocomplete="off" placeholder="请输入邮箱" class="layui-input" value="{{$data['zg_phone']}}" disabled>
    </div>
</div></br></br>
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">课节：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="zgmoren" lay-verify="title" autocomplete="off" placeholder="请输入开放课节数量" class="layui-input" value="{{$data['zg_moren']}}">
    </div>
</div></br></br>
    @if($data['zg_chun']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(春):</label>
              <input type="checkbox"  id="zgchun" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    @endif
    @if($data['zg_shu']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(暑):</label>
              <input type="checkbox"  id="zgshu" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    @endif
    @if($data['zg_qiu']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(秋):</label>
              <input type="checkbox"  id="zgqiu" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    @endif
    @if($data['zg_han']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(寒):</label>
              <input type="checkbox"  id="zghan" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    @endif
     @if($data['zg_sx']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">数学:</label>
              <input type="checkbox"  id="zgsx" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">数学:</label>
              <input type="checkbox"  id="zgsx" lay-skin="switch"  lay-text="开启|关闭">
          </div>
          </div>
    @endif
    @if($data['zg_yw']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">语文:</label>
              <input type="checkbox"  id="zgyw" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
     <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">语文:</label>
              <input type="checkbox"  id="zgyw" lay-skin="switch"  lay-text="开启|关闭" >
          </div>
          </div>
    @endif
    @if($data['zg_yy']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">英语:</label>
              <input type="checkbox"  id="zgyy" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">英语:</label>
              <input type="checkbox"  id="zgyy" lay-skin="switch"  lay-text="开启|关闭">
          </div>
          </div>
    @endif
<div class="layui-col-md6" style="margin-left:600px;">
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-radius" id="zgbtn" >修改信息</button>
    </div>
</div>
</div>
@elseif($ycrole==6)
 <div class="layui-form-item" style="width:700px;margin:0 auto;margin-top: 50px;">
    <label class="layui-form-label">姓名：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="username" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['js_name']}}" disabled>
    </div>
</div></br></br>
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">校区：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="school" lay-verify="title" autocomplete="off" placeholder="请输入校区" class="layui-input" value="{{$data['js_school']}}">
    </div>
</div></br></br>
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">电话：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="tel" lay-verify="title" autocomplete="off" placeholder="请输入邮箱" class="layui-input" value="{{$data['js_phone']}}" disabled>
    </div>
</div></br></br>
<div class="layui-form-item" style="width:700px;margin:0 auto">
    <label class="layui-form-label">课节：</label>
    <div class="layui-input-block" >
        <input type="text" name="title" id="jsmoren" lay-verify="title" autocomplete="off" placeholder="请输入开放课节数量" class="layui-input" value="{{$data['js_moren']}}">
    </div>
</div></br></br>
<!-- <input type="hidden" id="jssubject" value="{{$data['js_subject']}}"> -->
<div class="layui-col-md6" style="width:600px;margin-left:430px;" >
    <select name="subject" id="subject" lay-verify="">
        <option value="">请选择科目</option>
        <option value="趣味大语文">语文</option>
        <option value="思维培优数学">数学</option>
        <option value="HS英语">英语</option>
        </select></br></br>
</div>
    @if($data['js_chun']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(春):</label>
              <input type="checkbox"  id="jschun" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    @endif
    @if($data['js_shu']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(暑):</label>
              <input type="checkbox"  id="jsshu" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    @endif
    @if($data['js_qiu']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(秋):</label>
              <input type="checkbox"  id="jsqiu" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    @endif
    @if($data['js_han']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">课程(寒):</label>
              <input type="checkbox"  id="jshan" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    @endif
     @if($data['js_san']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">三年级:</label>
              <input type="checkbox"  id="jssan" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">三年级:</label>
              <input type="checkbox"  id="jssan" lay-skin="switch"  lay-text="开启|关闭">
          </div>
          </div>
    @endif
    @if($data['js_si']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">四年级:</label>
              <input type="checkbox"  id="jssi" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
     <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">四年级:</label>
              <input type="checkbox"  id="jssi" lay-skin="switch"  lay-text="开启|关闭" >
          </div>
          </div>
    @endif
    @if($data['js_wu']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">五年级:</label>
              <input type="checkbox"  id="jswu" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">五年级:</label>
              <input type="checkbox"  id="jswu" lay-skin="switch"  lay-text="开启|关闭">
          </div>
          </div>
    @endif
     @if($data['js_liu']==1)
   <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">六年级:</label>
              <input type="checkbox"  id="jsliu" lay-skin="switch"  lay-text="开启|关闭" checked>
          </div>
          </div>
    @else
    <div class="layui-card layui-form" lay-filter="component-form-element" style="width:700px;margin:0 auto;">
            <div class="layui-col-md12">
              <label class="layui-form-label" style="margin-top:-10px;">六年级:</label>
              <input type="checkbox"  id="jsliu" lay-skin="switch"  lay-text="开启|关闭">
          </div>
          </div>
    @endif
<div class="layui-col-md6" style="margin-left:600px;">
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-radius" id="jsbtn" >修改信息</button>
    </div>
</div>
</div>
@endif
@if($ycrole==26||$ycrole==27||$ycrole==28)
    <div class="layui-form-item" style="width:700px;margin:0 auto;margin-top: 50px;">
        <label class="layui-form-label">姓名：</label>
        <div class="layui-input-block" >
            <input type="text" name="title" id="username" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['username']}}" >
        </div>
    </div></br></br>
    <div class="layui-form-item" style="width:700px;margin:0 auto;margin-top: 50px;">
        <label class="layui-form-label">密码：</label>
        <div class="layui-input-block" >
            <input type="text" name="title" id="password" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['password']}}" disabled>
        </div>
    </div></br></br>
    <div class="layui-form-item" style="width:700px;margin:0 auto;margin-top: 50px;">
        <label class="layui-form-label">电话：</label>
        <div class="layui-input-block" >
            <input type="text" name="title" id="tel" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['tel']}}" >
        </div>
    </div></br></br>
    <div class="layui-form-item" style="width:700px;margin:0 auto;margin-top: 50px;">
        <label class="layui-form-label">邮箱：</label>
        <div class="layui-input-block" >
            <input type="text" name="title" id="email" lay-verify="title" autocomplete="off"  class="layui-input" value="{{$data['email']}}" >
        </div>
    </div></br></br>
    <div class="layui-col-md6" style="width:600px;margin-left:430px;" >
    <select name="subject" id="subject" lay-verify="">
        <option value="">请选择科目</option>
        <option value="26">语文</option>
        <option value="27">数学</option>
        <option value="28">英语</option>
        </select></br></br>
    </div>
    <div class="layui-col-md6" style="margin-left:600px;">
    <div class="layui-btn-container">
        <button class="layui-btn layui-btn-radius" id="jybtn" >修改信息</button>
    </div>
</div>
@endif
<input type="hidden" id="uid" value="{{$data['tzr_id']}}">
<input type="hidden" id="xzuid" value="{{$data['xz_id']}}">
<input type="hidden" id="zguid" value="{{$data['zg_id']}}">
<input type="hidden" id="jsuid" value="{{$data['js_id']}}">
<input type="hidden" id="jyuid" value="{{$data['u_id']}}">
<input type="hidden" id="jysubject" value="{{$data['role']}}">
<!-- <input type="hidden" id="phone" value="{{$data['tzr_phone']}}"> -->


<script src="/jquery-3.1.1.min.js"></script>
<script>
        var Popup = new Popup();
</script>
<script>
    $(function(){  
        $("#btn").click(function(){
            var tel =$("#tel").val();
            var username =$("#username").val();
            var role =$("#role").val();
            var school =$("#school").val();
            var tzr_id =$("#uid").val();
            var tzr_xz =$("#tzr_xz").val();
            var tzr_zg =$("#tzr_zg").val();
            var tzr_js =$("#tzr_js").val();
            var phone =$("#phone").val();
              if($('#chun').is(':checked')) {
                        var chun = 1;
                    }else{
                        var chun = 2;
                    }
                    if($('#shu').is(':checked')) {
                        var shu = 1;
                    }else{
                        var shu = 2;
                    }
                    if($('#qiu').is(':checked')) {
                        var qiu = 1;
                    }else{
                        var qiu = 2;
                    }
                    if($('#han').is(':checked')) {
                        var han = 1;
                    }else{
                        var han = 2;
                    }
            if(tel==''){
                Popup.alert('HSKMS提示','电话号码不能为空！');
                return false;
            }if(username==''){
                Popup.alert('HSKMS提示','姓名不能为空！');
                return false;
            }if(school==''){
                Popup.alert('HSKMS提示','校区不能为空！');
                return false;
            }if(tzr_xz==''){
                Popup.alert('HSKMS提示','校长总额不能为空！');
                return false;
            }if(tzr_zg==''){
                Popup.alert('HSKMS提示','主管总额不能为空！');
                return false;
            }if(tzr_js==''){
                Popup.alert('HSKMS提示','教师总额不能为空！');
                return false;
            }
            $.ajax({
                type: 'post',
                data:{school:school,tzr_xz:tzr_xz,role:role,tzr_id:tzr_id,tzr_zg:tzr_zg,tzr_js:tzr_js,chun:chun,shu:shu,qiu:qiu,han:han,phone:phone},
                dateType:'json',
                url: "/userupdate",
                success:function(msg){
                    //Popup.toast('HSKMS提示！msg.msg',3);
                   //Popup.alert('HSKMS提示',msg.msg);
                    if(msg.code==1) {
                            alert(msg.msg);
                            window.location = '/usertzrlist';  
                    }
                }
            });
        })
        $("#xzbtn").click(function(){
            var tel =$("#tel").val();
            var username =$("#username").val();
            var school =$("#school").val();
            var xz_id =$("#xzuid").val();
              if($('#xzchun').is(':checked')) {
                        var xzchun = 1;
                    }else{
                        var xzchun = 2;
                    }
                    if($('#xzshu').is(':checked')) {
                        var xzshu = 1;
                    }else{
                        var xzshu = 2;
                    }
                    if($('#xzqiu').is(':checked')) {
                        var xzqiu = 1;
                    }else{
                        var xzqiu = 2;
                    }
                    if($('#xzhan').is(':checked')) {
                        var xzhan = 1;
                    }else{
                        var xzhan = 2;
                    }
            if(tel==''){
                Popup.alert('HSKMS提示','电话号码不能为空！');
                return false;
            }if(username==''){
                Popup.alert('HSKMS提示','姓名不能为空！');
                return false;
            }if(school==''){
                Popup.alert('HSKMS提示','校区不能为空！');
                return false;
            }
            $.ajax({
                type: 'post',
                data:{school:school,xz_id:xz_id,xzchun:xzchun,xzshu:xzshu,xzqiu:xzqiu,xzhan:xzhan},
                dateType:'json',
                url: "/userupdate",
                success:function(msg){
                    //Popup.toast('HSKMS提示！msg.msg',3);
                   //Popup.alert('HSKMS提示',msg.msg);
                    if(msg.code==1) {
                            alert(msg.msg);
                            window.location = '/usertzrlist';  
                        }
                }
            });
        })
        $("#zgbtn").click(function(){
            var tel =$("#tel").val();
            var username =$("#username").val();
            var school =$("#school").val();
            var zgmoren = $("#zgmoren").val();
            var zg_id =$("#zguid").val();
              if($('#zgchun').is(':checked')) {
                        var zgchun = 1;
                    }else{
                        var zgchun = 2;
                    }
                    if($('#zgshu').is(':checked')) {
                        var zgshu = 1;
                    }else{
                        var zgshu = 2;
                    }
                    if($('#zgqiu').is(':checked')) {
                        var zgqiu = 1;
                    }else{
                        var zgqiu = 2;
                    }
                    if($('#zghan').is(':checked')) {
                        var zghan = 1;
                    }else{
                        var zghan = 2;
                    }
                if($('#zgsx').is(':checked')) {
                        var zgsx = 1;
                    }else{
                        var zgsx = 2;
                    }
                     if($('#zgyw').is(':checked')) {
                        var zgyw = 1;
                    }else{
                        var zgyw = 2;
                    }
                     if($('#zgyy').is(':checked')) {
                        var zgyy = 1;
                    }else{
                        var zgyy = 2;
                    }
           if(school==''){
                Popup.alert('HSKMS提示','校区不能为空！');
                return false;
            }
            if(zgmoren==''){
                Popup.alert('HSKMS提示','主管可见课节不能为空！');
                return false;
            }
            $.ajax({
                type: 'post',
                data:{school:school,zg_id:zg_id,zgchun:zgchun,zgshu:zgshu,zgqiu:zgqiu,zghan:zghan,zgmoren:zgmoren,zgsx:zgsx,zgyw:zgyw,zgyy:zgyy},
                dateType:'json',
                url: "/userupdate",
                success:function(msg){
                    //Popup.toast('HSKMS提示！msg.msg',3);
                   //Popup.alert('HSKMS提示',msg.msg);
                    if(msg.code==1) {
                            alert(msg.msg);
                            window.location = '/usertzrlist';  
                        }
                }
            });
        })
        $("#jsbtn").click(function(){
            var tel =$("#tel").val();
            var username =$("#username").val();
            var school =$("#school").val();
            var jsmoren = $("#jsmoren").val();
            var subject = $("#subject").val();
            var js_id =$("#jsuid").val();
              if($('#jschun').is(':checked')) {
                        var jschun = 1;
                    }else{
                        var jschun = 2;
                    }
                    if($('#jsshu').is(':checked')) {
                        var jsshu = 1;
                    }else{
                        var jsshu = 2;
                    }
                    if($('#jsqiu').is(':checked')) {
                        var jsqiu = 1;
                    }else{
                        var jsqiu = 2;
                    }
                    if($('#jshan').is(':checked')) {
                        var jshan = 1;
                    }else{
                        var jshan = 2;
                    }
                if($('#jssan').is(':checked')) {
                        var jssan = 1;
                    }else{
                        var jssan = 2;
                    }
                     if($('#jssi').is(':checked')) {
                        var jssi = 1;
                    }else{
                        var jssi = 2;
                    }
                     if($('#jswu').is(':checked')) {
                        var jswu = 1;
                    }else{
                        var jswu = 2;
                    }
                    if($('#jsliu').is(':checked')) {
                        var jsliu = 1;
                    }else{
                        var jsliu = 2;
                    }
           if(school==''){
                Popup.alert('HSKMS提示','校区不能为空！');
                return false;
            }
            if(jsmoren==''){
                Popup.alert('HSKMS提示','教师可见课节不能为空！');
                return false;
            }
            if(subject==''){
                Popup.alert('HSKMS提示','请选择教师所教科目！');
                return false;
            }
            $.ajax({
                type: 'post',
                data:{school:school,js_id:js_id,jschun:jschun,jsshu:jsshu,jsqiu:jsqiu,jshan:jshan,jsmoren:jsmoren,jssan:jssan,jssi:jssi,jswu:jswu,jsliu:jsliu,subject,subject},
                dateType:'json',
                url: "/userupdate",
                success:function(msg){
                    //Popup.toast('HSKMS提示！msg.msg',3);
                   //Popup.alert('HSKMS提示',msg.msg);
                    if(msg.code==1) {
                            alert(msg.msg);
                            window.location = '/usertzrlist';  
                        }
                }
            });
        })
        $("#jybtn").click(function(){
             var jyuid =$("#jyuid").val();
             var username =$("#username").val();
             var tel =$("#tel").val();
             var email =$("#email").val();
             var subject = $("#subject").val();
             var jysubject = $("#jysubject").val();
              if(subject==''){
                  var subject =  $("#jysubject").val();
              }
              if(username==''){
                Popup.alert('HSKMS提示','用户名不能为空！');
                return false;
                }
                if(tel==''){
                    Popup.alert('HSKMS提示','电话号码不能为空！');
                    return false;
                }
        
                if(email==''){
                    Popup.alert('HSKMS提示','邮箱不能为空！');
                    return false;
                }
                $.ajax({
                    type: 'post',
                    data:{username:username,tel:tel,email:email,jyuid:jyuid,subject,subject},
                    dateType:'json',
                    url: "/userupdate",
                    success:function(msg){
                        //Popup.toast('HSKMS提示！msg.msg',3);
                       //Popup.alert('HSKMS提示',msg.msg);
                        if(msg.code==1) {
                                alert(msg.msg);
                                window.location = '/usertzrlist';  
                            }
                    }
                });

        })
})
</script>
