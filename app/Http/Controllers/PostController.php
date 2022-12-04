<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
use App\Models\Post;

use Illuminate\Support\Facades\Log;

// 追記
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Post一覧を表示する
     * 
     * @param Post Postモデル
     * @return array Postモデルリスト
     */
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);//$postの中身を戻り値にする。
        //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts/create');
    }
    
    // なぜPost $postを引数にするのか
    // public function store(Request $request) 
    public function store(PostRequest $request, Post $post)
    {
        
        // $post = new Post();
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->save();
        
        $input = $request['post'];
        $post->fill($input)->save();
        
        // idはデータベース上で自動で割り振られる
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Request $request, Post $post)
    {
        $post = Post::find($request->id);
        return view('posts/edit')->with(['post' => $post]);
    }

}