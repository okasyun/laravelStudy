<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ブログ編集ページ</h1>
        
        @if (count($errors) > 0)
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red; list-style-type: none;">エラー：{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
     
    	<form action="/posts/{{$post->id}}" method="POST">
    	    @csrf
    	    <!--
    	    PUTでhttpリクエストを送る
    	    -->
    	    @method('PUT')
    		<table>
    			<tr><th>タイトル</th><td><input type="text" name="post[title]" value="{{$post->title}}"></td></tr>
    			<tr><th>本文</th><td><textarea type="text" name="post[body]" value="">{{$post->body}}</textarea></td></tr>
    		</table>
    		<input type="submit" value="送信">
    	</form>
    	
    	<div>
    	    <a href="/">戻る</a>
    	</div>
    </body>
</html>