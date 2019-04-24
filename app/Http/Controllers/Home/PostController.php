<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Model\Post;
use Validator;
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
    //文章详情页面
    public function show($id){
        $post = Post::find($id);
        if($post == null){
            abort(404);
        }
        return view('post.show',compact('post'));
    }
    //添加文章
    public function create(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->input(),[
                'title'    => 'required|min:3|max:100',
                'content'  => 'required'
            ],[
                'required' => ':attribute 为必填项',
                'min'      => ':attribute 最小为三位',
                'max'      => ':attribute 最大为一百位',
            ],[
                'title'    => '标题',
                'content'  => '内容'
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
/*            dump($request->except('_token'));
            dump($request->input());
            dd(request(['title','content']));*/
            if(Post::create(request(['title','content']))){
                return redirect('/')->with('create','发布成功');
            }else{
                return redirect()->back()->withErrors('网络错误请稍后再试~')->withInput();
            }
        }
        return view('post.create');
    }

    /**
     * 文章编辑展示
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $post = Post::find($id);
        if($post == null){
            abort(404);
        }
        return view('post.edit',compact('post'));
    }
    public function update(Request $request){
        $validator = Validator::make($request->input(),[
            'title'    => 'required|min:3|max:100',
            'content'  => 'required'
        ],[
            'required' => ':attribute 为必填项',
            'min'      => ':attribute 最小为三位',
            'max'      => ':attribute 最大为一百位',
        ],[
            'title'    => '标题',
            'content'  => '内容'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $post = new Post();
        $post_id = (int)$request->input('id');
        $info = $post->where('id',$post_id)->update(request(['title','content']));
        if($info){
            return redirect("/posts/{$post_id}")->with('create','编辑成功');
        }else{
            return redirect()->back()->withErrors('网络错误请稍后再试~')->withInput();
        }
//        dd($request->input());
    }
}
