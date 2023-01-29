<?php
require_once 'header1.php';


if(infoUser($DB,"taken") == 0 || !$_SESSION['id']) {
    header("location: profile.php");
    exit();
} 
?>

<!-- SOULMATE PROFILE AREA -->
<section class="p-2">

    <div class="container bg-secondary p-4">
    <div class="d-flex  flex-row align-items-center flex-wrap  bg-secondary">
            <div class="mx-2">
                <?php
                $id_soulmate = findYourSoulmate($DB, "id_user");
                     if(hasPI($DB, findYourSoulmate($DB, "id_user")) == 0) {
                        echo "<a href='searchedprofile.php?pid=$id_soulmate&lid={$_SESSION['id']}'> 
                        <img src='profile_img/default.png'
                        alt='Generic placeholder image' class='col img-fluid img-thumbnail mt-2 mb-2'
                        style='width: 150px; z-index: 1'> </a>";
                      }
                      else if(hasPI($DB, findYourSoulmate($DB, "id_user")) == 1) {
                        echo "<a href='searchedprofile.php?pid=$id_soulmate&lid={$_SESSION['id']}'> <img src='profile_img/profile{$id_soulmate}.jpg?".mt_rand()."'
                        alt='Generic placeholder image' class='col img-fluid img-thumbnail mt-2 mb-2'
                        style='width: 150px; z-index: 1'> </a>";
                      }
                      


                ?>

            </div>
            <div class="ms-2 m-4 card bg-dark ">
                <?php
                    $name = findYourSoulmate($DB, "fname")." ".findYourSoulmate($DB, "lname");
                    echo "<p id='nameS' class='h3 bg-warning p-3'>";
                    echo $name;
                    echo "</p>";
                ?>
  
                <form action="scripts/addsoul-scr.php" method="post" onsubmit="return confirm('Do you really want to break up with ' + $('#nameS').text() + '?');">
                 <button type="submit" class="btn btn-danger w-100" name="brkBtn">BREAK UP</button>
                 </form>
            </div>
            
        </div>
</div>
</section>


<!-- CHAT AREA -->
<section class="m-5 p-5 bg-dark">

        


         <div class="d-sm-flex flex-column align-items-start">
          <button type="submit" id="refreshBtnC" class="btn btn-lg btn-secondary">
          <i class="bi bi-arrow-clockwise h3"></i>
          </button>
           </div>
     
    <div id="chatBox" class="container">
      
    
            <?php
                printChat($DB, findYourSoulmate($DB, "id_user"));
              
            ?>
   
        </div>
        <?php
              echo '<div class="d-sm-flex flex-column align-items-center">';
              echo '<button type="submit" id="showBtn" class="btn btn-lg btn-secondary">SHOW MORE</button>';
              echo '</div>';
        ?>

</section>


<!-- SENDING MESSAGE AREA -->
<nav id="chatMessages" class="bg-dark navbar-dark py-2 fixed-bottom rounded border border-warning">

    <div class="container">

     <!--ROW1  -->
    <form name="sendForm" action = "scripts/sendchat-scr.php" method="post" class="row" enctype="multipart/form-data">

    <!-- COL1 -->
    <div class="col ms-1 m-4 card bg-dark">
            <label class="btn btn-info btn-lg text-white">
                    Attach photo <input type="file" name="chatImg"  hidden>
                    <i class="bi bi-paperclip"></i>
                </label>
            </div>


    <!-- COL2 -->
        <div class="col  ms-1 m-4 card bg-dark">
            <select id= "emojiSel" name = "emojiSel" class="form-select bg-secondary" aria-label="Default select example" style='font-size:25px;'>
            <option selected value="&#128151;" style='font-size:30px;'>&#128151;</option>
            <option value="&#128155;" style='font-size:30px;'>&#128155;</option>
            <option value="&#128156;" style='font-size:30px;'>&#128156;</option>
            <option value="&#128158;" style='font-size:30px;'>&#128158;</option>
            <option value="&#128159;" style='font-size:30px;'>&#128159;</option>
            <option value="&#128060;" style='font-size:30px;'>&#128060;</option>
            <option value="&#128059;" style='font-size:30px;'>&#128059;</option>
            <option value="&#127849;" style='font-size:30px;'>&#127849;</option>
            <option value="&#127848;" style='font-size:30px;'>&#127848;</option>
            <option value="&#127843;" style='font-size:30px;'>&#127843;</option>
            <option value="&#127802;" style='font-size:30px;'>&#127802;</option>
            <option value="&#127803;" style='font-size:30px;'>&#127803;</option>
            <option value="&#127769;" style='font-size:30px;'>&#127769;</option>
            <option value="&#127774;" style='font-size:30px;'>&#127774;</option>

            </select>
        </div>
               
            
        <!-- ROW2 -->
        <div class="row ms-1 m-4 card bg-dark ">
            <button type="submit" id="sendMBtn" name = "sendMBtn"  class="btn btn-warning btn-lg">I MISS YOU</button>
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
         
                </div>
                    </nav>


                    <!-- HIDDEN AREA -->
<nav id="chatPost" class="bg-dark navbar-dark py-2  rounded border border-warning" style="visibility:hidden;">

<div class="container">
<div class="row flex-wrap ">
        
<div class="col ms-1 m-4 card bg-dark">
        <label class="btn btn-info btn-lg text-white">
                Attach photo <input type="file" name="chatImg" hidden>
                <i class="bi bi-paperclip"></i>
            </label>
        </div>


       
<div class="col  ms-1 m-4 card bg-dark">
<select name="emojiSel" class="form-select bg-secondary" aria-label="Default select example" style='font-size:25px;'>
<option selected value="1" style='font-size:30px;'>&#128151;</option>
<option value="2" style='font-size:30px;'>&#128155;</option>
<option value="3" style='font-size:30px;'>&#128156;</option>
<option value="4" style='font-size:30px;'>&#128158;</option>
<option value="5" style='font-size:30px;'>&#128159;</option>
<option value="6" style='font-size:30px;'>&#128060;</option>
<option value="7" style='font-size:30px;'>&#128059;</option>
<option value="8" style='font-size:30px;'>&#127849;</option>
<option value="9" style='font-size:30px;'>&#127848;</option>
<option value="10" style='font-size:30px;'>&#127843;</option>
<option value="11" style='font-size:30px;'>&#127802;</option>
<option value="12" style='font-size:30px;'>&#127803;</option>
<option value="13" style='font-size:30px;'>&#127769;</option>
<option value="14" style='font-size:30px;'>&#127774;</option>

</select>
</div>
           
        

        <div class="row ms-1 m-4 card bg-dark ">
            

             <button type="submit" class="btn btn-warning btn-lg">I MISS YOU</button>
        </div>
     
    </div>
</div>
                </nav>


<?php
require_once 'footer.php';
?>

