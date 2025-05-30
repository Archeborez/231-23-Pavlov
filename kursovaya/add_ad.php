<?php
require_once 'config.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $category = trim($_POST['category']);
    $location = trim($_POST['location']);
    
    // Валидация
    if (empty($title) || empty($price) || empty($location)) {
        $error = "Пожалуйста, заполните все обязательные поля";
    } elseif (!is_numeric($price)) {
        $error = "Цена должна быть числом";
    } else {
        // Обработка загрузки изображения
        $image_path = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            $file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $file_name = uniqid() . '.' . $file_ext;
            $file_path = $upload_dir . $file_name;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $file_path)) {
                $image_path = $file_path;
            }
        }
        
        try {
            $stmt = $db->prepare("INSERT INTO ads (user_id, title, description, price, category, location, image_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $_SESSION['user_id'],
                $title,
                $description,
                $price,
                $category,
                $location,
                $image_path
            ]);
            
            $success = "Объявление успешно добавлено!";
        } catch(PDOException $e) {
            $error = "Ошибка при добавлении объявления: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru" data-theme="<?php echo $_SESSION['theme']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить объявление - Контейнир</title>
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
            margin: 40px 0;
        }
        
        .page-title h1 {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .page-title h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        .add-ad-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: var(--card-bg);
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-color);
        }
        
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            background-color: var(--bg-color);
            color: var(--text-color);
            font-size: 1rem;
            font-family: inherit;
        }
        
        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }
        
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.2);
        }
        
        .form-group input[type="file"] {
            padding: 8px;
        }
        
        .add-ad-button {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
        
        .add-ad-button:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
        }
        
        .error-message {
            color: #dc3545;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 15px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            text-align: center;
        }
        
        .success-message {
            color: #28a745;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 15px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            text-align: center;
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
                    <li><a href="about.php">О нас</a></li>
                    <li><a href="feedback.php">Обратная связь</a></li>
                    <?php if (isLoggedIn()): ?>
                        <li><a href="add_ad.php" class="active-link">Добавить объявление</a></li>
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
            <h1>Добавить объявление</h1>
        </div>
        
        <div class="add-ad-container">
            <?php if ($error): ?>
                <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="success-message"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Название *</label>
                    <input type="text" id="title" name="title" required value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea id="description" name="description"><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="price">Цена (руб) *</label>
                    <input type="text" id="price" name="price" required value="<?php echo isset($_POST['price']) ? htmlspecialchars($_POST['price']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="category">Категория</label>
                    <select id="category" name="category">
                        <option value="">Выберите категорию</option>
                        <option value="Одежда" <?php echo isset($_POST['category']) && $_POST['category'] === 'Одежда' ? 'selected' : ''; ?>>Одежда</option>
                        <option value="Обувь" <?php echo isset($_POST['category']) && $_POST['category'] === 'Обувь' ? 'selected' : ''; ?>>Обувь</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="location">Местоположение *</label>
                    <input type="text" id="location" name="location" required value="<?php echo isset($_POST['location']) ? htmlspecialchars($_POST['location']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
                
                <button type="submit" class="add-ad-button">Добавить объявление</button>
            </form>
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