<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>アホ特定アプリ</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 flex flex-col justify-center items-center min-h-screen font-noto text-gray-800 p-4">
    <div class="text-center mb-12">
        <h1 class="font-black text-6xl mb-4 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">
            アホ特定アプリ
        </h1>
        <p class="text-xl text-gray-600 font-bold">
            (仮)
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl w-full">
        <!-- Main Actions -->
        <div
            class="bg-white p-8 rounded-2xl shadow-xl flex flex-col items-center gap-4 transition-transform hover:scale-[1.02]">
            <h2 class="font-bold text-2xl mb-4 text-gray-800 border-b-2 border-gray-100 pb-2 w-full text-center">メインメニュー
            </h2>
            @auth
                <div class="text-center mb-4 w-full bg-gray-50 p-3 rounded-lg">
                    <p class="text-gray-600 text-sm">ログイン中</p>
                    <p class="font-bold text-lg text-gray-800">{{ Auth::user()->name }}</p>
                </div>
                <a href="/quiz"
                    class="block w-full text-center font-bold text-white bg-black hover:bg-gray-800 py-4 rounded-lg transition-all shadow-md">
                    クイズスタート
                </a>

                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit"
                        class="block w-full text-center font-bold text-gray-600 border border-gray-300 hover:bg-gray-100 py-3 rounded-lg transition-colors mt-2">
                        ログアウト
                    </button>
                </form>
            @else
                <p class="text-gray-500 mb-2">まずはログインしてください</p>
                <a href="/login"
                    class="block w-full text-center font-bold text-white bg-black hover:bg-gray-800 py-4 rounded-lg transition-all shadow-md">
                    ログイン
                </a>
                <a href="/register"
                    class="block w-full text-center font-bold text-gray-800 border-2 border-black hover:bg-gray-50 py-4 rounded-lg transition-colors">
                    新規登録
                </a>
            @endauth
        </div>

        <!-- New Feature -->
        <div
            class="bg-white p-8 rounded-2xl shadow-xl flex flex-col items-center justify-between gap-4 border-t-4 border-blue-600 relative overflow-hidden transition-transform hover:scale-[1.02]">
            <div class="absolute -right-6 -top-6 bg-red-500 text-white font-bold px-8 py-1 rotate-45 shadow-sm text-sm">
                NEW</div>

            <div class="w-full text-center">
                <h2 class="font-bold text-2xl mb-2 text-blue-900">新機能リリース</h2>
                <p class="text-gray-500 text-sm">あのCBT方式の緊張感をブラウザで。</p>
            </div>

            <div class="my-4 text-6xl text-center">
                🖥️
            </div>

            <a href="{{ route('exam.show') }}"
                class="block w-full text-center font-bold text-white bg-blue-600 hover:bg-blue-700 py-4 rounded-lg shadow-md hover:shadow-lg transition-all transform hover:-translate-y-1">
                ITパスポート試験 (疑似)
            </a>
        </div>

        <!-- Aho App -->
        <div
            class="bg-gray-900 text-white p-8 rounded-2xl shadow-xl flex flex-col items-center justify-between gap-4 border-t-4 border-red-600 relative overflow-hidden transition-transform hover:scale-[1.02]">
            <div class="w-full text-center">
                <h2 class="font-bold text-2xl mb-2 text-red-500">IQ精密検査</h2>
                <p class="text-gray-400 text-sm">AIがあなたの知能指数を正確に測定します。<br>※カメラ必須</p>
            </div>

            <div class="my-4 text-6xl text-center animate-pulse">
                🧠
            </div>

            <a href="{{ route('aho.index') }}"
                class="block w-full text-center font-bold text-white bg-red-600 hover:bg-red-700 py-4 rounded-lg shadow-md hover:shadow-lg transition-all transform hover:-translate-y-1">
                測定開始
            </a>
        </div>
    </div>

    <footer class="mt-16 text-gray-400 text-sm font-bold">
        &copy; 2026 Web Kaihatsu Kuso App Project
    </footer>
</body>

</html>