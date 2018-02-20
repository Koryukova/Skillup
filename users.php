<?php

$bd = new PDO('mysql:host=localhost;dbname=php2', 'root', 'root');

$result = $bd->query('SELECT * FROM users;');
$users = $result->fetchAll();

var_dump($users);

$users = $result->fetchAll();

$filename = 'counter.txt';

if (file_exists($filename)) {
    $counter = file_get_contents('counter.txt');
} else {
    $counter = 0;
}
$counter++;
file_put_contents($filename, $result);


?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список пользователей</title>
    <link rel="stylesheet" href=>
</head>

<body>
<form action="#"></form>

</body>
</html>