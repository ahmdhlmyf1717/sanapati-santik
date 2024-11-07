<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> <!-- Tambahkan style sesuai kebutuhan -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .error-container {
            text-align: center;
            animation: fadeIn 1.2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .error-code {
            font-size: 200px;
            font-weight: 600;
            color: #11158d;
            text-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
            letter-spacing: -10px;
        }

        .error-message {
            font-size: 24px;
            color: #555;
            margin-bottom: 20px;
        }

        .error-description {
            font-size: 16px;
            color: #777;
            margin-bottom: 30px;
        }

        .btn-dashboard {
            padding: 12px 25px;
            background-color: #3164ff;
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 18px;
            text-transform: uppercase;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 5px 15px rgba(24, 22, 172, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-dashboard:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(13, 67, 193, 0.5);
        }

        .background-circle {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(107, 240, 255, 0.1);
            animation: float 6s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .circle1 {
            width: 400px;
            height: 400px;
            top: -100px;
            left: -150px;
        }

        .circle2 {
            width: 300px;
            height: 300px;
            bottom: -120px;
            right: -100px;
        }

        .circle3 {
            width: 500px;
            height: 500px;
            bottom: 50%;
            left: 50%;
            transform: translate(-50%, 50%);
            background-color: rgba(20, 155, 246, 0.2);
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 150px;
            }

            .error-message {
                font-size: 20px;
            }

            .btn-dashboard {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="background-circle circle1"></div>
    <div class="background-circle circle2"></div>
    <div class="background-circle circle3"></div>

    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-message">Oops! Mau kemana sih? Halaman yang Anda cari loh tidak ditemukan.</div>
        <div class="error-description">.
        </div>
        <a href="{{ route('dashboard') }}" class="btn-dashboard">Kembali ke Dashboard</a>
    </div>

</body>

</html>
