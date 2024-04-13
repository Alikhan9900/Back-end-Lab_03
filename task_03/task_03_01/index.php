<!DOCTYPE html>
<html>
<head>
    <title>Форма коментарів</title>
</head>
<body>
<h2>Додати коментар:</h2>
<form action="process_comments.php" method="post">
    Ім'я: <input type="text" name="name"><br>
    Коментар: <textarea name="comment"></textarea><br>
    <input type="submit" value="Додати коментар">
</form>
<h2>Поточні коментарі:</h2>
<table border="1">
    <tr>
        <th>Ім'я</th>
        <th>Коментар</th>
    </tr>
    <?php
    $file = fopen("comments.txt", "r");
    while (!feof($file)) {
        $line = fgets($file);
        $data = explode("|", $line);
        if (count($data) === 2) {
            echo "<tr><td>" . $data[0] . "</td><td>" . $data[1] . "</td></tr>";
        }
    }
    fclose($file);
    ?>
</table>
</body>
</html>
