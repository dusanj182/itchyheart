<?php
       
    // ERROR HANDLERS
    // Check if variables are empty
  function emptyReg($fn, $ln, $em, $pa, $par) {
    $output;
    if(empty($fn) || empty($ln) || empty($em) || empty($pa) || empty($par)) {
        $output = true;
    }
    else {
        $output = false;
    }
    return $output;
  }

  // Check if the email is invalid
  function invalidEmail($em) {
    $output;
    if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
          $output = true;
    }

    else {
        $output = false;
    }
    return $output;
  }

// Check if passwords match
  function passMatch($pa, $par) {
    $output;
    if($pa !== $par) {
          $output = true;
    }

    else {
        $output = false;
    }
    return $output;
  }

   // Check if email already exists in database
 function emailExists($DB, $em) {
    $sql = "SELECT * FROM users WHERE email = ? ;";
    $stmt = mysqli_stmt_init($DB);

    // Checking for random errors
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registration.php?error=statementFailed");
        exit();
    }

  
        mysqli_stmt_bind_param($stmt, "s", $em);
        mysqli_stmt_execute($stmt);

        // Getting info from query
        $outputData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($outputData)) {
            return $row;
        }
        else {
            $output = false;
            return $output;

        }

        // Closing statement
        mysqli_stmt_close($stmt);
 
  }



   function createUser($DB, $fn, $ln, $em, $pa) {
    $sql = "INSERT INTO users (email, lname, fname, pwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($DB);

    // Checking for random errors
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registration.php?error=statmentFailed");
        exit();
    }

        $hashed = password_hash($pa, PASSWORD_DEFAULT);

  
        mysqli_stmt_bind_param($stmt, "ssss", $em, $ln, $fn, $hashed);
        mysqli_stmt_execute($stmt);

            // Closing statement
            mysqli_stmt_close($stmt);

        header("location: ../login.php?error=none");
        exit();
    
 
  }

    //   LOGIN FUNCTIONS

  // Creating: Function for empty variables statement
  function emptyLog($em, $pa) {
    $output;
    if(empty($em) || empty($pa)) {
        $output = true;
    }
    else {
        $output = false;
    }
    return $output;
  }
    // CREATING: Function for log in
   function logUser($DB, $em, $pa, $rm) {
    $emailExist = emailExists($DB, $em);

    // If the email doesn't exist
    if($emailExist === false) {
        header("location: ../login.php?error=wrongLogin1");
        exit();
    }

    $hashed = $emailExist['pwd'];
    $checkPwd = password_verify($pa, $hashed);

    if($checkPwd === false) {
        header("location: ../login.php?error=wrongLogin2");
        exit();
    }
    else if($checkPwd === true) {

        // Starting the login session
        session_start();
 
        $_SESSION["id"] =  $emailExist["id_user"];
        $_SESSION["email"] =  $emailExist["email"];
        $_SESSION["fname"] = $emailExist["fname"];
        $_SESSION["lname"] = $emailExist["lname"];
        $_SESSION["taken"] = $emailExist["taken"];

        if(isset($rm)) {
            setcookie("id", $_SESSION["id"], time()+86400,"/");
            setcookie("fname", $_SESSION["fname"], time()+86400,"/");
            setcookie("email",  $_SESSION["email"], time()+86400,"/");
           
     
        }


     
      
        header("location: ../home.php");
        exit();
    }

   }

//    Function redirect 
   function redirect() {
    if(isset($_SESSION["id"])) {
        header("location: ../home.php");
        exit();
    }
    else {
        header("location: ../login.php");
        exit();
    }

   }

   


