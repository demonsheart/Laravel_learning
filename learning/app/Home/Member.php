<?php

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //定义关联的数据表 (必填)
    protected $table = 'member';
    //定义主键 (可选)
    protected $primaryKey = 'id';
    //定义禁止操作时间 (一般设置为false)
    public $timestamps = false; // 注意public
    //设置允许写入字段
    protected $fillable = ['id','name','age','email'];
    //不可以注入数据字段
    // protected $guarded = [];
}