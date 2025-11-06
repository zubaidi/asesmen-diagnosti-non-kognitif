<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Animated background particles */
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
        }

        .particle:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation: float 20s infinite ease-in-out;
        }

        .particle:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 70%;
            right: 10%;
            animation: float 15s infinite ease-in-out reverse;
        }

        .particle:nth-child(3) {
            width: 40px;
            height: 40px;
            bottom: 20%;
            left: 20%;
            animation: float 25s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) translateX(0);
            }
            33% {
                transform: translateY(-30px) translateX(20px);
            }
            66% {
                transform: translateY(30px) translateX(-20px);
            }
        }

        /* Main content wrapper */
        .content {
            text-align: center;
            color: white;
            max-width: 600px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Logo */
        .logo {
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 40px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
            background: rgba(255, 255, 255, 0.25);
        }

        .logo svg {
            width: 80px;
            height: 80px;
            fill: white;
        }

        /* Error code */
        .error-code {
            font-size: 120px;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 20px;
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            letter-spacing: -10px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        /* Error message */
        .error-message {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 20px;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Error description */
        .error-description {
            font-size: 18px;
            margin-bottom: 40px;
            opacity: 0.9;
            line-height: 1.6;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        /* Button */
        .btn {
            display: inline-block;
            padding: 16px 45px;
            background: white;
            color: #667eea;
            text-decoration: none;
            border-radius: 30px;
            font-size: 18px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.95);
        }

        .btn:active {
            transform: translateY(-1px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .error-code {
                font-size: 90px;
                letter-spacing: -5px;
            }

            .error-message {
                font-size: 28px;
            }

            .error-description {
                font-size: 12px;
            }

            .logo {
                width: 50px;
                height: 50px;
            }

            .logo svg {
                width: 60px;
                height: 60px;
            }

            .btn {
                padding: 14px 35px;
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .error-code {
                font-size: 70px;
            }

            .error-message {
                font-size: 24px;
            }

            .error-description {
                font-size: 15px;
                margin-bottom: 30px;
            }

            .logo {
                width: 50px;
                height: 50px;
                margin-bottom: 30px;
            }

            .logo svg {
                width: 50px;
                height: 50px;
            }
        }
    </style>
</head>
<body>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="content">
        <div class="logo">
            <img src="{{ asset('assets/images/sa.png') }}" alt="">
        </div>
        <div class="error-code">404</div>
        <h1 class="error-message">Halaman Tidak Ditemukan</h1>
        <a href="/" class="btn">Kembali ke Beranda</a>
    </div>
</body>
</html>
