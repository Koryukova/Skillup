<h1>Hello World</h1>

<?php

define('SECOND_IN_DAY', 86400);
define('PROJECT_NAME', 'Skillup');

$currentDate = time();
$yesterday = $currentDate - SECOND_IN_DAY * 7;
echo $currentDate . "<br />";
echo date('d.m.Y H:i:s') . "<br />";
echo date('d.m.Y H:i:s', $yesterday);

//require_once 'template.php'
?>

<p>Some text ... <?= $currentDate ?></p>


<!DOCTYPE html>
<html>
<head>
    <?php require_once 'include/head.php'; ?>

</head>

<body>

<!--Лого, поиск и навигация по страницам-->

<nav>
    <div class="logo">
        <img src="image/logo.png">
    </div>

    <div class="search">
        <input type="text" placeholder="Поиск...">
        <div class="search_ok">
            <button>ОК</button>
        </div>
    </div>

    <div class="navigator">
        <ul class="navigator_list">
            <li><a href="">Лента</a></li>
            <li><a href="">Добавить запись</a></li>
            <li><a href="">О проекте</a></li>
        </ul>
    </div>
</nav>

<!--Пост №1-->

<div class="container">
    <div class="posts">
        <div class="post_container">
            <div class="post_header">
                <div class="avatar">
                    <img src="image/Семенов_Олег.jpg" height="40px" width="40px">
                </div>
                <div class="post_header_name">
                    <h5>Семенов Олег</h5>
                </div>
                <div class="time_ago">
                    <span><?= $currentDate ?></span>
                </div>
            </div>
            <div class="post_body">
                <img src="image/post_semenov.jpg" height="250px" width="400px">
            </div>
            <div class="post_footer">
                <div class="post_like">
                    <img src="image/heart.png" height="20px" width="20px">
                    <span>22</span>
                </div>
                <div class="post_tegs">
                    <span>Плотно поел. Фото прилагаю. Очень доволен.</span>
                    <a href="">#еда</a>
                    <a href="">#жизнь</a>
                    <a href="">#доволен</a>
                </div>
            </div>
        </div>

        <!--Пост №2-->

        <div class="post_container">
            <div class="post_header">
                <div class="avatar">
                    <img src="image/Alexey2007.jpg" height="40px"; width="40px">
                </div>
                <div class="post_header_name">
                    <h5>Alexey2007</h5>
                </div>
                <div class="time_ago">
                    <span>вчера</span>
                </div>
            </div>
            <div class="post_body">
                <img src="image/post_Alexey2007.jpg" height="250px"; width="400px">
            </div>
            <div class="post_footer">
                <div class="post_like">
                    <img src="image/heart.png" height="20px" width="20px">
                    <span>22</span>
                </div>
                <div class="post_tegs">
                    <span>Плотно поел. Фото прилагаю. Очень доволен.</span>
                    <a href="">#еда</a>
                    <a href="">#жизнь</a>
                    <a href="">#доволен</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
