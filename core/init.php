<?php ob_start();

include_once 'database/connection.php';
include_once 'classes/user.php';


global $pdo;
//session_start();
if( empty(session_id()) && !headers_sent()){
    session_start();
}

$getFromU = new User($pdo);

define('BASE_URL', 'http://localhost/Electronics/');




?>