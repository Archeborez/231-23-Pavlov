<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Форма регистрации и авторизации</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #45a049;
            --accent-color: #FF6B6B;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--dark-color);
        }
        
        .container {
            max-width: 900px;
            width: 100%;
            margin: 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
            z-index: 1;
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color), #FFD166, #06D6A0);
            z-index: 2;
        }
        
        .form-section {
            padding: 40px;
            position: relative;
        }
        
        .form-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(0,0,0,0.1), transparent);
        }
        
        .password-container {
            position: relative;
            margin-bottom: 20px;
        }
        
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--dark-color);
            opacity: 0.6;
            transition: var(--transition);
        }
        
        .toggle-password:hover {
            opacity: 1;
            color: var(--primary-color);
        }
        
        form {
            max-width: 400px;
            margin: 30px auto;
            padding: 30px;
            border-radius: 10px;
            background-color: white;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            transition: var(--transition);
        }
        
        form:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }
        
        form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--accent-color));
        }
        
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 16px;
            transition: var(--transition);
            background-color: #f8f9fa;
        }
        
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
            outline: none;
            background-color: white;
        }
        
        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            margin-top: 15px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }
        
        button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }
        
        button:active::after {
            animation: ripple 0.6s ease-out;
        }
        
        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 1;
            }
            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }
        
        label {
            display: block;
            margin: 15px 0;
            position: relative;
            padding-left: 30px;
            cursor: pointer;
        }
        
        input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }
        
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: var(--transition);
        }
        
        label:hover .checkmark {
            background-color: #e9ecef;
        }
        
        input:checked ~ .checkmark {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .checkmark::after {
            content: "";
            position: absolute;
            display: none;
            left: 7px;
            top: 3px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        
        input:checked ~ .checkmark::after {
            display: block;
        }
        
        h2 {
            color: var(--dark-color);
            text-align: center;
            margin-bottom: 25px;
            position: relative;
            font-size: 28px;
        }
        
        h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border-radius: 3px;
        }
        
        .server-info {
            margin-top: 30px;
            padding: 20px;
            background-color: #e9f7ef;
            border-radius: 8px;
            text-align: center;
            border-left: 4px solid var(--primary-color);
        }
        
        .switch-form {
            text-align: center;
            margin-top: 20px;
            font-size: 15px;
        }
        
        .switch-form a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            position: relative;
        }
        
        .switch-form a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: var(--transition);
        }
        
        .switch-form a:hover::after {
            width: 100%;
        }
        
        .floating-icons {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        
        .floating-icons i {
            position: absolute;
            color: rgba(76, 175, 80, 0.1);
            font-size: 24px;
            animation: float 15s linear infinite;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }
        
        .social-login {
            margin-top: 20px;
            text-align: center;
        }
        
        .social-login p {
            position: relative;
            margin-bottom: 20px;
            color: #6c757d;
        }
        
        .social-login p::before,
        .social-login p::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(0,0,0,0.1));
        }
        
        .social-login p::before {
            left: 0;
        }
        
        .social-login p::after {
            right: 0;
        }
        
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            transition: var(--transition);
            box-shadow: var(--shadow);
        }
        
        .social-icon:hover {
            transform: translateY(-3px);
        }
        
        .facebook {
            background-color: #3b5998;
        }
        
        .google {
            background-color: #db4437;
        }
        
        .twitter {
            background-color: #1da1f2;
        }
        
        .tooltip {
            position: relative;
            display: inline-block;
        }
        
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 200px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -100px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }
        
        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
        
        @media (max-width: 768px) {
            .container {
                margin: 10px;
            }
            
            .form-section {
                padding: 20px;
            }
            
            form {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="floating-icons">
            <i class="fas fa-leaf" style="left: 10%; animation-delay: 0s;"></i>
            <i class="fas fa-user" style="left: 20%; animation-delay: 2s;"></i>
            <i class="fas fa-lock" style="left: 30%; animation-delay: 4s;"></i>
            <i class="fas fa-envelope" style="left: 40%; animation-delay: 6s;"></i>
            <i class="fas fa-key" style="left: 50%; animation-delay: 8s;"></i>
            <i class="fas fa-shield-alt" style="left: 60%; animation-delay: 10s;"></i>
            <i class="fas fa-check-circle" style="left: 70%; animation-delay: 12s;"></i>
            <i class="fas fa-star" style="left: 80%; animation-delay: 14s;"></i>
        </div>
        
        <div class="form-section">
            <h2>Регистрация</h2>
            <form action="register.php" method="post">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?? ''; ?>">
                <div class="tooltip">
                    <input type="text" placeholder="Логин (2-32 символа)" name="login" pattern="[a-zA-Z0-9]{2,32}" required>
                    <span class="tooltiptext">Логин должен содержать только латинские буквы и цифры</span>
                </div>
                
                <div class="password-container">
                    <input type="password" placeholder="Пароль" name="pass" required>
                    <span class="toggle-password" onclick="togglePassword(this)"><i class="fas fa-eye"></i></span>
                </div>
                
                <input type="password" placeholder="Повторите пароль" name="repeatpass" required>
                <input type="email" placeholder="Email" name="email" required>
                
                <label>
                    <input type="checkbox" name="agreement" required>
                    <span class="checkmark"></span>
                    Я принимаю пользовательское соглашение
                </label>
                
                <button type="submit">
                    <i class="fas fa-user-plus" style="margin-right: 8px;"></i>Зарегистрироваться
                </button>
                
                <div class="social-login">
                    <p>Или зарегистрируйтесь через</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon google"><i class="fab fa-google"></i></a>
                        <a href="#" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                
                <div class="switch-form">
                    Уже есть аккаунт? <a href="login.php">Войти</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(element) {
            const passwordInput = element.previousElementSibling;
            const icon = element.querySelector('i');
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
        
        // Создаем плавающие иконки
        document.addEventListener('DOMContentLoaded', function() {
            const floatingIcons = document.querySelector('.floating-icons');
            const icons = ['leaf', 'user', 'lock', 'envelope', 'key', 'shield-alt', 'check-circle', 'star'];
            
            for (let i = 0; i < 15; i++) {
                const icon = document.createElement('i');
                icon.className = 'fas fa-' + icons[Math.floor(Math.random() * icons.length)];
                icon.style.left = Math.random() * 100 + '%';
                icon.style.top = Math.random() * 100 + '%';
                icon.style.fontSize = (Math.random() * 20 + 10) + 'px';
                icon.style.animationDuration = (Math.random() * 20 + 10) + 's';
                icon.style.animationDelay = (Math.random() * 5) + 's';
                floatingIcons.appendChild(icon);
            }
        });
    </script>
</body>
</html>