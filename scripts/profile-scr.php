<?php
    require_once 'functions2-scr.php';

  
    if(isset($_POST['pimgbtn'])) {

        // Setting variable for profile image
        $file = $_FILES['profileImg'];

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
                    $newName = "profile".$_SESSION['id']."."."jpg";

                    // Destination of the profileimages directory
                    $fileDest = '../profile_img/'.$newName;
            
                  
                    move_uploaded_file($fileTmpName, $fileDest);
                    changeStatus($DB);
                    header("Location: ../profile.php?uploadSuccess");
            
                } else {
                    header("location: ../profile.php?error=bigFile");
                     exit();
             
                }
            } else {
                header("location: ../profile.php?error=uploadError");
                exit();

            }

        } else {
            header("location: ../profile.php?error=wrongFormat");
            exit();
        
        }
    }

        // Finding the user
        if(isset($_POST['findBtn'])) {
            header("location: ../search.php");
            exit();
        }



  


