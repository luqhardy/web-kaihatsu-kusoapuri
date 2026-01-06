<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>解析結果</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes pulse-red {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 0, 0, 0.7);
            }

            70% {
                box-shadow: 0 0 0 20px rgba(255, 0, 0, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(255, 0, 0, 0);
            }
        }

        .animate-pulse-red {
            animation: pulse-red 2s infinite;
        }
    </style>
</head>

<body class="bg-black text-red-600 min-h-screen flex flex-col items-center justify-center p-4">

    <div class="text-center mb-8 animate-pulse">
        <h1 class="text-6xl font-black mb-4">解析完了</h1>
        <p class="text-xl text-white">以下の被験者が特定されました</p>
    </div>

    <div
        class="relative rounded-xl overflow-hidden border-4 border-red-600 shadow-[0_0_50px_rgba(255,0,0,0.5)] animate-pulse-red max-w-2xl w-full aspect-video bg-gray-900">
        <!-- Camera Feed -->
        <video id="webcam" autoplay playsinline muted class="w-full h-full object-cover transform scale-x-[-1]"></video>

        <!-- Overlay -->
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
            <div class="border-2 border-red-500 w-64 h-64 rounded-full opacity-50 relative">
                <div
                    class="absolute top-0 left-1/2 -translate-x-1/2 -mt-6 bg-red-600 text-white font-bold px-4 py-1 text-xs">
                    TARGET FOUND</div>
            </div>
        </div>

        <div class="absolute bottom-4 left-4 bg-black/80 text-red-500 font-mono text-sm p-2 border border-red-500">
            ID: AHO-001<br>
            MATCH: 99.9%
        </div>
    </div>

    <div class="mt-12 text-center">
        <p class="text-white text-lg font-bold mb-2">判定結果：</p>
        <h2 class="text-8xl font-black text-red-600 mb-8 tracking-tighter">アホ</h2>

        <p class="text-gray-400 text-sm mb-8 max-w-md mx-auto">
            ※このアプリはジョークアプリです。<br>
            あなたのIQとは一切関係ありません。<br>
            カメラ映像はサーバに送信・保存されていません。
        </p>

        <a href="/"
            class="inline-block border border-white text-white font-bold py-3 px-8 rounded hover:bg-white hover:text-black transition-colors">
            トップへ戻る（賢者モード）
        </a>
    </div>

    <script>
        async function startCamera() {
            try {
                const video = document.getElementById('webcam');
                const stream = await navigator.mediaDevices.getUserMedia({ video: true });
                video.srcObject = stream;
            } catch (err) {
                console.error("Camera access denied or error:", err);
                const videoContainer = document.querySelector('video').parentElement;
                videoContainer.innerHTML = '<div class="flex items-center justify-center h-full text-white font-bold text-2xl">Camera Access Denied<br>(But you look likethis)</div>';
            }
        }

        // Start immediately
        startCamera();
    </script>
</body>

</html>