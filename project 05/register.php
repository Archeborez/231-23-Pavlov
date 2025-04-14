<?php
require_once('db.php');

session_start();

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

$login = trim($_POST['login']);
$pass = $_POST['pass'];
$repeatpass = $_POST['repeatpass'];
$email = trim($_POST['email']);

if (empty($login) || empty($pass) || empty($repeatpass) || empty($email)) {
    showMessage("Ошибка", "Заполните все поля", "error", ["register.php", "Попробовать снова"]);
}

if (!isset($_POST['agreement'])) {
    showMessage("Ошибка", "Необходимо принять пользовательское соглашение", "error", ["register.php", "Понятно"]);
}

if ($pass != $repeatpass) {
    showMessage("Ошибка", "Пароли не совпадают", "error", ["register.php", "Исправить"]);
}

if (!preg_match('/^[a-zA-Z0-9]{2,32}$/', $login)) {
    showMessage("Ошибка", "Логин должен содержать только латинские буквы и цифры (2-32 символа)", "error", ["register.php", "Исправить"]);
}

if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,32}$/', $pass)) {
    showMessage("Ошибка", "Пароль должен содержать: минимум одну заглавную букву, одну строчную, одну цифру и один спецсимвол (8-32 символа)", "error", ["register.php", "Исправить"]);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    showMessage("Ошибка", "Неверный формат email", "error", ["register.php", "Исправить"]);
}

$stmt = $conn->prepare("SELECT id FROM users WHERE login = ? OR email = ?");
$stmt->bind_param("ss", $login, $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    showMessage("Ошибка", "Пользователь с таким логином или email уже существует", "error", ["login.php", "Войти"]);
}

$hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

$stmt = $conn->prepare("INSERT INTO users (login, pass, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $login, $hashed_pass, $email);

if ($stmt->execute()) {
    showMessage("Успех!", "Регистрация успешно завершена!", "success", ["login.php", "Войти"]);
} else {
    showMessage("Ошибка", "Произошла ошибка: " . htmlspecialchars($conn->error), "error", ["register.php", "Попробовать снова"]);
}

$stmt->close();
$conn->close();
?>