<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/laravel', function () {
    return view('welcome');
});
//判断什么设备登入
Route::any('/','Admin\AdminController@phone');

//头部左侧引用
Route::any('/header','Admin\AdminController@header');
//后台首页
Route::any('/admin','Admin\AdminController@admin');
//后台首页窗口
Route::any('/adminwindow','Admin\AdminController@adminwindow');
//登录页面
Route::any('/login','Admin\AdminController@login');
//登录处理
Route::any('/loginadd','Admin\AdminController@loginadd');
//修改密码页面
Route::any('/updatepwd','Admin\AdminController@updatepwd');
//修改密码
Route::any('/updatepwds','Admin\AdminController@updatepwds');
//个人信息展示
Route::any('/pim','Admin\AdminController@pim');
//个人信息修改
Route::any('/pimupdate','Admin\AdminController@pimupdate');
//管理员添加页面
Route::any('/useradd','Admin\AdminController@useradd');
//管理员添加
Route::any('/useradds','Admin\AdminController@useradds');
//管理员展示
Route::any('/userlist','Admin\AdminController@userlist');
//投资人分类展示
Route::any('/tzrclassify','Admin\AdminController@tzrclassify');
//投资人展示
Route::any('/usertzrlist','Admin\AdminController@usertzrlist');
//管理员修改页面
Route::any('/userlistupdate','Admin\AdminController@userlistupdate');
//管理员修改
Route::any('/userupdate','Admin\AdminController@userupdate');
//管理员删除
Route::any('/userdel','Admin\AdminController@userdel');
//冻结用户
Route::any('/userblock','Admin\AdminController@userblock');
//已冻结管理员页面
Route::any('/Administratordel','Admin\AdminController@administratordel');
//已删除管理员
Route::any('/administratordels','Admin\AdminController@administratordels');
//清除session
Route::any('/sessiondel','Admin\AdminController@sessiondel');
//年级添加页面
Route::any('/gradeaddlist','Admin\AdminController@gradeaddlist');
//年级添加
Route::any('/gradeadd','Admin\AdminController@gradeadd');
//年级展示
Route::any('/gradelist','Admin\AdminController@gradelist');
//年级修改页面
Route::any('/gradelistupdate','Admin\AdminController@gradelistupdate');
//年级修改
Route::any('/gradeupdate','Admin\AdminController@gradeupdate');
//年级删除
Route::any('/gradedel','Admin\AdminController@gradedel');
//禁用年级展示
Route::any('/gradedellist','Admin\AdminController@gradedellist');
//禁用年级启用
Route::any('/gradedellistqy','Admin\AdminController@gradedellistqy');
//上传课本
Route::any('/uploadtextbook','Admin\AdminController@uploadtextbook');
//上传课本处理
Route::any('/uploadpdf','Admin\AdminController@uploadpdf');
//添加学科展示
Route::any('/subjectaddlist','Admin\AdminController@subjectaddlist');
//添加学科
Route::any('/subjectadd','Admin\AdminController@subjectadd');
//学科展示
Route::any('/subjectlist','Admin\AdminController@subjectlist');
//学科修改展示
Route::any('/subjectlistupdate','Admin\AdminController@subjectlistupdate');
//学科修改
Route::any('/subjectupdate','Admin\AdminController@subjectupdate');
//学科删除
Route::any('/subjectdel','Admin\AdminController@subjectdel');
//语文课程添加页面
Route::any('/classaddlistyw','Admin\AdminController@classaddlistyw');
//数学课程添加页面
Route::any('/classaddlistsx','Admin\AdminController@classaddlistsx');
//英语课程添加页面
Route::any('/classaddlistyy','Admin\AdminController@classaddlistyy');
//英语拼读课程添加页面
Route::any('/classaddlistyypd','Admin\AdminController@classaddlistyypd');
//课程添加
Route::any('/classadd','Admin\AdminController@classadd');
//课程展示
Route::any('/classlist','Admin\AdminController@classlist');
//教师观看课程展示
Route::any('/classlistdw','Admin\AdminController@classlistdw');
//课程修改页面
Route::any('/classupdatelist','Admin\AdminController@classupdatelist');
//课程修改
Route::any('/classupdate','Admin\AdminController@classupdate');
//课程删除
Route::any('/classdel','Admin\AdminController@classdel');
//添加课节页面
Route::any('/chapteraddlist','Admin\AdminController@chapteraddlist');
//添加课节页面(教师用书)
Route::any('/chapterjsaddlist','Admin\AdminController@chapterjsaddlist');
//添加课节
Route::any('/chapteradd','Admin\AdminController@chapteradd');
//课程对应课节展示
Route::any('/chapclalist','Admin\AdminController@chapclalist');
//所有课节展示
Route::any('/chapterlist','Admin\AdminController@chapterlist');
//添加收藏
Route::any('/collectadd','Admin\AdminController@collectadd');
//收藏展示
Route::any('/collectlist','Admin\AdminController@collectlist');
//完成备课
Route::any('/collectdel','Admin\AdminController@collectdel');
//完成审核
Route::any('/collectsh','Admin\AdminController@collectsh');
//图片展示
Route::any('/picture','Admin\AdminController@picture');
Route::any('/picturejs','Admin\AdminController@picturejs');
Route::any('/picturelx','Admin\AdminController@picturelx');
//教师上传
Route::any('/teacherbook','Admin\AdminController@teacherbook');
Route::any('/teacherbookadd','Admin\AdminController@teacherbookadd');
Route::any('/sscha','Admin\AdminController@sscha');
Route::any('/sscladw','Admin\AdminController@sscladw');
Route::any('/workbook','Admin\AdminController@workbook');
Route::any('/workbookadd','Admin\AdminController@workbookadd');
Route::any('/hswdppt','Admin\AdminController@hswdppt');
Route::any('/newsousuo','Admin\AdminController@newsousuo');
Route::any('/collectxzsc','Admin\AdminController@collectxzsc');
Route::any('/sscoll','Admin\AdminController@sscoll');
//上传视频
Route::any('/videoaddlist','Admin\AdminController@videoaddlist');
Route::any('/videoadd','Admin\AdminController@videoadd');
Route::any('/videolist','Admin\AdminController@videolist');
//视频展示列表
Route::any('/videolistbox','Admin\AdminController@videolistbox');
//全部ppt展示
Route::any('/pptlist','Admin\AdminController@pptlist');
Route::any('/pptlistbox','Admin\AdminController@pptlistbox');
//课节发放
Route::any('/chapterseason','Admin\AdminController@chapterseason');
Route::any('/chapterseasonupd','Admin\AdminController@chapterseasonupd');
Route::any('/adminsousuo','Admin\AdminController@adminsousuo');
