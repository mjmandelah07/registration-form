<?php
// variables for the user inputs to be injected to the database
$inputUsername= "";
$inputPassword = '';
$inputLanguage= "";
$inputColor= '';
$commentTextarea = '';
$termsAndCondition = '';

// variable for the message to display for user if their registration is successful or failed
$message="";

$ok = true;
$err_msg = "";

$err = array("", "User exist", "Sign Up Successful", 'Registration failed!', 'login failed!');

if( filter_has_var(INPUT_GET, 'msg') && isset($err[filter_input(INPUT_GET, 'msg')]) ) {
    $err_msg = $err[filter_input(INPUT_GET, 'msg')];
}

// check if user inputs are set and are not empty
if ( filter_has_var(INPUT_POST, 'submit') ) {
    
    if( filter_has_var(INPUT_POST, 'inputUsername') ) {
        $inputUsername = filter_input(INPUT_POST, 'inputUsername');
    }
    
    if( filter_has_var(INPUT_POST, 'inputPassword') ) {
        $inputPassword = filter_input(INPUT_POST, 'inputPassword');
    }
    
    if( filter_has_var(INPUT_POST, 'inputLanguage') ) {
        $inputLanguage = filter_input(INPUT_POST, 'inputLanguage');
    }
    
    if( filter_has_var(INPUT_POST, 'inputColor') ) {
        $inputColor = filter_input(INPUT_POST, 'inputColor');
    }
    
    if( filter_has_var(INPUT_POST, 'commentTextarea') ) {
        $commentTextarea = filter_input(INPUT_POST, 'commentTextarea');
    }
    
    if( filter_has_var(INPUT_POST, 'termsAndCondition') ) {
        $termsAndCondition = filter_input(INPUT_POST, 'termsAndCondition');
    }
    
    if(!$inputUsername || !$inputPassword || !$inputLanguage || !$inputColor || !$commentTextarea || !$termsAndCondition) {
        $ok = false;
    }                 

    // connect to db only when we need it.
    include_once("config.php");
    
    // check if username exist in database before you insert users information into database
    $query = sprintf("SELECT userN FROM staffs WHERE userN = '%s'", $db->real_escape_string($inputUsername));
    $result = $db->query($query);
    $row = $result->fetch_object();
    if($row != null) {
        $ok= false;
        header('location: index.php?msg=1');
        die();
        

    }
    
    // insert user inputs into database registration_form, table(staffs) if validation is == True
    if ($ok) {
        $hash = password_hash($inputPassword, PASSWORD_DEFAULT);
        $sql_staffs = sprintf(
        "INSERT INTO staffs (userN, passW, lanG, coL, coM, tC) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')",
        $db->real_escape_string($inputUsername), $db->real_escape_string($hash), $db->real_escape_string($inputLanguage),
        $db->real_escape_string($inputColor), $db->real_escape_string($commentTextarea), $db->real_escape_string($termsAndCondition)
        );
    }  

    
    if ($db->query($sql_staffs) === True) {
         header('location: index.php?msg=2');
         
    }else{
        header('location: index.php?msg=3');
        
    }
    
    if( $db ) {
        $db->close();
    }
    
}




