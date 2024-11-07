<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSB - Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f5f5f5;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .left-side {
            flex: 1;
            background: linear-gradient(to right, #007bff, #0056b3);
            ;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            color: white;
        }

        .logo-container {
            margin-bottom: 2rem;
        }

        .logo-container img {
            max-width: 200px;
        }

        .welcome-text {
            text-align: center;
        }

        .welcome-text h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .welcome-text p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .right-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background: white;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
        }

        .form-container h2 {
            color: #1e293b;
            font-size: 2rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .input-group {
            margin-bottom: 1.5rem;
        }

        .input-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #4b5563;
            font-size: 0.9rem;
        }

        .input-group input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            outline: none;
            border-color: linear-gradient(to right, #007bff, #0056b3);
            ;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }

        .alert-danger {
            background-color: #fee2e2;
            border: 1px solid #fecaca;
            color: #dc2626;
        }

        .alert-success {
            background-color: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #16a34a;
        }

        button {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(to right, #007bff, #0056b3);
            ;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background: linear-gradient(to right, #08488d, #0056b3);
            ;
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .register-link a {
            color: #2563eb;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .left-side {
                padding: 3rem 1rem;
            }

            .right-side {
                padding: 2rem 1rem;
            }
        }

        .typing-text {
            overflow: hidden;
            white-space: nowrap;
            border-right: 3px solid white;
            animation:
                typing 3.5s steps(40, end),
                blink-caret .75s step-end infinite;
            margin: 0 auto;
            letter-spacing: 2px;
        }

        .typing-container {
            display: inline-block;
        }

        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent
            }

            50% {
                border-color: white
            }
        }

        .subtitle {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s ease forwards;
            animation-delay: 3.5s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Multiple typing effect */
        .typing-text-multiple {
            display: block;
            font-family: monospace;
            white-space: nowrap;
            border-right: 4px solid;
            width: 18ch;
            animation: typing 2s steps(18), blink .5s infinite step-end alternate;
            overflow: hidden;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .welcome-text span {
            color: white;
        }

        @keyframes typing {
            from {
                width: 0
            }
        }

        @keyframes blink {
            50% {
                border-color: transparent
            }
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .login-link a {
            color: #2563eb;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left-side">
            <div class="logo-container">
                <img src="{{ asset('assets/images/jombang-logo.png') }}" alt="Logo">
            </div>
            <div class="welcome-text">
                <div class="typing-text-multiple">
                    <span>Buat Akun Baru</span>
                </div>
                <p class="subtitle">Silakan daftar untuk memulai</p>
            </div>
        </div>

        <div class="right-side">
            <div class="form-container">
                <h2>Register</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="input-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <button type="submit">Register</button>
                </form>

                <div class="login-link">
                    <a href="{{ route('login') }}">Sudah punya akun? Login</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const texts = ['Buat Akun Baru', 'Join With Us!', 'Get Started!'];
        const typingText = document.querySelector('.typing-text-multiple span');
        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        let isPaused = false;
        let pauseEnd = 0;

        function type() {
            const currentText = texts[textIndex];
            if (!isPaused) {
                if (!isDeleting) {
                    typingText.textContent = currentText.slice(0, charIndex + 1);
                    charIndex++;
                    if (charIndex === currentText.length) {
                        isPaused = true;
                        pauseEnd = new Date().getTime() + 2000;
                        isDeleting = true;
                    }
                } else {
                    typingText.textContent = currentText.slice(0, charIndex - 1);
                    charIndex--;
                    if (charIndex === 0) {
                        isDeleting = false;
                        textIndex = (textIndex + 1) % texts.length;
                    }
                }
            } else {
                if (new Date().getTime() > pauseEnd) {
                    isPaused = false;
                }
            }

            const speedUp = isDeleting ? 30 : 100;
            const time = isDeleting ? speedUp : 120;
            setTimeout(type, time);
        }

        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(type, 1000);
        });
    </script>
</body>

</html>
