<?php
require_once dirname(__DIR__)."/controller/notes.controller.php";
require_once dirname(__DIR__)."/controller/auth.controller.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
switch($uri){
    case '/':
        login();
        break;
        case '/login':
            login();
        break;
        case '/lister':
           listerNote();
        break;
         case '/logout':
            logout();
        break;
    default :
    break;
}