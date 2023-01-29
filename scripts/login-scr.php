<?php

    if(isset($_POST["btn-log"])) {

    
    // Variables (LogIn)
    $em = $_POST["email"];
    $pa = $_POST["pass"];
    $rm = $_POST["rememberme"];


    // Include (Connection to db and functions)
    require_once 'dbconnect-scr.php';
    require_once 'functions-scr.php';

    // ERROR HANDLERS
   
    // Check if variables are empty
    if (emptyLog($em, $pa) !== false) {
        header("location: ../login.php?error=emptyInput");
        exit();
    }

    // Function to login the user
    logUser($DB, $em, $pa, $rm);


 

}

else {
    header("location: ../login.php");
    exit();
}






