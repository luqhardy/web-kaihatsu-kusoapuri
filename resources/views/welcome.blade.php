<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>アホ特定アプリ</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white flex flex-col justify-center items-center h-screen font-noto">
    <div class="font-black text-5xl text-black mb-8">
        アホ特定アプリ (仮)
    </div>
    <div class="flex gap-4">
        @auth
            <button onclick="location.href='/quiz'"
                class="font-black text-base text-white bg-black border-none px-6 py-3 rounded hover:opacity-80 transition-opacity cursor-pointer">
                スタート
            </button>
            <button onclick="location.href='/logout'"
                class="font-black text-base text-white bg-black border-none px-6 py-3 rounded hover:opacity-80 transition-opacity cursor-pointer">
                ログアウト
            </button>
        @else
            <button onclick="location.href='/login'"
                class="font-black text-base text-white bg-black border-none px-6 py-3 rounded hover:opacity-80 transition-opacity cursor-pointer">
                ログイン
            </button>
            <button onclick="location.href='/register'"
                class="font-black text-base text-white bg-black border-none px-6 py-3 rounded hover:opacity-80 transition-opacity cursor-pointer">
                新規登録
            </button>
        @endauth
    </div>
</body>

</html>