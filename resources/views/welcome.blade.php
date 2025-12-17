<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>アホ特定アプリ</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@900&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: white;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Noto Sans JP', sans-serif;
        }

        .content {
            font-weight: 900;
            font-size: 3rem;
            color: black;
        }

        .btn {
            font-weight: 900;
            font-size: 1rem;
            color: white;
        }
    </style>
</head>

<body>
    <div class="content">
        アホ特定アプリ (仮)
        <center>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <button class="btn btn-primary" type="submit">ログイン</button>
            </form>
        </center>
    </div>
</body>

</html>