<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ測定試験</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Hiragino Kaku Gothic ProN", sans-serif;
        }

        .mono {
            font-family: 'Roboto Mono', monospace;
        }
    </style>
</head>

<body class="bg-gray-900 text-white min-h-screen flex flex-col items-center justify-center p-4">

    <div class="max-w-xl w-full bg-gray-800 rounded-lg shadow-2xl p-8 border border-gray-700">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-400 mb-2">IQ測定試験</h1>
            <p class="text-gray-400 text-xs mono">Ver. 2.0.4 - AI PROCTOR ENABLED</p>
        </div>

        <div class="mb-8 space-y-4 text-sm leading-relaxed text-gray-300">
            <p>
                本試験は、あなたの論理的思考力、空間認識能力、および言語能力を測定するための簡易テストです。
            </p>
            <div class="bg-red-900/30 border border-red-500/50 p-4 rounded text-red-200 text-xs">
                <p class="font-bold mb-2">【重要：不正防止システムについて】</p>
                <p>
                    正確なIQ測定を行うため、本試験ではAIによる不正防止監視システム（Webカメラ）が常時作動します。
                    カメラの使用を許可しない場合、試験を開始することはできません。
                </p>
            </div>
            <p>
                試験は前半10問、後半10問の計20問で構成されています。直感で素早くお答えください。
            </p>
        </div>

        <form action="{{ route('aho.start') }}" method="POST" id="startForm">
            @csrf
            <button type="button" onclick="requestCameraAndStart()"
                class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded transition-all shadow-lg transform hover:scale-[1.02]">
                同意して試験を開始する
            </button>
        </form>
    </div>

    <script>
        async function requestCameraAndStart() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: true });
                // Stop the stream immediately, we just wanted permission
                stream.getTracks().forEach(track => track.stop());

                // Permission granted, submit form
                document.getElementById('startForm').submit();
            } catch (err) {
                alert('カメラの使用が許可されませんでした。試験を開始するにはカメラの使用を許可してください。');
                console.error("Error accessing camera: ", err);
            }
        }
    </script>
</body>

</html>