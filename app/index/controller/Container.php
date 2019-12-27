<?php
namespace app\index\controller;
use think\View;
use app\index\controller\Comm;
use app\index\model\Student;
use app\index\model\BanJi;
use app\index\model\Studword;
use app\index\model\Teaword;
use think\facade\Db;
use think\facade\Session;

class Container extends Comm
{
    //首页
    public function index(View $view,Student $student)
    {   
        $id=$_GET['id'];
        $res=$student->db()->find($id);
        $view->assign('id',$res);
        return $view->fetch();
    }
    //个人资料
    public function person(View $view)
    {
        $id = $_GET['user'];
        $student=Db::table('student')->alias('a')->join('class b','a.classId=b.Id')->find($id);
        $view->assign('student',$student);
        return $view->fetch();
    }
    public function perupda(Student $student)
    {
        $name=$_POST['name'];
        $sex=$_POST['sex'];
        $id=$_POST['id'];
        $stud=$student->find($id);
        $stud->name=$name;
        $stud->sex=$sex;
        $stud->save();
        echo "<script>alert('更改成功');history.go(-1);</script>";
    }
    //查询浏览
    public function work(View $view)
    {   
       if(isset($_GET['user']))
       {
           $user=$_GET['user'];
           $view->assign('user',$user);
       } 
        if(isset($_GET['page']))
        {
            $page=$_GET['page'];
            
            if(isset($_GET['num']))
            {
                $num=$_GET['num'];
            }else{
                $num=1;
            }
            if($page=='-')
            {
                if($num==1)
                {
                    $page=1;
                }else{
                    $page=$num-1;
                }
            }else{
                $page=$num+1;
            }
        }else{
            $page=1;
        }
        if(isset($_GET['one']))
        {
            $page=1;
        }
        $classid=$_GET['classId'];
        $view->assign('id',$classid);
        $st = Db::table('tea_word')->where('classId',$classid)->buildSql();
        $word=Db::table('teacher')->alias('a')->join([$st=>'s'],'a.Id=s.teaId')->order('a.Id','desc')->page($page,10)->select();
        $wu=count($word);
        if($wu==0)
        {
            $page--;
            $word=Db::table('teacher')->alias('a')->join([$st=>'s'],'a.Id=s.teaId')->order('a.Id','desc')->page($page,10)->select();
        }
        $view->assign('words',$word);
        $view->assign('page',$page);
        return $view->fetch();
    }

    public function query(View $view,Teaword $teaword)
    {
        
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
        if(isset($_GET['user']))
        {
            $user=$_GET['user'];
        }
        $word=$teaword->db()->find($id);
        $view->assign('word',$word);
        $view->assign('user',$user);
        $res=Db::table('stud_word')->where('studId',$user)->where('tewId',$id)->find();
        if($res==null)
        {
            $complete='未提交';
        }else{
            $complete='已提交';
        }
        $view->assign('complete',$complete);
        return $view->fetch();
    }
    public function addtest(View $view)
    {
        $user=$_GET['user'];
        $teaword=$_GET['teaword'];
        $view->assign('user',$user);
        $view->assign('teaword',$teaword);
        $data=Db::table('stud_word')->where(['studId'=>$user,'tewId'=>$teaword])->find();
        if($data!=null)
        {
            $view->assign('data',$data);
        }else{
            $view->assign('data',$data);
        }
        return $view->fetch();
    }
    public function add(Studword $studword)
    {
        $user=$_GET['user'];
        $teaword=$_GET['teaword'];
        $name=null;
        $filename=null;
        if($_FILES['file']['error'])
        {
            $filename=null;
        }else{
            //$filename前面是路径，后面从date开始是文件名
            $name=date("YmdHis").$_FILES["file"]["name"];
            $filename = "static/file/".$name;
            if(file_exists($filename)){
                echo "上传失败";
            }else{
                move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
            }
        }   
        if(isset($_POST['content']))
        {
            $content=$_POST['content'];
        }else{
            $content=null;
        }
        $data=[
            'studId'=>$user,
            'tewId'=>$teaword,
            'content'=>$content,
            'filename'=>$name,
            'time'=>date("YmdHis")
        ];
        $res=$studword->where('studId',$user)->where('tewId',$teaword)->find();
        if($res==null)
        {
            $studword->save($data);
            echo "<script>alert('提交成功！');history.go(-3);</script>";
            
        }else{
            $studword->where('studId',$user)->where('tewId',$teaword)->save($data);
            echo "<script>alert('提交成功！');history.go(-3);</script>";
        }
        
    }
    public function download()
    {
        
        $filename=$_GET['filename'];
        // echo $filename;
        $filedir='static/file/';
        echo $filedir.$filename;
        if(!file_exists($filedir.$filename))
        {
            echo "找不到";
            exit();
        }else{
            $file=fopen($filedir.$filename,'r');
            Header('Content-type:application/octer-stream');
            Header('Accept-Ranges:bytes');
            Header('Accept-Length:'.filesize($filedir.$filename));
            Header('Content-Disposition:attachment;filename='.$filename);
            echo fread($file,filesize($filedir.$filename));
            fclose($file);
            exit();
        }
    }
    public function default(View $view)
    {
        return $view->fetch();
    }
}