<?php
require_once 'functions2-scr.php';

// Status newData
// NEW_BTN
if(isset($_POST['newBtn'])) {

    $crush = $_POST['newBtn'];
    $new = 0;

    // Adding row (relationships database)
    $sqlNew = "INSERT INTO relationships (id_user1, id_user2, status) VALUES(?,?,?);";
    $STMT = mysqli_stmt_init($DB);

    if(!mysqli_stmt_prepare($STMT, $sqlNew)) {
        echo "<div class='alert alert-danger' role='alert'>
                  Error: STMT didn't execute properly!
                </div>";
    }

    mysqli_stmt_bind_param($STMT, "ssi", $_SESSION['id'], $crush, $new);
    mysqli_stmt_execute($STMT);

    

    header("location: ../search.php");
    exit();

}


// Status add
// ADD_BTN
if(isset($_POST['addBtn'])) {

    $guiltyPleasure = $_POST['addBtn'];
    $add = 0;

    $sqlAdd = "UPDATE relationships SET id_user1 = ?, id_user2 = ?, status = ? WHERE id_user1 = {$_SESSION['id']} AND id_user2 = {$guiltyPleasure};";
    $STMT = mysqli_stmt_init($DB);

    if(!mysqli_stmt_prepare($STMT, $sqlAdd)) {
        echo "<div class='alert alert-danger' role='alert'>
                  Error: STMT didn't execute properly!
                </div>";
    }

    mysqli_stmt_bind_param($STMT, "ssi", $_SESSION['id'], $guiltyPleasure, $add);
    mysqli_stmt_execute($STMT);

    header("location: ../search.php");
    exit();

}


// Status cancel
// RQS_BTN
if(isset($_POST['rqsBtn'])) {

    $stranger = $_POST['rqsBtn'];
    $cancel = 3;

    $sqlCan = "UPDATE relationships SET id_user1 = ?, id_user2 = ?, status = ? WHERE id_user1 = {$_SESSION['id']} AND id_user2 = $stranger;";
    $STMT = mysqli_stmt_init($DB);

    if(!mysqli_stmt_prepare($STMT, $sqlCan)) {
        echo "<div class='alert alert-danger' role='alert'>
                  Error: STMT didn't execute properly!
                </div>";
    }

    mysqli_stmt_bind_param($STMT, "ssi", $_SESSION['id'], $stranger, $cancel);
    mysqli_stmt_execute($STMT);

    header("location: ../search.php");
    exit();

}


// Status accept
// ACC_BTN
if(isset($_POST['accBtn'])) {

    $soulmate = $_POST['accBtn'];
    $accept = 1;
    $taken = 1;

    // Changing status of id_user1 = $_SESSION['id']
    $sqlAcc1 = "UPDATE relationships SET status = $accept WHERE id_user1 = {$_SESSION['id']} AND id_user2 = $soulmate AND (status = 0 OR status = 3 OR status = 4);";
    mysqli_query($DB,$sqlAcc1);

    // Changing status of id_user1 = $soulmate
    $sqlAcc2 = "UPDATE relationships SET status = $accept WHERE id_user1 = $soulmate  AND id_user2 = {$_SESSION['id']} AND (status = 0 OR status = 3 OR status = 4);";
    mysqli_query($DB,$sqlAcc2);

    // Changing status to taken = 1 in users table ($_SESSION['id'])
    $sqlTkn1 = "UPDATE users SET taken = $taken WHERE id_user = {$_SESSION['id']};";
    mysqli_query($DB, $sqlTkn1);

    // Changing status to taken = 1 in users table ($soulmate)
    $sqlTkn2 = "UPDATE users SET taken = $taken WHERE id_user = $soulmate;";
    mysqli_query($DB, $sqlTkn2);

    // Change status to cancel = 3 for every other relationship ($_SESSION['id'])
    $sqlCanc1 = "UPDATE relationships SET status = 3 WHERE (id_user1 = {$_SESSION['id']} OR id_user1 = $soulmate)  AND (id_user1 <> {$_SESSION['id']} OR id_user1 <> $soulmate)  AND status = 0;";
    mysqli_query($DB,$sqlCanc1);
    
    // Change status to cancel = 3 for every other relationship ($soulmate)
    $sqlCanc2 = "UPDATE relationships SET status = 3 WHERE (id_user1 <> {$_SESSION['id']} OR id_user1 <> $soulmate)   AND (id_user1 = {$_SESSION['id']} OR id_user1 = $soulmate)  AND status = 0;";
    mysqli_query($DB,$sqlCanc2);




    
    header("location: ../profile.php");
    exit();
}

// Status breakup
// BRK_BTN
if(isset($_POST['brkBtn'])) {

    $enemy = findYourSoulmate($DB,"id_user");
    $break = 4;
    $taken = 0;

    // Make all previous messages unavailable 
    $sqlUMsg = "UPDATE rposts SET unavailable = 1 WHERE (id_sender = {$_SESSION['id']} AND id_recipient = $enemy) OR (id_sender = $enemy AND id_recipient = {$_SESSION['id']});"; 
    mysqli_query($DB, $sqlUMsg);

    // Change status to 4 in relationships table
    $sqlBrk = "UPDATE relationships SET status = {$break} WHERE (id_user1 = {$_SESSION['id']} AND id_user2 = $enemy) OR (id_user1 = $enemy AND id_user2 = {$_SESSION['id']}); ";
    mysqli_query($DB, $sqlBrk);

 
    

    // Changing status to taken = 0 in users table ($_SESSION['id'])
    $sqlTkn1 = "UPDATE users SET taken = $taken WHERE id_user = {$_SESSION['id']};";
    mysqli_query($DB, $sqlTkn1);
   
    // Changing status to taken = 0 in users table ($soulmate)
    $sqlTkn2 = "UPDATE users SET taken = $taken WHERE id_user = $enemy;";
    mysqli_query($DB, $sqlTkn2);

       header("location: ../profile.php");
       exit();


}