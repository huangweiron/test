<?php
namespace app\index\model;
use think\Model;
class BanJi extends Model
{
    protected $table='class';
    protected $pk='Id';
    public function studs()
    {
        return $this->hasMany('Student','classId');
    }
    // public function tea()
    // {
    //     return $this->hasMany('Teacher','classId');
    // }
}