<?php

function addAlertDanger($alerts, $message) {
    $alerts[] = [
        'type' => 'danger',
        'message' => $message,
    ];
    return $alerts;
}

function addAlertSuccess($alerts, $message) {
    $alerts[] = [
        'type' => 'success',
        'message' => $message,
    ];
    return $alerts;
}

$user = [
    'login' => 'admin',
    'password' => password_hash('1q2', PASSWORD_BCRYPT),
];

$alerts = [];

if ($_POST) {
    $requestLogin = $_POST['login'];
    if (password_verify($_POST['password'], $user['password']) && $user['login'] == $requestLogin) {
        $alerts = addAlertSuccess($alerts, 'Вы авторизированы');
    } else {
        $alerts = addAlertDanger($alerts, 'Логин или пароль указаны не верно');
    }
}

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<?php foreach ($alerts as $alert) { ?>
    <div class="alert alert-<?= $alert['type'] ?>">
        <?= $alert['message'] ?>
    </div>
<?php } ?>

<div class="container">
    <div class="jumbotron">
        <form class="form-signin" method="POST">
            <input class="form-control" name="login" placeholder="Логин"/>
            <input type="password" class="form-control" name="password" placeholder="Пароль"/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>
        </form>
    </div>
</div>