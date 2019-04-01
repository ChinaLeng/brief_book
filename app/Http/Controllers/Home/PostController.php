<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Model\Post;
class PostController extends Controller
{
    //文章列表
    public function index(){
        //"select * from `posts` order by `created_at` desc"
        //$postlist = Post::latest()->get();两种写法等价
//        $postlist = Post::orderBy('created_at','desc')->get();获取所有记录
        $postlist = Post::orderBy('created_at','desc')->simplePaginate(10);
        return view('post.index',compact('postlist'));
    }
}
