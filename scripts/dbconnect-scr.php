<?php


    // Variables (DATABASE)
    $serverName = "localhost";
    $dBUser = "root";
    $dBPassword = "";
    $dBName = "itchyheart";


    // CONNECTING TO THE DATABASE
    $DB = mysqli_connect($serverName, $dBUser, $dBPassword, $dBName);


    if(!$DB) {
        die("Connection failed: ".mysqli_connect_error());
    }