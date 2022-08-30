<?php
// connect to the database 
$severname = "localhost";
$username = "root";
$password = "";
$databasename = "registration_form";

// create connection
$db = new mysqli($severname, $username, $password, $databasename);

// checks if connection is successful or failed
if ($db->connect_error){
    die("connection failed". $db->connect_error);
}


?>