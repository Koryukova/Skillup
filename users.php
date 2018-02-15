<?php

$bd = new PDO('mysql:host=localhost;dbname=php2', 'root', 'root');

$result = $bd->query('SELECT * FROM users;');
$users = $result->fetchAll();

var_dump($users);
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
