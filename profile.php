<?php

require_once("header1.php");


?>

<section class="p-5">
  <div class="container py-5">
    <div class="row justify-content-center h-100">
    <!-- Velicina celokupnog bloka -->
      <div class="col col-lg-9 col-xl-10">
        <!-- Outline granica -->
        <div class="card col bg-dark">
          <div class="col rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
          <div class="ms-4 mt-5 row" style="width: 250px;">
              <?php
              // Check if user has profile image
              if(hasPI($DB, $_SESSION['id']) == 0) {
                echo "<img src='profile_img/default.png'
                alt='Generic placeholder image' class='col img-fluid img-thumbnail mt-2 mb-2'
                style='width: 150px; z-index: 1'>";
              }
              else if(hasPI($DB, $_SESSION['id']) == 1) {
                echo "<img src='profile_img/profile{$_SESSION['id']}.jpg?".mt_rand()."'
                alt='Generic placeholder image' class='col img-fluid img-thumbnail mt-2 mb-2'
                style='width: 150px; z-index: 1'>";
              }

              
              ?>
              
                <div class="col position-relative">
                <div class="position-absolute bottom-0">
            <?php 
          
              echo "<h3 class='mb-5' style='width: 450px;'>".$_SESSION['fname']." ".$_SESSION["lname"]."</h5>";
              ?>
        
              </div>
            </div>
            </div>
     
           
          </div>


          <!-- Buttons and info -->
          <div class="p-2 text-black" style="background-color: #f8f9fa;">
            <div class="py-1">
            <div class="row">
            <div class="col-sm p-4 text-center">
             
              
            
                 


                      
              <?php 
              // Upload form for profile image + find user
              uploadForm(); 



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
                else if($_GET["error"] == "alreadyInRelation") {
                  
                  echo "<div class='alert alert-danger' role='alert'>
                  Error: You are already in relationship with"." ".findYourSoulmate($DB, 'fname')." ".findYourSoulmate($DB, 'lname')." 
                  (If you want to search for other users, you must exit from current relationship)
                  <button type='submit' id='okBtn' name='okBtn' class='btn btn-danger'>OK</button>
                </div>";

               
           
                
       
        

                }
              }
              
              ?>
  
        </div>
             
              <div class="col-sm p-4 ">
              <div>
                <p class="mb-1 h4">Posts</p>
                <p class="h4 mb-4 bg-info p-2 text-white  mb-0 card">
                  <?php
                    echo infoUser($DB, "numRows");
                  ?>
               
               
              </div>
              <div>
                <p class="mb-1 h4">Soulmate</p>
                <p class="h4 bg-warning p-2 mb-0 card">
                  <?php
                  if(infoUser($DB, 'taken') == 1) {
                    echo findYourSoulmate($DB, "fname")." ";
                  
                    echo findYourSoulmate($DB, "lname");

           
                  }

                
                
                    ?>
                  
                </p>
              </div>
              <div class="text-center">
                <?php 
                  if(infoUser($DB, 'taken') == 1) {
                    echo "<button type='submit' class='my-4 btn btn-lg btn-secondary' data-mdb-ripple-color='dark'
                    style='z-index: 1;' id='chatRBtn' name='chatRBtn'>
                    I MISS YOU
                  </button>";
                  }
                  
                  ?>

              </div>
</div>

<!-- <div class="container p-5">
    <h3 class="text-center">Recent Posts</h3>
    <div class="col-md p-3">
      <img src="images/netsuite.jpg" class="img-fluid" alt="">
    </div>
    <div class="col-md p-3">
      <img src="images/netsuite.jpg" class="img-fluid" alt="">
    </div>
  
  
 -->

</div>
  
            
             
           
    


        
          
</section>
    


<?php
  require_once 'footer.php';
?>
            

