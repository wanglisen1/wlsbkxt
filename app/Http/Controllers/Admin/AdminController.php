<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AdminuserModel;
use App\Model\GradeModel;
use App\Model\FiledModel;
use App\Model\SubjectModel;
use App\Model\ClassModel;
use App\Model\ChapterModel;
use App\Model\CollectModel;
use App\Model\VideoModel;
use App\Model\PptModel;
use App\Model\ChaseaModel;
use Imagick;
class AdminController extends Controller
{
    //头部引用
    public function header(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $uid=$_SESSION["uid"];
        $uname=$_SESSION["username"];
        $res=AdminuserModel::where('u_id',$uid)->first()->toArray();
        $yw=AdminuserModel::where('alliance',$uid)->where('is_del',1)->where('role',4)->get();
        $sx=AdminuserModel::where('alliance',$uid)->where('is_del',1)->where('role',5)->get();
        $yy=AdminuserModel::where('alliance',$uid)->where('is_del',1)->where('role',6)->get();
        $countyw=count($yw);
        $countsx=count($sx);
        $countyy=count($yy);
        $role=$res['role'];
        $list=[
            'sid'=>$uid,
            'sname'=>$uname,
            'role'=>$role,
            'countyw'=>$countyw,
            'countsx'=>$countsx,
            'countyy'=>$countyy
        ];
        return view('admin.header',$list);
    }

    //后台首页
    public function admin()
    {
        session_start();

        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $uid=$_SESSION["uid"];
        $uname=$_SESSION["username"];
        $res=AdminuserModel::where('u_id',$uid)->first()->toArray();
        $yw=AdminuserModel::where('alliance',$uid)->where('is_del',1)->where('role',4)->get();
        $sx=AdminuserModel::where('alliance',$uid)->where('is_del',1)->where('role',5)->get();
        $yy=AdminuserModel::where('alliance',$uid)->where('is_del',1)->where('role',6)->get();
        $countyw=count($yw);
        $countsx=count($sx);
        $countyy=count($yy);
        $role=$res['role'];
        $list=[
            'sid'=>$uid,
            'sname'=>$uname,
            'role'=>$role,
            'countyw'=>$countyw,
            'countsx'=>$countsx,
            'countyy'=>$countyy
        ];
        return view('admin.admin',$list);
    }

    //登录页面
    public function login()
    {
        return view('admin.login');
    }
    
     public function phone()
     {
       return view('admin.phone');
    }

    //后台首页窗口
    public function adminwindow(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        return view('admin.adminwindow');
    }

    //登录处理
    public function loginadd(Request $request)
    {
        $tel= $request->input('tel');
        $password =$request->input('pwd');
        //$pwd=md5($password);
        $data=AdminuserModel::where('tel',$tel)->where('is_del',1)->first();
        if($data['tel']!=""){
            if($data['password'] === $password) {
                $id = $data['u_id'];
                $res=AdminuserModel::where('u_id',$id)->first();
                $uname=$res->username;
                session_start();
                $_SESSION["uid"]=$id;
                $_SESSION["username"]=$uname;
                return ['code' => 1, 'msg' => '登录成功'];
            }else{
                return ['code' => 2, 'msg' => '密码不正确'];
            }
        }else{
            return ['code' => 0, 'msg' => '用户不存在'];
        }
    }

        //修改密码界面
    public function updatepwd(){
        return view('admin.updatepwd');
    }

    public function updatepwds(Request $request){
        $tel= $request->input('tel');
        $password =$request->input('pwd');
        $oldpassword =$request->input('oldpassword');
        $data=AdminuserModel::where('tel',$tel)->first();
        if($data['tel']!=""){
            if($oldpassword==$data['password']){
                $update=AdminuserModel::where('tel',$tel)->update(['password'=>$password]);
                if($update){
                    return ['code' => 1, 'msg' => '修改成功,点击跳转登陆页'];
                }else{
                    return ['code' => 2, 'msg' => '修改失败'];
                }
            }else{
                return ['code' => 3, 'msg' => '修改失败,您输入的现密码有误！'];
            }
        }else{
            return ['code' => 0, 'msg' => '用户不存在或电话号码输入有误请检查您的电话号码！'];
        }
    }

    //个人信息展示
    public function pim(){
        session_start();
        $value = $_SESSION["uid"];
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $data=AdminuserModel::where('u_id',$value)->first()->toArray();
        $list=[
            'data' => $data,
        ];
        return view('admin.pim',$list);
    }

    //个人信息修改
    public function pimupdate(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $tel= $request->input('tel');
        $username =$request->input('username');
        $email =$request->input('email');
        $sex =$request->input('sex');
        $sid = session('uid');
        $data=AdminuserModel::where('u_id',$sid)->update(['tel'=>$tel,'username'=>$username,'email'=>$email,'sex'=>$sex]);
        if ($data) {
            return ['code' => 1, 'msg' => '修改成功'];
        } else {
            return ['code' => 0, 'msg' => '修改失败,您并没有修改信息'];
        }
    }

    //管理员添加展示
    public function useradd(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $value = $_SESSION["uid"];
        $data=AdminuserModel::where('u_id',$value)->first();
        $role=$data['role'];
        $xz = AdminuserModel::where('alliance',$value)->where('role',4)->get();
        $countxz = count($xz);
        $zg = AdminuserModel::where('alliance',$value)->where('role',5)->get();
        $countzg = count($zg);
        $ywjs = AdminuserModel::where('alliance',$value)->where('role',6)->get();
        $sxjs = AdminuserModel::where('alliance',$value)->where('role',7)->get();
        $yyjs = AdminuserModel::where('alliance',$value)->where('role',8)->get();
        $countywjs = count($ywjs);
        $countsxjs = count($sxjs);
        $countyyjs = count($yyjs);
        $countjs = $countywjs+$countsxjs+$countyyjs;
        $addjs = $data['addjs'];
        $addxz = $data['addxz'];
        $addzg = $data['addzg'];
        $list=[
            'role' => $role,
            'countxz' => $countxz,
            'countjs' => $countjs,
            'countzg' => $countzg,
            'addjs' => $addjs,
            'addxz' => $addxz,
            'addzg' => $addzg
        ];
        return view('admin.adminuser.useradd',$list);
    }

    //管理员添加
    public function useradds(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
            $tel = $request->input('tel');
            $username = $request->input('username');
            $email = $request->input('email');
            $sex = $request->input('sex');
            $password = $request->input('password');
            $role = $request->input('role');
            if($role==3){
                $data = [
                'tel' => $tel,
                'password' => $password,
                'username' => $username,
                'email' => $email,
                'sex' => $sex,
                'role' => $role,
                'addtime' => date("Y-m-d H:i:s"),
                'alliance' => $_SESSION["uid"],
                'addjs' => '10',
                'addxz' => '1',
                'addzg' =>  '3'
            ];
            }else if($role==5){
                $data = [
                'tel' => $tel,
                'password' => $password,
                'username' => $username,
                'email' => $email,
                'sex' => $sex,
                'role' => $role,
                'addtime' => date("Y-m-d H:i:s"),
                'alliance' => $_SESSION["uid"],
                'addjs' => '6'
            ];
            }else if($role==6){
                $data = [
                'tel' => $tel,
                'password' => $password,
                'username' => $username,
                'email' => $email,
                'sex' => $sex,
                'role' => $role,
                'addtime' => date("Y-m-d H:i:s"),
                'alliance' => $_SESSION["uid"],
                'addjs' => '3'
            ];
            }else if($role==7){
                $data = [
                'tel' => $tel,
                'password' => $password,
                'username' => $username,
                'email' => $email,
                'sex' => $sex,
                'role' => $role,
                'addtime' => date("Y-m-d H:i:s"),
                'alliance' => $_SESSION["uid"],
                'addjs' => '3'
            ];
            }else if($role==8){
                 $data = [
                'tel' => $tel,
                'password' => $password,
                'username' => $username,
                'email' => $email,
                'sex' => $sex,
                'role' => $role,
                'addtime' => date("Y-m-d H:i:s"),
                'alliance' => $_SESSION["uid"],
                'addjs' => '3'
            ];
            }else{
            $data = [
                'tel' => $tel,
                'password' => $password,
                'username' => $username,
                'email' => $email,
                'sex' => $sex,
                'role' => $role,
                'addtime' => date("Y-m-d H:i:s"),
                'alliance' => $_SESSION["uid"]
            ];
        }
            $res = AdminuserModel::insert($data);
            if ($res) {
                return ['code' => 1, 'msg' => '添加成功'];
            } else {
                return ['code' => 0, 'msg' => '添加失败,请重新添加'];
            }
        }

    //管理员展示
    public function userlist(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $data=AdminuserModel::where('u_id',$_SESSION["uid"])->first();
        $role=$data['role'];

        if($role===1){
            $res = AdminuserModel::where('is_del',1)->paginate(30);
        }else if($role===3){
            $res = AdminuserModel::where('is_del',1)->where('alliance',$_SESSION["uid"])->whereIn('role',['4','5','6','7','8'])->paginate(30);
        }else if($role===4){
            $res = AdminuserModel::where('is_del',1)->where('alliance',$data['alliance'])->whereIn('role',['5','6','7','8'])->paginate(30);
        }else{
             $res = NULL;
        }

        $count=count($res);
        $list=[
            'data' => $res,
            'count' => $count,
            'role' => $role
        ];
        return view('admin.adminuser.userlist',$list);
    }

    //投资人展示页面
    public function usertzrlist(){
             session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $res = AdminuserModel::where('is_del',1)->where('role',3)->paginate(30);
        $count=count($res);
        $list = [
            'count' => $count,
            'data' => $res
        ];
        return view('admin.adminuser.usertzrlist',$list);
    }

    //管理员修改页面
    public function userlistupdate(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $id=$request->input();
        $uid=$id['id'];
        $tzr=$id['tzr'];
        $res=AdminuserModel::where(['u_id'=>$uid])->first();
        $res5 = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
        $role=$res5['role'];
        $list=[
            'data'=>$res,
            'role' => $role,
            'tzr' => $tzr
        ];
        return view('admin.adminuser.userlistupdate',$list);
    }

    //管理员修改
    public function userupdate(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $tel= $request->input('tel');
        $username =$request->input('username');
        $email =$request->input('email');
        $sex =$request->input('sex');
        $role =$request->input('role');
        $id =$request->input('id');
        $addjs =$request->input('addjs');
        $addzg =$request->input('addzg');
        $addxz =$request->input('addxz');
        $res=AdminuserModel::where('u_id',$id)->update(['tel'=>$tel,'username'=>$username,'email'=>$email,'sex'=>$sex,'role'=>$role,'addjs'=>$addjs,'addxz'=>$addxz,'addzg'=>$addzg]);
        if ($res) {
            return ['code' => 1, 'msg' => '修改成功'];
        } else {
            return ['code' => 0, 'msg' => '修改失败,您并没有改动信息'];
        }
    }

    //管理员删除
    public function userdel(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $uid=$request->input();
        $id=$uid['u_id'];
        $res=AdminuserModel::where('u_id',$id)->update(['is_del'=>2]);
        $res2 = AdminuserModel::where('alliance',$id)->get();
        if ($res) {
            if(empty($res2)){
                return ['code' => 1, 'msg' => '删除成功'];
            }else{
                 $res1=AdminuserModel::where('alliance',$id)->update(['is_del'=>2]);
                 if($res1){
                    return ['code' => 1, 'msg' => '删除成功'];
                }else{
                    return ['code' => 0, 'msg' => '删除失败'];
                }
            }
          
        } else {
            return ['code' => 0, 'msg' => '删除失败'];
        }
    }

    //已删除管理员展示
    public function administratordel(){
            session_start();
            if(empty($_SESSION["uid"])){
                header('Location: /flogin.php');exit;
            }
            $res = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
            $role=$res['role'];
            if($role==3){
                $data = AdminuserModel::where('alliance',$_SESSION["uid"])->where('is_del',2)->get();
            }else{
                $data = AdminuserModel::where('is_del',2)->paginate(30);
            }
            $count=count($data);
            $list=[
                'data' => $data,
                'count' =>$count
            ];
            return view('admin.adminuser.administratordel',$list);
        }

    //已删除管理员
    public function administratordels(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $uid=$request->input();
        $id=$uid['u_id'];
        $res=AdminuserModel::where('u_id',$id)->update(['is_del'=>1]);

        if ($res) {
            return ['code' => 1, 'msg' => '启用成功'];
        } else {
            return ['code' => 0, 'msg' => '启用失败'];
        }

    }
    //课节发放展示
    public function chapterseason(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $res = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
        $role = $res['role'];
        if($role==1){
            $res1 = ChaseaModel::get();
        }else if($role==26){
            $res1 = ChaseaModel::where('chasea_sub',"趣味大语文")->get();
        }else if($role==27){
            $res1 = ChaseaModel::where('chasea_sub',"思维培优数学")->get();
        }

        // $ywsanchun = ChapterModel::where('sub_name',"趣味大语文")->where('grade',"三年级")->where('season',"春")->get();
        $list = [
            'role' => $role,
            'data' => $res1
        ];
        return view('admin.chapterseason',$list);

    }

    //课节发放修改
    public function chapterseasonupd(Request $request){
            $chasea_id=$request->input('chasea_id');
            $data = ChaseaModel::where('chasea_id',$chasea_id)->first();
            if($data['is_show']==1){
            $res = ChaseaModel::where('chasea_id',$chasea_id)->update(['is_show' => 2]);
            }else{
                $res = ChaseaModel::where('chasea_id',$chasea_id)->update(['is_show' => 1]);
            }
            $chasea_sub = $data['chasea_sub'];
            $chasea_season = $data['chasea_season'];
            if($data['is_show']==1){
            $res1 = ChapterModel::where('sub_name',$chasea_sub)->where('season',$chasea_season)->update(['is_del'=>2]);
            }else{
                $res1 = ChapterModel::where('sub_name',$chasea_sub)->where('season',$chasea_season)->update(['is_del'=>1]);
            }
             if ($res) {
                if($res1){
                     return ['code' => 1, 'msg' => '修改成功'];
                }else{
                    return ['code' => 2, 'msg' => '开放失败,请重新点击2'];
                }
              } else {
                return ['code' => 0, 'msg' => '开放失败,请重新点击1'];
             }
        }
                
                 
    //清除session
    public function sessiondel(Request $request){
        $qh= $request->input('qh');
        session_start();
        if(isset($_SESSION['uid'])){
            unset($_SESSION['uid']);
            return ['code' => 1];
        }else{
            return ['code' => 0];
        }




    }

    //添加年级页面
    public function gradeaddlist(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $res = SubjectModel::where('is_del',1)->get();
        $list=[
            'data'=>$res
        ];
        return view('admin.grade.gradeaddlist',$list);
    }

    //添加年级
    public function gradeadd(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $grade = $request->input('grade');
	$subject = $request->input('subject');
        $data = [
            'grade' => $grade,
            'add_time' =>date('Y-m-d'),
	    's_id' => $subject
        ];
        $res = GradeModel::insert($data);
        if ($res) {
            return ['code' => 1, 'msg' => '添加成功'];
        } else {
            return ['code' => 0, 'msg' => '添加失败,请重新添加'];
        }
    }

    //年级展示
    public function gradelist(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $res = GradeModel::where('grade.is_del',1)->join('subject','subject.s_id','=','grade.s_id')->paginate(30);
        $count=count($res);
        $list=[
            'data' => $res,
            'count' => $count
        ];
        return view('admin.grade.gradelist',$list);
    }

    //年级修改页面
    public function gradelistupdate(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $id=$request->input();
        $gid=$id['id'];
        $res=GradeModel::where(['g_id'=>$gid])->join('subject','subject.s_id','=','grade.s_id')->first();
        $res1=SubjectModel::where('is_del',1)->get();
        $list=[
            'data'=>$res,
            'data1'=>$res1
        ];
        return view('admin.grade.gradelistupdate',$list);
    }

    //年级修改
    public function gradeupdate(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $grade= $request->input('grade');
        $add_time =$request->input('add_time');
        $id =$request->input('id');
        $subject =$request->input('subject');
        $res=GradeModel::where('g_id',$id)->update(['grade'=>$grade,'add_time'=>$add_time,'s_id'=>$subject]);
        if ($res) {
            return ['code' => 1, 'msg' => '修改成功'];
        } else {
            return ['code' => 0, 'msg' => '修改失败,您并没有改动信息或输入有误'];
        }
    }

    //年级删除
    public function gradedel(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $uid=$request->input();
        $id=$uid['g_id'];
        $res=GradeModel::where('g_id',$id)->update(['is_del'=>2]);
        if ($res) {
            return ['code' => 1, 'msg' => '禁用成功'];
        } else {
            return ['code' => 0, 'msg' => '禁用失败'];
        }
    }

    //禁用年级展示
    public function gradedellist(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $data=GradeModel::where('is_del',2)->get();
        $count=count($data);
        $list=[
            'data' => $data,
            'count' =>$count
        ];
        return view('admin.grade.gradedellist',$list);
    }

    //禁用年级启用
    public function gradedellistqy(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $uid=$request->input();
        $id=$uid['g_id'];
        $res=GradeModel::where('g_id',$id)->update(['is_del'=>1]);

        if ($res) {
            return ['code' => 1, 'msg' => '启用成功'];
        } else {
            return ['code' => 0, 'msg' => '启用失败'];
        }
    }


    //添加科目展示
    public function subjectaddlist(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        return view('admin.subject.subjectaddlist');
    }

    //添加科目
    public function subjectadd(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $subject = $request->input('subject');
        $data = [
            'sub_name' => $subject,
            'add_time' =>date('Y-m-d')
        ];
        $res = SubjectModel::insert($data);
        if ($res) {
            return ['code' => 1, 'msg' => '添加成功'];
        } else {
            return ['code' => 0, 'msg' => '添加失败,请重新添加'];
        }
    }

    //科目展示
    public function subjectlist(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $res = SubjectModel::where('is_del',1)->get();
        $count=count($res);
        $list=[
            'data' => $res,
            'count' => $count
        ];
        return view('admin.subject.subjectlist',$list);
    }

    //科目修改页面
    public function subjectlistupdate(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $id=$request->input();
        $sid=$id['id'];
        $res=SubjectModel::where(['s_id'=>$sid])->first();
        $list=[
            'data'=>$res
        ];
        return view('admin.subject.subjectlistupdate',$list);
    }

    //科目修改
    public function subjectupdate(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $subject= $request->input('subject');
        $add_time =$request->input('add_time');
        $id =$request->input('id');
        $res=SubjectModel::where('s_id',$id)->update(['sub_name'=>$subject,'add_time'=>$add_time]);
        if ($res) {
            return ['code' => 1, 'msg' => '修改成功'];
        } else {
            return ['code' => 0, 'msg' => '修改失败,您并没有改动信息或输入有误'];
        }
    }

    //科目删除
    public function subjectdel(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $uid=$request->input();
        $id=$uid['s_id'];
        $res=SubjectModel::where('s_id',$id)->update(['is_del'=>2]);
        if ($res) {
            return ['code' => 1, 'msg' => '删除成功'];
        } else {
            return ['code' => 0, 'msg' => '删除失败'];
        }
    }

    //语文课程添加展示
    public function classaddlistyw(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
            $res = SubjectModel::where('is_del',1)->get();
	$resyw = GradeModel::where('is_del', 1)->where('s_id', 1)->get();

            $list=[
                'data'=>$res,
                'data1'=>$resyw
            ];
        return view('admin.class.classaddlistyw',$list);
    }
    //数学课程添加展示
    public function classaddlistsx(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $res = SubjectModel::where('is_del',1)->get();
        $resyw = GradeModel::where('is_del', 1)->where('s_id', 2)->get();
        $list=[
            'data'=>$res,
            'data1'=>$resyw
        ];
        return view('admin.class.classaddlistsx',$list);
    }
    //英语课程添加展示
    public function classaddlistyy(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $res = SubjectModel::where('is_del',1)->get();
        $resyw = GradeModel::where('is_del', 1)->where('s_id', 3)->get();
        $list=[
            'data'=>$res,
            'data1'=>$resyw
        ];
        return view('admin.class.classaddlistyy',$list);
    }
    //英语口语课程添加展示
    public function classaddlistyypd(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $res = SubjectModel::where('is_del',1)->get();
        $resyw = GradeModel::where('is_del', 1)->where('s_id', 4)->get();
        $list=[
            'data'=>$res,
            'data1'=>$resyw
        ];
        return view('admin.class.classaddlistyypd',$list);
    }

    //课程添加
    public function classadd(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $grade = $request->input('grade');
        $cla_name = $request->input('cla_name');
	$subject = $request->input('subject');
	$season = $request->input('season');
        $data = [
            'g_id' => $grade,
            'cla_name' =>$cla_name,
            'add_time'=> date('Y-m-d'),
	    's_id' => $subject,
	    'season' =>$season
        ];
        $res = ClassModel::insert($data);
        if ($res) {
            return ['code' => 1, 'msg' => '添加成功'];
        } else {
            return ['code' => 0, 'msg' => '添加失败,请重新添加'];
        }
    }

    //课程展示
    public function classlist(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $res = ClassModel::where('class.is_del',1)->join('grade','grade.g_id','=','class.g_id')->join('subject','subject.s_id','=','class.s_id')->paginate(30);
        $count=count($res);
        $list=[
            'data' => $res,
            'count' => $count
        ];
        return view('admin.class.classlist',$list);
    }


    //课程修改页面
    public function classupdatelist(Request $request)
    {
        session_start();
        if (empty($_SESSION["uid"])) {
            header('Location: /flogin.php');
            exit;
        }
        $id = $request->input();
        $cla_id = $id['id'];
        $res = ClassModel::where(['cla_id' => $cla_id])->join('grade', 'grade.g_id', '=', 'class.g_id')->first();
        $res1 = GradeModel::where('is_del', 1)->where('s_id',1)->get();
        $list = [
            'data' => $res,
            'data1' => $res1
        ];
        return view('admin.class.classupdatelist', $list);
    }

    //课程修改
    public function classupdate(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $grade= $request->input('grade');
        $add_time =$request->input('add_time');
        $id =$request->input('id');
        $cla_name =$request->input('cla_name');
        $res=ClassModel::where('cla_id',$id)->update(['cla_name'=>$cla_name,'add_time'=>$add_time,'g_id'=>$grade]);
        if ($res) {
            return ['code' => 1, 'msg' => '修改成功'];
        } else {
            return ['code' => 0, 'msg' => '修改失败,您并没有改动信息或输入有误'];
        }
    }

    //课程删除
    public function classdel(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $uid=$request->input();
        $id=$uid['cla_id'];
        $res=ClassModel::where('cla_id',$id)->update(['is_del'=>2]);
        if ($res) {
            return ['code' => 1, 'msg' => '删除成功'];
        } else {
            return ['code' => 0, 'msg' => '删除失败'];
        }
    }

    //添加课节页面
    public function chapteraddlist(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $cla_id = $request->input();
        $res = ClassModel::where('class.cla_id',$cla_id)->join('grade','grade.g_id','=','class.g_id')->join('subject','subject.s_id','=','class.s_id')->first()->toArray();
        //print_r($res);exit;
        $list=[
            'data' => $res
        ];
        return view('admin.chapter.chapteraddlist',$list);
    }
                                                                                                            

    public function chapteradd(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $file=$request->file('file')->store('file');
        $pdf="/home/wwwroot/bkxt/storage/app/".$file;
        $path="/home/wwwroot/bkxt/public/tp/images/";
        $fileone = realpath($pdf);
        if (!is_readable($fileone)) {
            echo 'file not readable';
        }
        $im = new Imagick();
        $im->setResolution(150, 150); //设置分辨率 值越大分辨率越高
        $im->setCompressionQuality(100);
        $im->readImage($pdf);
        foreach ($im as $k => $v) {
            $v->setImageFormat('png');
            $fileName = $path . md5($k . time()) . '.png';
            if ($v->writeImage($fileName) == true) {
                $return[] = $fileName;
            }
	}
	$str=implode(',',$return);
        //print_r($file);exit;
        $id=$request->input('ycid');
        $res1 = ClassModel::where('class.cla_id',$id)->join('grade','grade.g_id','=','class.g_id')->join('subject','subject.s_id','=','class.s_id')->first()->toArray();

        $cha_name = $request->input('chapter');
        $data=[
            'cha_name' => $cha_name,
            'cla_name' => $res1['cla_name'],
            'grade' => $res1['grade'],
            'sub_name' => $res1['sub_name'],
	    'add_time' =>date('Y-m-d'),
	    'cla_id'=>$id,
	    'field_pdf'=>$str,
	    'season'=>$res1['season']
        ];
        //print_r($data);exit;
        $res = ChapterModel::insert($data);
	if ($res) {
		echo "<script>alert('添加成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	} else {
		echo "<script>alert('添加失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
        }
    }
     public function teacherbookadd(Request $request){
	     session_start();
	             if(empty($_SESSION["uid"])){
			  header('Location: /flogin.php');exit;
					         }
	     $file=$request->file('file')->store('file');
	     //print_r($file);exit;
	             $pdf="/home/wwwroot/bkxt/storage/app/".$file;
		     $path="/home/wwwroot/bkxt/public/tp/teacher/";
		     $fileone = realpath($pdf);
		             if (!is_readable($fileone)) {
				                 echo 'file not readable';
						         }
		             $im = new Imagick();
		             $im->setResolution(150, 150); //设置分辨率 值越大分辨率越高
			     $im->setCompressionQuality(100);
			     $im->readImage($pdf);
			     foreach ($im as $k => $v) {
				$v->setImageFormat('png');
				$fileName = $path . md5($k . time()) . '.png';
				if ($v->writeImage($fileName) == true) {
				$return[] = $fileName;
				}
			     }
			     $str=implode(',',$return);
			     $id=$request->input('ycid');
			     $res=ChapterModel::where('cha_id',$id)->update(['field_pdfjs'=>$str]);       
				
			     if ($res) {
				       echo"<script>alert('添加成功！');history.go(-2);</script>";
			     }else{
				       echo"<script>alert('添加失败！');history.go(-1);</script>";
				}

     }
	public function workbookadd(Request $request){
		  session_start();
				if(empty($_SESSION["uid"])){
			     header('Location: /flogin.php');exit;
			             }
    $file=$request->file('file')->store('file');
	$pdf="/home/wwwroot/bkxt/storage/app/".$file;
	$path="/home/wwwroot/bkxt/public/tp/work/";
	$fileone = realpath($pdf);
	if (!is_readable($fileone)) {
					 echo 'file not readable';
	         }
		 $im = new Imagick();
		 $im->setResolution(120, 120); 
		$im->setCompressionQuality(100);
		$im->readImage($pdf);
		foreach ($im as $k => $v) {
			$v->setImageFormat('png');
		  $fileName = $path . md5($k . time()) . '.png';
		  if ($v->writeImage($fileName) == true) {
	    $return[] = $fileName;
	      }
	     }
	    $str=implode(',',$return);
      $id=$request->input('ycid');
	  $res=ChapterModel::where('cha_id',$id)->update(['field_pdflx'=>$str]);
             if ($res) {
		    echo"<script>alert('添加成功！');history.go(-2);</script>";
	        }else{
            echo"<script>alert('添加失败！');history.go(-1);</script>";
	        }

	       }
    //教师上传
    public function teacherbook(Request $request){
   	 session_start();
	         if(empty($_SESSION["uid"])){
			             header('Location: /flogin.php');exit;
				             }
	         $id =$request->input('id');
	 $res=ChapterModel::where('is_del',1)->where('cha_id',$id)->first();
	 $list=[
	 	'data'=>$res
	];
	return view('admin.chapter.teacherbook',$list);

    }
    //练习册上传
      public function workbook(Request $request){
	   session_start();
		if(empty($_SESSION["uid"])){
			header('Location: /flogin.php');exit;
	     }
		  $id =$request->input('id');
		  $res=ChapterModel::where('is_del',1)->where('cha_id',$id)->first();
		  $list=[
			'data'=>$res
			];
		return view('admin.chapter.workbook',$list);
}

    //课程对应课节展示
    public function chapclalist(Request $request){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
        }
        $id =$request->input('id');
        $res=ChapterModel::where('is_del',1)->where('cla_id',$id)->paginate(30);
        $count=count($res);
        $list=[
            'data' => $res,
            'count' => $count
        ];
        return view('admin.chapter.chapclalist',$list);
    }
	
     //课节搜索
	public function sscha(Request $request){
         session_start();
         if(empty($_SESSION["uid"])){
             header('Location: /flogin.php');exit;
         }
	 $cha_name=$request->input('cha_name');
	 	$role=$request->input('role');
	    $sub_name=$request->input('sub_name');
        $res3 = ChaseaModel::where('chasea_sub',$sub_name)->get();
	    $season=$request->input('season');
		$grade=$request->input('grade');
		 if(!empty($cha_name)&&!empty($season)){
			$res=ChapterModel::where('is_del',1)->where('sub_name',$sub_name)->where('grade',$grade)->where('season',$season)->where('cha_name','like','%'.$cha_name.'%')->get();
		}else if(empty($season)){
			$res=ChapterModel::where('is_del',1)->where('sub_name',$sub_name)->where('grade',$grade)->where('cha_name','like','%'.$cha_name.'%')->get();
		}else if(empty($cha_name)){
			$res=ChapterModel::where('is_del',1)->where('sub_name',$sub_name)->where('grade',$grade)->where('season',$season)->get();
		}        
		$count=count($res);
			$list=[
				'data' => $res,
				'role' => $role,
				'sub_name' => $sub_name,
				'count' => $count,
				'grade' => $grade,
				'ht' => '2',
				'cha_name' => $cha_name,
				'season' => $season,
				'sub_name' => $sub_name,
				'grade' => $grade,
                'res3' => $res3
				];
		return view('admin.chapter.sscha',$list);
	}

    //添加收藏
    public function collectadd(Request $request)
    {
        session_start();
        if (empty($_SESSION["uid"])) {
            header('Location: /flogin.php');
            exit;
	}
	date_default_timezone_set('Asia/Shanghai');
	$id = $request->input('cha_id');
	        $kong = CollectModel::where('uid', $_SESSION["uid"])->where('cha_id', $id)->first();
	        if (empty($kong)) {
			$res1 = AdminuserModel::where('is_del',1)->where('u_id',$_SESSION["uid"])->first();
			$res2 = ChapterModel::where('cha_id',$id)->first();
			$alliance=$res1['alliance'];
			$grade = $res2['grade'];
			$season = $res2['season'];
	                $data = [
		                'uid' => $_SESSION["uid"],
		                'cha_id' => $id,
		                'collect_time' => date("Y-m-d H:i:s"),
		                'alliance' => $alliance,
				'username' => $res1['username'],
				'grade' => $grade,
				'season' => $season,
                'role' => $res1['role'],
				'finish_time' => "未完成"
			          ];
	            $res = CollectModel::insert($data);
		            if ($res) {
		                    return ['code' => 1, 'msg' => '备课成功'];
		                } else {
		                return ['code' => 0, 'msg' => '备课失败,请重新备课'];
			            }
		            }else{
		                return ['code' => 2, 'msg' => '该课程您已经备课了'];
			        }
    }

    //收藏展示
    public function collectlist(){
	    session_start();
	   if (empty($_SESSION["uid"])) {
			 header('Location: /flogin.php');
				exit;
		}
	   $res5=AdminuserModel::where('u_id',$_SESSION["uid"])->first();
	   $role=$res5['role'];
	   $res1 = AdminuserModel::where('is_del',1)->where('u_id',$_SESSION["uid"])->first();
	   $username=$res1['username'];
		if($role==3){
		 $res= CollectModel::where('collect.alliance', $_SESSION["uid"])->where('chapter.is_del',1)->join('chapter','chapter.cha_id','=','collect.cha_id')->paginate(30);
		}else if($role==4){
             $res= CollectModel::where('collect.alliance',$res5['alliance'])->where('chapter.is_del',1)->join('chapter','chapter.cha_id','=','collect.cha_id')->paginate(30);
        }else if($role==26){
            $res= CollectModel::where('collect.role', 6)->where('chapter.is_del',1)->join('chapter','chapter.cha_id','=','collect.cha_id')->paginate(30);
        }else if($role==27){
            $res= CollectModel::where('collect.role', 7)->where('chapter.is_del',1)->join('chapter','chapter.cha_id','=','collect.cha_id')->paginate(30);
        }else if($role==28){
            $res= CollectModel::where('collect.role', 8)->where('chapter.is_del',1)->join('chapter','chapter.cha_id','=','collect.cha_id')->paginate(30);
        }else if($role==1){
            $res= CollectModel::where('chapter.is_del',1)->join('chapter','chapter.cha_id','=','collect.cha_id')->paginate(30);
        }else{
			$res= CollectModel::where('collect.uid', $_SESSION["uid"])->where('chapter.is_del',1)->join('chapter','chapter.cha_id','=','collect.cha_id')->paginate(30);
			 }
		$count=count($res);
			$list=[
			'data' => $res,
			'count' => $count,
			'role' => $role
			  ];
		return view('admin.collect.collectlist',$list);
    }

    //完成收藏
    public function collectdel(Request $request){
        session_start();
        if (empty($_SESSION["uid"])) {
            header('Location: /flogin.php');
            exit;
	}
	date_default_timezone_set('Asia/Shanghai');
	 $id = $request->input('cha_id');
	        $res1 = AdminuserModel::where('is_del',1)->where('u_id',$_SESSION["uid"])->first();
	        $username=$res1['username'];
		  $res=CollectModel::where('uid',$_SESSION["uid"])->where('cha_id',$id)->update(['is_show'=>2,'finish_time'=>date("Y-m-d H:i:s")]);
		  if ($res) {
			return ['code' => 1, 'msg' => '已完成！请等待审核。'];
		} else {
			return ['code' => 0, 'msg' => '网络好像不太好~,请重新点击'];
			}
    }
    //完成审核
    public function collectsh(Request $request){
        session_start();
        if (empty($_SESSION["uid"])) {
            header('Location: /flogin.php');
            exit;
    }
     $id = $request->input('cha_id');
     $coll_id = $request->input('coll_id');
            $res1 = AdminuserModel::where('is_del',1)->where('u_id',$_SESSION["uid"])->first();
            $username=$res1['username'];
            $res5=AdminuserModel::where('u_id',$_SESSION["uid"])->first()->toArray();
            $role=$res5['role'];

            if($role==4||$role==3){
            $res=CollectModel::where('alliance',$_SESSION["uid"])->where('cha_id',$id)->update(['xzsh'=>2]);
                    if ($res) {
                return ['code' => 1, 'msg' => '已完成审核！请等待总部审核。'];
                 } else {
                return ['code' => 0, 'msg' => '网络好像不太好~,请重新点击'];
                }
            }else{
                $res9=CollectModel::where('coll_id',$coll_id)->where('cha_id',$id)->first();
                if($res9['xzsh']==1){
                    return ['code' => 2, 'msg' => '请等校长审核完毕在审核！'];
                }else{
                    $res=CollectModel::where('coll_id',$coll_id)->where('cha_id',$id)->update(['jysh'=>2,'is_show'=>3]);
                    if ($res) {
                         return ['code' => 1, 'msg' => '已完成审核！'];
                        } else {
                        return ['code' => 0, 'msg' => '网络好像不太好~,请重新点击'];
                }
                }
            }
          
          
    }
    //图片展示
     public function picture(Request $request){
	      session_start();
	       if (empty($_SESSION["uid"])) {
			     header('Location: /flogin.php');
				exit;
		} 
	      $id=$request->input('id');
	      $cha_name=$request->input('cha_name');
	      $season=$request->input('season');
	      $sub_name=$request->input('sub_name');
	      $grade=$request->input('grade');
	  //$id="2";
	  $res=ChapterModel::where('cha_id',$id)->first();
	  $tp=$res['field_pdf'];
	  $array=explode(",", $tp);
	  $str="";
	  foreach($array as $k=>$v){
		  $str.=strrchr($v,'/');
	  }
	  $str1=substr($str,1);
	  $arr=explode('/',$str1);
	  $count=count($arr);
	  $list=[
		  'data' => $arr,
		  'count'=>$count,
		  'id'=>$id,
		  'sub_name'=>$res['sub_name'],
		  'cha_name'=>$cha_name,
		  'season'=>$season,
		  'grade'=>$grade,
          'ppt' => $res['ppt'],
          'video' => $res['video'],
          'res' => $res
	   ];
	       return view('admin.chapter.picture',$list);
     }
    //教师图片展示
    public function picturejs(Request $request){
	    session_start();
	    if (empty($_SESSION["uid"])) {
		  header('Location: /flogin.php');
		 exit;
	    }
	    $id=$request->input('id');
	    	 $cha_name=$request->input('cha_name');
	                  $season=$request->input('season');
	                  $sub_name=$request->input('sub_name');
			                $grade=$request->input('grade');
	          $res=ChapterModel::where('cha_id',$id)->first();
	            $tp=$res['field_pdfjs'];
	            $array=explode(",", $tp);
	                $str="";
	                foreach($array as $k=>$v){
	                 $str.=strrchr($v,'/');
	                     }
	                 $str1=substr($str,1);
	                 $arr=explode('/',$str1);
			 $count=count($arr);
	                $list=[
	                   'data' => $arr,
	                   'count'=>$count,
			   'id'=>$id,
			   'sub_name'=>$res['sub_name'],
			   'cha_name'=>$cha_name,
			   'season' => $season,
               'ppt' => $res['ppt'],
               'video' => $res['video'],
			   'grade' => $grade,
               'res' => $res
	                       ];
	                    return view('admin.chapter.picturejs',$list);
	                           }
    //练习册展示
     public function picturelx(Request $request){
	   session_start();
		if (empty($_SESSION["uid"])) {
			header('Location: /flogin.php');
			exit;
		}
	$id=$request->input('id');
	$cha_name=$request->input('cha_name');
	$season=$request->input('season');
	$sub_name=$request->input('sub_name');
	$grade=$request->input('grade');
	$res=ChapterModel::where('cha_id',$id)->first();
	$tp=$res['field_pdflx'];
	$array=explode(",", $tp);
	$str="";
	foreach($array as $k=>$v){
	   $str.=strrchr($v,'/');
	}
	$str1=substr($str,1);
	$arr=explode('/',$str1);
	$count=count($arr);
	$list=[
		'data' => $arr,
		'count'=>$count,
		'id'=>$id,
		'sub_name'=>$res['sub_name'],
		'cha_name' =>$cha_name,
		'season' =>$season,
        'ppt' => $res['ppt'],
        'video' => $res['video'],
		'grade' =>$grade,
        'res' => $res
        ];
	return view('admin.chapter.picturelx',$list);
	}

    public function newsousuo(Request $request){
	       session_start();
			 if (empty($_SESSION["uid"])) {
		    header('Location: /flogin.php');
			exit;
		}
        $res5 = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
        $role = $res5['role'];
        $moren = $res5['addjs'];
		$subject = $request->input('subject');
        $res3 = ChaseaModel::where('chasea_sub',$subject)->get();
		$grade = $request->input('grade');
        if($role==5){
            $res6 = CollectModel::where('uid',$_SESSION["uid"])->get();
            $countres6 = count($res6);
            if($countres6==$moren){
                foreach($res6 as $k=>$v){
                    if($v['is_show']==6){
                        $morens=$moren+2;
                        $res7 = AdminuserModel::where('u_id',$_SESSION["uid"])->update(['addjs'=>$morens]);
                        $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($moren)->get();
                    }else{
                        $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($moren)->get();
                    }
                }
            }else{
               $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($moren)->get();
            }
            
        }else if($role==6){
              $res6 = CollectModel::where('uid',$_SESSION["uid"])->get();
            $countres6 = count($res6);
            if($countres6==$moren){
                foreach($res6 as $k=>$v){
                    if($v['is_show']==3){
                        $morens=$moren+2;
                        $res7 = AdminuserModel::where('u_id',$_SESSION["uid"])->update(['addjs'=>$morens]);
                        $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($moren)->get();
                    }else{
                        $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($moren)->get();
                    }
                }
            }else{
               $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($moren)->get();
            }
            
         }else if($role==7){
             $res6 = CollectModel::where('uid',$_SESSION["uid"])->get();
            $countres6 = count($res6);
            if($countres6==$moren){
                foreach($res6 as $k=>$v){
                    if($v['is_show']==3){
                        $morens=$moren+2;
                        $res7 = AdminuserModel::where('u_id',$_SESSION["uid"])->update(['addjs'=>$morens]);
                        $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($moren)->get();
                    }else{
                        $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($moren)->get();
                    }
                }
            }else{
               $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($moren)->get();
            }
            
        }else if($role==8){
              $res6 = CollectModel::where('uid',$_SESSION["uid"])->get();
            $countres6 = count($res6);
            if($countres6==$moren){
                foreach($res6 as $k=>$v){
                    if($v['is_show']==3){
                        $morens=$moren+2;
                        $res7 = AdminuserModel::where('u_id',$_SESSION["uid"])->update(['addjs'=>$morens]);
                        $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($moren)->get();
                    }else{
                        $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($moren)->get();
                    }
                }
            }else{
               $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($moren)->get();
            }
         }else{
            $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->get();
         }
		
		$count = count($res);
			$list = [
				'data' =>$res,
				'count' =>$count,
				'role' =>$role,
                'sub_name' => $subject,	 
                'grade' => $grade,
				'ht' => '1',
				'cha_name' =>'',
				'season' =>'',
                'res3' => $res3
						];
			return view('admin.chapter.sscha',$list);         
    }

    public function collectxzsc(Request $request){
	   session_start();
		if (empty($_SESSION["uid"])) {
			header('Location: /flogin.php');
			exit;
		}
		$id = $request->input('coll_id');
		$res = CollectModel::where('coll_id',$id)->delete();
			if ($res) {
				return ['code' => 1, 'msg' => '已删除！'];
			} else {
				return ['code' => 0, 'msg' => '网络好像不太好~,请重新点击'];
			}
    }

    public function sscoll(Request $request){
	     session_start();
         if (empty($_SESSION["uid"])) {
	       header('Location: /flogin.php');
	       exit;
	       }
	     $grade=$request->input('grade');
	     $season=$request->input('season');
	      $res5=AdminuserModel::where('u_id',$_SESSION["uid"])->first()->toArray();
	              $role=$res5['role'];
	             if(!empty($grade)&&!empty($season)){
			                     if($role==3){           
		$res= CollectModel::where('collect.alliance', $_SESSION["uid"])->where('chapter.is_del',1)->where('collect.grade',$grade)->where('collect.season',$season)->join('chapter','chapter.cha_id','=','collect.cha_id')->get();                 
			 }else{
		 $res= CollectModel::where('collect.uid', $_SESSION["uid"])->where('chapter.is_del',1)->where('collect.grade',$grade)->where('collect.season',$season)->join('chapter','chapter.cha_id','=','collect.cha_id')->get();												                  
        }          
	          }else if(empty($grade)){
	    if($role==3){                             
	       $res= CollectModel::where('collect.alliance', $_SESSION["uid"])->where('chapter.is_del',1)->where('collect.season',$season)->join('chapter','chapter.cha_id','=','collect.cha_id')->get(); 
		}else{
			$res= CollectModel::where('collect.uid', $_SESSION["uid"])->where('chapter.is_del',1)->where('collect.season',$season)->join('chapter','chapter.cha_id','=','collect.cha_id')->get();
																		                      }
		}else if(empty($season)){
			if($role==3){                                      
			$res= CollectModel::where('collect.alliance', $_SESSION["uid"])->where('chapter.is_del',1)->where('collect.grade',$grade)->join('chapter','chapter.cha_id','=','collect.cha_id')->get(); 
			}else{
			$res= CollectModel::where('collect.uid', $_SESSION["uid"])->where('chapter.is_del',1)->where('collect.grade',$grade)->join('chapter','chapter.cha_id','=','collect.cha_id')->get();
		      }
		  }
	       $count=count($res);
	           $list=[
				'data' => $res,
				'role' => $role,
				'count' => $count
				];
	   return view('admin.collect.sscoll',$list);
    }
   public function videoaddlist(){

	   return view('admin.videoaddlist');
   }
   public function videoadd(Request $request){
	   $file=$request->file('file')->store('video');
	   $video_sub=$request->input('video_sub');
	   $video_title=$request->input('video_title');
	   $data = [
	   	'video_sub' => $video_sub,
		'video_title' => $video_title,
		'video_content' => $file
	   ];
	   $res = VideoModel::insert($data);
	   if($res){
	   	echo"<script>alert('添加成功！');history.go(-1);</script>";
	   }else{
	   	echo"<script>alert('添加失败！');history.go(-1);</script>";
	   }
	  
   }
   public function videolist(Request $request){
     $subject = $request->input('subject');
    $grade = $request->input('grade');
       $res = VideoModel::where('video_sub',$subject)->where('video_grade',$grade)->get();
	   $count=count($res);
	$list=[
		'data' => $res,
		'count' => $count
	];
   	return view('admin.videolist',$list);
   }
   public function pptlist(Request $request){
    $subject = $request->input('subject');
    $grade = $request->input('grade');
       $res = PptModel::where('ppt_sub',$subject)->where('ppt_grade',$grade)->get();
             $count=count($res);
	           $list=[
                  'data' => $res,
                  'count' => $count
		           ];
	           return view('admin.pptlist',$list);
   	return view('admin.pptlist');
   }
   public function videolistbox(Request $request){
	   $video_id=$request->input('video_id');
	   $res = VideoModel::where('video_id',$video_id)->first();
	   $list = [
	   	'data' => $res
	   ];
   	return view('admin.videolistbox',$list);
   }
   public function pptlistbox(Request $request){
	        $ppt_id=$request->input('ppt_id');
		                 $res = PptModel::where('ppt_id',$ppt_id)->first();
		                 $list = [
			                 'data' => $res
			            ];
			return view('admin.pptlistbox',$list);
		}
}
