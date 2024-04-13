<?php
// Функція для порівняння двох файлів
function compareFiles($file1, $file2) {
    $unique1 = []; // рядки, унікальні для першого файлу
    $unique2 = []; // рядки, унікальні для другого файлу
    $duplicates = []; // рядки, що зустрічаються більше двох разів

    // Читання першого файлу
    $handle1 = fopen($file1, 'r');
    while ($line = fgets($handle1)) {
        $line = trim($line);
        if (!empty($line)) {
            if (!isset($unique1[$line])  && !isset($duplicates[$line])) {
                $unique1[$line] = true;
            } else {
                $duplicates[$line] = true;
            }
        }
    }
    fclose($handle1);

    // Читання другого файлу
    $handle2 = fopen($file2, 'r');
    while ($line = fgets($handle2)) {
        $line = trim($line);
        if (!empty($line)) {
            if (!isset($unique1[$line]) && !isset($unique2[$line]) && !isset($duplicates[$line])) {
                $unique2[$line] = true;
            } else {
                $duplicates[$line] = true;
            }
        }
    }
    fclose($handle2);

    return array(
        'unique1' => $unique1,
        'unique2' => $unique2,
        'duplicates' => $duplicates,
    );
}

// Отримання списків файлів
$files = array(
    'file1.txt',
    'file2.txt',
);

// Обробка форми
if (isset($_POST['delete'])) {
    $fileToDelete = $_POST['file'];
    if (in_array($fileToDelete, $files)) {
        unlink($fileToDelete);
        array_splice($files, array_search($fileToDelete, $files), 1);
    }
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Порівняння файлів</title>
</head>
<body>
<h1>Порівняння файлів</h1>
<ul>
    <?php foreach ($files as $file): ?>
        <li><?php echo $file; ?></li>
    <?php endforeach; ?>
</ul>

<form method="post">
    <label for="file">Виберіть файл для видалення:</label>
    <select name="file" id="file">
        <?php foreach ($files as $file): ?>
            <option value="<?php echo $file; ?>"><?php echo $file; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" name="delete" value="Видалити">
</form>

<h2>Результати порівняння</h2>
<?php
$results = compareFiles($files[0], $files[1]);
?>
<h3>Унікальні для першого файлу:</h3>
<ul>
    <?php foreach ($results['unique1'] as $line => $value): ?>
        <li><?php echo $line; ?></li>
    <?php endforeach; ?>
</ul>
<h3>Унікальні для другого файлу:</h3>
<ul>
    <?php foreach ($results['unique2'] as $line => $value): ?>
        <li><?php echo $line; ?></li>
    <?php endforeach; ?>
</ul>
<h3>Дублікати (більше 2 разів):</h3>
<ul>
    <?php foreach ($results['duplicates'] as $line => $value): ?>
        <li><?php echo $line; ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>