<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = $_POST['login'];
    $password = $_POST['password'];
    $userFolder = "./users/";


    if (!is_dir($userFolder . $login)) {

        mkdir($userFolder . $login);

        mkdir($userFolder . $login . "/video");
        mkdir($userFolder . $login . "/music");
        mkdir($userFolder . $login . "/photo");

        file_put_contents($userFolder . $login . "/video/video1.txt", "Video 1 content");
        file_put_contents($userFolder . $login . "/music/music1.txt", "Music 1 content");
        file_put_contents($userFolder . $login . "/photo/photo1.txt", "Photo 1 content");

        echo "Папка створена успішно.";
    } else {
        echo "Папка з таким ім'ям вже існує.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Створення користувача</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="login">Логін:</label><br>
    <input type="text" id="login" name="login"><br>
    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Створити папку">
</form>
<br>
<a href="delete.php">Перейти до видалення користувача</a>
</body>
</html>
