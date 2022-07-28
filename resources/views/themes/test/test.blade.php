<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Posts</h1>

@if (count($articles))
<ul>
    @foreach ($articles as $article)
    	<li>
        <h1>{{ $article->title }}</h1>
        <p>{{ $article->short_description }}</p>
    	</li>
    @endforeach
</ul>
@endif
</body>
</html>



