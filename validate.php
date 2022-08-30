<?php
// include the connected server
include_once("config.php");

// variables for the user inputs to be injected to the database
$inputUsername= "";
$inputPassword = '';
$inputLanguage= "";
$inputColor= '';
$commentTextarea = '';
$termsAndCondition = '';

// variable for the message to display for user if their registration is successful or failed
$message="";


// check if user inputs are isset and is not empty
if (isset($_POST['submit'])) {
    $ok = true;

    if (!isset($_POST['inputUsername']) || empty($_POST['inputUsername'])) {
        $ok = false;
    }else {
        $inputUsername = $_POST['inputUsername'];
    }
    if (!isset($_POST['inputPassword']) || empty($_POST['inputPassword'])) {
        $ok = false;
    }else{
        $inputPassword = $_POST['inputPassword'];
    }    
    if (!isset($_POST['inputLanguage']) || empty($_POST['inputLanguage'])) {
        $ok = false;
    }else{
        $inputLanguage = $_POST['inputLanguage'];
    }
    if (!isset($_POST['inputColor']) || empty($_POST['inputColor'])) {
        $ok = false;
    }else{
        $inputColor = $_POST['inputColor'];
    }
    if (!isset($_POST['commentTextarea']) || empty($_POST['commentTextarea'])) {
        $ok = false;
    }else{
        $commentTextarea = $_POST['commentTextarea'];
    }
    if (!isset($_POST['termsAndCondition']) || $_POST['termsAndCondition'] === "") {    
        $ok = false;
    }else{
        $termsAndCondition = $_POST['termsAndCondition'];
    }                    

    // insert user input into database registration_form, table(staffs) if validation is == True
    if ($ok) {
        $hash = password_hash($inputPassword, PASSWORD_DEFAULT);
        $sql_staffs = sprintf(
        "INSERT INTO staffs (userN, passW, lanG, coL, coM, tC) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')",
        $db->real_escape_string($inputUsername), $db->real_escape_string($hash), $db->real_escape_string($inputLanguage),
        $db->real_escape_string($inputColor), $db->real_escape_string($commentTextarea), $db->real_escape_string($termsAndCondition)
        );
    }  

    
    if ($db->query($sql_staffs) === True) {
        header('location: index.php');
    }else{
        $message = 'Registration failed!'. $sql_staffs . '<br />'. $conn->error;
    }
    
    
}





$db->close();
?>