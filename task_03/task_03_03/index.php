<?php
// Функція для впорядкування слів
function sortWords($file) {
    $words = array();

    // Читання файлу
    $handle = fopen($file, 'r');
    while ($line = fgets($handle)) {
        $words = array_merge($words, explode(' ', trim($line)));
    }
    fclose($handle);

    // Впорядкування слів
    sort($words);

    return $words;
}

// Отримання списків файлів
$files = array(
    'file.txt',
);

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Впорядкування слів</title>
</head>
<body>
<h1>Впорядкування слів</h1>
<ul>
    <?php foreach ($files as $file): ?>
        <li><?php echo $file; ?></li>
    <?php endforeach; ?>
</ul>

<h2>Впорядковані слова:</h2>
<?php
$words = sortWords($files[0]);
?>
<ul>
    <?php foreach ($words as $word): ?>
        <li><?php echo $word; ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>

