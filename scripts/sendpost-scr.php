<?php


require_once 'functions2-scr.php';

if(isset($_POST['sendPBtn'])) {



    // Variables 
    $title = $_POST['title'];
    $descript = $_POST['descript'];

    // SENDING FILE TO POST_IMG DIRECTORY
    // Setting variable for postImage
    $file = $_FILES['postImg'];

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileTmpName = $file['tmp_name'];

    // Divide the name and the extension
    $fileExt  = explode(".",$fileName);

    // Updated extension
    $fileUExt = strtolower(end($fileExt));

    // Allowed extension
    $allowed = array('jpg','jpeg','png');
    

    // Check for valid extensions
    if( in_array($fileUExt, $allowed)) {
        if($fileError === 0) {
            if($fileSize < 50000000) {
                // Transfer all extension to jpg
                $randomID = uniqid();
                $newName = $_SESSION['id'].$randomID."."."jpg";

                // Destination of the post_img directory
                $fileDest = '../post_img/'.$newName;
                $fileDestDB = 'post_img/'.$newName;
        
              
                move_uploaded_file($fileTmpName, $fileDest);
              
                header("Location: ../home.php?uploadSuccess");
        
            } else {
                header("location: ../home.php?error=bigFile");
                 exit();
         
            }
        } else {
            header("location: ../home.php?error=uploadError");
            exit();

        }

    } else if(empty($fileName)) {
        $fileDestDB = null;
    } else {
        header("location: ../home.php?error=wrongFormat");
        exit();
    
    }



       // SQL for inserting into table posts
       $sqlSP = 'INSERT INTO posts (id_user, ftitle, ptitle, ptext) VALUES (?,?,?,?);';
       $STMT = mysqli_stmt_init($DB);
       
   
       // Checking for random errors
       if(!mysqli_stmt_prepare($STMT, $sqlSP)) {
           header("location: ../home.php?error=statementFailed");
           exit();
       }
   
       mysqli_stmt_bind_param($STMT, "isss", $_SESSION['id'], $fileDestDB, $title, $descript);
       mysqli_stmt_execute($STMT);
   
       mysqli_stmt_close($STMT);
   
       header("location: ../home.php");
       exit();
   





}