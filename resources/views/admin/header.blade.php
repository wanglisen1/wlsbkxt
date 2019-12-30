<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>备课系统管理后台</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/layuiadmin/hslogo.ico" type="/layuiadmin/image/x-icon" />
    <link rel="stylesheet" href="/layuiadmin/css/font.css">
    <link rel="stylesheet" href="/layuiadmin/css/xadmin.css">

    <script src="/layuiadmin/js/jquery.min.js"></script>
    <script src="/layuiadmin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/layuiadmin/js/xadmin.js"></script>

</head>
<body>
<!-- 顶部开始 -->
<div class="container">

        <img src="/hswdlogo.png" style="width:180px;height: 40px;margin-left: -250px;margin-top:5px;">

    <div class="left_open" style="margin-left:220px;">
        <i title="展开左侧栏" class="iconfont">&#xe699;</i>
    </div>

    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;">你好！{{$sname}}</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd><a onClick="x_admin_show('个人信息','/pim')">个人信息</a></dd>
                <dd><a id="tuichu"  class="tc" value="1">退出</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item to-index"><a href="/admin">首页</a></li>
    </ul>

</div>
<!-- 顶部结束 -->
<!-- 中部开始 -->
<!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            @if($role==1)
            <div id="nr">
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a9;</i>
                    <cite>教师备课</cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe705;</i>
                            <cite>趣味大语文</cite>
                            <input type="hidden" name="" id="qwdyw" value="趣味大语文">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=三年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywsan">三年级</cite>
                                    <input type="hidden" name="" id="ywsan" value="三年级">
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=四年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywsi">四年级</cite>
                                     <input type="hidden" name="" id="ywsi" value="四年级">
                                </a>
                            </li>
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=五年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywwu">五年级</cite>
                                    <input type="hidden" name="" id="ywwu" value="五年级">
                                </a>
                            </li >
                            <li>
                               <a _href="/newsousuo?subject=趣味大语文&grade=六年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywwu">六年级</cite>
                                    <input type="hidden" name="" id="ywliu" value="六年级">
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6cb;</i>
                            <cite id="kcsx">思维培优数学</cite>
                             <input type="hidden" name="" id="kcsxs" value="思维培优数学">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=思维培优数学&grade=三年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>三年级</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=思维培优数学&grade=四年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>四年级</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=思维培优数学&grade=五年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>五年级</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=思维培优数学&grade=六年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>六年级</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe74a;</i>
                            <cite id="kcyy">HS英语</cite>
                             <input type="hidden" name="" id="kcyys" value="HS英语">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=HS英语&grade=K1">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K1</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K2">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K2</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K3">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K3</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K4">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K4</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K5">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K5</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K6">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K6</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6c7;</i>
                            <cite id="kcpd">Phonics自然拼读</cite>
                             <input type="hidden" name="" id="kcpds" value="Phonics自然拼读">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                 <a _href="/newsousuo?subject=Phonics自然拼读&grade=P1">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P1</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P2">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P2</cite>
                                    
                                </a>
                            </li>
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P3">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P3</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P4">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P4</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                </ul>
            </li>             
                <li >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe7ce;</i>
                        <cite>全部备课</cite>
                        <i class="iconfont nav_right">&#xe6a7;</i>
                    </a>
                    <ul class="sub-menu">
                        <li><a _href="/collectlist"><i class="iconfont">&#xe6a7;</i><cite>全部备课课节</cite></a></li>
                    </ul>
                </li>
                 <li >
                    <a _href="/pptlist">
                        <i class="iconfont">&#xe812;</i>
                        <cite>ppt</cite>
                    </a>
                </li>
                <li >
                    <a _href="/videolist">
                        <i class="iconfont">&#xe820;</i>
                        <cite>精选视频</cite>
                    </a>
                </li>
                <li >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6ae;</i>
                        <cite>个性化方案</cite>
                        <i class="iconfont nav_right">&#xe6a7;</i>
                    </a>
                    <ul class="sub-menu">
                        <li><a _href="/gxhlist"><i class="iconfont">&#xe6a7;</i><cite>查看个性化方案</cite></a></li>
                    </ul>
                </li>
                <li >
                    <a href="javascript:;" id="qhnr">
                        <i class="iconfont">&#xe82a;</i>
                        <cite>管理员管理</cite>
                    </a>
                </li>
            </div>
            <div id="admingl">
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe726;</i>
                    <cite>管理员管理</cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/userlist">
                            <i class="iconfont" >&#xe6a7;</i>
                            <cite>管理员列表</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="/useradd">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>管理员添加</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="/Administratordel">
                            <i class="iconfont" >&#xe6a7;</i>
                            <cite>已删除管理员</cite>
                        </a>
                    </li >
                     <li>
                        <a _href="/usertzrlist">
                            <i class="iconfont" >&#xe6a7;</i>
                            <cite>投资人列表</cite>
                        </a>
                    </li >
                </ul>
            </li>
                <li >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe705;</i>
                        <cite>学科管理</cite>
                        <i class="iconfont nav_right">&#xe6a7;</i>
                    </a>
                    <ul class="sub-menu">
                        <li><a _href="/subjectaddlist"><i class="iconfont">&#xe6a7;</i><cite>添加学科</cite></a></li>
                        <li><a _href="/subjectlist"><i class="iconfont">&#xe6a7;</i><cite>学科列表</cite></a></li>
                    </ul>
                </li>
                <li >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6b5;</i>
                        <cite>年级管理</cite>
                        <i class="iconfont nav_right">&#xe6a7;</i>
                    </a>
                    <ul class="sub-menu">
                        <li><a _href="/gradeaddlist"><i class="iconfont">&#xe6a7;</i><cite>年级添加</cite></a></li>
                        <li><a _href="/gradelist"><i class="iconfont">&#xe6a7;</i><cite>年级列表</cite></a></li>
                        <li><a _href="/gradedellist"><i class="iconfont">&#xe6a7;</i><cite>已禁用年级</cite></a></li>
                    </ul>
                </li>
                <li >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6eb;</i>
                        <cite>课程管理</cite>
                        <i class="iconfont nav_right">&#xe6a7;</i>
                    </a>
                    <ul class="sub-menu">
                        <li><a _href="/classaddlistyw"><i class="iconfont">&#xe6a7;</i><cite>添加语文课程</cite></a></li>
                        <li><a _href="/classaddlistsx"><i class="iconfont">&#xe6a7;</i><cite>添加数学课程</cite></a></li>
                        <li><a _href="/classaddlistyy"><i class="iconfont">&#xe6a7;</i><cite>添加英语课程</cite></a></li>
                        <li><a _href="/classaddlistyypd"><i class="iconfont">&#xe6a7;</i><cite>添加英语（自然拼读） </cite></a></li>
			<li><a _href="/classlist"><i class="iconfont">&#xe6a7;</i><cite>课程列表</cite></a></li>
                    </ul>
		</li>
		  <li >
                    <a _href="/chapterseason">
                        <i class="iconfont">&#xe6da;</i>
                        <cite>课节发放状态</cite>
                    </a>
                </li>
                <li >
                    <a href="javascript:;" id="fh">
                        <i class="iconfont">&#xe6f3;</i>
                        <cite>返回</cite>
                    </a>
		</li>
               </div>
            @elseif($role==4)
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a9;</i>
                    <cite>教师备课</cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe705;</i>
                            <cite>趣味大语文</cite>
                            <input type="hidden" name="" id="qwdyw" value="趣味大语文">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=三年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywsan">三年级</cite>
                                    <input type="hidden" name="" id="ywsan" value="三年级">
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=四年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywsi">四年级</cite>
                                     <input type="hidden" name="" id="ywsi" value="四年级">
                                </a>
                            </li>
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=五年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywwu">五年级</cite>
                                    <input type="hidden" name="" id="ywwu" value="五年级">
                                </a>
                            </li >
                            <li>
                               <a _href="/newsousuo?subject=趣味大语文&grade=六年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywwu">六年级</cite>
                                    <input type="hidden" name="" id="ywliu" value="六年级">
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6cb;</i>
                            <cite id="kcsx">思维培优数学</cite>
                             <input type="hidden" name="" id="kcsxs" value="思维培优数学">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=思维培优数学&grade=三年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>三年级</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=思维培优数学&grade=四年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>四年级</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=思维培优数学&grade=五年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>五年级</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=思维培优数学&grade=六年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>六年级</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe74a;</i>
                            <cite id="kcyy">HS英语</cite>
                             <input type="hidden" name="" id="kcyys" value="HS英语">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=HS英语&grade=K1">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K1</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K2">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K2</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K3">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K3</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K4">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K4</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K5">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K5</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K6">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K6</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6c7;</i>
                            <cite id="kcpd">Phonics自然拼读</cite>
                             <input type="hidden" name="" id="kcpds" value="Phonics自然拼读">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                 <a _href="/newsousuo?subject=Phonics自然拼读&grade=P1">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P1</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P2">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P2</cite>
                                    
                                </a>
                            </li>
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P3">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P3</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P4">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P4</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                </ul>
            </li>
            <li >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe7ce;</i>
                        <cite>教师备课</cite>
                        <i class="iconfont nav_right">&#xe6a7;</i>
                    </a>
                    <ul class="sub-menu">
                        <li><a _href="/collectlist"><i class="iconfont">&#xe6a7;</i><cite>全部教师备课</cite></a></li>
                    </ul>
                </li>
                 <li >
                    <a _href="/pptlist">
                        <i class="iconfont">&#xe812;</i>
                        <cite>ppt</cite>
                    </a>
                </li>
                <li >
                    <a _href="/videolist">
                        <i class="iconfont">&#xe820;</i>
                        <cite>精选视频</cite>
                    </a>
                </li>
                <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe726;</i>
                    <cite>教师管理</cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/userlist">
                            <i class="iconfont" >&#xe6a7;</i>
                            <cite>教师列表</cite>
                        </a>
                    </li >
                </ul>
            </li>
            @elseif($role==3)
            <div id="nr">
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a9;</i>
                    <cite>教师备课</cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe705;</i>
                            <cite>趣味大语文</cite>
                            <input type="hidden" name="" id="qwdyw" value="趣味大语文">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=三年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywsan">三年级</cite>
                                    <input type="hidden" name="" id="ywsan" value="三年级">
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=四年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywsi">四年级</cite>
                                     <input type="hidden" name="" id="ywsi" value="四年级">
                                </a>
                            </li>
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=五年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywwu">五年级</cite>
                                    <input type="hidden" name="" id="ywwu" value="五年级">
                                </a>
                            </li >
                            <li>
                               <a _href="/newsousuo?subject=趣味大语文&grade=六年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywwu">六年级</cite>
                                    <input type="hidden" name="" id="ywliu" value="六年级">
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6cb;</i>
                            <cite id="kcsx">思维培优数学</cite>
                             <input type="hidden" name="" id="kcsxs" value="思维培优数学">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=思维培优数学&grade=三年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>三年级</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=思维培优数学&grade=四年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>四年级</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=思维培优数学&grade=五年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>五年级</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=思维培优数学&grade=六年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>六年级</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe74a;</i>
                            <cite id="kcyy">HS英语</cite>
                             <input type="hidden" name="" id="kcyys" value="HS英语">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=HS英语&grade=K1">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K1</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K2">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K2</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K3">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K3</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K4">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K4</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K5">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K5</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K6">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K6</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6c7;</i>
                            <cite id="kcpd">Phonics自然拼读</cite>
                             <input type="hidden" name="" id="kcpds" value="Phonics自然拼读">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                 <a _href="/newsousuo?subject=Phonics自然拼读&grade=P1">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P1</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P2">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P2</cite>
                                    
                                </a>
                            </li>
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P3">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P3</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P4">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P4</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                </ul>
            </li>             
                 <li >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe7ce;</i>
                        <cite>全部备课</cite>
                        <i class="iconfont nav_right">&#xe6a7;</i>
                    </a>
                    <ul class="sub-menu">
                        <li><a _href="/collectlist"><i class="iconfont">&#xe6a7;</i><cite>全部教师备课</cite></a></li>
                    </ul>
                </li>
                 <li >
                    <a _href="/pptlist">
                        <i class="iconfont">&#xe812;</i>
                        <cite>ppt</cite>
                    </a>
                </li>
                <li >
                    <a _href="/videolist">
                        <i class="iconfont">&#xe820;</i>
                        <cite>精选视频</cite>
                    </a>
                </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe726;</i>
                    <cite>管理员管理</cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/userlist">
                            <i class="iconfont" >&#xe6a7;</i>
                            <cite>管理员列表</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="/useradd">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>管理员添加</cite>
                        </a>
                    </li >
                </ul>
            </li>
            @elseif($role==6)
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a9;</i>
                    <cite>教师备课</cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe705;</i>
                            <cite>趣味大语文</cite>
                            <input type="hidden" name="" id="qwdyw" value="趣味大语文">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=三年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywsan">三年级</cite>
                                    <input type="hidden" name="" id="ywsan" value="三年级">
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=四年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywsi">四年级</cite>
                                     <input type="hidden" name="" id="ywsi" value="四年级">
                                </a>
                            </li>
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=五年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywwu">五年级</cite>
                                    <input type="hidden" name="" id="ywwu" value="五年级">
                                </a>
                            </li >
                            <li>
                               <a _href="/newsousuo?subject=趣味大语文&grade=六年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywwu">六年级</cite>
                                    <input type="hidden" name="" id="ywliu" value="六年级">
                                </a>
                            </li>
                            
                        </ul>     
                </ul>
            </li>
            <li >
                <a href="javascript:;">
                        <i class="iconfont">&#xe7ce;</i>
                        <cite>我的备课</cite>
                        <i class="iconfont nav_right">&#xe6a7;</i>
                    </a>
                    <ul class="sub-menu">
                        <li><a _href="/collectlist"><i class="iconfont">&#xe6a7;</i><cite>我的全部备课</cite></a></li>
                    </ul>
                </li>
            @elseif($role==7)
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a9;</i>
                    <cite>教师备课</cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                <ul class="sub-menu">
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6cb;</i>
                            <cite id="kcsx">思维培优数学</cite>
                             <input type="hidden" name="" id="kcsxs" value="思维培优数学">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=思维培优数学&grade=三年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>三年级</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=思维培优数学&grade=四年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>四年级</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=思维培优数学&grade=五年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>五年级</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=思维培优数学&grade=六年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>六年级</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                </ul>
            </li>
            <li >
                <a href="javascript:;">
                        <i class="iconfont">&#xe7ce;</i>
                        <cite>我的备课</cite>
                        <i class="iconfont nav_right">&#xe6a7;</i>
                    </a>
                    <ul class="sub-menu">
                        <li><a _href="/collectlist"><i class="iconfont">&#xe6a7;</i><cite>我的全部备课</cite></a></li>
                    </ul>
                </li>
            @elseif($role==8)
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a9;</i>
                    <cite>教师备课</cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                <ul class="sub-menu">
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe74a;</i>
                            <cite id="kcyy">HS英语</cite>
                             <input type="hidden" name="" id="kcyys" value="HS英语">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=HS英语&grade=K1">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K1</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K2">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K2</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K3">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K3</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K4">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K4</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K5">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K5</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K6">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K6</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6c7;</i>
                            <cite id="kcpd">Phonics自然拼读</cite>
                             <input type="hidden" name="" id="kcpds" value="Phonics自然拼读">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                 <a _href="/newsousuo?subject=Phonics自然拼读&grade=P1">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P1</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P2">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P2</cite>
                                    
                                </a>
                            </li>
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P3">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P3</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P4">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P4</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                </ul>
            </li>
            <li >
                <a href="javascript:;">
                        <i class="iconfont">&#xe7ce;</i>
                        <cite>全部备课</cite>
                        <i class="iconfont nav_right">&#xe6a7;</i>
                    </a>
                    <ul class="sub-menu">
                        <li><a _href="/collectlist"><i class="iconfont">&#xe6a7;</i><cite>我的全部备课</cite></a></li>
                    </ul>
                </li>
            @elseif($role==26)
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a9;</i>
                    <cite>教师备课</cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe705;</i>
                            <cite>趣味大语文</cite>
                            <input type="hidden" name="" id="qwdyw" value="趣味大语文">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=三年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywsan">三年级</cite>
                                    <input type="hidden" name="" id="ywsan" value="三年级">
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=四年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywsi">四年级</cite>
                                     <input type="hidden" name="" id="ywsi" value="四年级">
                                </a>
                            </li>
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=五年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywwu">五年级</cite>
                                    <input type="hidden" name="" id="ywwu" value="五年级">
                                </a>
                            </li >
                            <li>
                               <a _href="/newsousuo?subject=趣味大语文&grade=六年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywwu">六年级</cite>
                                    <input type="hidden" name="" id="ywliu" value="六年级">
                                </a>
                            </li>
                            
                        </ul>     
                </ul>
            </li>
             <li >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe7ce;</i>
                        <cite>全部备课</cite>
                        <i class="iconfont nav_right">&#xe6a7;</i>
                    </a>
                    <ul class="sub-menu">
                        <li><a _href="/collectlist"><i class="iconfont">&#xe6a7;</i><cite>语文全部备课</cite></a></li>
                    </ul>
                </li>
            <li >
                    <a _href="/chapterseason">
                        <i class="iconfont">&#xe6da;</i>
                        <cite>课节发放状态</cite>
                    </a>
                </li>
             @elseif($role==27)
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a9;</i>
                    <cite>教师备课</cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                <ul class="sub-menu">
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6cb;</i>
                            <cite id="kcsx">思维培优数学</cite>
                             <input type="hidden" name="" id="kcsxs" value="思维培优数学">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=思维培优数学&grade=三年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>三年级</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=思维培优数学&grade=四年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>四年级</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=思维培优数学&grade=五年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>五年级</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=思维培优数学&grade=六年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>六年级</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                </ul>
            </li>
            <li >
                    <a href="javascript:;">
                        <i class="iconfont">&#xe7ce;</i>
                        <cite>全部备课</cite>
                        <i class="iconfont nav_right">&#xe6a7;</i>
                    </a>
                    <ul class="sub-menu">
                        <li><a _href="/collectlist"><i class="iconfont">&#xe6a7;</i><cite>数学全部备课</cite></a></li>
                    </ul>
                </li>
             <li >
                    <a _href="/chapterseason">
                        <i class="iconfont">&#xe6da;</i>
                        <cite>课节发放状态</cite>
                    </a>
                </li>
            @elseif($role==28)
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a9;</i>
                    <cite>教师备课</cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                <ul class="sub-menu">
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe74a;</i>
                            <cite id="kcyy">HS英语</cite>
                             <input type="hidden" name="" id="kcyys" value="HS英语">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=HS英语&grade=K1">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K1</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K2">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K2</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K3">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K3</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K4">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K4</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K5">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K5</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K6">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K6</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6c7;</i>
                            <cite id="kcpd">Phonics自然拼读</cite>
                             <input type="hidden" name="" id="kcpds" value="Phonics自然拼读">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                 <a _href="/newsousuo?subject=Phonics自然拼读&grade=P1">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P1</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P2">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P2</cite>
                                    
                                </a>
                            </li>
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P3">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P3</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P4">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P4</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                </ul>
            </li>
            <li >
                <a href="javascript:;">
                        <i class="iconfont">&#xe7ce;</i>
                        <cite>全部备课</cite>
                        <i class="iconfont nav_right">&#xe6a7;</i>
                    </a>
                    <ul class="sub-menu">
                        <li><a _href="/collectlist"><i class="iconfont">&#xe6a7;</i><cite>英语全部备课</cite></a></li>
                    </ul>
                </li>
               @elseif($role==5)
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a9;</i>
                    <cite>教师备课</cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe705;</i>
                            <cite>趣味大语文</cite>
                            <input type="hidden" name="" id="qwdyw" value="趣味大语文">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=三年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywsan">三年级</cite>
                                    <input type="hidden" name="" id="ywsan" value="三年级">
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=四年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywsi">四年级</cite>
                                     <input type="hidden" name="" id="ywsi" value="四年级">
                                </a>
                            </li>
                            <li>
                                <a _href="/newsousuo?subject=趣味大语文&grade=五年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywwu">五年级</cite>
                                    <input type="hidden" name="" id="ywwu" value="五年级">
                                </a>
                            </li >
                            <li>
                               <a _href="/newsousuo?subject=趣味大语文&grade=六年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite id="kcywwu">六年级</cite>
                                    <input type="hidden" name="" id="ywliu" value="六年级">
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6cb;</i>
                            <cite id="kcsx">思维培优数学</cite>
                             <input type="hidden" name="" id="kcsxs" value="思维培优数学">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=思维培优数学&grade=三年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>三年级</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=思维培优数学&grade=四年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>四年级</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=思维培优数学&grade=五年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>五年级</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=思维培优数学&grade=六年级">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>六年级</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe74a;</i>
                            <cite id="kcyy">HS英语</cite>
                             <input type="hidden" name="" id="kcyys" value="HS英语">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a _href="/newsousuo?subject=HS英语&grade=K1">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K1</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K2">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K2</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K3">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K3</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K4">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K4</cite>
                                    
                                </a>
                            </li>
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K5">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K5</cite>
                                    
                                </a>
                            </li >
                            <li>
                                 <a _href="/newsousuo?subject=HS英语&grade=K6">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>K6</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;">
                            <i class="iconfont">&#xe6c7;</i>
                            <cite id="kcpd">Phonics自然拼读</cite>
                             <input type="hidden" name="" id="kcpds" value="Phonics自然拼读">
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                 <a _href="/newsousuo?subject=Phonics自然拼读&grade=P1">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P1</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P2">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P2</cite>
                                    
                                </a>
                            </li>
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P3">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P3</cite>
                                    
                                </a>
                            </li >
                            <li>
                                <a _href="/newsousuo?subject=Phonics自然拼读&grade=P4">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>P4</cite>
                                    
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                </ul>
            </li>
            @endif


        </ul>
    </div>
</div>
<!-- 右侧主体开始 -->
<div class="page-content">
    <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
        <ul class="layui-tab-title">
            <li class="home"><i class="layui-icon">&#xe68e;</i>我的桌面</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='/adminwindow' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="page-content-bg"></div>

<!-- 右侧主体结束 -->
<!-- 中部结束 -->
<!-- 底部开始 -->
<!--<div class="footer">
    <div class="copyright">Copyright ©2019 L-admin v2.3 All Rights Reserved</div>
</div>-->
<!-- 底部结束 -->
</body>
</html>
<!-- <div class="x-slide_left"></div> -->
<!-- 左侧菜单结束 -->
<script src="/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
             $('#qhnr').click(function(event){
                return false;
            });
             $('#fh').click(function(event){
                return false;
            });
            })
    </script>
<script>
    $(function(){
        $("#admingl").hide();
         $("#qhnr").click(function(){
            $("#admingl").show();
            $("#nr").hide();
         })
         $("#fh").click(function(){
            $("#admingl").hide();
            $("#nr").show();
         })
        $("#tuichu").click(function(){
            var tc =$(".tc").val();
            var r = confirm('您确定退出么？');
            if (r == true) {
                $.ajax({
                    type: 'post',
                    data: {tc: tc},
                    dateType: 'json',
                    url: "/sessiondel",
                    success: function (msg) {
                        if (msg.code == 1) {
                            window.location = '/';
                        }
                    }
                });
            } else {

            }
        })
    })
</script>
