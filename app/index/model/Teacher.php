<?php
namespace app\index\model;
use think\Model;
class Teacher extends Model
{
    protected $table='teacher';
    protected $pk='Id';
    public function teaer()
    {
        return $this->hasOne('tea_word','classid');
    }
}