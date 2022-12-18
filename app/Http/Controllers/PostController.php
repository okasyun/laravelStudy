<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
use App\Models\Post;

use Illuminate\Support\Facades\Log;

// 追記
use App\Http\Requests\PostRequest;

use App\Models\Category;

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
        // dd('Hello world'); 
        // dd($post->get());
        
        // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();
        
        // GET通信するURL
        $url = 'https://teratail.com/api/v1/questions';
        
        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.teratail.token')]
            );
        
        // API通信で取得したデータはjson形式なので
        // PHPファイルに対応した連想配列にデコードする
        $questions = json_decode($response->getBody(), true);
        
        // index blade に取得したデータを渡す
        // 配列なので複数データをviewに渡せる
        return view('posts/index')->with([
            'posts' => $post->getPaginateByLimit(), 
            'questions' => $questions['questions'],
        ]);//$postの中身を戻り値にする。
        //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create(Category $category)
    {
        
        // Post::with('categories')
        return view('posts/create')->with(['categories' =>$category->get()]);
    }
    
    // なぜPost $postを引数にするのか
    // public function store(Request $request) 
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        
        // idはデータベース上で自動で割り振られる
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Request $request, Post $post)
    {
        // Post::find($request->id);
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        // 引数の＄postインスタンスで指定のidのデータを取得している
        // $post = Post::find($request->id);
        $input_post = $request['post'];
        unset($input_post['_token']);
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Request $request, Post $post )
    {
        
        $post->delete();
        
        return redirect('/');
    }
    
    public function test(Request $request, $data)
    {
        return view('posts/test', ['okamoto' => $data]);
    }
    
    

}