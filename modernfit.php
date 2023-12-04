<?php

$request = $_SERVER['PATH_INFO'];

switch ($request) {
    case '':
    /*case '/':
        require __DIR__ . $viewDir . 'home.php';
        break;*/

    /*case '/views/users':
        require __DIR__ . $viewDir . 'users.php';
        break;*/
        
    case '/nutrition':
        require __DIR__ . '/nutritionalInfo.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/404.php';
}
?>