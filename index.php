<?php
use App as App;
header('Content-Type: text/html; charset=utf-8');
session_start();
require_once './App/Classes/App.php';
$app = App::getInstance();
$app->getDB();
die(var_dump($app));
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
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/commonFrame.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/mainPage.php';
}
die();
?>


