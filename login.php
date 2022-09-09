<?php
include_once('config.php');
// include_once('validate.php');
session_start();


if (isset($_POST['login']) && isset($_POST['inputUsername']) && isset($_POST['inputPassword'])) {
    $query_info = sprintf("SELECT * FROM staffs WHERE userN = '%s'", 
    $db->real_escape_string($_POST['inputUsername']));

    $result = $db->query($query_info);
    $row = $result->fetch_object();

    if ($row != null) {
        $hash = $row->passW;
        if (password_verify($_POST['inputPassword'], $hash)) {
            header('location: https://www.w3schools.com');

            $_SESSION['inputUsername'] = $row->userN;

        }else {
            header('location: index.php?login_fail_msg');
        }
    }else{
        header('location: index.php?login_fail_msg');
    }
    $db->close();
}

?>