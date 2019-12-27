<?php
namespace app\index\controller;
use app\BaseController;
use think\facade\Session;
class Comm extends BaseController
{
    public function __construct()
    {
        // $user=Session::get('user');
        if(!Session::has('user'))
        {
            echo "<script>alert('未登录')</script>";
            echo "<script>window.parent.location.href = '../../../';</script>";
        }
        
        // return redirect('https://www.baidu.com');
    }
}