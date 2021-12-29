<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TheLatestNews</title>
</head>
<body style="background-color: #242525">
    <div style="margin: 25px 20px 20px 0px">
        <a href="{{ route('appeal') }}">Написать сообщение</a>
    </div>
    <div class="container" style="height: auto; min-height: 40px; width: 200px; margin-left: 30px">
        <h1 style="margin-bottom: 20px;">Новости</h1>

        @foreach($news as $item)
        <div style="width: 100%; height: 100%; background-color: rgba(150, 150, 150, 0.6); border-radius: 10px; padding: 3px; margin: 5px">

                <div style="width: 100%; height: 100%; margin: 3px;">
                    <p style="font-size: 13px">{{$item->published_at}}</p>
                    <h3>
                        <a href="{{ route('news_item', ['slug' => $item->slug]) }}" style="width: 100%; height: 100%">
                            {{$item->title}}</a>
                    </h3>
                    <p>{{ $item->description }}</p></div>

        </div>
        @endforeach

    @foreach($news->links()->elements[0] as $page)
    <a href="{{$page}}">{{$loop->index+1}}</a>
    @endforeach
    </div>
</body>
</html>

