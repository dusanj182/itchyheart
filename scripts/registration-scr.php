<?php

if (isset($_POST["btn-reg"])) {
    // Variables (Registration)
    $fn = $_POST["fname"];
    $ln = $_POST["lname"];
    $em = $_POST["email"];
    $pa = $_POST["pass"];
    $par = $_POST["passrep"];

    // Include (Connection to db and functions)
    require_once 'dbconnect-scr.php';
    require_once 'functions-scr.php';


    // Check if variables are empty
    if (emptyReg($fn, $ln, $em, $pa, $par) !== false) {
        header("location: ../registration.php?error=emptyInput");
        exit();
    }

    // Check if the email is invalid
    if (invalidEmail($em) !== false) {
        header("location: ../registration.php?error=invalidEmail");
        exit();
    }

    // Check if passwords match
    if (passMatch($pa, $par) !== false) {
        header("location: ../registration.php?error=passwordIncompatibility");
        exit();
    }

    // Check if email already exists in database
    if (emailExists($DB, $em) !== false) {
        header("location: ../registration.php?error=emailExist");
        exit();
    }
    // CREATING USER
    createUser($DB, $fn, $ln, $em, $pa);

   
}

else {
    header("location: ../registration.php");
}