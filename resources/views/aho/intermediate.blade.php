<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>中間結果 - IQ測定試験</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 min-h-screen flex flex-col items-center justify-center p-4 font-sans">

    <div class="max-w-md w-full bg-white rounded-xl shadow-xl overflow-hidden text-center">
        <div class="bg-blue-600 p-4">
            <h1 class="text-white font-bold text-xl">Part 1 解析完了</h1>
        </div>

        <div class="p-8">
            <p class="text-gray-500 mb-2">正答数</p>
            <div class="text-5xl font-bold text-gray-800 mb-6">
                {{ $score }}/10
            </div>

            <div class="bg-blue-50 p-4 rounded-lg mb-8">
                <p class="text-sm text-blue-800 font-bold mb-1">【暫定IQ測定値】</p>
                <p class="text-3xl font-mono text-blue-600">
                    @if($score >= 10)
                        115 - 125
                    @elseif($score >= 8)
                        105 - 115
                    @elseif($score >= 5)
                        95 - 105
                    @else
                        測定不能
                    @endif
                </p>
                <p class="text-xs text-blue-400 mt-2">※Part 2の結果と統合して確定します</p>
            </div>

            <p class="text-gray-600 text-sm mb-6 leading-relaxed">
                後半戦（残り10問）を開始します。<br>
                深層学習AIがあなたの思考パターンをより深く分析します。
            </p>

            <a href="{{ route('aho.quiz', ['part' => 2]) }}"
                class="block w-full bg-black hover:bg-gray-800 text-white font-bold py-4 rounded-lg transition-colors shadow-md">
                Part 2 へ進む
            </a>
        </div>
    </div>

</body>

</html>