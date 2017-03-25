<?php

$headTitle = 'Как присоединиться к gulkinnos.ru';
$headMetaDescription = 'Как присоединиться к работе над проектом gulkinnos.ru';

include_once './templates/commonFrame.php';
if (!isset($_SESSION['joined'])) {
    if (filter_input(INPUT_POST, 'joinUs')) {
        include_once '../Controllers/wantToJoin.php';
    }
}

include_once './templates/howToJoin.php';
