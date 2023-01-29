<?php


require_once 'functions2-scr.php';

if(isset($_POST['sendMBtn'])) {

    // Emoji selector value
    $emojiSel = $_POST["emojiSel"];

    // SENDING FILE TO CHAT_IMG DIRECTORY
    // Setting variable for senderImage
    $file = $_FILES['chatImg'];

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

                // Destination of the chat_img directory
                $fileDest = '../chat_img/'.$newName;
                $fileDestDB = 'chat_img/'.$newName;
        
              
                move_uploaded_file($fileTmpName, $fileDest);
              
                header("Location: ../relationchat.php?uploadSuccess");
        
            } else {
                header("location: ../relationchat.php?error=bigFile");
                 exit();
         
            }
        } else {
            header("location: ../relationchat.php?error=uploadError");
            exit();

        }

    } else if(empty($fileName)) {
        $fileDestDB = null;
    }
    
    else {
        header("location: ../relationchat.php?error=wrongFormat");
        exit();
    
    }




    

    // SQL for inserting into table rposts
    $sqlSM = 'INSERT INTO rposts (id_sender, id_recipient, emoji, path) VALUES (?,?,?,?);';
    $STMT = mysqli_stmt_init($DB);
    $soulmateID = findYourSoulmate($DB, 'id_user');

    // Checking for random errors
    if(!mysqli_stmt_prepare($STMT, $sqlSM)) {
        header("location: ../relationchat.php?error=statementFailed");
        exit();
    }

    mysqli_stmt_bind_param($STMT, "iiss", $_SESSION['id'], $soulmateID, $emojiSel, $fileDestDB);
    mysqli_stmt_execute($STMT);

    mysqli_stmt_close($STMT);

    header("location: ../relationchat.php");
    exit();


}

    ?>


