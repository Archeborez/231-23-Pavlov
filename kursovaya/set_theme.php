<?php
require_once 'config.php';

if (isset($_GET['theme'])) {
    $_SESSION['theme'] = $_GET['theme'] === 'dark' ? 'dark' : 'light';
    echo 'Theme set to ' . $_SESSION['theme'];
}
?>