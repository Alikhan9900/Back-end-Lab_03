<?php

if (isset($_COOKIE['fontSize'])) {
    $fontSize = $_COOKIE['fontSize'];
} else {
    $fontSize = 'medium';
}

if (isset($_GET['fontSize'])) {
    $fontSize = $_GET['fontSize'];
    setcookie('fontSize', $fontSize, time() + 3600 * 24 * 7);
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Робота з cookie (PHP)</title>
    <style>
        body {
            font-size: <?php echo $fontSize; ?>;
        }
    </style>
</head>
<body>
<h1>Виберіть розмір шрифту:</h1>
<ul>
    <li><a href="?fontSize=large">Великий шрифт</a></li>
    <li><a href="?fontSize=medium">Середній шрифт</a></li>
    <li><a href="?fontSize=small">Маленький шрифт</a></li>
</ul>
<p>Цей текст буде відображатися з обраним розміром шрифту.</p>
</body>
</html>

