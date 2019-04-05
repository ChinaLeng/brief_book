<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //可以批量添加的字段
    protected $fillable = ['title','content'];
    //不允许注入的字段
    //protected $guarded = [];
}
