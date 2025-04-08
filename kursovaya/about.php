<?php
require_once 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="ru" data-theme="<?php echo isset($_SESSION['theme']) ? $_SESSION['theme'] : 'light'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контейнир - О нас</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4CAF50;
            --primary-hover: #45a049;
            --text-color: #333;
            --bg-color: #f8f9fa;
            --card-bg: #fff;
            --shadow: 0 2px 10px rgba(0,0,0,0.1);
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
            --shadow: 0 2px 10px rgba(0,0,0,0.3);
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
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 0;
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
        
        .page-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }
        
        .page-title h1 {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        .page-title p {
            color: var(--text-color);
            opacity: 0.8;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .page-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        .about-content {
            display: flex;
            flex-direction: column;
            gap: 40px;
            max-width: 900px;
            margin: 0 auto;
        }
        
        .about-section {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 40px;
            border: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }
        
        .about-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background-color: var(--primary-color);
        }
        
        .about-section h2 {
            color: var(--primary-color);
            margin-bottom: 20px;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
        }
        
        .about-section h2 i {
            margin-right: 15px;
            font-size: 1.5rem;
        }
        
        .about-section p {
            margin-bottom: 15px;
            font-size: 1.1rem;
            line-height: 1.7;
        }
        
        .about-section p strong {
            color: var(--primary-color);
        }
        
        .mission-values {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        
        .value-card {
            background: var(--card-bg);
            padding: 25px;
            border-radius: var(--border-radius);
            border-left: 4px solid var(--primary-color);
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }
        
        .value-card:hover {
            transform: translateY(-5px);
        }
        
        .value-card h3 {
            color: var(--text-color);
            margin-bottom: 15px;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
        }
        
        .value-card h3 i {
            margin-right: 10px;
            color: var(--primary-color);
        }
        
        .team-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: var(--border-radius);
            margin: 30px 0;
            box-shadow: var(--shadow);
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
            background: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        
        .stat-label {
            font-size: 1rem;
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
                    <li><a href="glavnaya.php">Главная</a></li>
                    <li><a href="catalog.php">Каталог</a></li>
                    <li><a href="#" class="active-link">О нас</a></li>
                    <li><a href="feedback.php">Обратная связь</a></li>
                    <?php if (isset($_SESSION['user_login'])): ?>
                        <li><a href="add_ad.php">Добавить объявление</a></li>
                        <li><a href="logout.php">Выйти (<?php echo htmlspecialchars($_SESSION['user_login']); ?>)</a></li>
                    <?php else: ?>
                        <li><a href="register.php">Регистрация</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="page-title">
            <h1>О нашем сервисе</h1>
            <p>Мы ценим каждого пользователя и стремимся сделать процесс обмена вещей максимально удобным и приятным</p>
        </div>
        
        <div class="about-content">
            <section class="about-section">
                <h2><i class="fas fa-users"></i> Кто мы?</h2>
                <p><strong>Контейнир</strong> - это инновационная платформа для обмена одеждой и шоппинга, созданная в 2022 году. Мы объединяем людей, которые хотят избавиться от ненужных вещей и найти что-то новое для себя.</p>
                <p>Наша команда состоит из энтузиастов, которые верят, что осознанное потребление - это будущее. Мы работаем над тем, чтобы сделать моду более доступной и экологичной.</p>
                
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">50K+</div>
                        <div class="stat-label">Пользователей</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">120K+</div>
                        <div class="stat-label">Объявлений</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">85%</div>
                        <div class="stat-label">Довольных клиентов</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Поддержка</div>
                    </div>
                </div>
            </section>
            
            <section class="about-section">
                <h2><i class="fas fa-bullseye"></i> Наша миссия</h2>
                <p>Мы стремимся сделать моду более доступной и экологичной, сокращая количество текстильных отходов и давая вещам вторую жизнь.</p>
                
                <div class="mission-values">
                    <div class="value-card">
                        <h3><i class="fas fa-leaf"></i> Экологичность</h3>
                        <p>Сокращаем вред для окружающей среды, продлевая жизнь одежде. Каждая обменянная вещь - это меньше мусора на свалках.</p>
                    </div>
                    <div class="value-card">
                        <h3><i class="fas fa-hand-holding-usd"></i> Доступность</h3>
                        <p>Даем возможность каждому обновлять гардероб без больших затрат. Качественные вещи могут быть доступными.</p>
                    </div>
                    <div class="value-card">
                        <h3><i class="fas fa-heart"></i> Сообщество</h3>
                        <p>Объединяем единомышленников, которые ценят осознанное потребление. Вместе мы меняем мир к лучшему.</p>
                    </div>
                </div>
            </section>
            
            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Наша команда" class="team-image">
            
            <?php if (!isset($_SESSION['user_login'])): ?>
    <section class="about-section">
        <h2><i class="fas fa-user-plus"></i> Присоединяйтесь к нам</h2>
        <p>Станьте частью сообщества, которое уже включает более 50,000 пользователей по всей России. Вместе мы делаем моду более осознанной и экологичной.</p>
        <p>Зарегистрируйтесь сейчас и получите 3 бесплатных объявления!</p>
        
        <div style="margin-top: 30px; text-align: center;">
            <a href="register.php" style="display: inline-block; padding: 12px 30px; background-color: var(--primary-color); color: white; text-decoration: none; border-radius: 50px; font-weight: bold; transition: all 0.3s ease;">Зарегистрироваться</a>
        </div>
    </section>
<?php endif; ?>
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
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Помощь</h3>
                    <ul>
                        <li><a href="feedback.php">Как продавать?</a></li>
                        <li><a href="feedback.php">Как покупать?</a></li>
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