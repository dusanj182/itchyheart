
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once "header1.php";

    if(!isset($_SESSION['id'])) {
      header("location: login.php");
      exit();
    }
?>


<!-- POSTS AREA -->

<div class="d-sm-flex flex-column align-items-center m-5">
          <button type="submit" id="refreshBtnP" class="btn btn-lg btn-dark">
          <i class="bi bi-arrow-clockwise h3"></i>
          </button>
           </div>
<div id="postBox" class="container mt-5 p-5">
      

    
      <?php
          printPosts($DB);
        
      ?>

  </div>

  <?php
              echo '<div class="d-flex flex-column align-items-center">';
              echo '<button type="submit" id="showPBtn" class="btn btn-lg btn-secondary">SHOW MORE</button>';
              echo '</div>';
        ?>


<!-- SENDING POSTS AREA -->
<nav id="chatPost" class="bg-dark navbar-dark py-2 fixed-bottom rounded border border-warning w-25" >

    <div class="container ">

     <!--ROW1  -->
    <form name="sendForm" action = "scripts/sendpost-scr.php" method="post" enctype="multipart/form-data">


    <div class="col m-2 card h4 bg-dark">
         <textarea class="colmessagesArea " name = "title" id="exampleFormControlTextarea1" rows="1" minlength="0" maxlength="200" required  placeholder="It all starts with a header"></textarea>
    </div>

    <div class="col ms-1 mt-3 card bg-dark ">
         
    
        <textarea class="row m-2 py-sm-4 py-lg-2" name = "descript" id="exampleFormControlTextarea1" rows="3" minlength="0" maxlength="450" required  placeholder="What are you up to today?"></textarea>
       
    <div class='row'>
         <div class="col ms-1 mt-3 card h4 bg-dark">
                    <label class="col btn btn-info btn-lg text-white">
                    Attach photo <input type="file" name="postImg"  hidden>
                    <i class="bi bi-paperclip"></i>
                    </label>

        </div>
          
    <div class="col ms-1 mt-4 card bg-dark ">
            <button type="submit" id="sendPBtn" name = "sendPBtn"  class="btn btn-warning btn-lg">SEND</button>
    </div>

    </div>



        </div>





    

    
   
            
       
                      <?php
     // Error Messages
     if(isset($_GET["error"])) {

        if($_GET["error"] == "bigFile") {
          echo "<div class='alert alert-danger' role='alert'>
          Error: The file is too big!
        </div>";
        }
    
        
        else if($_GET["error"] == "uploadError") {
          echo "<div class='alert alert-danger' role='alert'>
          Error: There was an error uploading your file!
        </div>";

        }

        else if($_GET["error"] == "wrongFormat") {
          echo "<div class='alert alert-danger' role='alert'>
          Error: You've uploaded wrong type of the file!
          (File needs to in the format of jpg, jpeg or png)
        </div>";

        }
    }

?>


                    </form>
        </div>
         
    
                    </nav>



        <!-- HIDDEN AREA -->

        <!-- SENDING POSTS AREA -->
<nav id="chatPost" class="bg-dark navbar-dark py-2 rounded border border-warning" style="visibility:hidden;">

<div class="container">

 <!--ROW1  -->
<form name="sendForm" action = "scripts/sendpost-scr.php" method="post" enctype="multipart/form-data">


<div class="col m-2 card h4 bg-dark">
     <textarea class="colmessagesArea " name = "title" id="exampleFormControlTextarea1" rows="1" minlength="0" maxlength="200" required  placeholder="It all starts with a header"></textarea>
</div>

<div class="col ms-1 mt-3 card bg-dark ">
     

    <textarea class="row m-2 py-sm-4 py-lg-2" name = "descript" id="exampleFormControlTextarea1" rows="3" minlength="0" maxlength="450" required  placeholder="What are you up to today?"></textarea>
   
<div class='row'>
     <div class="col ms-1 mt-3 card h4 bg-dark">
                <label class="col btn btn-info btn-lg text-white">
                Attach photo <input type="file" name="postImg"  hidden>
                <i class="bi bi-paperclip"></i>
                </label>

    </div>
      
<div class="col ms-1 mt-4 card bg-dark ">
        <button type="submit" id="sendPBtn" name = "sendPBtn"  class="btn btn-warning btn-lg">SEND</button>
</div>

</div>



    </div>







        
   
                  <?php
 // Error Messages
 if(isset($_GET["error"])) {

    if($_GET["error"] == "bigFile") {
      echo "<div class='alert alert-danger' role='alert'>
      Error: The file is too big!
    </div>";
    }

    
    else if($_GET["error"] == "uploadError") {
      echo "<div class='alert alert-danger' role='alert'>
      Error: There was an error uploading your file!
    </div>";

    }

    else if($_GET["error"] == "wrongFormat") {
      echo "<div class='alert alert-danger' role='alert'>
      Error: You've uploaded wrong type of the file!
      (File needs to in the format of jpg, jpeg or png)
    </div>";

    }
}

?>


                </form>
    </div>
     

                </nav>








<?php

    require_once("footer.php");
?>
    
</body>
</html>