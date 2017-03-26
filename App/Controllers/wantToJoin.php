<?php

$githubNickname = trim(filter_input(INPUT_POST, 'githubNickname', FILTER_SANITIZE_STRING));
$userName = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
$joinUs = trim(filter_input(INPUT_POST, 'joinUs', FILTER_SANITIZE_STRING));

if ($githubNickname != '' && $userName != '' && $joinUs != '') {
    submitAboutJoin($githubNickname, $userName);
}

function submitAboutJoin($githubNickname, $userName) {
    $result = false;
    $githubNickname = trim(strip_tags($githubNickname));
    if ($githubNickname == '') {
        return $result;
    }
    $userName = trim(strip_tags($userName));
    if ($userName == '') {
        return $result;
    }
    $App = App::getInstance();
    $config = $App->getConfig();
    $developers = isset($config['developers']) && is_array($config['developers']) ? $config['developers'] : array();
    if (count($developers)) {
        $message = "К нам хочет присоединиться ещё один разрабочик.\r\nИмя: " . $userName . "\r\nNickName: " . $githubNickname . ".";
//        $headers =  'MIME-Version: 1.0' . "\r\n"; 
//$headers .= 'From: Your name <info@address.com>' . "\r\n";
//$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
        $result = false;
        foreach ($developers as $developerMail) {
            $sent = mail($developerMail, 'New collaborator', $message);
            if ($result == false && $sent == true) {
                $result = true;
            }
        }
    }
    if ($result == true) {
        $_SESSION['joined'] = time();
    }
    return $result;
}

//var_dump($githubNickname,$userName);
//var_dump($_POST);