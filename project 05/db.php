<?php
// Настройки безопасности
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.use_strict_mode', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_auth_db";

// Создаем подключение с использованием SSL (если доступно)
$conn = mysqli_init();
mysqli_options($conn, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
mysqli_real_connect($conn, $servername, $username, $password, $dbname);

// Проверяем подключение
if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Создаем таблицу users с дополнительными полями для безопасности
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(32) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    remember_token VARCHAR(255) NULL,
    failed_attempts INT(11) DEFAULT 0,
    last_attempt TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!mysqli_query($conn, $sql)) {
    die("Ошибка создания таблицы: " . mysqli_error($conn));
}

// Устанавливаем кодировку
mysqli_set_charset($conn, "utf8mb4");

// Генерация CSRF токена при отсутствии
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>