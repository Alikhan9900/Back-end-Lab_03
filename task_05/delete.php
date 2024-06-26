<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = $_POST['login'];
    $password = $_POST['password'];
    $userFolder = "./users/";



    if (is_dir($userFolder . $login)) {

        $deleted = deleteDir($userFolder . $login);

        if ($deleted) {
            echo "Папка користувача видалена успішно.";
        } else {
            echo "Помилка під час видалення папки.";
        }
    } else {
        echo "Папка з таким ім'ям не існує.";
    }
}


function deleteDir($dirPath) {
    if (!is_dir($dirPath)) {
        return false;
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    return rmdir($dirPath);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Видалення користувача</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="login">Логін:</label><br>
    <input type="text" id="login" name="login"><br>
    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Видалити папку користувача">
</form>
<br>
<a href="index.php">Повернутися до створення користувача</a>
</body>
</html>
