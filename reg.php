<?php

define('UPLOAD_DIR', 'upload/');

//$h = fopen('test.txt', 'a+');
//for ($i=1;$i<=100;$i++) {
//    fwrite($h, "new string: {$i}" . PHP_EOL);
//}
//fclose($h);

//$arrResult = glob('*.txt');
//foreach ($arrResult as $filename) {
//    var_dump(filesize($filename));
////    copy($filename, './css/'.$filename.'.bak');
////    rename('./css/'.$filename.'.bak', './css/'.$filename);
//    unlink('./css/'.$filename);
//}
//var_dump($arrResult);
//
//die();


function getFullName($user) {
    return $user['firstname'] . ' ' . $user['lastname'];
}

function createPath($path) {
    $isSuccess = false;
    if (!file_exists($path)) {
        $isSuccess = mkdir($path, 0777, true);
    }
    return $isSuccess;
}

$errorMessage = [];

if ( isset($_POST['is_agree']) ) {

//    header('Location: /path/to/route');

    // Создание пользователя
    $user = [
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'password' => $_POST['password'],
        'sex' => $_POST['sex'],
        'age' => (int)$_POST['age'],
        'growth' => $_POST['growth'],
        'stack_learn' => [],
        'list_fruits' => 'Яблоко, Апельсин, Груша',
    ];
    if (isset($_POST['stack_learn'])) {
        $user['stack_learn'] = $_POST['stack_learn'];
    }

    $jsonUser = json_encode($user, JSON_UNESCAPED_UNICODE);
    $arrUser = json_decode($jsonUser, true);
    $objUser = json_decode($jsonUser, false);
    $test = serialize(12);

    var_dump($jsonUser);
    var_dump($arrUser);
    var_dump($objUser);
    var_dump(unserialize($test));
    die();

    if (isset($_FILES['photo']) && empty($_FILES['photo']['error'])) {
        $uploadPath = UPLOAD_DIR . 'photo/';
        createPath($uploadPath);
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPath . uniqid() . '.png');
    }

    // Валидация
    if (!(strlen($user['firstname']) >= 3 && strlen($user['lastname'])) >= 3) {
        $errorMessage[] = 'Имя и Фамилия не должны бать короче 3х символов';
    }

    if (
    !(
        in_array('html', $user['stack_learn']) &&
        in_array('php', $user['stack_learn'])
    )
    ) {
        $errorMessage[] = 'Требуется html и php';
    }



    if (empty($errorMessage)) {
        try {
            $bd = new PDO('mysql:host=localhost;charset=utf8;dbname=php2', 'root', 'root');
            $bd->setAttribute(PDO::ATRR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $bd->prepare("
        INSERT INTO users (firstname, lastname, password, age, growth)
        VALUES (:firstname, :lastname, :password, :age, :growth); 
        ");
            $result->execute([
                'firstname' => $user['firstname'],
                'lastname' => $user['lastnamename'],
                'password' => $user['password'],
                'age' => $user['age'],
                'growth' => $user['growth'],
            ]);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            die();
        }
        var_dump('test');
        die();
    }

//    var_dump($user);
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkillUP | Регистрация</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<?php if ($errorMessage) { ?>
    <?php foreach ($errorMessage as $message) { ?>
        <div class="alert alert-danger">
            <?= $message ?>
        </div>
    <?php } ?>
<?php } ?>

<div class="container-fluid jumbotron col-md-offset-4 col-md-5">

    <?php if (isset($user['stack_learn'])) { ?>
        <h3>Мы изучаем:</h3>
        <ul>
            <?php foreach ($user['stack_learn'] as $lang) { ?>
                <li><?= $lang ?></li>
            <?php } ?>
        </ul>

        <h3>Наши фрукты:</h3>
        <ul>
            <?php foreach (explode(', ', $user['list_fruits']) as $fruit) { ?>
                <li><?= $fruit ?></li>
            <?php } ?>
        </ul>

        <h3>Мы изучаем: <?= implode(', ', $user['stack_learn']) ?>.</h3>
    <?php } ?>


    <hr />

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="firstname">Имя</label>
            <input class="form-control" id="firstname" name="firstname"
                   value="<?= (isset($_POST['firstname'])) ? $_POST['firstname'] : 'Тест' ?>" placeholder="Имя">
        </div>
        <div class="form-group">
            <label for="lastname">Фамилия</label>
            <input class="form-control" id="lastname" name="lastname"
                   value="<?= (isset($_POST['lastname'])) ? $_POST['lastname'] : 'Тест' ?>" placeholder="Фамилия">
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Пароль</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Пароль">
        </div>
        <div class="form-group">
            <label for="photo" class="control-label">Фото</label>
            <input type="file" class="form-control" name="photo">
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Пол:</label>
            <label class="radio-inline">
                <input type="radio" name="sex" id="male" value="0" checked> Мужской
            </label>
            <label class="radio-inline">
                <input type="radio" name="sex" id="female" value="1"> Женский
            </label>
        </div>
        <div class="form-group">
            <label for="age" class="control-label">Возраст</label>
            <input class="form-control" id="age" name="age" value="18">
        </div>
        <div class="form-group">
            <label for="growth" class="control-label">Возраст</label>
            <input class="form-control" id="growth" name="growth" value="175.6">
        </div>
        <div class="form-group">
            <label for="stack-learn" class="control-label">Что вы изучаете?</label>

            <div class="checkbox">
                <label><input type="checkbox" name="stack_learn[]" value="html" checked> HTML</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="stack_learn[]" value="css" checked> CSS</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="stack_learn[]" value="php"> PHP</label>
            </div>
            <div class="checkbox disabled">
                <label><input type="checkbox" name="stack_learn[]" value="mysql" disabled> MySQL</label>
            </div>

        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="is_agree" value="1" checked required> Условия соглашения</label>
        </div>
        <button class="btn btn-primary">Зарегистрироваться</button>
    </form>
</div>

</body>
</html>