<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ブログ作成ページ</h1>
        <div class="contact-form">
	<form method="" action="">
		<table>
			<tr><th>タイトル</th><td><input type="text" name="name"></td></tr>
			<tr><th>本文</th><td><textarea type="text" name="content"></textarea></td></tr>
		</table>
		<input type="submit" value="送信">
	</form>
	
	<div>
	    <a href="/">戻る</a>
	</div>
</div>
    </body>
</html>