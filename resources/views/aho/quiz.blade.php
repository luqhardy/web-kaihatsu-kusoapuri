<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ測定試験 - Part {{ $part }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: "Hiragino Kaku Gothic ProN", sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen pb-20">

    <header class="bg-gray-800 text-white p-4 sticky top-0 z-50 shadow-md">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <h1 class="font-bold text-lg">IQ測定試験 <span class="text-blue-400">Part {{ $part }}</span></h1>
            <div class="text-xl font-mono font-bold text-red-400" id="timer">03:00</div>
        </div>
    </header>

    <main class="max-w-3xl mx-auto p-4">
        <form action="{{ route('aho.store', ['part' => $part]) }}" method="POST">
            @csrf

            <div class="space-y-6">
                @foreach($questions as $index => $question)
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                        <div class="flex items-start gap-4 mb-4">
                            <span
                                class="bg-gray-800 text-white px-3 py-1 rounded text-sm font-bold shrink-0">Q{{ $index + 1 }}</span>
                            <h2 class="text-lg font-bold text-gray-800">{{ $question->text }}</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 pl-0 md:pl-12">
                            @foreach($question->options as $option)
                                <label
                                    class="flex items-center p-3 border rounded hover:bg-blue-50 cursor-pointer transition-colors group">
                                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}"
                                        class="w-4 h-4 text-blue-600 focus:ring-blue-500" required>
                                    <span class="ml-3 text-gray-700 group-hover:text-blue-800">{{ $option }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 text-center">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-12 rounded-full shadow-lg transform transition hover:-translate-y-1 text-lg">
                    回答を送信して次へ
                </button>
            </div>
        </form>
    </main>

    <script>
        // Fake timer
        let timeLeft = 180; // 3 minutes
        const timerEl = document.getElementById('timer');

        const interval = setInterval(() => {
            timeLeft--;
            const mins = Math.floor(timeLeft / 60).toString().padStart(2, '0');
            const secs = (timeLeft % 60).toString().padStart(2, '0');
            timerEl.textContent = `${mins}:${secs}`;

            if (timeLeft <= 0) {
                clearInterval(interval);
                alert('時間切れです。');
                document.querySelector('form').submit();
            }
        }, 1000);
    </script>
</body>

</html>