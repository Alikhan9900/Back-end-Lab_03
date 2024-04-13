<?php
session_start();
if (isset($_SESSION['authorized']) && $_SESSION['authorized'] === true) {
    echo '<h1>Добрий день, Admin!</h1>';
} else {
    echo '
  <h1>Авторизація</h1>
  <form method="post">
    <label for="login">Логін:</label>
    <input type="text" name="login" id="login">
    <br>
    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password">
    <br>
    <input type="submit" value="Увійти">
  </form>
  ';

    if (isset($_POST['login']) && isset($_POST['password'])) {
        if ($_POST['login'] === 'admin' && $_POST['password'] === 'password') {
            $_SESSION['authorized'] = true;
            header('Location: ' . $_SERVER['REQUEST_URI']);
        } else {
            echo '<p style="color: red;">Невірний логін або пароль!</p>';
        }
    }
}


