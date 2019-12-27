<?php
namespace app\index\controller;
use think\View;
use app\BaseController;
use app\index\model\Student;
use app\index\model\Teacher;
use think\facade\Session;

class Index extends BaseController
{
    use \liliuwei\think\Jump;
    //学生登录界面
    public function index(View $view)
    {
        Session::clear();
        return $view->fetch();
    }
    //登录功能
    public function login(Student $student,Teacher $teacher)
    {
        $user_id=$_POST['user_id'];
        $pwd=$_POST['password'];
        $radio=$_POST['school'];
        // echo $radio;
        if($radio=='student'){    //学生登录
            if($user_id != '' && $pwd != ''){
                $res = $student->db()->where('user_id',$user_id)->find();
                if($res['user_id'] == $user_id && $res['password'] == md5($pwd)){
                    $id=$res['Id'];
                    $u='../container/index?id='.$id;
                    Session::set('user',$user_id);
                    if(Session::has('user')){
                        return $this->redirect($url=$u,$code=302);
                    }
                    
                }else{
                    echo '<script>alert("账号或密码错误！即将返回重新登录")</script>';
                    echo '<script>history.back()</script>';
                }   
            }else{
                echo '<script>alert("账号或密码不能为空！即将返回重新登录")</script>';
                echo '<script>history.back()</script>';
            }
        }else if($radio=='teacher'){ //教师登录
            if($user_id != '' && $pwd != ''){
                $res = $teacher->db()->where('user_id',$user_id)->find();
                if($res['user_id'] == $user_id && $res['password'] == md5($pwd)){
                    $id=$res['Id'];
                    $u='../tcontainer/index?id='.$id;
                    Session::set('user',$res);
                    if(Session::has('user')){
                        return $this->redirect($url=$u,$code=302);
                    }
                    
                }else{
                    echo '<script>alert("账号或密码错误！即将返回重新登录")</script>';
                    echo '<script>history.back()</script>';
                }   
            }else{
                echo '<script>alert("账号或密码不能为空！即将返回重新登录")</script>';
                echo '<script>history.back()</script>';
            }
        }
    }
    
}
