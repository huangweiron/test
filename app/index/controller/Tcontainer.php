<?php
namespace app\index\controller;
use think\View;
use app\BaseController;
use app\index\model\Teacher;
use app\index\model\Banji;
use app\index\model\Teaword;
use app\index\model\Studword;
use app\index\model\Student;
use think\facade\Session;
use think\facade\Db;
class Tcontainer extends BaseController
{
    public function index(View $view,Teacher $teacher)
    {
        $res=Session::get('user');
        $view->assign('id',$res);
        return $view->fetch();
    }
    public function person(View $view,Teacher $teacher)
    {
        $res=Session::get('user');
        $view->assign('teacher',$res);
        return $view->fetch();
    }
    public function perupda(Teacher $teacher)
    {
        $name=$_POST['name'];
        $sex=$_POST['sex'];
        $id=$_POST['id'];
        $stud=$teacher->find($id);
        $stud->name=$name;
        $stud->sex=$sex;
        $stud->save();
        echo "<script>alert('更改成功');history.go(-1);</script>";
    }
    public function curriculum(View $view){
        if(isset($_GET['ye'])){
            $page=$_GET['page'];
            if($_GET['ye']=='-')
            {
                if($page=='0'){
                    $page=1;
                }else{$page--;}
            }else{
                if($_GET['nm']<10){
                    $page=$page;
                }else{$page++;}
            }
        }else{
            $page=1;
        }
        $classId=$_GET['classId'];
        $result=Db::table('sktime')
            ->field('*,sktime.Id')
            ->alias('a')
            ->join('curriculum b','a.curriculumId=b.Id')
            ->where('classId','in',$classId)
            ->page($page,10)
            ->select();
        $nm=count($result);
        $view->assign('kc',$result);
        $view->assign('classId',$classId);
        $view->assign('page',$page);
        $view->assign('nm',$nm);
        return $view->fetch();
    }
    public function release(View $view,Teacher $teacher,Banji $banji)
    {
        $res=Session::get('user');
        $bname=$banji->where('Id','in',$res['classId'])->select()->toArray();
        $view->assign('bnames',$bname);
        return $view->fetch();
    }
    public function read(View $view,Studword $studword,Student $student)
    {
        $sktimeId=$_GET['sktimeId'];
       
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
        $sword=$studword->where('tewId',$sktimeId)->buildSql();
        $word=$student->alias('a')->join([$sword=>'s'],'a.Id=s.studId')->page($page,10)->order('s.time','desc')->select();
        if($word=='[]'){
            echo "<script>alert('该课程暂无学生提交作业');setTimeout(function(){history.go(-1)},100)</script>";
        }
        if(count($word)==0)
        {
            $page--;
            $word=$student->alias('a')->join([$sword=>'s'],'a.Id=s.studId')->order('s.time','desc')->select();
        }
        
        $view->assign('words',$word);
        $view->assign('sktimeId',$sktimeId);
        $view->assign('page',$page);
        return $view->fetch();
    }
    public function topion(){
        $topion=$_GET['topion'];
        $id=$_GET['Id'];
        Db::table('stud_word')
        ->where('Id',$id)
        ->update(['topion'=>$topion]);
        echo "<p>评价成功,稍后返回上一页</p><script>setTimeout(function(){history.go(-1)},1000)</script>";
    }
    public function addtest(View $view)
    {
        $res=Session::get('user');
        $classId=$_GET['classId'];
        $sktimeId=$_GET['sktimeId'];
        $result=Db::table('tea_word')
                ->where('classId',$classId)
                ->where('sktimeId',$sktimeId)
                ->where('teaId',$res['Id'])
                ->find();
        if($result=='[]'){
            $result['know']='';
            $result['content']='';
            $result['filename']='';
            }
        $view->assign('result',$result);
        $view->assign('classId',$classId);
        $view->assign('sktimeId',$sktimeId);
        return $view->fetch();
    }
    public function add(Teaword $teaword)
    {
        $res=Session::get('user');
        $classId=$_GET['classId'];
        $filename=null;
        $name=null;
        $sktimeId=$_GET['sktimeId'];
        if($_FILES['file']['error'])
        {
            $filename=null;
        }else{
            //$filename前面是路径，后面从date开始是文件名
            $name=date("YmdHis").$_FILES["file"]["name"];
            $filename = "static/file/".$name;
            if(file_exists($filename)){
                echo "上次失败";
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
        if(isset($_POST['know']))
        {
            $know=$_POST['know'];
        }else{
            $know=null;
        }
        $tew=Db::table('tea_word')
        ->where('teaId',$res['Id'])
        ->where('classId',$classId)
        ->where('sktimeId',$sktimeId)
        ->find();
        if($tew){
            $tew=Db::table('tea_word')
                ->where('teaId',$res['Id'])
                ->where('classId',$classId)
                ->where('sktimeId',$sktimeId)
                ->data(['know'=>$know,
                'content'=>$content,
                'filename'=>$name,
                'time'=>date("YmdHis") ])
                ->update();
        }else{
            $data=[
                'teaId'=>$res['Id'],
                'classId'=>$classId,
                'sktimeId'=>$sktimeId,
                'know'=>$know,
                'content'=>$content,
                'filename'=>$name,
                'time'=>date("YmdHis") 
            ];
            $teaword->save($data);
        }
        
        
        echo "<p>提交成功,稍后返回上一页</p><script>setTimeout(function(){history.go(-1)},1000)</script>";
    }
    
    public function download()
    {
        
        $filename=$_GET['filename'];
        // echo $filename;
        $filedir='static/file/';
        // echo $filedir.$filename;
        if(!file_exists($filedir.$filename))
        {
            echo "<script>setTimeout(function(){history.go(-1)},10)</script>";
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
    public function chakan(View $view,Studword $studword)
    {
        $id=$_GET['id'];
        $res=$studword->where('Id',$id)->find();
        if(!$res['filename']){
            $res['filename']='无文件上传';
        }
        $view->assign('word',$res);
        return $view->fetch();
    }
    public function default(View $view)
    {
        return $view->fetch();
    }
}
