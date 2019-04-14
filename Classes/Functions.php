<?php
require_once 'User.php';

 $errors = array();   
 
function is_logged_in() {
    start_session();
    return (isset($_SESSION['user']));
}

function start_session() {
    $id = session_id();
    if ($id === "") {
        session_start();
    }
}

function echoValue($array, $fieldName) {
    if (isset($array) && isset($array[$fieldName])) {
        echo $array[$fieldName];
    }
}

?>
