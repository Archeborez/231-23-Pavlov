<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="ru" data-theme="<?php echo $_SESSION['theme']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная - Контейнир</title>
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
            --nav-bg: #fff;
            --border-color: #e0e0e0;
        }

        [data-theme="dark"] {
            --primary-color: #2ECC71;
            --primary-hover: #27AE60;
            --text-color: #f0f0f0;
            --bg-color: #121212;
            --card-bg: #1e1e1e;
            --shadow: 0 4px 6px rgba(0,0,0,0.3);
            --nav-bg: #1a1a1a;
            --border-color: #333;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: background-color 0.3s, color 0.3s;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
        }
        
        header {
            background-color: var(--nav-bg);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }
        
        nav h2 {
            font-size: 1.8rem;
            color: var(--primary-color);
            display: flex;
            align-items: center;
        }
        
        nav h2 i {
            margin-right: 10px;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin-left: 25px;
            position: relative;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 500;
            padding: 5px 0;
            position: relative;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: width 0.3s ease;
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .nav-links a:hover {
            color: var(--primary-color);
        }
        
        .active-link {
            color: var(--primary-color) !important;
            font-weight: bold;
        }
        
        .active-link::after {
            width: 100% !important;
        }
        
        .hero {
            height: 500px;
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.8), rgba(46, 204, 113, 0.8)), url('https://images.unsplash.com/photo-1528323273322-d81458248d40?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            margin-bottom: 50px;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
        }
        
        .hero p {
            font-size: 1.3rem;
            margin-bottom: 30px;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: white;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .feature-card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 30px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
            border: 1px solid var(--border-color);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
        }
        
        .feature-card i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        
        .feature-card p {
            color: var(--text-color);
            opacity: 0.8;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        .section-title p {
            max-width: 700px;
            margin: 0 auto;
            color: var(--text-color);
            opacity: 0.8;
        }
        
        .theme-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: var(--card-bg);
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: var(--shadow);
            color: var(--text-color);
            z-index: 1000;
        }
        
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        
        .shape {
            position: absolute;
            opacity: 0.1;
            border-radius: 50%;
        }
        
        .shape-1 {
            width: 300px;
            height: 300px;
            background-color: var(--primary-color);
            top: -100px;
            right: -100px;
        }
        
        .shape-2 {
            width: 200px;
            height: 200px;
            background-color: var(--primary-color);
            bottom: -50px;
            left: -50px;
        }
        
        footer {
            background-color: var(--nav-bg);
            color: var(--text-color);
            padding: 50px 0;
            margin-top: 50px;
            text-align: center;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .footer-column h3 {
            color: var(--primary-color);
            margin-bottom: 20px;
            font-size: 1.3rem;
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column ul li a {
            color: var(--text-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-column ul li a:hover {
            color: var(--primary-color);
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            transform: translateY(-3px);
            background-color: var(--primary-hover);
        }
        
        .copyright {
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
            color: var(--text-color);
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

    <header>
        <div class="container">
            <nav>
                <h2><i class="fas fa-recycle"></i>Контейнир</h2>
                <ul class="nav-links">
                    <li><a href="#" class="active-link">Главная</a></li>
                    <li><a href="catalog.php">Каталог</a></li>
                    <li><a href="about.php">О нас</a></li>
                    <li><a href="feedback.php">Обратная связь</a></li>
                    <?php if (isLoggedIn()): ?>
                        <li><a href="add_ad.php">Добавить объявление</a></li>
                        <li><a href="logout.php">Выйти (<?php echo htmlspecialchars($_SESSION['user_login']); ?>)</a></li>
                    <?php else: ?>
                        <li><a href="register.php">Регистрация</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Дайте вещам вторую жизнь</h1>
            <p>Обменивайтесь, покупайте и продавайте ненужные вещи с пользой для себя и окружающей среды</p>
            <a href="catalog.php" class="btn">Перейти к каталогу</a>
        </div>
    </section>

    <main class="container">
        <div class="section-title">
            <h2>Почему выбирают нас?</h2>
            <p>Мы создали удобную платформу для обмена вещами, которая помогает экономить деньги и беречь природу</p>
        </div>
        
        <div class="features">
            <div class="feature-card">
                <i class="fas fa-leaf"></i>
                <h3>Экологично</h3>
                <p>Сокращаем количество отходов, давая вещам вторую жизнь. Каждая проданная или обменянная вещь - это вклад в сохранение природы.</p>
            </div>
            
            <div class="feature-card">
                <i class="fas fa-wallet"></i>
                <h3>Экономия</h3>
                <p>Получайте новые вещи за небольшие деньги или вообще бесплатно. Экономьте до 80% от стоимости новых вещей.</p>
            </div>
            
            <div class="feature-card">
                <i class="fas fa-users"></i>
                <h3>Сообщество</h3>
                <p>Присоединяйтесь к тысячам пользователей, которые уже оценили преимущества осознанного потребления.</p>
            </div>
        </div>
        
        <div class="section-title">
            <h2>Как это работает?</h2>
            <p>Всего несколько простых шагов отделяют вас от новых вещей и освободившегося места в шкафу</p>
        </div>
        
        <div class="features">
            <div class="feature-card">
                <i class="fas fa-upload"></i>
                <h3>Разместите объявление</h3>
                <p>Загрузите фото и описание вещи, которую хотите продать или обменять. Это займет не более 5 минут.</p>
            </div>
            
            <div class="feature-card">
                <i class="fas fa-search"></i>
                <h3>Найдите нужное</h3>
                <p>Просматривайте тысячи объявлений в нашем каталоге. Используйте фильтры для быстрого поиска.</p>
            </div>
            
            <div class="feature-card">
                <i class="fas fa-handshake"></i>
                <h3>Совершите сделку</h3>
                <p>Договоритесь о встрече или используйте наш сервис доставки. Получайте вещи и радуйтесь покупкам!</p>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Контейнир</h3>
                    <p>Платформа для обмена и продажи вещей. Дарим вещам вторую жизнь с 2024 года.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-vk"></i></a>
                        <a href="#"><i class="fab fa-telegram"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Навигация</h3>
                    <ul>
                        <li><a href="glavnaya.php">Главная</a></li>
                        <li><a href="catalog.php">Каталог</a></li>
                        <li><a href="about.php">О нас</a></li>
                        <li><a href="feedback.php">Обратная связь</a></li>
                        <li><a href="register.php">Регистрация</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Помощь</h3>
                    <ul>
                        <li><a href="feedback.php">Как продавать?</a></li>
                        <li><a href="feedback.php">Как покупать?</a></li>
                        <li><a href="about.php">FAQ</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Контакты</h3>
                    <ul>
                        <li><i class="fas fa-envelope"></i> info@konteynir.ru</li>
                        <li><i class="fas fa-phone"></i> +7 (929) 108-10-25</li>
                        <li><i class="fas fa-map-marker-alt"></i> Сиверский, ул. Пушкинская, 13</li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2025 Контейнир. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <button class="theme-toggle" id="themeToggle">
        <i class="fas fa-moon"></i>
    </button>

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