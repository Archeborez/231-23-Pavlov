<?php
// config.php
session_start();

// Настройки базы данных
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Замените на ваши данные
define('DB_PASS', '');     // Замените на ваши данные
define('DB_NAME', 'konteynir');

// Подключение к базе данных
try {
    $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("set names utf8mb4");
} catch(PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

// Инициализация темы
if (!isset($_SESSION['theme'])) {
    $_SESSION['theme'] = 'light'; // По умолчанию светлая тема
}

// Функции для работы с пользователями
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getUser($id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// Функция для переключения темы
function toggleTheme() {
    $_SESSION['theme'] = ($_SESSION['theme'] === 'light') ? 'dark' : 'light';
}
?>