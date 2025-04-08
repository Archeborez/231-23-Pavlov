<?php
require_once 'config.php';

// Уничтожаем сессию
$_SESSION = array();
session_destroy();

// Перенаправляем на главную страницу
header("Location: glavnaya.php");
exit();
?>