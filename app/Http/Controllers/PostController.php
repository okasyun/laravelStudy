<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
use App\Models\Post;



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
         //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス
        //  何でid指定のPostインスタンスを取得できるのか
        /**
         * { }内の文字とこれから実行する関数で定義しているインスタンス名を一致させることによって、
         * Laravelが自動的に、指定されたidのデータを取得してきてくれます。
         * 今回の場合だと、「 /posts/1 」というパスが指定されるとtestインスタンスに紐付いているテーブルから、
         * id=1のデータを自動的に取得してきてくれるという訳です。
         * この処理をDI（依存性の注入）と呼びます。
         */
    }
    
    public function add()
    {
        return view('posts/create');
    }
    
    public function create(Request $request) 
    {
        
    }

}
