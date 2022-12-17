<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ブログ一覧</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                    <p class='body'>{{ $post->body }}</p>
                    <a href="">{{$post->category->name}}</a>
                    <!-- 以下を追記 -->
                    <form action="/posts/{{$post->id}}" id="form_{{$post->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{$post->id}})">削除</button>
                    </form>
                </div>
            @endforeach
        
        <div>
            <a href='/posts/create'>ブログ作成ページ</a>
        </div>
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <div>
            <p>認証ユーザ</p>
            <p>{{Auth::user()->name}}</p>
        </div>
        <script>
            function deletePost(id)
            {
                'use strict'
                
                if (confirm('削除すると復元できません\n本当に削除しますか？'))
                {
                    // フォームを送信
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>