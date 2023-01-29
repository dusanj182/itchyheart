<?php

    require_once 'functions2-scr.php';


    $new = $_POST['newP'];
    $width = $_POST['width'];

    $sqlPost = "SELECT * FROM posts ORDER BY pdate desc LIMIT $new;";
    $resultPost = mysqli_query($DB, $sqlPost);

    if(mysqli_num_rows($resultPost) > 0) {
        while($row = mysqli_fetch_assoc($resultPost)) {
            

        
          if($row['id_user'] == $_SESSION['id']) {
            echo '<div class="d-flex flex-column align-items-center text-white mx-auto">';
            echo "<div class='iPost card m-2 bg-info {$width}'>";
            echo '<div class="card-header">';
            echo '<div class="d-flex flex-column align-items-start text-white">';
            if(hasPI($DB, $_SESSION['id']) == 0) {
                echo "<img src='profile_img/default.png'
                alt='Generic placeholder image' class='col img-fluid img-thumbnail m-2 mb-2'
                style='width: 100px; z-index: 1'>";
              }
              else if(hasPI($DB, $_SESSION['id']) == 1) {
                echo "<img src='profile_img/profile{$_SESSION['id']}.jpg?".mt_rand()."'
                alt='Generic placeholder image' class='col img-fluid img-thumbnail m-2 mb-2'
                style='width: 100px; z-index: 1'>";
              }

            echo "<h3>";
            echo infoUser($DB, "fname");
            echo " ";
            echo infoUser($DB, "lname");
            echo "</h3>";
            echo $row['pdate'];
            echo '</div>';
            echo '</div>';
      
            echo '<div class="card-body">';
            echo '<h3 class="card-title">';
            echo $row['ptitle'];
            echo '</h3>';
            if($row['ftitle'] != null) {
                echo '<div class="card-header">';
                echo "<img src='".$row['ftitle']."'
                alt='Generic placeholder image' class='col  img-fluid mt-2 mb-2'
              z-index: 1'>";
                echo '</div>';
                }
            echo '<p class="card-text h5">';
            echo $row['ptext'];
            echo '</p>';
            // echo '<a href="#" class="btn btn-primary">Go somewhere</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

          } else {
            echo '<div class="d-flex flex-column align-items-center text-white">';
            echo "<div  class='iPost card m-2 bg-dark {$width}'>";
            echo '<div class="card-header">';
            echo '<div class="d-flex flex-column align-items-start text-white">';
            if(hasPI($DB, $row['id_user']) == 0) {
                echo "<img src='profile_img/default.png'
                alt='Generic placeholder image' class='col img-fluid img-thumbnail m-2 mb-2'
                style='width: 100px; z-index: 1'>";
              }
              else if(hasPI($DB, $row['id_user']) == 1) {
                echo "<img src='profile_img/profile{$row['id_user']}.jpg?".mt_rand()."'
                alt='Generic placeholder image' class='col img-fluid img-thumbnail m-2 mb-2'
                style='width: 100px; z-index: 1'>";
              }
            echo "<h3>";
            echo findInfo($row['id_user'], $DB, "fname");
            echo " ";
            echo findInfo($row['id_user'], $DB, "lname");
            echo "</h3>";
            echo $row['pdate'];
            echo '</div>';
            echo '</div>';
      
            echo '<div class="card-body shadow-lg">';
            echo '<h3 class="card-title">';
            echo $row['ptitle'];
            echo '</h3>';
            if($row['ftitle'] != null) {
                echo '<div class="card-header">';
                echo "<img src='".$row['ftitle']."'
                alt='Generic placeholder image' class='col img-fluid img-thumbnail mt-2 mb-2'
              z-index: 1'>";
                echo '</div>';
                }
            echo '<p class="card-text h5">';
            echo $row['ptext'];
            echo '</p>';
            // echo '<a href="#" class="btn btn-primary">Go somewhere</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

          } 


        }
    } else {
        echo '<div class="d-sm-flex flex-column align-items-center">';
        echo '<div class="card bg-secondary m-3">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title p-2">There is no any post yet...
   
        </h5>';
        echo '<img class = "rounded img-fluid d-block" style="width: 200px" src="images/undraw_void_-3-ggu.svg">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }


    ?>

