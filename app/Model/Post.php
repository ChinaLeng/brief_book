<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //可以批量添加的字段
    protected $fillable = ['title','content','user_id'];
    //不允许注入的字段
    //protected $guarded = [];
    //关联用户表
    public function user(){
        return $this->belongsTo('App\Model\User','user_id','id');
    }
}
