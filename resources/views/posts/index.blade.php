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
                </div>
            @endforeach
        
        <div>
            <a href='/posts/create'>ブログ作成ページ</a>
        </div>
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>