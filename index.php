<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
require_once './App/Classes/App.php';
if ($_SERVER['SERVER_NAME'] == 'moto-drive-us.com') {
    header("HTTP/1.0 404 Not Found");
    die('Ошибка DNS');
}

$app = App::getInstance();
$config = $app->getConfig();

$visitors=new Visitors();
$visitors->writeLog();

if (isset($_GET['route'])) {
    $appRoute = trim(strip_tags($_GET['route']));
    $appRoute = preg_replace('/\//', '', $appRoute);
} else {
    $appRoute = '';
}
if ($appRoute !== '') {
    if (is_readable($_SERVER['DOCUMENT_ROOT'] . '/App/Controllers/' . $appRoute . '.php')) {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/App/Controllers/' . $appRoute . '.php';
        die();
    } else {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/App/Controllers/' . 404 . '.php';
    }
} else {
    $headTitle = 'Проект gulkinnos.ru';
    $headMetaDescription = 'Открытый проект для помощи начинающим разработчикам и самому себе';

    include $_SERVER['DOCUMENT_ROOT'] . '/templates/commonFrame.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/mainPage.php';
}
die();
?>


