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
use App\Model\TzruserModel;
use App\Model\XzuserModel;
use App\Model\ZguserModel;
use App\Model\JsuserModel;
use Imagick;
class AdminController extends Controller
{
     public function dysession(){
        session_start();
        if(empty($_SESSION["uid"])){
            header('Location: /flogin.php');exit;
            }
        if($_SESSION["username"]=='试用账号'){
            $res=AdminuserModel::where('u_id',$_SESSION['uid'])->first();
            $pd_time=$res['sy_time']+3600;
            $dq_time=time();
            if($dq_time>=$pd_time){
                 if(isset($_SESSION['uid'])){
                    $res=AdminuserModel::where('u_id',$_SESSION['uid'])->update(['is_del'=>4]);
                    $res1=AdminuserModel::where('tzr',$_SESSION['uid'])->update(['is_del'=>4]);
                    unset($_SESSION['uid']);
                    echo "<script>alert('试用时间已到，谢谢使用！');location.href= '/';</script>";
                }
            }
        }
    }
    //头部引用
    public function header(){
        $this->dysession();
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
        $this->dysession();
             
        $uid=$_SESSION["uid"];
        $uname=$_SESSION["username"];
        $res=AdminuserModel::where('u_id',$uid)->first()->toArray();
        $role=$res['role'];
        if($role==5){
            $res1 = ZguserModel::where('zg_phone',$res['tel'])->first();
             $list=[
            'sid'=>$uid,
            'sname'=>$uname,
            'role'=>$role,
            'data'=>$res1
            ];
        }else if($role==6){
             $res1 = JsuserModel::where('js_phone',$res['tel'])->first();
             $list=[
            'sid'=>$uid,
            'sname'=>$uname,
            'role'=>$role,
            'data'=>$res1
            ];
        }else{
            $list=[
            'sid'=>$uid,
            'sname'=>$uname,
            'role'=>$role
            ];
        }
       
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
       $this->dysession();
        $res5 = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
        $role = $res5['role'];
        $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
        if($role==3){
            $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
            $list=[
            'role' => $role,
            'res1' => $res1
        ];
        }else if($role==4){
             $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
            $list=[
            'role' => $role,
            'res1' => $res1
        ];
    }else{
        $list=[
            'role' => $role
        ];
    }
        
        return view('admin.adminwindow',$list);
    }

    //登录处理
    public function loginadd(Request $request)
    {
        $tel = $request->input('tel');
        $password = $request->input('pwd');
        $loname = $request->input('uname');
        //$pwd=md5($password);
        $data=AdminuserModel::where('tel',$tel)->where('is_del',1)->first();
        $data1=AdminuserModel::where('tel',$tel)->where('is_del',3)->first();
        $data2=AdminuserModel::where('tel',$tel)->where('is_del',4)->first();
        if(!empty($data['tel'])){
            if($data['username'] === $loname){
            if($data['password'] === $password) {
                $id = $data['u_id'];
                $res=AdminuserModel::where('u_id',$id)->first();
                $uname=$res->username;
                    session_start();
                    $_SESSION["uid"]=$id;
                    $_SESSION["username"]=$uname;
                    if($data['username']==='试用账号'){
                    	if($data['sy_time']===1){
                    		$res3=AdminuserModel::where('tel',$tel)->where('is_del',1)->update(['sy_time'=>time()]);
                    	} 
                    }
                return ['code' => 1];
            }else{
                return ['code' => 2, 'msg' => '密码不正确'];
            }
        }else{
            return ['code' => 4, 'msg' => '用户名不正确,请重新输入。'];
        }
                 
        }else if(!empty($data1['tel'])){
            return ['code' => 5, 'msg' => '该账户已被冻结。'];
        }else if(!empty($data2['tel'])){
             return ['code' => 6, 'msg' => '您的试用时间已到期,请练习管理员。'];
        }else{
            return ['code' => 0, 'msg' => '电话号码不存在,请重新输入。'];
        }
    }

        //修改密码界面
    public function updatepwd(){
        return view('admin.updatepwd');
    }

    public function updatepwds(Request $request){
        $this->dysession();
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
       $this->dysession();
       $value = $_SESSION["uid"];
        $data=AdminuserModel::where('u_id',$value)->first()->toArray();
        $list=[
            'data' => $data,
        ];
        return view('admin.pim',$list);
    }

    //个人信息修改
    public function pimupdate(Request $request){
       $this->dysession();
        $tel= $request->input('tel');
        $username =$request->input('username');
        $email =$request->input('email');
        $sex =$request->input('sex');
        $sid = $_SESSION["uid"];
        $data=AdminuserModel::where('u_id',$sid)->update(['tel'=>$tel,'username'=>$username,'email'=>$email,'sex'=>$sex]);
        if ($data) {
            return ['code' => 1, 'msg' => '修改成功'];
        } else {
            return ['code' => 2, 'msg' => '修改失败,您并没有修改信息'];
        }
    }

    //管理员添加展示
    public function useradd(){
       $this->dysession();
        $value = $_SESSION["uid"];
        $data=AdminuserModel::where('u_id',$value)->first();
        $res = TzruserModel::get();
        $roles=$data['role'];
        $list=[
            'roles' => $roles,
            'res' => $res
        ];
        return view('admin.adminuser.useradd',$list);
    }

    //管理员添加
    public function useradds(Request $request){
        date_default_timezone_set('Asia/Shanghai');
       $this->dysession();
            $school = $request->input('school');
            //print_r($school);exit;
            $tel = $request->input('tel');
            $res4 = AdminuserModel::where('tel',$tel)->first();
            if(!empty($res4)){
                return ['code' => 0, 'msg' => '该手机号已经注册过了'];
            }
            $username = $request->input('username');
            $email = $request->input('email');
            $sex = $request->input('sex');
            $password = $request->input('password');
            $role = $request->input('role');
            $roles = $request->input('roles');
            $spring = $request->input('spring');
            $heat = $request->input('heat');
            $autumn = $request->input('autumn');
            $cold = $request->input('cold');
            $xztzr = $request->input('xztzr');
            $yw = $request->input('yw');
            $sx = $request->input('sx');
            $yy = $request->input('yy');
            $subject = $request->input('subject');
            $sangrade = $request->input('sangrade');
            $sigrade = $request->input('sigrade');
            $wugrade = $request->input('wugrade');
            $liugrade = $request->input('liugrade');
            // $xsjcbb = $request->input('xsjcbb');
            //print_r($xsjcbb);exit;
            if($role==26||$role==27||$role==28){
                $data = [
                'tel' => $tel,
                'password' => $password,
                'username' => $username,
                'email' => $email,
                'sex' => $sex,
                'role' => $role,
                'addtime' => date("Y-m-d H:i:s"),
            ];
             $res = AdminuserModel::insert($data);
              if ($res) {
                return ['code' => 1, 'msg' => '添加成功'];
              }else{
                return ['code' => 0, 'msg' => '添加失败,请重新添加1'];
              }
            }
            if($role==3){
                $data = [
                'tel' => $tel,
                'password' => $password,
                'username' => $username,
                'email' => $email,
                'sex' => $sex,
                'role' => $role,
                'addtime' => date("Y-m-d H:i:s"),
                ];
             $res = AdminuserModel::insert($data);
              if ($res) {
                $qwe = AdminuserModel::where('tel',$tel)->first();
                $data1 = [
                'tzr_school' => $school,
                'tzr_name' => $username,
                'tzr_chun' => $spring,
                'tzr_shu' => $heat,
                'tzr_qiu' => $autumn,
                'tzr_han' => $cold,
                'tzr_role' => $role,
                'u_id' => $qwe['u_id'],
                'tzr_phone' => $tel,
                ];
                $res1 = TzruserModel::insert($data1);
                if($res1){
                     return ['code' => 1, 'msg' => '添加成功'];
                }else{
                    return ['code' => 2, 'msg' => '添加失败,请重新添加2'];
                }   
              }else{
                return ['code' => 0, 'msg' => '添加失败,请重新添加1'];
              }
            }

            if($role==4){
                $arr = TzruserModel::where('tzr_id',$xztzr)->first();
                //print_r($arr['tzr_chun']);exit;
                if(empty($xztzr)){
                     $data = [
                        'tel' => $tel,
                        'password' => $password,
                        'username' => $username,
                        'email' => $email,
                        'sex' => $sex,
                        'role' => $role,
                        'addtime' => date("Y-m-d H:i:s"),
                        'tzr' => $_SESSION["uid"]
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
                        'tzr' => $arr['u_id']
                    ];
                }
               
                $res = AdminuserModel::insert($data);
                if($res){
                    
                    $chun = $arr['tzr_chun'];
                    $shu = $arr['tzr_shu'];
                    $qiu = $arr['tzr_qiu'];
                    $han = $arr['tzr_han'];
                     if(empty($xztzr)){
                        $res3 = TzruserModel::where('u_id',$_SESSION["uid"])->first();
                             $data1 = [
                        'xz_school' => $res3['tzr_school'],
                        'xz_name' => $username,
                        'xz_chun' => $res3['tzr_chun'],
                        'xz_shu' => $res3['tzr_shu'],
                        'xz_qiu' => $res3['tzr_qiu'],
                        'xz_han' => $res3['tzr_han'],
                        'xz_role' => $role,
                            'xz_tzr' => $res3['tzr_id'],
                            'xz_phone' => $tel
                        ];
                        }else{
                             $data1 = [
                        'xz_school' => $arr['tzr_school'],
                        'xz_name' => $username,
                        'xz_chun' => $chun,
                        'xz_shu' => $shu,
                        'xz_qiu' => $qiu,
                        'xz_han' => $han,
                        'xz_role' => $role,
                            'xz_tzr' => $xztzr,
                            'xz_phone' => $tel

                        ]; 
                        }
                    $res1=XzuserModel::insert($data1);

                      if($res1){
                     return ['code' => 1, 'msg' => '添加成功'];
                    }else{
                        return ['code' => 2, 'msg' => '添加失败,请重新添加2'];
                    }   
                }else{
                    return ['code' => 0, 'msg' => '添加失败,请重新添加1'];
                }
            
            }

            if($role==5){
                $arr = TzruserModel::where('tzr_id',$xztzr)->first();
                if(empty($xztzr)){
                    if($roles==3){
                        $data = [
                                'tel' => $tel,
                                'password' => $password,
                                'username' => $username,
                                'email' => $email,
                                'sex' => $sex,
                                'role' => $role,
                                'addtime' => date("Y-m-d H:i:s"),
                                'tzr' => $_SESSION["uid"],
                            ];
                        }else if($roles==4){
                                $resxz = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
                                $resxz2 = XzuserModel::where('xz_phone',$resxz['tel'])->first();
                                $res4 = TzruserModel::where('tzr_id',$resxz2['xz_tzr'])->first();
                            $data = [
                                 'tel' => $tel,
                                'password' => $password,
                                'username' => $username,
                                'email' => $email,
                                'sex' => $sex,
                                'role' => $role,
                                'addtime' => date("Y-m-d H:i:s"),
                                'tzr' => $res4['u_id'],
                            ];
                        }
                        
                    }else{
                             $data = [
                                 'tel' => $tel,
                                'password' => $password,
                                'username' => $username,
                                'email' => $email,
                                'sex' => $sex,
                                'role' => $role,
                                'addtime' => date("Y-m-d H:i:s"),
                                'tzr' => $arr['u_id'],
                            ];
                    }
                
                //print_r($data);exit;
                $res = AdminuserModel::insert($data);
                if($res){
                    $chun = $arr['tzr_chun'];
                    // print_r($chun);exit;
                    $shu = $arr['tzr_shu'];
                    $qiu = $arr['tzr_qiu'];
                    $han = $arr['tzr_han'];
                    if(empty($xztzr)){
                        if($roles==3){
                            $res3 = TzruserModel::where('u_id',$_SESSION["uid"])->first();
                                 $data1 = [
                        'zg_school' => $res3['tzr_school'],
                        'zg_name' => $username,
                        'zg_chun' => $res3['tzr_chun'],
                        'zg_shu' => $res3['tzr_shu'],
                        'zg_qiu' => $res3['tzr_qiu'],
                        'zg_han' => $res3['tzr_han'],
                        'zg_role' => $role,
                        'zg_tzr' => $res3['tzr_id'],
                        'zg_yw' => $yw,
                        'zg_sx' => $sx,
                        'zg_yy' => $yy,
                        'zg_phone' => $tel
                        ];
                        }else if($roles==4){
                               $resxz = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
                                $resxz2 = XzuserModel::where('xz_phone',$resxz['tel'])->first();
                                $data1 = [
                        'zg_school' =>  $resxz2['xz_school'],
                        'zg_name' => $username,
                        'zg_chun' =>  $resxz2['xz_chun'],
                        'zg_shu' =>  $resxz2['xz_shu'],
                        'zg_qiu' =>  $resxz2['xz_qiu'],
                        'zg_han' =>  $resxz2['xz_han'],
                        'zg_role' => $role,
                       'zg_tzr' =>  $resxz2['xz_tzr'],
                        'zg_yw' => $yw,
                        'zg_sx' => $sx,
                        'zg_yy' => $yy,
                        'zg_phone' => $tel
                        ];
                           }
                        }else{
                             $data1 = [
                        'zg_school' => $arr['tzr_school'],
                        'zg_name' => $username,
                        'zg_chun' => $chun,
                        'zg_shu' => $shu,
                        'zg_qiu' => $qiu,
                        'zg_han' => $han,
                        'zg_role' => $role,
                        'zg_tzr' => $xztzr,
                        'zg_yw' => $yw,
                        'zg_sx' => $sx,
                        'zg_yy' => $yy,
                        'zg_phone' => $tel,
                        ];
                        //print_r($data1);exit;
                    }
                    //print_r($data1);exit;
                    $res1=ZguserModel::insert($data1);
                    if($res1){
                     return ['code' => 1, 'msg' => '添加成功'];
                    }else{
                        return ['code' => 2, 'msg' => '添加失败,请重新添加2'];
                    }   
                    }else{
                    return ['code' => 0, 'msg' => '添加失败,请重新添加1'];
                 }
            }

            if($role==6){
            //print_r(12356);exit;
                $arr = TzruserModel::where('tzr_id',$xztzr)->first();
                //print_r($arr['tzr_chun']);exit;
                if(empty($xztzr)){
                    if($roles==3){
                        $res3 = TzruserModel::where('u_id',$_SESSION["uid"])->first();
                             $data = [
                            'tel' => $tel,
                            'password' => $password,
                            'username' => $username,
                            'email' => $email,
                            'sex' => $sex,
                            'role' => $role,
                            'addtime' => date("Y-m-d H:i:s"),
                            'tzr' => $_SESSION["uid"]
                        ];
                    }else if($roles==4){
                                $resxz = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
                                $resxz2 = XzuserModel::where('xz_phone',$resxz['tel'])->first();
                                $res4 = TzruserModel::where('tzr_id',$resxz2['xz_tzr'])->first();
                                 $data = [
                               'tel' => $tel,
                                'password' => $password,
                                'username' => $username,
                                'email' => $email,
                                'sex' => $sex,
                                'role' => $role,
                                'addtime' => date("Y-m-d H:i:s"),
                                'tzr' => $res4['u_id']
                                ];
                    }
                     
                }else{
                    $data = [
                        'tel' => $tel,
                        'password' => $password,
                        'username' => $username,
                        'email' => $email,
                        'sex' => $sex,
                        'role' => $role,
                        'addtime' => date("Y-m-d H:i:s"),
                        'tzr' => $arr["u_id"]
                    ];
                }
               // print_r($data);exit;
                $res = AdminuserModel::insert($data);
                //var_dump($res);exit;
                if($res){  
                    $chun = $arr['tzr_chun'];
                    $shu = $arr['tzr_shu'];
                    $qiu = $arr['tzr_qiu'];
                    $han = $arr['tzr_han'];
                    if(empty($xztzr)){
                      if($roles==3){
                        $res3 = TzruserModel::where('u_id',$_SESSION["uid"])->first();
                         $data1 = [
                        'js_school' => $res3['tzr_school'],
                        'js_name' => $username,
                        'js_chun' => $res3['tzr_chun'],
                        'js_shu' => $res3['tzr_shu'],
                        'js_qiu' => $res3['tzr_qiu'],
                        'js_han' => $res3['tzr_han'],
                        'js_role' => $role,
                         'js_tzr' => $res3['tzr_id'],
                        'js_subject' => $subject,
                        'js_san' => $sangrade,
                        'js_si' => $sigrade,
                        'js_wu' => $wugrade,
                        'js_liu' => $liugrade,
                        'js_phone' => $tel
                        ];
                    }else if($roles==4){
                                $resxz = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
                                $resxz2 = XzuserModel::where('xz_phone',$resxz['tel'])->first();
                                 $data1 = [
                                'js_school' => $resxz2['xz_school'],
                                'js_name' => $username,
                                'js_chun' => $resxz2['xz_chun'],
                                'js_shu' => $resxz2['xz_shu'],
                                'js_qiu' => $resxz2['xz_qiu'],
                                'js_han' => $resxz2['xz_han'],
                                'js_role' => $role,
                                'js_tzr' => $resxz2['xz_tzr'],
                                'js_subject' => $subject,
                                'js_san' => $sangrade,
                                'js_si' => $sigrade,
                                'js_wu' => $wugrade,
                                'js_liu' => $liugrade,
                                'js_phone' => $tel
                                ];
                    }else if($roles==5){
                                $reszg = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
                                $reszg2 = ZguserModel::where('zg_phone',$reszg['tel'])->first();
                                $data1 = [
                                'js_school' => $reszg2['zg_school'],
                                'js_name' => $username,
                                'js_chun' => $reszg2['zg_chun'],
                                'js_shu' => $reszg2['zg_shu'],
                                'js_qiu' => $reszg2['zg_qiu'],
                                'js_han' => $reszg2['zg_han'],
                                'js_role' => $role,
                                 'js_tzr' => $reszg2['zg_tzr'],
                                'js_subject' => $subject,
                                'js_san' => $sangrade,
                                'js_si' => $sigrade,
                                'js_wu' => $wugrade,
                                'js_liu' => $liugrade,
                                'js_phone' => $tel
                                ];
                            }
                     }else{
                             $data1 = [
                        'js_school' => $arr['tzr_school'],
                        'js_name' => $username,
                        'js_chun' => $chun,
                        'js_shu' => $shu,
                        'js_qiu' => $qiu,
                        'js_han' => $han,
                        'js_role' => $role,
                          'js_tzr' => $xztzr,
                        'js_subject' => $subject,
                        'js_san' => $sangrade,
                        'js_si' => $sigrade,
                        'js_wu' => $wugrade,
                        'js_liu' => $liugrade,
                        'js_phone' => $tel
                        ];
                     }
                
                   
                        //print_r($data1);exit;
                        $res1=JsuserModel::insert($data1);
                          if($res1){
                         return ['code' => 1, 'msg' => '添加成功'];
                        }else{
                            return ['code' => 2, 'msg' => '添加失败,请重新添加2'];
                        }   
                }else{
                    return ['code' => 0, 'msg' => '添加失败,请重新添加1'];
                }
            
            }
        }

    //管理员展示
    public function userlist(Request $request){
       $this->dysession();
        $data=AdminuserModel::where('u_id',$_SESSION["uid"])->first();
        $role=$data['role'];

        if($role==1||$role==2){
            $res = AdminuserModel::where('is_del',1)->whereIn('role',[26,27,28])->get();
            $count= count($res);
            $list = [
            'data' => $res,
            'count' => $count,
            'role' => 9,
            ];
        }else if($role==3){
            $res = TzruserModel::where('u_id',$_SESSION["uid"])->first();
            $res1 = XzuserModel::where('is_del',1)->where('xz_tzr',$res['tzr_id'])->get();
            $res2 = ZguserModel::where('is_del',1)->where('zg_tzr',$res['tzr_id'])->get();
            $res3 = JsuserModel::where('is_del',1)->where('js_tzr',$res['tzr_id'])->get();
            $count=count($res1)+count($res2)+count($res3);
            $list=[
            'data1' => $res1,
            'data2' => $res2,
            'data3' => $res3,
            'count' => $count,
            'role' => $role
           ];
        }else if($role==4){
            $res = XzuserModel::where('xz_phone',$data['tel'])->first();
            $res2 = ZguserModel::where('is_del',1)->where('zg_tzr',$res['xz_tzr'])->get();
            $res3 = JsuserModel::where('is_del',1)->where('js_tzr',$res['xz_tzr'])->get();
            $count=count($res2)+count($res3);
            $list=[
            'data2' => $res2,
            'data3' => $res3,
            'count' => $count,
            'role' => $role
           ];
        }else if($role==5){
            $res = ZguserModel::where('zg_phone',$data['tel'])->first();
            $res3 = JsuserModel::where('is_del',1)->where('js_tzr',$res['zg_tzr'])->get();
            $count=count($res3);
            $list=[
            'data3' => $res3,
            'count' => $count,
            'role' => $role
           ];
        }else if($role==26){
            $res4 = JsuserModel::where('is_del',1)->where('js_subject','趣味大语文')->get();
             $count=count($res4);
              $list=[
            'data4' => $res4,
            'count' => $count,
            'role' => $role
           ];
        }else if($role==27){
             $res4 = JsuserModel::where('is_del',1)->where('js_subject','思维培优数学')->get();
             $count=count($res4);
              $list=[
            'data4' => $res4,
            'count' => $count,
            'role' => $role
           ];
        }else if($role==28){
             $res4 = JsuserModel::where('is_del',1)->where('js_subject','HS英语')->get();
             $count=count($res4);
              $list=[
            'data4' => $res4,
            'count' => $count,
            'role' => $role
           ];
        }
       
        
        return view('admin.adminuser.userlist',$list);
    }

    public function tzrclassify(Request $request){
         $this->dysession();
        $id = $request->input('id'); 
        //echo $id;exit;
        $res1 = XzuserModel::where('xz_tzr',$id)->where('is_del',1)->get();
        $res2 = ZguserModel::where('zg_tzr',$id)->where('is_del',1)->get();
        $res3 = JsuserModel::where('js_tzr',$id)->where('is_del',1)->get();
        $count = count($res1)+count($res2)+count($res3);
        //print_r($res);exit;
        $data=AdminuserModel::where('u_id',$_SESSION["uid"])->first();
        $role=$data['role'];
        //echo $role;exit;
        $list = [
            'data1' => $res1,
            'data2' => $res2,
            'data3' => $res3,
            'count' => $count,
            'role' => $role
        ];
        //print_r($list);exit;
       return view('admin.adminuser.userlist',$list);
    }

    //投资人展示页面
    public function usertzrlist(){
          $this->dysession();
        $res = TzruserModel::where('is_del',1)->paginate(30);
        $count=count($res);
        $list = [
            'count' => $count,
            'data' => $res
        ];
        return view('admin.adminuser.usertzrlist',$list);
    }

    //管理员修改页面
    public function userlistupdate(Request $request){
       $this->dysession();
        
        $res5 = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
        $role=$res5['role'];

        $tzr_id = $request->input('tzr_id'); 
        $xz_id = $request->input('xz_id'); 
        $zg_id = $request->input('zg_id'); 
        $js_id = $request->input('js_id'); 
        $jy_id = $request->input('jy_id'); 
        if(!empty($tzr_id)){
            $res=TzruserModel::where('tzr_id',$tzr_id)->first();
            $list=[
            'data'=>$res,
            'role' => $role,
            'ycrole' => $res['tzr_role'],
            ];
        }else if(!empty($xz_id)){
            $res=XzuserModel::where('xz_id',$xz_id)->first();
            $list=[
            'data'=>$res,
            'role' => $role,
            'ycrole' => $res['xz_role'],
            ];
        }else if(!empty($zg_id)){
            $res=ZguserModel::where('zg_id',$zg_id)->first();
            $list=[
            'data'=>$res,
            'role' => $role,
            'ycrole' => $res['zg_role'],
            ];
        }else if(!empty($js_id)){
             $res=JsuserModel::where('js_id',$js_id)->first();
            $list=[
            'data'=>$res,
            'role' => $role,
            'ycrole' => $res['js_role'],
            ];
        }else if(!empty($jy_id)){
            $res = AdminuserModel::where('u_id',$jy_id)->first();
            $list = [
              'data' =>$res,
              'role' => $role,
              'ycrole' => $res['role'],
            ];
        }
        
        
        return view('admin.adminuser.userlistupdate',$list);
    }

    //管理员修改
    public function userupdate(Request $request){
        $this->dysession();
        $school =$request->input('school');
         $tzr_id =$request->input('tzr_id');
         $xz_id =$request->input('xz_id');
         $zg_id = $request->input('zg_id');
         $js_id = $request->input('js_id');
         $jy_id = $request->input('jyuid');

         if(!empty($tzr_id)){
        $tzr_xz =$request->input('tzr_xz');
        $tzr_zg =$request->input('tzr_zg');
        $tzr_js =$request->input('tzr_js');
        $role =$request->input('role');
        $chun =$request->input('chun');
        $shu =$request->input('shu');
        $qiu =$request->input('qiu');
        $han =$request->input('han');
        $res=TzruserModel::where('tzr_id',$tzr_id)->update(['tzr_school'=>$school,'tzr_xz'=>$tzr_xz,'tzr_zg'=>$tzr_zg,'tzr_js'=>$tzr_js,'tzr_chun'=>$chun,'tzr_shu'=>$shu,'tzr_qiu'=>$qiu,'tzr_han'=>$han]);
         //$res1=AdminModel::where('tel',$phone)->update(['tel'=>$tel,'username'=>$username]);
         $res2=XzuserModel::where('xz_tzr',$tzr_id)->update(['xz_chun'=>$chun,'xz_shu'=>$shu,'xz_qiu'=>$qiu,'xz_han'=>$han]);
         $res3=ZguserModel::where('zg_tzr',$tzr_id)->update(['zg_chun'=>$chun,'zg_shu'=>$shu,'zg_qiu'=>$qiu,'zg_han'=>$han]);
         $res4=JsuserModel::where('js_tzr',$tzr_id)->update(['js_chun'=>$chun,'js_shu'=>$shu,'js_qiu'=>$qiu,'js_han'=>$han]);
        if ($res||$res2||$res3||$res4) {
            return ['code' => 1, 'msg' => '修改成功'];
        } else {
            return ['code' => 0, 'msg' => '修改失败,您并没有改动信息'];
        }
      }else if(!empty($xz_id)){
          $chun =$request->input('xzchun');
          $shu =$request->input('xzshu');
          $qiu =$request->input('xzqiu');
          $han =$request->input('xzhan');
          $restzr = XzuserModel::where('xz_id',$xz_id)->first();

          $res = XzuserModel::where('xz_id',$xz_id)->update(['xz_school'=>$school,'xz_chun'=>$chun,'xz_shu'=>$shu,'xz_qiu'=>$qiu,'xz_han'=>$han]);
         $res3=ZguserModel::where('zg_tzr',$restzr['xz_tzr'])->update(['zg_chun'=>$chun,'zg_shu'=>$shu,'zg_qiu'=>$qiu,'zg_han'=>$han]);
         $res4=JsuserModel::where('js_tzr',$restzr['xz_tzr'])->update(['js_chun'=>$chun,'js_shu'=>$shu,'js_qiu'=>$qiu,'js_han'=>$han]);
          if ($res||$res3||$res4) {
            return ['code' => 1, 'msg' => '修改成功'];
        } else {
            return ['code' => 0, 'msg' => '修改失败,您并没有改动信息'];
        }
      }else if(!empty($zg_id)){
          $chun =$request->input('zgchun');
          $shu =$request->input('zgshu');
          $qiu =$request->input('zgqiu');
          $han =$request->input('zghan');
          $sx =$request->input('zgsx');
          $yw =$request->input('zgyw');
          $yy =$request->input('zgyy');
          $zgsanmoren =$request->input('zgsanmoren');
          $zgsimoren =$request->input('zgsimoren');
          $zgwumoren =$request->input('zgwumoren');
          $zgliumoren =$request->input('zgliumoren');
           $res = ZguserModel::where('zg_id',$zg_id)->update(['zg_school'=>$school,'zg_chun'=>$chun,'zg_shu'=>$shu,'zg_qiu'=>$qiu,'zg_han'=>$han,'zg_sx'=>$sx,'zg_yw'=>$yw,'zg_yy'=>$yy,'zg_sanmoren'=>$zgsanmoren,'zg_simoren'=>$zgsimoren,'zg_wumoren'=>$zgwumoren,'zg_liumoren'=>$zgliumoren]);
           if ($res) {
            return ['code' => 1, 'msg' => '修改成功'];
        } else {
            return ['code' => 0, 'msg' => '修改失败,您并没有改动信息'];
        }
      }else if(!empty($js_id)){
        $chun =$request->input('jschun');
          $shu =$request->input('jsshu');
          $qiu =$request->input('jsqiu');
          $han =$request->input('jshan');
          $san =$request->input('jssan');
          $si =$request->input('jssi');
          $wu =$request->input('jswu');
          $liu =$request->input('jsliu');
          $jssanmoren =$request->input('jssanmoren');
          $jssimoren =$request->input('jssimoren');
          $jswumoren =$request->input('jswumoren');
          $jsliumoren =$request->input('jsliumoren');
          $subject =$request->input('subject');
          $res = JsuserModel::where('js_id',$js_id)->update(['js_school'=>$school,'js_chun'=>$chun,'js_shu'=>$shu,'js_qiu'=>$qiu,'js_han'=>$han,'js_san'=>$san,'js_si'=>$si,'js_wu'=>$wu,'js_liu'=>$liu,'js_sanmoren'=>$jssanmoren,'js_simoren'=>$jssimoren,'js_wumoren'=>$jswumoren,'js_liumoren'=>$jsliumoren]);
           if ($res) {
            return ['code' => 1, 'msg' => '修改成功'];
        } else {
            return ['code' => 0, 'msg' => '修改失败,您并没有改动信息'];
        }
      }else if(!empty($jy_id)){
        $username =$request->input('username');
        $tel =$request->input('tel');
        $email =$request->input('email');
        $subject = $request->input('subject');
        $res = AdminuserModel::where('u_id',$jy_id)->update(['username'=>$username,'tel'=>$tel,'email'=>$email,'role'=>$subject]);
        if ($res) {
            return ['code' => 1, 'msg' => '修改成功'];
        } else {
            return ['code' => 0, 'msg' => '修改失败,您并没有改动信息'];
        }
      }
    }

    //管理员删除
    public function userdel(Request $request){
       $this->dysession();
       
        $jy_id=$request->input('jy_id');
        $xz_id=$request->input('xz_id');
        $zg_id=$request->input('zg_id');
        $js_id=$request->input('js_id');
        $tzr_id=$request->input('tzr_id');
        if(!empty($jy_id)){
            $res = AdminuserModel::where('u_id',$jy_id)->update(['is_del'=>2]);
             if ($res) {
                return ['code' => 1, 'msg' => '删除成功'];
            }else{
                return ['code' => 0, 'msg' => '删除失败'];
            }
        }
        if(!empty($xz_id)){
            $res1 = XzuserModel::where('xz_id',$xz_id)->first();
            $res = AdminuserModel::where('tel',$res1['xz_phone'])->update(['is_del'=>2]); 
            $res2 = XzuserModel::where('xz_id',$xz_id)->update(['is_del'=>2]);
            if ($res2) {
                return ['code' => 1, 'msg' => '删除成功'];
            }else{
                return ['code' => 0, 'msg' => '删除失败'];
            }
        }
         if(!empty($zg_id)){
            $res1 = ZguserModel::where('zg_id',$zg_id)->first();
            $res = AdminuserModel::where('tel',$res1['zg_phone'])->update(['is_del'=>2]); 
             $res2 = ZguserModel::where('zg_id',$zg_id)->update(['is_del'=>2]);
            if ($res2) {
                return ['code' => 1, 'msg' => '删除成功'];
            }else{
                return ['code' => 0, 'msg' => '删除失败'];
            }
         }
          if(!empty($js_id)){
            $res1 = JsuserModel::where('js_id',$js_id)->first();
            $res = AdminuserModel::where('tel',$res1['js_phone'])->update(['is_del'=>2]); 
             $res2 = JsuserModel::where('js_id',$js_id)->update(['is_del'=>2]);
            if ($res2) {
                return ['code' => 1, 'msg' => '删除成功'];
            }else{
                return ['code' => 0, 'msg' => '删除失败'];
            }
         }
         if(!empty($tzr_id)){
             $res2 = TzruserModel::where('tzr_id',$tzr_id)->first();
             $res3 = TzruserModel::where('tzr_id',$tzr_id)->update(['is_del'=>2]);
             $res1 = AdminuserModel::where('u_id',$res2['u_id'])->update(['is_del'=>2]);
             $res = AdminuserModel::where('tzr',$res2['u_id'])->update(['is_del'=>2]);
             if ($res) {
                return ['code' => 1, 'msg' => '删除成功'];
            }else{
                return ['code' => 0, 'msg' => '删除失败'];
            }
         }
          
    }
    //管理员冻结
     public function userblock(Request $request){
       $this->dysession();
        $jy_id=$request->input('jy_id');
        $xz_id=$request->input('xz_id');
        $zg_id=$request->input('zg_id');
        $js_id=$request->input('js_id');
        $tzr_id=$request->input('tzr_id');
        if(!empty($jy_id)){
            $res = AdminuserModel::where('u_id',$jy_id)->update(['is_del'=>3]);
             if ($res) {
                return ['code' => 1, 'msg' => '冻结成功'];
            }else{
                return ['code' => 0, 'msg' => '冻结失败'];
            }
        }
        if(!empty($xz_id)){
            $res1 = XzuserModel::where('xz_id',$xz_id)->first();
            $res = AdminuserModel::where('tel',$res1['xz_phone'])->update(['is_del'=>3]); 
            $res2 = XzuserModel::where('xz_id',$xz_id)->update(['is_del'=>3]);
            if ($res2) {
                return ['code' => 1, 'msg' => '冻结成功'];
            }else{
                return ['code' => 0, 'msg' => '冻结失败'];
            }
        }
         if(!empty($zg_id)){
            $res1 = ZguserModel::where('zg_id',$zg_id)->first();
            $res = AdminuserModel::where('tel',$res1['zg_phone'])->update(['is_del'=>3]); 
             $res2 = ZguserModel::where('zg_id',$zg_id)->update(['is_del'=>3]);
            if ($res2) {
                return ['code' => 1, 'msg' => '冻结成功'];
            }else{
                return ['code' => 0, 'msg' => '冻结失败'];
            }
         }
          if(!empty($js_id)){
            $res1 = JsuserModel::where('js_id',$js_id)->first();
            $res = AdminuserModel::where('tel',$res1['js_phone'])->update(['is_del'=>3]); 
             $res2 = JsuserModel::where('js_id',$js_id)->update(['is_del'=>3]);
            if ($res2) {
                return ['code' => 1, 'msg' => '冻结成功'];
            }else{
                return ['code' => 0, 'msg' => '冻结失败'];
            }
         }
         if(!empty($tzr_id)){
             $res2 = TzruserModel::where('tzr_id',$tzr_id)->first();
             $res3 = TzruserModel::where('tzr_id',$tzr_id)->update(['is_del'=>3]);
             $res1 = AdminuserModel::where('u_id',$res2['u_id'])->update(['is_del'=>3]);
             $res = AdminuserModel::where('tzr',$res2['u_id'])->update(['is_del'=>3]);
             if ($res) {
                return ['code' => 1, 'msg' => '冻结成功'];
            }else{
                return ['code' => 0, 'msg' => '冻结失败'];
            }
         }
          
    }
    //已冻结管理员展示
    public function administratordel(){
            $this->dysession();
            $res = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
            $role=$res['role'];
            if($role==1||$role==2){
                $data = AdminuserModel::where('is_del',3)->get();
            }else if($role==3){
                $data = AdminuserModel::where('tzr',$_SESSION["uid"])->where('is_del',3)->get();
            }else if($role==4){
                $res1 = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
                $data = AdminuserModel::where('tzr',$res1['tzr'])->where('is_del',3)->whereIn('role',[5,6])->get();
            }else if($role==5){
                $res1 = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
                $data = AdminuserModel::where('tzr',$res1['tzr'])->where('is_del',3)->where('role',6)->get();
            }
            $count=count($data);
            $list=[
                'data' => $data,
                'count' =>$count
            ];
            return view('admin.adminuser.administratordel',$list);
        }

    //启用冻结管理员
    public function administratordels(Request $request){
       $this->dysession();
        $uid=$request->input('u_id');
        //print_r($uid);exit;
        $res = AdminuserModel::where('u_id',$uid)->first();
        if($res['role']==26||$res['role']==27||$res['role']==28){
             $res1=AdminuserModel::where('u_id',$uid)->update(['is_del'=>1]);
        }
       
        if($res['role']==3){
            $res2=AdminuserModel::where('u_id',$uid)->update(['is_del'=>1]);
            //dump($res2);exit;
            $res3=AdminuserModel::where('tzr',$uid)->update(['is_del'=>1]);
            $res4=TzruserModel::where('u_id',$uid)->update(['is_del'=>1]);
            $res5= TzruserModel::where('u_id',$uid)->first();
            $res6= XzuserModel::where('xz_tzr',$res5['tzr_id'])->update(['is_del'=>1]);
            $res7= ZguserModel::where('zg_tzr',$res5['tzr_id'])->update(['is_del'=>1]);
            $res1 = JsuserModel::where('js_tzr',$res5['tzr_id'])->update(['is_del'=>1]);

        }else if($res['role']==4){
             $res2=AdminuserModel::where('u_id',$uid)->update(['is_del'=>1]);
             $res1= XzuserModel::where('xz_phone',$res['tel'])->update(['is_del'=>1]);
        }else if($res['role']==5){
             $res2=AdminuserModel::where('u_id',$uid)->update(['is_del'=>1]);
             $res1= ZguserModel::where('zg_phone',$res['tel'])->update(['is_del'=>1]);
        }else if($res['role']==6){
             $res2=AdminuserModel::where('u_id',$uid)->update(['is_del'=>1]);
             $res1= JsuserModel::where('js_phone',$res['tel'])->update(['is_del'=>1]);
        }
        if ($res1||$res2) {
            return ['code' => 1, 'msg' => '启用成功'];
        } else {
            return ['code' => 0, 'msg' => '启用失败'];
        }

    }
    //课节发放展示
    public function chapterseason(){
       $this->dysession();
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
        $this->dysession();
        $res = SubjectModel::where('is_del',1)->get();
        $list=[
            'data'=>$res
        ];
        return view('admin.grade.gradeaddlist',$list);
    }

    //添加年级
    public function gradeadd(Request $request){
      $this->dysession();
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
       $this->dysession();
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
       $this->dysession();
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
       $this->dysession();
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
        $this->dysession();
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
        $this->dysession();
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
       $this->dysession();
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
      $this->dysession();
        return view('admin.subject.subjectaddlist');
    }

    //添加科目
    public function subjectadd(Request $request){
      $this->dysession();
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
      $this->dysession();
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
       $this->dysession();
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
       $this->dysession();
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
       $this->dysession();
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
      $this->dysession();
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
       $this->dysession();
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
       $this->dysession();
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
      $this->dysession();
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
       $this->dysession();
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
      $this->dysession();
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
       $this->dysession();
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
        $this->dysession();
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
       $this->dysession();
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
       $this->dysession();
        $cla_id = $request->input();
        $res = ClassModel::where('class.cla_id',$cla_id)->join('grade','grade.g_id','=','class.g_id')->join('subject','subject.s_id','=','class.s_id')->first()->toArray();
        //print_r($res);exit;
        $list=[
            'data' => $res
        ];
        return view('admin.chapter.chapteraddlist',$list);
    }
                                                                                                            

    public function chapteradd(Request $request){
       $this->dysession();
        $file=$request->file('file')->store('file');
        $pdf="/mnt/bkxt/storage/app/".$file;
        $path="/mnt/bkxt/public/tp/images/";
        $fileone = realpath($pdf);
        if (!is_readable($fileone)) {
            echo 'file not readable';
        }
        $im = new Imagick();
        $im->setResolution(200, 200); //设置分辨率 值越大分辨率越高
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
	    $this->dysession();
	     $file=$request->file('file')->store('file');
	     //print_r($file);exit;
	             $pdf="/mnt/bkxt/storage/app/".$file;
		     $path="/mnt/bkxt/public/tp/teacher/";
		     $fileone = realpath($pdf);
		             if (!is_readable($fileone)) {
				                 echo 'file not readable';
						         }
		             $im = new Imagick();
		             $im->setResolution(180, 180); //设置分辨率 值越大分辨率越高
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
		$this->dysession();
    $file=$request->file('file')->store('file');
	$pdf="/mnt/bkxt/storage/app/".$file;
	$path="/mnt/bkxt/public/tp/work/";
	$fileone = realpath($pdf);
	if (!is_readable($fileone)) {
					 echo 'file not readable';
	         }
		 $im = new Imagick();
		 $im->setResolution(200, 200); 
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
   	 $this->dysession();
	         $id =$request->input('id');
	 $res=ChapterModel::where('is_del',1)->where('cha_id',$id)->first();
	 $list=[
	 	'data'=>$res
	];
	return view('admin.chapter.teacherbook',$list);

    }
    //练习册上传
      public function workbook(Request $request){
	 $this->dysession();
		  $id =$request->input('id');
		  $res=ChapterModel::where('is_del',1)->where('cha_id',$id)->first();
		  $list=[
			'data'=>$res
			];
		return view('admin.chapter.workbook',$list);
}

    //课程对应课节展示
    public function chapclalist(Request $request){
        $this->dysession();
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
        $this->dysession();
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
       $this->dysession();
	date_default_timezone_set('Asia/Shanghai');
	       $id = $request->input('cha_id');
	        $kong = CollectModel::where('uid', $_SESSION["uid"])->where('cha_id', $id)->first();

			$res1 = AdminuserModel::where('is_del',1)->where('u_id',$_SESSION["uid"])->first();
			$res2 = ChapterModel::where('cha_id',$id)->first();
			$grade = $res2['grade'];
			$season = $res2['season'];
            $subject = $res2['sub_name'];
            if($res1['role']==5){
                $res3 = ZguserModel::where('zg_phone',$res1['tel'])->first();
                $res4 = TzruserModel::where('tzr_id',$res3['zg_tzr'])->first();
                    $data = [
                        'uid' => $_SESSION["uid"],
                        'cha_id' => $id,
                        'collect_time' => date("Y-m-d H:i:s"),
                        'alliance' => $res4['u_id'],
                        'username' => $res1['username'],
                        'grade' => $grade,
                        'season' => $season,
                        'role' => $res1['role'],
                        'finish_time' => "未完成",
                        'subject' => $subject
                      ];
            }else if($res1['role']==6){
                 $res3 = JsuserModel::where('js_phone',$res1['tel'])->first();
                  $res4 = TzruserModel::where('tzr_id',$res3['js_tzr'])->first();
                    $data = [
                        'uid' => $_SESSION["uid"],
                        'cha_id' => $id,
                        'collect_time' => date("Y-m-d H:i:s"),
                        'alliance' => $res4['u_id'],
                        'username' => $res1['username'],
                        'grade' => $grade,
                        'season' => $season,
                        'role' => $res1['role'],
                        'finish_time' => "未完成",
                        'subject' => $subject
                      ];
            }
	                
	           $res = CollectModel::insert($data);
		            if ($res) {
		                    return ['code' => 1, 'msg' => '备课成功'];
		                } else {
		                return ['code' => 0, 'msg' => '备课失败,请重新备课'];
			            }
    }

    //收藏展示
    public function collectlist(){
	   $this->dysession();
	   $res5=AdminuserModel::where('u_id',$_SESSION["uid"])->first();
	   $role=$res5['role'];
	   $res1 = AdminuserModel::where('is_del',1)->where('u_id',$_SESSION["uid"])->first();
	   $username=$res1['username'];
		if($role==3){
		 $res= CollectModel::where('collect.alliance', $_SESSION["uid"])->where('chapter.is_del',1)->join('chapter','chapter.cha_id','=','collect.cha_id')->paginate(30);
		}else if($role==4){
             $res= CollectModel::where('collect.alliance',$res5['tzr'])->where('chapter.is_del',1)->join('chapter','chapter.cha_id','=','collect.cha_id')->paginate(30);
        }else if($role==5){
             $res = CollectModel::where('collect.alliance',$res5['tzr'])->whereIn('collect.role',[5,6])->where('chapter.is_del',1)->join('chapter','chapter.cha_id','=','collect.cha_id')->paginate(30);
        }else if($role==26){
            $res= CollectModel::whereIn('collect.role', [5,6])->where('collect.subject','趣味大语文')->where('chapter.is_del',1)->join('chapter','chapter.cha_id','=','collect.cha_id')->paginate(30);
        }else if($role==27){
            $res= CollectModel::whereIn('collect.role', [5,6])->where('collect.subject','思维培优数学')->where('chapter.is_del',1)->join('chapter','chapter.cha_id','=','collect.cha_id')->paginate(30);
        }else if($role==28){
            $res= CollectModel::whereIn('collect.role', [5,6])->whereIn('collect.subject',['Phonics自然拼读','KB课程'])->where('chapter.is_del',1)->join('chapter','chapter.cha_id','=','collect.cha_id')->paginate(30);
        }else if($role==1||$role==2){
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
      $this->dysession();
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
      $this->dysession();
     $id = $request->input('cha_id');
     $coll_id = $request->input('coll_id');
            $res1 = AdminuserModel::where('is_del',1)->where('u_id',$_SESSION["uid"])->first();
            $username=$res1['username'];
            $res5=AdminuserModel::where('u_id',$_SESSION["uid"])->first()->toArray();
            $role=$res5['role'];

            if($role==3){
            $res=CollectModel::where('alliance',$_SESSION["uid"])->where('cha_id',$id)->update(['xzsh'=>2]);
                    if ($res) {
                return ['code' => 1, 'msg' => '已完成审核！请等待总部审核。'];
                 } else {
                return ['code' => 0, 'msg' => '网络好像不太好~,请重新点击'];
                }
            }else if($role==4){
                $res=CollectModel::where('alliance',$res1['tzr'])->where('cha_id',$id)->update(['xzsh'=>2]);
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
                    $res1 = CollectModel::where('coll_id',$coll_id)->first();
                    $res2 = AdminuserModel::where('u_id',$res1['uid'])->first();
                    $res3 = JsuserModel::where('js_phone',$res2['tel'])->first();
                    $grade = $res1['grade'];
                    if($grade=='三年级'){
                        $moren = $res3['js_sanmoren'];
                        $morens = $moren+1;
                        $res4 = JsuserModel::where('js_phone',$res2['tel'])->update(['js_sanmoren'=>$morens]);
                        if($res3['js_subject']=='趣味大语文'){
                                $res5 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yw',1)->first();
                                $zgmoren = $res5['zg_sanmoren']+1;
                                $res6 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yw',1)->update(['zg_sanmoren'=>$zgmoren]);
                                
                        }else if($res3['js_subject']=='思维培优数学'){
                            $res5 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_sx',1)->first();
                                $zgmoren = $res5['zg_sanmoren']+1;
                                $res6 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_sx',1)->update(['zg_sanmoren'=>$zgmoren]);
                        }else if($res3['js_subject']=='HS英语'){
                             $res5 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yy',1)->first();
                                $zgmoren = $res5['zg_sanmoren']+1;
                                $res6 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yy',1)->update(['zg_sanmoren'=>$zgmoren]);
                        }
                    }else if($grade=='四年级'){
                         $moren = $res3['js_simoren'];
                        $morens = $moren+1;
                        $res4 = JsuserModel::where('js_phone',$res2['tel'])->update(['js_simoren'=>$morens]);
                        if($res3['js_subject']=='趣味大语文'){
                                $res5 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yw',1)->first();
                                $zgmoren = $res5['zg_simoren']+1;
                                $res6 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yw',1)->update(['zg_simoren'=>$zgmoren]);
                                
                        }else if($res3['js_subject']=='思维培优数学'){
                            $res5 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_sx',1)->first();
                                $zgmoren = $res5['zg_simoren']+1;
                                $res6 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_sx',1)->update(['zg_simoren'=>$zgmoren]);
                        }else if($res3['js_subject']=='HS英语'){
                             $res5 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yy',1)->first();
                                $zgmoren = $res5['zg_simoren']+1;
                                $res6 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yy',1)->update(['zg_sanmoren'=>$zgmoren]);
                        }
                    }else if($grade=='五年级'){
                        $moren = $res3['js_wumoren'];
                        $morens = $moren+1;
                        $res4 = JsuserModel::where('js_phone',$res2['tel'])->update(['js_wumoren'=>$morens]);
                        if($res3['js_subject']=='趣味大语文'){
                                $res5 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yw',1)->first();
                                $zgmoren = $res5['zg_wumoren']+1;
                                $res6 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yw',1)->update(['zg_wumoren'=>$zgmoren]);
                                
                        }else if($res3['js_subject']=='思维培优数学'){
                            $res5 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_sx',1)->first();
                                $zgmoren = $res5['zg_wumoren']+1;
                                $res6 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_sx',1)->update(['zg_wumoren'=>$zgmoren]);
                        }else if($res3['js_subject']=='HS英语'){
                             $res5 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yy',1)->first();
                                $zgmoren = $res5['zg_wumoren']+1;
                                $res6 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yy',1)->update(['zg_wumoren'=>$zgmoren]);
                        }
                    }else if($grade=='六年级'){
                        $moren = $res3['js_liumoren'];
                        $morens = $moren+1;
                        $res4 = JsuserModel::where('js_phone',$res2['tel'])->update(['js_liumoren'=>$morens]);
                        if($res3['js_subject']=='趣味大语文'){
                                $res5 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yw',1)->first();
                                $zgmoren = $res5['zg_liumoren']+1;
                                $res6 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yw',1)->update(['zg_liumoren'=>$zgmoren]);
                                
                        }else if($res3['js_subject']=='思维培优数学'){
                            $res5 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_sx',1)->first();
                                $zgmoren = $res5['zg_liumoren']+1;
                                $res6 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_sx',1)->update(['zg_liumoren'=>$zgmoren]);
                        }else if($res3['js_subject']=='HS英语'){
                             $res5 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yy',1)->first();
                                $zgmoren = $res5['zg_liumoren']+1;
                                $res6 = ZguserModel::where('zg_tzr',$res3['js_tzr'])->where('zg_yy',1)->update(['zg_liumoren'=>$zgmoren]);
                        }
                    }
                    
                   
                    if ($res6) {
                         return ['code' => 1, 'msg' => '已完成审核！'];
                        } else {
                        return ['code' => 0, 'msg' => '网络好像不太好~,请重新点击'];
                    }
                }
            }
          
          
    }
    //图片展示
     public function picture(Request $request){
	     $this->dysession();
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
		  'cha_name'=>$res['cha_name'],
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
	   $this->dysession();
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
	  $this->dysession();
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
	      $this->dysession();
        $res5 = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
        $role = $res5['role'];
        $moren = $res5['addjs'];
		$subject = $request->input('subject');
        $res3 = ChaseaModel::where('chasea_sub',$subject)->get();
		$grade = $request->input('grade');
        if($role==3){ 
            if($subject=='KB课程'||$subject=='Phonics自然拼读'){
                $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->orderBy('number','asc')->get();
            }else{
                 $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
                if($res1['tzr_chun']==1){
                   $tzrchun='春';
                }else{
                    $tzrchun='';
                }
                if($res1['tzr_shu']==1){
                    $tzrshu='暑';
                }else{
                    $tzrshu='';
                }
                if($res1['tzr_qiu']==1){
                    $tzrqiu='秋';
                }else{
                    $tzrqiu='';
                }
                if($res1['tzr_han']==1){
                    $tzrhan='寒';
                }else{
                    $tzrhan='';
                }
            $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
            $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->whereIn('season',$arr)->where('grade',$grade)->orderBy('number','asc')->get();
            }
        }else if($role==4){
             if($subject=='KB课程'||$subject=='Phonics自然拼读'){
                $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->get();
            }else{
             $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
            if($res1['xz_chun']==1){
               $tzrchun='春';
            }else{
                $tzrchun='';
            }
            if($res1['xz_shu']==1){
                $tzrshu='暑';
            }else{
                $tzrshu='';
            }
            if($res1['xz_qiu']==1){
                $tzrqiu='秋';
            }else{
                $tzrqiu='';
            }
            if($res1['xz_han']==1){
                $tzrhan='寒';
            }else{
                $tzrhan='';
            }
            $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
            $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->whereIn('season',$arr)->where('grade',$grade)->orderBy('number','asc')->get();
        }
        }else if($role==5){
            $res1 = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
            $res2 = ZguserModel::where('zg_phone',$res1['tel'])->first();
          if($grade=='三年级'){
            if($res2['zg_chun']==1){
                 $res = ChapterModel::where('is_del',1)->where('season','春')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_sanmoren'])->orderBy('number','asc')->get();
             }else if($res2['zg_shu']==1){
                $res = ChapterModel::where('is_del',1)->where('season','暑')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_sanmoren'])->orderBy('number','asc')->get();
               }else if($res2['zg_qiu']==1){
                $res = ChapterModel::where('is_del',1)->where('season','秋')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_sanmoren'])->orderBy('number','asc')->get();
            }else if($res2['zg_han']==1){
                $res = ChapterModel::where('is_del',1)->where('season','寒')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_sanmoren'])->orderBy('number','asc')->get();
            }
        }else if($grade=='四年级'){
             if($res2['zg_chun']==1){
                 $res = ChapterModel::where('is_del',1)->where('season','春')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_simoren'])->orderBy('number','asc')->get();
             }else if($res2['zg_shu']==1){
                $res = ChapterModel::where('is_del',1)->where('season','暑')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_simoren'])->orderBy('number','asc')->get();
               }else if($res2['zg_qiu']==1){
                $res = ChapterModel::where('is_del',1)->where('season','秋')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_simoren'])->orderBy('number','asc')->get();
            }else if($res2['zg_han']==1){
                $res = ChapterModel::where('is_del',1)->where('season','寒')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_simoren'])->orderBy('number','asc')->get();
            }
        }else if($grade=='五年级'){
             if($res2['zg_chun']==1){
                 $res = ChapterModel::where('is_del',1)->where('season','春')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_wumoren'])->orderBy('number','asc')->get();
             }else if($res2['zg_shu']==1){
                $res = ChapterModel::where('is_del',1)->where('season','暑')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_wumoren'])->orderBy('number','asc')->get();
               }else if($res2['zg_qiu']==1){
                $res = ChapterModel::where('is_del',1)->where('season','秋')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_wumoren'])->orderBy('number','asc')->get();
            }else if($res2['zg_han']==1){
                $res = ChapterModel::where('is_del',1)->where('season','寒')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_wumoren'])->orderBy('number','asc')->get();
            }
        }else if($grade=='六年级'){
             if($res2['zg_chun']==1){
                 $res = ChapterModel::where('is_del',1)->where('season','春')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_liumoren'])->orderBy('number','asc')->get();
             }else if($res2['zg_shu']==1){
                $res = ChapterModel::where('is_del',1)->where('season','暑')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_liumoren'])->orderBy('number','asc')->get();
               }else if($res2['zg_qiu']==1){
                $res = ChapterModel::where('is_del',1)->where('season','秋')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_liumoren'])->orderBy('number','asc')->get();
            }else if($res2['zg_han']==1){
                $res = ChapterModel::where('is_del',1)->where('season','寒')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['zg_liumoren'])->orderBy('number','asc')->get();
            }
        }
            
        }else if($role==6){
            $res1 = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
            $res2 = JsuserModel::where('js_phone',$res1['tel'])->first();
            if($grade=='三年级'){
                 if($res2['js_chun']==1){
                 $res = ChapterModel::where('is_del',1)->where('season','春')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_sanmoren'])->orderBy('number','asc')->get();
                 }else if($res2['js_shu']==1){
                    $res = ChapterModel::where('is_del',1)->where('season','暑')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_sanmoren'])->orderBy('number','asc')->get();
                   }else if($res2['js_qiu']==1){
                    $res = ChapterModel::where('is_del',1)->where('season','秋')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_sanmoren'])->orderBy('number','asc')->get();
                }else if($res2['js_han']==1){
                    $res = ChapterModel::where('is_del',1)->where('season','寒')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_sanmoren'])->orderBy('number','asc')->get();
                }
            }else if($grade=='四年级'){
                if($res2['js_chun']==1){
                 $res = ChapterModel::where('is_del',1)->where('season','春')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_simoren'])->orderBy('number','asc')->get();
                 }else if($res2['js_shu']==1){
                    $res = ChapterModel::where('is_del',1)->where('season','暑')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_simoren'])->orderBy('number','asc')->get();
                   }else if($res2['js_qiu']==1){
                    $res = ChapterModel::where('is_del',1)->where('season','秋')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_simoren'])->orderBy('number','asc')->get();
                }else if($res2['js_han']==1){
                    $res = ChapterModel::where('is_del',1)->where('season','寒')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_simoren'])->orderBy('number','asc')->get();
                }
            }else if($grade=='五年级'){
                if($res2['js_chun']==1){
                 $res = ChapterModel::where('is_del',1)->where('season','春')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_wumoren'])->orderBy('number','asc')->get();
                 }else if($res2['js_shu']==1){
                    $res = ChapterModel::where('is_del',1)->where('season','暑')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_wumoren'])->orderBy('number','asc')->get();
                   }else if($res2['js_qiu']==1){
                    $res = ChapterModel::where('is_del',1)->where('season','秋')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_wumoren'])->orderBy('number','asc')->get();
                }else if($res2['js_han']==1){
                    $res = ChapterModel::where('is_del',1)->where('season','寒')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_wumoren'])->orderBy('number','asc')->get();
                }
            }else if($grade=='六年级'){
                if($res2['js_chun']==1){
                 $res = ChapterModel::where('is_del',1)->where('season','春')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_liumoren'])->orderBy('number','asc')->get();
                 }else if($res2['js_shu']==1){
                    $res = ChapterModel::where('is_del',1)->where('season','暑')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_liumoren'])->orderBy('number','asc')->get();
                   }else if($res2['js_qiu']==1){
                    $res = ChapterModel::where('is_del',1)->where('season','秋')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_liumoren'])->orderBy('number','asc')->get();
                }else if($res2['js_han']==1){
                    $res = ChapterModel::where('is_del',1)->where('season','寒')->where('sub_name',$subject)->where('grade',$grade)->orderBy('cha_id','asc')->take($res2['js_liumoren'])->orderBy('number','asc')->get();
                }
            }
           
         }else{
             $res = ChapterModel::where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->orderBy('number','asc')->get();

           // $res = ChapterModel::select('sub_name','grade','season','cla_name','cha_name')->where('is_del',1)->where('sub_name',$subject)->where('grade',$grade)->GroupBy('season')->get();
         }
         $count = count($res);
		if($role==3){
            $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
             $list = [
                'data' =>$res,
                'count' =>$count,
                'role' =>$role,
                'sub_name' => $subject,  
                'grade' => $grade,
                'res3' => $res3,
                'souxl' => '',
                'res1' => $res1,
                        ];
            return view('admin.chapter.sscha',$list); 
        }else if($role==4){
            $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
             $list = [
                'data' =>$res,
                'count' =>$count,
                'role' =>$role,
                'sub_name' => $subject,  
                'grade' => $grade,
                'res3' => $res3,
                'souxl' => '',
                'res1' => $res1,
                        ];
            return view('admin.chapter.sscha',$list); 
        }else{
            $list = [
                'data' =>$res,
                'count' =>$count,
                'role' =>$role,
                'sub_name' => $subject,  
                'grade' => $grade,
                'res3' => $res3,
                'souxl' => '',
                        ];
            return view('admin.chapter.sscha',$list);  
        }
		       
    }
    public function adminsousuo(Request $request){
         $this->dysession();
        $adminseason = $request->input('adminseason');
        $adminsubject = $request->input('adminsubject');
        $admingrade = $request->input('admingrade');
        $sou = $request->input('sou');
        $res3 = ChaseaModel::where('chasea_sub',$adminsubject)->get();
        $res5 = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
        $role = $res5['role'];
       if(empty($adminseason)&empty($sou)&empty($admingrade)&!empty($adminsubject)){
                     $res = ChapterModel::where('is_del',1)->where('sub_name',$adminsubject)->orderBy('number','asc')->get();  
       }else if(empty($adminseason)&empty($sou)&!empty($admingrade)&!empty($adminsubject)){
               
                    $res = ChapterModel::where('is_del',1)->where('sub_name',$adminsubject)->where('grade',$admingrade)->orderBy('number','asc')->get();   
       }else if(empty($adminseason)&!empty($sou)&empty($admingrade)&!empty($adminsubject)){
             if($role==3){
                 $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
                if($res1['tzr_chun']==1){
                   $tzrchun='春';
                }else{
                    $tzrchun='';
                }
                if($res1['tzr_shu']==1){
                    $tzrshu='暑';
                }else{
                    $tzrshu='';
                }
                if($res1['tzr_qiu']==1){
                    $tzrqiu='秋';
                }else{
                    $tzrqiu='';
                }
                if($res1['tzr_han']==1){
                    $tzrhan='寒';
                }else{
                    $tzrhan='';
                }
            $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
            $res = ChapterModel::where('is_del',1)->where('sub_name',$adminsubject)->whereIn('season',$arr)->where('cha_name','like','%'.$sou.'%')->orderBy('number','asc')->get();
            }else if($role==4){
                 $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
                    if($res1['xz_chun']==1){
                       $tzrchun='春';
                    }else{
                        $tzrchun='';
                    }
                    if($res1['xz_shu']==1){
                        $tzrshu='暑';
                    }else{
                        $tzrshu='';
                    }
                    if($res1['xz_qiu']==1){
                        $tzrqiu='秋';
                    }else{
                        $tzrqiu='';
                    }
                    if($res1['xz_han']==1){
                        $tzrhan='寒';
                    }else{
                        $tzrhan='';
                    }
                    $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
                    $res = ChapterModel::where('is_del',1)->where('sub_name',$adminsubject)->whereIn('season',$arr)->where('cha_name','like','%'.$sou.'%')->orderBy('number','asc')->get();
                }else{
                    $res = ChapterModel::where('is_del',1)->where('sub_name',$adminsubject)->where('cha_name','like','%'.$sou.'%')->orderBy('number','asc')->get();
                }
              
       }else if(empty($adminsubject)&!empty($sou)&empty($admingrade)&empty($adminsubject)){
                if($role==3){
                 $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
                if($res1['tzr_chun']==1){
                   $tzrchun='春';
                }else{
                    $tzrchun='';
                }
                if($res1['tzr_shu']==1){
                    $tzrshu='暑';
                }else{
                    $tzrshu='';
                }
                if($res1['tzr_qiu']==1){
                    $tzrqiu='秋';
                }else{
                    $tzrqiu='';
                }
                if($res1['tzr_han']==1){
                    $tzrhan='寒';
                }else{
                    $tzrhan='';
                }
            $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
            $res = ChapterModel::where('is_del',1)->where('cha_name','like','%'.$sou.'%')->whereIn('season',$arr)->orderBy('number','asc')->get();
            }else if($role==4){
                 $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
                    if($res1['xz_chun']==1){
                       $tzrchun='春';
                    }else{
                        $tzrchun='';
                    }
                    if($res1['xz_shu']==1){
                        $tzrshu='暑';
                    }else{
                        $tzrshu='';
                    }
                    if($res1['xz_qiu']==1){
                        $tzrqiu='秋';
                    }else{
                        $tzrqiu='';
                    }
                    if($res1['xz_han']==1){
                        $tzrhan='寒';
                    }else{
                        $tzrhan='';
                    }
                    $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
                    $res = ChapterModel::where('is_del',1)->where('cha_name','like','%'.$sou.'%')->whereIn('season',$arr)->orderBy('number','asc')->get();
                }else{
                    $res = ChapterModel::where('is_del',1)->where('cha_name','like','%'.$sou.'%')->orderBy('number','asc')->get();
                }
                
       }else if(empty($adminseason)&!empty($sou)&!empty($adminsubject)&!empty($admingrade)){
            if($role==3){
                 $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
                if($res1['tzr_chun']==1){
                   $tzrchun='春';
                }else{
                    $tzrchun='';
                }
                if($res1['tzr_shu']==1){
                    $tzrshu='暑';
                }else{
                    $tzrshu='';
                }
                if($res1['tzr_qiu']==1){
                    $tzrqiu='秋';
                }else{
                    $tzrqiu='';
                }
                if($res1['tzr_han']==1){
                    $tzrhan='寒';
                }else{
                    $tzrhan='';
                }
            $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
            $res = ChapterModel::where('is_del',1)->where('sub_name',$adminsubject)->where('grade',$admingrade)->whereIn('season',$arr)->where('cha_name','like','%'.$sou.'%')->orderBy('number','asc')->get();
            }else if($role==4){
                 $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
                    if($res1['xz_chun']==1){
                       $tzrchun='春';
                    }else{
                        $tzrchun='';
                    }
                    if($res1['xz_shu']==1){
                        $tzrshu='暑';
                    }else{
                        $tzrshu='';
                    }
                    if($res1['xz_qiu']==1){
                        $tzrqiu='秋';
                    }else{
                        $tzrqiu='';
                    }
                    if($res1['xz_han']==1){
                        $tzrhan='寒';
                    }else{
                        $tzrhan='';
                    }
            $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
             $res = ChapterModel::where('is_del',1)->where('sub_name',$adminsubject)->where('grade',$admingrade)->whereIn('season',$arr)->where('cha_name','like','%'.$sou.'%')->orderBy('number','asc')->get();
            }else{
                $res = ChapterModel::where('is_del',1)->where('sub_name',$adminsubject)->where('grade',$admingrade)->where('cha_name','like','%'.$sou.'%')->orderBy('number','asc')->get();
            }
            
        }else if(!empty($adminseason)&!empty($sou)&!empty($adminsubject)&empty($admingrade)){
            $res = ChapterModel::where('is_del',1)->where('sub_name',$adminsubject)->where('season',$adminseason)->where('cha_name','like','%'.$sou.'%')->orderBy('number','asc')->get();
        }else if(!empty($adminseason)&!empty($sou)&!empty($adminsubject)&!empty($admingrade)){
             $res = ChapterModel::where('is_del',1)->where('sub_name',$adminsubject)->where('grade',$admingrade)->where('season',$adminseason)->where('cha_name','like','%'.$sou.'%')->orderBy('number','asc')->get();
        }else{
             $res = ChapterModel::where('is_del',1)->where('sub_name',$adminsubject)->where('grade',$admingrade)->where('season',$adminseason)->orderBy('number','asc')->get();
        }
        $count = count($res);
        if($role==3){    
             $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
                $list = [
                'data' =>$res,
                'count' =>$count,
                'role' =>$role,
                'sub_name' => $adminsubject,  
                'grade' => $admingrade,
                'res3' => $res3,
                'souxl' => $adminseason,
                'res1' => $res1,
                    ];
        }else if($role==4){
             $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
                $list = [
                'data' =>$res,
                'count' =>$count,
                'role' =>$role,
                'sub_name' => $adminsubject,  
                'grade' => $admingrade,
                'res3' => $res3,
                'souxl' => $adminseason,
                'res1' => $res1,
                    ];
        }else{
                $list = [
                'data' =>$res,
                'count' =>$count,
                'role' =>$role,
                'sub_name' => $adminsubject,  
                'grade' => $admingrade,
                'res3' => $res3,
                'souxl' => $adminseason,
                    ];
        }
             
        return view('admin.chapter.sscha',$list);  
    }


    public function collectxzsc(Request $request){
	  $this->dysession();
		$id = $request->input('coll_id');
		$res = CollectModel::where('coll_id',$id)->delete();
			if ($res) {
				return ['code' => 1, 'msg' => '已删除！'];
			} else {
				return ['code' => 0, 'msg' => '网络好像不太好~,请重新点击'];
			}
    }

  
   public function videoaddlist(){

	   return view('admin.videoaddlist');
   }
  
   public function videolist(Request $request){
    $this->dysession();
    $subject = $request->input('subject');
    $grade = $request->input('grade');
    $res5 = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
    $role = $res5['role'];
     if($subject=='KB课程'||$subject=='Phonics自然拼读'){
        $res = VideoModel::where('video_sub',$subject)->where('video_grade',$grade)->orderBy('number','asc')->get();
    }else{
        if($role==3){
             $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
                if($res1['tzr_chun']==1){
                   $tzrchun='春';
                }else{
                    $tzrchun='';
                }
                if($res1['tzr_shu']==1){
                    $tzrshu='暑';
                }else{
                    $tzrshu='';
                }
                if($res1['tzr_qiu']==1){
                    $tzrqiu='秋';
                }else{
                    $tzrqiu='';
                }
                if($res1['tzr_han']==1){
                    $tzrhan='寒';
                }else{
                    $tzrhan='';
                }
                 $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
                 $res = VideoModel::where('video_sub',$subject)->where('video_grade',$grade)->whereIn('video_season',$arr)->orderBy('number','asc')->get();
        }else if($role==4){
            $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
                if($res1['xz_chun']==1){
                   $tzrchun='春';
                }else{
                    $tzrchun='';
                }
                if($res1['xz_shu']==1){
                    $tzrshu='暑';
                }else{
                    $tzrshu='';
                }
                if($res1['xz_qiu']==1){
                    $tzrqiu='秋';
                }else{
                    $tzrqiu='';
                }
                if($res1['xz_han']==1){
                    $tzrhan='寒';
                }else{
                    $tzrhan='';
                }
                 $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
                 $res = VideoModel::where('video_sub',$subject)->where('video_grade',$grade)->whereIn('video_season',$arr)->orderBy('number','asc')->get();
        }else{
            $res = VideoModel::where('video_sub',$subject)->where('video_grade',$grade)->orderBy('number','asc')->get();
        }
        
    }
       
	   $count=count($res);
	 if($role==3){
                 $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
                 $list=[
                  'data' => $res,
                  'count' => $count,
                  'role' => $role,
                  'subject' => $subject,
                  'grade' => $grade,
                  'souxl' => '',
                  'res1' => $res1
                   ];
             }else if($role==4){
                 $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
                 $list=[
                  'data' => $res,
                  'count' => $count,
                  'role' => $role,
                  'subject' => $subject,
                  'grade' => $grade,
                  'souxl' => '',
                  'res1' => $res1
                   ];
             }else{
                 $list=[
                  'data' => $res,
                  'count' => $count,
                  'role' => $role,
                  'subject' => $subject,
                  'grade' => $grade,
                  'souxl' => ''
                   ];
             }
   	return view('admin.videolist',$list);
   }

    public function ssvideolist(Request $request){
         $this->dysession();
        $adminseason = $request->input('adminseason');
        $adminsubject = $request->input('adminsubject');
        $admingrade = $request->input('admingrade');
        $sou = $request->input('sou');
        $res3 = ChaseaModel::where('chasea_sub',$adminsubject)->get();
        $res5 = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
        $role = $res5['role'];
        if(empty($adminseason)){
             if($role==3){
                $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
                if($res1['tzr_chun']==1){
                   $tzrchun='春';
                }else{
                    $tzrchun='';
                }
                if($res1['tzr_shu']==1){
                    $tzrshu='暑';
                }else{
                    $tzrshu='';
                }
                if($res1['tzr_qiu']==1){
                    $tzrqiu='秋';
                }else{
                    $tzrqiu='';
                }
                if($res1['tzr_han']==1){
                    $tzrhan='寒';
                }else{
                    $tzrhan='';
                }
                 $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
                 if($adminsubject=='KB课程'||$adminsubject=='Phonics自然拼读'){
                     $res = VideoModel::where('video_sub',$adminsubject)->where('video_grade',$admingrade)->where('video_title','like','%'.$sou.'%')->orderBy('number','asc')->get();
                 }else{
                    $res = VideoModel::where('video_sub',$adminsubject)->where('video_grade',$admingrade)->whereIn('video_season',$arr)->where('video_title','like','%'.$sou.'%')->orderBy('number','asc')->get();
                 }
                 
             }else if($role==4){
                  $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
                if($res1['xz_chun']==1){
                   $tzrchun='春';
                }else{
                    $tzrchun='';
                }
                if($res1['xz_shu']==1){
                    $tzrshu='暑';
                }else{
                    $tzrshu='';
                }
                if($res1['xz_qiu']==1){
                    $tzrqiu='秋';
                }else{
                    $tzrqiu='';
                }
                if($res1['xz_han']==1){
                    $tzrhan='寒';
                }else{
                    $tzrhan='';
                }
                 $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
                 if($adminsubject=='KB课程'||$adminsubject=='Phonics自然拼读'){
                     $res = VideoModel::where('video_sub',$adminsubject)->where('video_grade',$admingrade)->where('video_title','like','%'.$sou.'%')->orderBy('number','asc')->get();
                 }else{
                    $res = VideoModel::where('video_sub',$adminsubject)->where('video_grade',$admingrade)->whereIn('video_season',$arr)->where('video_title','like','%'.$sou.'%')->orderBy('number','asc')->get();
                 } 
             }else{
                $res = VideoModel::where('video_sub',$adminsubject)->where('video_grade',$admingrade)->where('video_title','like','%'.$sou.'%')->orderBy('number','asc')->get();
             }
             
        }else if(empty($sou)){
            $res = VideoModel::where('video_sub',$adminsubject)->where('video_grade',$admingrade)->where('video_season',$adminseason)->orderBy('number','asc')->get();
        }else{
            $res = VideoModel::where('video_sub',$adminsubject)->where('video_grade',$admingrade)->where('video_season',$adminseason)->where('video_title','like','%'.$sou.'%')->orderBy('number','asc')->get();
        }
         $count=count($res);
         if($role==3){
            $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
             $list=[
                  'data' => $res,
                  'count' => $count,
                  'role' => $role,
                  'subject' => $adminsubject,
                  'grade' => $admingrade,
                  'souxl' => $adminseason,
                  'res1' => $res1
                   ];
         }else if($role==4){
             $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
             $list=[
                  'data' => $res,
                  'count' => $count,
                  'role' => $role,
                  'subject' => $adminsubject,
                  'grade' => $admingrade,
                  'souxl' => $adminseason,
                  'res1' => $res1
                   ];
         }else{
             $list=[
                  'data' => $res,
                  'count' => $count,
                  'role' => $role,
                  'subject' => $adminsubject,
                  'grade' => $admingrade,
                  'souxl' => $adminseason
                   ];
         }
              
               return view('admin.videolist',$list);
    }

   public function pptlist(Request $request){
    $this->dysession();
    $res5 = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
    $role = $res5['role'];
    $subject = $request->input('subject');
    $grade = $request->input('grade');
    if($subject=='KB课程'||$subject=='Phonics自然拼读'){
         $res = PptModel::where('ppt_sub',$subject)->where('ppt_grade',$grade)->orderBy('number','asc')->get();
        }else{
            if($role==3){
            $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
                if($res1['tzr_chun']==1){
                   $tzrchun='春';
                }else{
                    $tzrchun='';
                }
                if($res1['tzr_shu']==1){
                    $tzrshu='暑';
                }else{
                    $tzrshu='';
                }
                if($res1['tzr_qiu']==1){
                    $tzrqiu='秋';
                }else{
                    $tzrqiu='';
                }
                if($res1['tzr_han']==1){
                    $tzrhan='寒';
                }else{
                    $tzrhan='';
                }
                 $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
         $res = PptModel::where('ppt_sub',$subject)->where('ppt_grade',$grade)->whereIn('ppt_season',$arr)->orderBy('number','asc')->get();
            }else if($role==4){
                 $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
                if($res1['xz_chun']==1){
                   $tzrchun='春';
                }else{
                    $tzrchun='';
                }
                if($res1['xz_shu']==1){
                    $tzrshu='暑';
                }else{
                    $tzrshu='';
                }
                if($res1['xz_qiu']==1){
                    $tzrqiu='秋';
                }else{
                    $tzrqiu='';
                }
                if($res1['xz_han']==1){
                    $tzrhan='寒';
                }else{
                    $tzrhan='';
                }
                 $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
                $res = PptModel::where('ppt_sub',$subject)->where('ppt_grade',$grade)->whereIn('ppt_season',$arr)->orderBy('number','asc')->get();
            }else{
                $res = PptModel::where('ppt_sub',$subject)->where('ppt_grade',$grade)->orderBy('number','asc')->get();
            }
           
    }

             $count=count($res);
             if($role==3){
                 $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
                 $list=[
                  'data' => $res,
                  'count' => $count,
                  'role' => $role,
                  'subject' => $subject,
                  'grade' => $grade,
                  'souxl' => '',
                  'res1' => $res1
                   ];
             }else if($role==4){
                 $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
                 $list=[
                  'data' => $res,
                  'count' => $count,
                  'role' => $role,
                  'subject' => $subject,
                  'grade' => $grade,
                  'souxl' => '',
                  'res1' => $res1
                   ];
             }else{
                 $list=[
                  'data' => $res,
                  'count' => $count,
                  'role' => $role,
                  'subject' => $subject,
                  'grade' => $grade,
                  'souxl' => ''
                   ];
             }
	          
	           return view('admin.pptlist',$list);
    }
    public function sspptlist(Request $request){
         $this->dysession();
        $adminseason = $request->input('adminseason');
        $adminsubject = $request->input('adminsubject');
        $admingrade = $request->input('admingrade');
        $sou = $request->input('sou');
        $res3 = ChaseaModel::where('chasea_sub',$adminsubject)->get();
        $res5 = AdminuserModel::where('u_id',$_SESSION["uid"])->first();
        $role = $res5['role'];
        if(empty($adminseason)){
             if($role==3){
                $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
                if($res1['tzr_chun']==1){
                   $tzrchun='春';
                }else{
                    $tzrchun='';
                }
                if($res1['tzr_shu']==1){
                    $tzrshu='暑';
                }else{
                    $tzrshu='';
                }
                if($res1['tzr_qiu']==1){
                    $tzrqiu='秋';
                }else{
                    $tzrqiu='';
                }
                if($res1['tzr_han']==1){
                    $tzrhan='寒';
                }else{
                    $tzrhan='';
                }
                 $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
                 if($adminsubject=='KB课程'||$adminsubject=='Phonics自然拼读'){
                     $res = PptModel::where('ppt_sub',$adminsubject)->where('ppt_grade',$admingrade)->where('ppt_title','like','%'.$sou.'%')->orderBy('number','asc')->get();
                 }else{
                    $res = PptModel::where('ppt_sub',$adminsubject)->where('ppt_grade',$admingrade)->whereIn('ppt_season',$arr)->where('ppt_title','like','%'.$sou.'%')->orderBy('number','asc')->get();
                 }
                 
             }else if($role==4){
                  $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
                if($res1['xz_chun']==1){
                   $tzrchun='春';
                }else{
                    $tzrchun='';
                }
                if($res1['xz_shu']==1){
                    $tzrshu='暑';
                }else{
                    $tzrshu='';
                }
                if($res1['xz_qiu']==1){
                    $tzrqiu='秋';
                }else{
                    $tzrqiu='';
                }
                if($res1['xz_han']==1){
                    $tzrhan='寒';
                }else{
                    $tzrhan='';
                }
                 $arr=array($tzrchun,$tzrshu,$tzrqiu,$tzrhan);
                 if($adminsubject=='KB课程'||$adminsubject=='Phonics自然拼读'){
                     $res = PptModel::where('ppt_sub',$adminsubject)->where('ppt_grade',$admingrade)->where('ppt_title','like','%'.$sou.'%')->orderBy('number','asc')->get();
                 }else{
                    $res = PptModel::where('ppt_sub',$adminsubject)->where('ppt_grade',$admingrade)->whereIn('ppt_season',$arr)->where('ppt_title','like','%'.$sou.'%')->orderBy('number','asc')->get();
                 } 
             }else{
                $res = PptModel::where('ppt_sub',$adminsubject)->where('ppt_grade',$admingrade)->where('ppt_title','like','%'.$sou.'%')->orderBy('number','asc')->get();
             }
             
        }else if(empty($sou)){
            $res = PptModel::where('ppt_sub',$adminsubject)->where('ppt_grade',$admingrade)->where('ppt_season',$adminseason)->orderBy('number','asc')->get();
        }else{
            $res = PptModel::where('ppt_sub',$adminsubject)->where('ppt_grade',$admingrade)->where('ppt_season',$adminseason)->where('ppt_title','like','%'.$sou.'%')->orderBy('number','asc')->get();
        }
         $count=count($res);
         if($role==3){
            $res1 = TzruserModel::where('tzr_phone',$res5['tel'])->first();
             $list=[
                  'data' => $res,
                  'count' => $count,
                  'role' => $role,
                  'subject' => $adminsubject,
                  'grade' => $admingrade,
                  'souxl' => $adminseason,
                  'res1' => $res1
                   ];
         }else if($role==4){
             $res1 = XzuserModel::where('xz_phone',$res5['tel'])->first();
             $list=[
                  'data' => $res,
                  'count' => $count,
                  'role' => $role,
                  'subject' => $adminsubject,
                  'grade' => $admingrade,
                  'souxl' => $adminseason,
                  'res1' => $res1
                   ];
         }else{
             $list=[
                  'data' => $res,
                  'count' => $count,
                  'role' => $role,
                  'subject' => $adminsubject,
                  'grade' => $admingrade,
                  'souxl' => $adminseason
                   ];
         }
              
               return view('admin.pptlist',$list);
    }
   public function videolistbox(Request $request){
    $this->dysession();
	   $video_id=$request->input('video_id');
	   $res = VideoModel::where('video_id',$video_id)->first();
	   $list = [
	   	'data' => $res
	   ];
   	return view('admin.videolistbox',$list);
   }
   public function pptlistbox(Request $request){
    $this->dysession();
	        $ppt_id=$request->input('ppt_id');
		                 $res = PptModel::where('ppt_id',$ppt_id)->first();
		                 $list = [
			                 'data' => $res
			            ];
			return view('admin.pptlistbox',$list);
		}
}
