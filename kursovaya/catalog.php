<?php
require_once 'config.php';

// Получаем параметры поиска (ИСПРАВЛЕННЫЕ СТРОКИ)
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$category = isset($_GET['category']) ? trim($_GET['category']) : '';

// Формируем SQL запрос
$sql = "SELECT ads.*, users.login as user_login FROM ads 
        LEFT JOIN users ON ads.user_id = users.id";
$params = [];

if ($search || $category) {
    $conditions = [];
    
    if ($search) {
        $conditions[] = "ads.title LIKE ?";
        $params[] = "%$search%";
    }
    
    if ($category && $category !== 'Все категории') {
        $conditions[] = "ads.category = ?";
        $params[] = $category;
    }
    
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }
}

$sql .= " ORDER BY ads.created_at DESC";

try {
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    $ads = $stmt->fetchAll();
    
    // Для отладки можно добавить:
    // echo "<pre>"; print_r($ads); echo "</pre>";
    
    // Получаем уникальные категории для select (исключаем пустые категории)
    $categories_stmt = $db->query("SELECT DISTINCT category FROM ads WHERE category IS NOT NULL AND category != ''");
    $categories = $categories_stmt->fetchAll(PDO::FETCH_COLUMN);
} catch(PDOException $e) {
    die("Ошибка получения объявлений: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="ru" data-theme="<?php echo $_SESSION['theme']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог - Контейнир</title>
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
            padding: 20px 0;
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
            margin-bottom: 40px;
            position: relative;
            padding-bottom: 20px;
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
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        .search-container {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            background-color: var(--card-bg);
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
        }
        
        .search-container select, 
        .search-container input, 
        .search-container button {
            padding: 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            background-color: var(--card-bg);
            color: var(--text-color);
            font-size: 1rem;
        }
        
        .search-container select {
            flex: 1;
            max-width: 200px;
        }
        
        .search-container input {
            flex: 3;
        }
        
        .search-container button {
            flex: 1;
            max-width: 150px;
            background-color: var(--primary-color);
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .search-container button:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
        }
        
        .ads-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }
        
        .ad-card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }
        
        .ad-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .ad-image {
            height: 200px;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .ad-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.3), transparent);
        }
        
        .ad-content {
            padding: 20px;
        }
        
        .ad-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--text-color);
        }
        
        .ad-price {
            font-weight: bold;
            font-size: 1.3rem;
            color: var(--primary-color);
            margin-bottom: 8px;
        }
        
        .ad-location {
            color: var(--text-color);
            opacity: 0.7;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }
        
        .ad-location i {
            margin-right: 5px;
            font-size: 0.8rem;
        }
        
        .ad-author {
            font-size: 0.8rem;
            color: var(--text-color);
            opacity: 0.7;
            margin-top: 8px;
        }
        
        .no-results {
            text-align: center;
            grid-column: 1 / -1;
            padding: 40px 0;
            color: var(--text-color);
            opacity: 0.7;
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
                    <li><a href="#" class="active-link">Каталог</a></li>
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

    <main class="container">
        <div class="page-title">
            <h1>Обменяй ненужное на нужное</h1>
            <p>Тысячи предложений от пользователей со всей страны. Найди то, что ищешь!</p>
        </div>
        
        <form class="search-container" method="GET" action="">
            <select name="category">
                <option>Все категории</option>
                <?php foreach ($categories as $cat): ?>
                    <option <?php echo $category === $cat ? 'selected' : ''; ?>><?php echo htmlspecialchars($cat); ?></option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="search" placeholder="поиск по названию" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit"><i class="fas fa-search"></i> Искать</button>
        </form>
        
        <div class="ads-grid">
            <?php if (empty($ads)): ?>
                <div class="no-results">
                    <i class="fas fa-search" style="font-size: 3rem; margin-bottom: 20px;"></i>
                    <h3>Объявления не найдены</h3>
                    <p>Попробуйте изменить параметры поиска</p>
                </div>
            <?php else: ?>
                <?php foreach ($ads as $ad): ?>
                    <div class="ad-card">
                        <div class="ad-image" style="background-image: url('<?php echo htmlspecialchars($ad['image_path'] ?: 'https://via.placeholder.com/300x200'); ?>')"></div>
                        <div class="ad-content">
                            <h3 class="ad-title"><?php echo htmlspecialchars($ad['title']); ?></h3>
                            <div class="ad-price"><?php echo number_format($ad['price'], 0, ',', ' '); ?> ₽</div>
                            <div class="ad-location"><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($ad['location']); ?></div>
                            <div class="ad-author">Автор: <?php echo htmlspecialchars($ad['user_login'] ?? 'Неизвестный'); ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
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