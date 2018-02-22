<?php

//setcookie('count_view', 0, time()+3600);

$countView =1;

if (!empty($_COOKIE['count_view'])) {
    $countView = $_COOKIE['count_view'];
    setcookie('count_view', $countView++, time()+3600);
} else {
    setcookie('count_view', $countView, time()+3600);
}


echo 'Test cookie, count: ' . $countView;



