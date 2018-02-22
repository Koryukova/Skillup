<?php

$salt = 'jdskh@#$DSSs';

$user = [
    'login' => 'admin',
    'password' => hashPassword('123'),
];



$alerts = [
//    [
//        'type' => 'danger',
//        'message' => 'Прмер красненькой ошибки',
//    ],
//    [
//        'type' => 'success',
//        'message' => 'Прмер не ошибки',
//    ],
];

function addAlertDanger($alerts $message) {
    $alerts[] = [
        'type' => 'success',
        'message' => $message,
    ];
    return $alerts;
}

function addAlertDanger($alerts $message) {
    $alerts[] = [
        'type' => 'success',
        'message' => $message,
    ];
    return $alerts;
}

function hashPassword($password) {
    $salt = 'jdskh@#$DSSs';
    $hash = password_hash($salt . $password, PASSWORD_BCRYPT);
    return $hash;

}


if ($_POST) {
    $requestLogin = $_POST['login'];
    $requestPassword = hashPassword ($_POST['password']);

    if ($user['password'] == $requestPassword && $user['login'] == $requestLogin) {
        $alerts[] = addAlertSuccess($alerts);
    } else {
        $alerts[] = [
              'type' => 'danger',
               'message' => 'Логин или пароль указаны неверно',
        ];
    }
}



?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<?php foreach ($alerts as $alert) {?>
<div class="alert alert-<? >">
    Сообщение
</div>



<div class="container">
    <div class="jumbotron">
        <form class="form-signin" method="POST">
            <input class="form-control" name="username" placeholder="Логин:">
            <input type="password" class="form-control" name="password" placeholder="Пароль"/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>
        </form>
    </div>
</div>
