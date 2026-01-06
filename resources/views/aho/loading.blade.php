<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analyzing...</title>
    <style>
        body {
            background-color: black;
            color: #00ff00;
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 20px;
            overflow: hidden;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        #terminal {
            white-space: pre-wrap;
            line-height: 1.5;
            font-size: 14px;
        }

        .cursor::after {
            content: '▋';
            animation: blink 1s infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }
        }

        .progress-container {
            width: 100%;
            border: 1px solid #00ff00;
            margin-top: 10px;
            height: 20px;
            display: none;
        }

        .progress-bar {
            height: 100%;
            background-color: #00ff00;
            width: 0%;
        }
    </style>
</head>

<body>
    <div id="terminal"></div>
    <div class="progress-container" id="progressContainer">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <script>
        const terminal = document.getElementById('terminal');
        const logs = [
            "Initializing neural network...",
            "Connecting to Global IQ Database...",
            "Encrypting user session...",
            " Analyzing response patterns...",
            " > Cortex activity: LOW",
            " > Logic gates: INCONSISTENT",
            " > Creative index: DETECTED",
            "Cross-referencing with primate behavioral matching...",
            "Downloading behavioral models (2.4TB)...",
            "Comparing with national average...",
            "Detecting anomaly in frontal lobe responses...",
            "Recalibrating verification algorithm...",
            "Accessing webcam for physiognomy analysis...",
            " > Face detection: ACTIVE",
            " > Expression analysis: CONFUSED",
            "Calculating final coefficient...",
            "Generating report...",
            "DONE."
        ];

        let logIndex = 0;

        function addLog() {
            if (logIndex < logs.length) {
                const p = document.createElement('div');
                p.textContent = `root@ai-core:~# ${logs[logIndex]}`;
                terminal.appendChild(p);
                window.scrollTo(0, document.body.scrollHeight);
                logIndex++;

                // Random delay between lines
                setTimeout(addLog, Math.random() * 500 + 100);
            } else {
                startProgress();
            }
        }

        function startProgress() {
            const container = document.getElementById('progressContainer');
            const bar = document.getElementById('progressBar');
            container.style.display = 'block';

            let width = 0;
            const interval = setInterval(() => {
                width += Math.random() * 5;
                if (width >= 100) {
                    width = 100;
                    clearInterval(interval);
                    setTimeout(() => {
                        window.location.href = "{{ route('aho.result') }}";
                    }, 1000);
                }
                bar.style.width = width + '%';
            }, 100);
        }

        // Start sequence
        setTimeout(addLog, 500);

    </script>
</body>

</html>