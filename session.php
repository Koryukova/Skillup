<?php

session_start();

$countView = (isset($_SESSION['count_view'])) ? $_SESSION['count_view'] : 0;
$countView++;

$_SESSION['count_view'] = $countView;

var_dump($countView);