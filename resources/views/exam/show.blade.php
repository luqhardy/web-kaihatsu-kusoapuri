<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITパスポート試験</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* 試験画面特有の少し古いUI感を出すためのカスタムスタイル */
        body {
            font-family: "MS PGothic", "Hiragino Kaku Gothic ProN", sans-serif;
        }

        .btn-3d {
            background-color: #f0f0f0;
            border: 1px solid #999;
            box-shadow: 2px 2px 1px #ccc;
        }

        .btn-3d:active {
            box-shadow: inset 2px 2px 1px #ccc;
        }

        .exam-border {
            border: 2px solid #5a7b9c;
            border-radius: 4px;
        }
    </style>
</head>

<body class="bg-gray-100 h-screen flex flex-col text-sm text-gray-800">

    <header class="bg-white p-2 border-b-4 border-blue-900 shadow-sm">
        <div class="bg-blue-800 text-white px-2 py-1 text-xs font-bold mb-2 flex justify-between">
            <span>ITパスポート試験</span>
            <div class="flex gap-1">
                <div class="w-3 h-3 bg-gray-300 rounded-sm"></div>
                <div class="w-3 h-3 bg-gray-300 rounded-sm"></div>
            </div>
        </div>

        <div class="flex justify-between items-center bg-[#fff8f0] border border-gray-400 p-2">
            <div class="flex gap-6 items-center font-bold">
                <div>受験番号：{{ $examinee['id'] }}</div>
                <div>氏名：{{ $examinee['name'] }}</div>
                <div class="text-xl ml-4">残り時間：{{ $examinee['remaining_time'] }}</div>
            </div>

            <div class="flex gap-2">
                <button class="btn-3d px-3 py-1 bg-white">白黒反転</button>
                <button class="btn-3d px-3 py-1 bg-white">背景色変更</button>
                <button class="btn-3d px-3 py-1 bg-white">文字色変更</button>
                <div class="flex items-center gap-1 border px-2 bg-white">
                    <span>表示倍率：</span>
                    <select class="bg-transparent">
                        <option>130%</option>
                    </select>
                </div>
                <button class="btn-3d px-3 py-1 bg-gray-200">表計算仕様</button>
                <button class="btn-3d px-3 py-1 bg-gray-200">ヘルプ</button>
                <button class="btn-3d px-3 py-1 bg-[#e0a080] font-bold border-red-300">疑似体験終了</button>
            </div>
        </div>
    </header>

    <main class="flex-grow p-4 overflow-y-auto">
        <div class="exam-border bg-white p-6 h-full shadow-md relative">

            <div class="font-bold text-lg mb-4">
                問{{ $question['id'] }} [{{ $question['category'] }}]
            </div>

            <div class="mb-8 leading-relaxed text-base">
                {{ $question['text'] }}
            </div>

            <div class="space-y-4">
                @foreach($question['options'] as $key => $option)
                    <div class="flex items-start gap-3">
                        <div class="font-bold min-w-[20px] pt-1">{{ $key }}</div>
                        <div class="leading-relaxed cursor-pointer hover:bg-blue-50 p-1 rounded">
                            {{ $option }}
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </main>

    <footer class="bg-[#f0f0f0] border-t-2 border-gray-400 p-2">
        <div class="flex justify-between items-end">

            <div class="flex flex-col w-1/4">
                <div class="bg-blue-200 border border-blue-400 text-center font-bold text-xs py-1 w-8">解答状況</div>
                <div class="border border-gray-400 bg-white h-20 overflow-y-scroll text-xs">
                    <table class="w-full text-center border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                @for($i = 1; $i <= 10; $i++)
                                <th class="border p-1">問{{ $i }}</th> @endfor
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border p-1 text-red-600 font-bold">ア</td>
                                @for($i = 2; $i <= 10; $i++)
                                <td class="border p-1"></td> @endfor
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex-grow px-8 flex flex-col items-center justify-center gap-4">
                <div
                    class="flex items-center gap-8 bg-white px-8 py-3 border border-gray-300 shadow-inner w-full justify-center">
                    <span class="font-bold mr-4">解答欄</span>
                    @foreach(['ア', 'イ', 'ウ', 'エ'] as $key)
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="answer" class="w-4 h-4 text-blue-600">
                            <span class="text-lg font-bold text-gray-600">{{ $key }}</span>
                        </label>
                    @endforeach
                </div>

                <label class="flex items-center gap-2 select-none">
                    <input type="checkbox" class="w-4 h-4">
                    <span class="text-blue-800 font-bold">■ 後で見直すためにチェックする</span>
                </label>
            </div>

            <div class="flex items-end gap-2 pb-2">
                <button class="btn-3d px-6 py-3 text-lg font-bold">&lt; 前の問へ</button>
                <button class="btn-3d px-6 py-3 text-lg font-bold">次の問へ &gt;</button>
                <div class="ml-4 flex flex-col gap-2">
                    <button class="btn-3d px-4 py-1 text-xs">解答見直し</button>
                    <button class="btn-3d px-6 py-3 bg-[#e0a080] font-bold border-red-300">試験終了</button>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>