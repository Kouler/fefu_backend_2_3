<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TheLatestNews</title>
</head>
<body>
<a href="{{ route('news_list') }}">Новости</a>
<div style="align-content: center">
    <div style="width: 80%">

        <h1 style="margin-bottom: 20px; font-size: 55px">{{$news->title}}</h1>
        <p style="font-size: 15px">{{$news->published_at}}</p>
        <p style="font-size: 35px">{{$news->text}}</p>
</div></div>
</body>
</html>

