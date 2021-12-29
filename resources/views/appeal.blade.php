<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Отправить сообщение</title>
</head>
<body style="background-color: #242525">

    <style type="text/css">
        .my-input {
            width: 100%;
            margin-bottom: 10px;
        }

        form div label {
            font-size: 20px;
            color: #080;
        }

        form div input {
            border-radius: 5px;
        }

        form div textarea {
            border-radius: 5px;
        }
    </style>

    <div style="margin: 25px">
        <a href="{{ route('news_list') }}">Новости</a>
    </div>

    <div class="form-group" style="margin-top: 50px; width: 50%; margin-left: auto; margin-right: auto">
        <h2 style="width: 100%; text-align: center">Отправить сообщение</h2>

        @if(session()->has('message'))
            <div name="successes" class="alert alert-success">
            <h6 style="text-align: center">{{ session()->get('message') }}</h6>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger" style="width: 100%">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('appeal') }}" method="post" class="container" style="width: 450px;">
        @csrf
            <div class="form-group">
                <label for="name">Введите имя</label>
                <input value="{{ old('name') }}" placeholder="Введите имя" type="text" class="my-input form-control" name="name" id="name">
            </div>

            <div class="form-group">
                <label for="phone">Введите номер телефона</label>
                <input value="{{ old('phone') }}" placeholder="Введите номер телефона" type="text" class="my-input form-control" name="phone" id="phone">
            </div>

            <div class="form-group">
                <label for="email">Введите ваш email</label>
                <input value="{{ old('email') }}" placeholder="Введите ваш email" type="email" class="my-input form-control" name="email" id="email">
            </div>

            <div class="form-group">
                <label for="message">Введите текст сообщения</label>
                <textarea placeholder="Введите текст сообщения" name="message" id="message" class="my-input form-control" rows="5" maxlength="100" style="resize: none">{{ old('message') }}</textarea>
            </div>

            <input type="submit" name="submit" text="Отправить" class="btn btn-success">
        </form>
    </div>
</body>
</html>
