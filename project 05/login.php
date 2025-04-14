<?php
require_once('db.php');

session_start();

// Добавляем красивый HTML-шаблон для вывода сообщений
function showMessage($title, $message, $type = 'success', $link = null) {
    $icon = $type === 'success' ? 'check-circle' : 'exclamation-circle';
    $color = $type === 'success' ? '#4CAF50' : '#FF6B6B';
    
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>$title</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                margin: 0;
                padding: 0;
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #343a40;
            }
            
            .message-container {
                max-width: 500px;
                width: 90%;
                padding: 30px;
                background: white;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                text-align: center;
                border-top: 5px solid $color;
            }
            
            .message-icon {
                font-size: 50px;
                color: $color;
                margin-bottom: 20px;
            }
            
            .message-title {
                font-size: 24px;
                margin-bottom: 15px;
                color: $color;
            }
            
            .message-text {
                font-size: 16px;
                margin-bottom: 25px;
                line-height: 1.6;
            }
            
            .message-link {
                display: inline-block;
                padding: 12px 25px;
                background: linear-gradient(135deg, $color, darken($color, 10%));
                color: white;
                text-decoration: none;
                border-radius: 50px;
                font-weight: 600;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            }
            
            .message-link:hover {
                transform: translateY(-3px);
                box-shadow: 0 7px 20px rgba(0, 0, 0, 0.15);
            }
            
            .message-link i {
                margin-right: 8px;
            }
        </style>
    </head>
    <body>
        <div class="message-container">
            <div class="message-icon">
                <i class="fas fa-$icon"></i>
            </div>
            <h1 class="message-title">$title</h1>
            <p class="message-text">$message</p>
HTML;
    
    if ($link) {
        $icon = $type === 'success' ? 'arrow-right' : 'redo';
        $text = $type === 'success' ? 'Продолжить' : 'Попробовать снова';
        echo "<a href='$link[0]' class='message-link'><i class='fas fa-$icon'></i>$link[1]</a>";
    }
    
    echo <<<HTML
        </div>
    </body>
    </html>
HTML;
    exit();
}

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    showMessage("Ошибка", "Неверный метод запроса", "error", ["login.php", "Попробовать снова"]);
}

// Проверяем существование полей перед их использованием
if (!isset($_POST['login']) || !isset($_POST['pass'])) {
    showMessage("Ошибка", "Заполните все поля", "error", ["login.php", "Попробовать снова"]);
}

$login = trim($_POST['login']);
$pass = $_POST['pass'];
$remember = isset($_POST['remember']);

if (empty($login) || empty($pass)) {
    showMessage("Ошибка", "Заполните все поля", "error", ["login.php", "Попробовать снова"]);
}

// Защита от брутфорса
sleep(1);

// Защита от SQL-инъекций
$stmt = $conn->prepare("SELECT id, login, pass FROM users WHERE login = ?");
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    if (password_verify($pass, $user['pass'])) {
        // Успешная авторизация
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_login'] = $user['login'];
        $_SESSION['last_activity'] = time();
        
        if ($remember) {
            $token = bin2hex(random_bytes(32));
            $hashed_token = password_hash($token, PASSWORD_BCRYPT);
            
            $stmt = $conn->prepare("UPDATE users SET remember_token = ? WHERE id = ?");
            $stmt->bind_param("si", $hashed_token, $user['id']);
            $stmt->execute();
            
            setcookie('remember_token', $token, time() + 60*60*24*30, '/', '', true, true);
            setcookie('user_id', $user['id'], time() + 60*60*24*30, '/', '', true, true);
        }
        
        showMessage("Успешный вход", "Добро пожаловать, " . htmlspecialchars($user['login']) . "!", "success", ["index.php", "На главную"]);
    } else {
        showMessage("Ошибка", "Неверный пароль", "error", ["login.php", "Попробовать снова"]);
    }
} else {
    showMessage("Ошибка", "Пользователь не найден", "error", ["register.php", "Зарегистрироваться"]);
}

$stmt->close();
$conn->close();
?>