<!DOCTYPE html>
<html lang="ru" data-theme="<?php echo isset($_SESSION['theme']) ? $_SESSION['theme'] : 'light'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контейнир</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4CAF50;
            --primary-hover: #45a049;
            --text-color: #333;
            --bg-color: #f5f5f5;
            --card-bg: #fff;
            --shadow: 0 4px 6px rgba(0,0,0,0.1);
            --border-radius: 8px;
        }

        [data-theme="dark"] {
            --primary-color: #2ECC71;
            --primary-hover: #27AE60;
            --text-color: #f0f0f0;
            --bg-color: #121212;
            --card-bg: #1e1e1e;
            --shadow: 0 4px 6px rgba(0,0,0,0.3);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: var(--bg-color);
            color: var(--text-color);
            text-align: center;
            transition: all 0.3s ease;
            background-image: radial-gradient(circle at 10% 20%, rgba(76, 175, 80, 0.1) 0%, transparent 20%);
        }
        
        h1 {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        
        p {
            font-size: 1.3rem;
            color: var(--text-color);
            margin-bottom: 40px;
            max-width: 600px;
            line-height: 1.6;
        }
        
        .button {
            display: inline-block;
            padding: 15px 40px;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }
        
        .button:hover {
            background-color: var(--primary-hover);
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        .button:active {
            transform: translateY(0);
        }

        .button::after {
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

        .button:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }

        .decoration {
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(76, 175, 80, 0.1);
            z-index: -1;
        }

        .decoration:nth-child(1) {
            top: 10%;
            left: 10%;
            width: 200px;
            height: 200px;
        }

        .decoration:nth-child(2) {
            bottom: 20%;
            right: 15%;
            width: 150px;
            height: 150px;
        }

        .decoration:nth-child(3) {
            top: 30%;
            right: 20%;
            width: 100px;
            height: 100px;
        }

        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--card-bg);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: var(--shadow);
            color: var(--text-color);
            z-index: 1000;
        }

        .logo {
            font-size: 2.5rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo i {
            margin-right: 15px;
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <button class="theme-toggle" id="themeToggle">
        <i class="fas fa-moon"></i>
    </button>

    <div class="decoration"></div>
    <div class="decoration"></div>
    <div class="decoration"></div>

    <div class="logo">
        <i class="fas fa-recycle"></i>
        <h1>Контейнир</h1>
    </div>
    <p>Меняйся. Покупай. Экономь. Дари вещам вторую жизнь!</p>
    <a href="glavnaya.php" class="button">Начать</a>

    <script>
        // Переключение темы
        document.getElementById('themeToggle').addEventListener('click', function() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', newTheme);
            
            // Сохраняем тему в сессии через AJAX
            fetch('set_theme.php?theme=' + newTheme)
                .then(response => response.text())
                .then(data => {
                    // Обновляем иконку
                    const icon = this.querySelector('i');
                    icon.className = newTheme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
                });
        });

        // Устанавливаем правильную иконку при загрузке
        document.addEventListener('DOMContentLoaded', function() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const icon = document.getElementById('themeToggle').querySelector('i');
            icon.className = currentTheme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
        });
    </script>
</body>
</html>