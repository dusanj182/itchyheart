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
          <div class="col rounded-top text-white d-flex flex-row" style="height:200px;">
          <div class="ms-4 mt-5 row" style="width: 250px;">
              <?php
              // Check if user has profile image
              if(hasPI($DB, $_GET['pid']) == 0) {
                echo "<img src='profile_img/default.png'
                alt='Generic placeholder image' class='col img-fluid img-thumbnail mt-2 mb-2'
                style='width: 150px; z-index: 1'>";
              }
              else if(hasPI($DB, $_GET['pid']) == 1) {
                echo "<img src='profile_img/profile{$_GET['pid']}.jpg?".mt_rand()."'
                alt='Generic placeholder image' class='col img-fluid img-thumbnail mt-2 mb-2'
                style='width: 150px; z-index: 1'>";
              }

              
              ?>
              
                <div class="col position-relative">
                <div class="position-absolute bottom-0">
            <?php 
          
              echo "<h3 class='mb-5' style='width: 450px;'>".findInfo($_GET['pid'], $DB, "fname")." ".findInfo($_GET['pid'], $DB, "lname")."</h3>";
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
             <div class="mb-3">
            
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
              
             
              <div class="col-sm p-4">
              <div >
              
                <h3 class='mb-1'>
                  Posts

                </h3>
              
                  <p class="h4 bg-info p-2 text-white  mb-4 card">
                  <?php
                    echo findInfo($_GET['pid'], $DB, "numRows");
                  ?>
                  </p>


              </div>
              <div>
             
              <h3 class="mb-1">Soulmate</h3>
              <p class="h4 mb-4 bg-warning p-2 mb-0 card">
                <?php
                  if(isset($_GET['lid'])) {
                    echo findInfo($_GET['lid'], $DB, "fname")." ";
                    echo findInfo($_GET['lid'], $DB, "lname");
                  }
                ?>
              </p>
                
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

</div>
             -->

          
            
             
           
    


        
          
</section>
    
</body>
<style>


</style>
</html>