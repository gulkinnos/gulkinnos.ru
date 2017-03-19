<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
require_once './App/Classes/App.php';
$app=  App::getInstance();

if (isset($_GET['route'])) {
    $appRoute = trim(strip_tags($_GET['route']));
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


