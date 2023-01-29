<?php

    session_start();
    require_once 'dbconnect-scr.php';


// Redirectring user to home.php
function redirect_home() {

    if(isset($_SESSION["id"])) {
        header("location: home.php");
        exit();
    }
  
   
}

// Function for echoing uploadForm
function uploadForm() {
    echo "<form action='scripts/profile-scr.php' method='post' enctype='multipart/form-data'>";
    echo "<label for='formFile' class='form-label'>Upload profile image here:</label>
    <input class='form-control' type='file' id='formFile'  name='profileImg'>";

  echo "<button type='submit' class=' my-2 btn btn-lg btn-outline-dark' data-mdb-ripple-color='dark'
  style='z-index: 1;' name='pimgbtn'>
  Update Profile Image
</button>";
echo "<button type='submit' name='findBtn' class=' mx-2 my-2 btn btn-lg btn-outline-dark' data-mdb-ripple-color='dark'
style='z-index: 1;'>
Find soulmate </button>";




echo "</form>";
}


    // Function for checking the status of the profile image
    function changeStatus($DB) {
        $sqlStatus = "UPDATE users SET pimg = 1 WHERE id_user = {$_SESSION['id']}";
        mysqli_query($DB, $sqlStatus);
      
    }

    // Check if user have profile picture
    function hasPI($DB, $id) {
        $sqlImg = "SELECT pimg FROM users WHERE id_user = {$id};";
        $resultPI = mysqli_query($DB, $sqlImg);
        $row = mysqli_fetch_assoc($resultPI);
        return $row['pimg'];
    
    }

    // FUNCTIONS FOR ~~~search.php~~~

    // Function for listing all users
    function listAllUsers($DB) {
        $sqlList = "SELECT * FROM users;";
        $resultLI = mysqli_query($DB,$sqlList);
        $num = mysqli_num_rows($resultLI);

        if($num > 0) {
            while($row = mysqli_fetch_assoc($resultLI)) {
                echo "<div class='alert alert-primary' role='alert'>
                {$row['id_user']} {$row['fname']} {$row['lname']}
              </div>";
            }
        }
    }
    // Function for searching an user
    function searchUser($DB) {
        if(isset($_POST['searchBtn'])) {
            // Sample of user input search
            $sample = mysqli_real_escape_string($DB, $_POST['userInput']);
            $sqlSearch = "SELECT * FROM users WHERE (fname LIKE '%$sample%' OR lname LIKE '%$sample%') AND id_user <> {$_SESSION['id']} AND taken = 0;";
            $resultSE = mysqli_query($DB, $sqlSearch);
            $numResults = mysqli_num_rows($resultSE);
        

            if($numResults > 0) {
                while($row = mysqli_fetch_assoc($resultSE)) {
                    echo "<div class='alert alert-secondary ' role='alert'>";
                    if(hasPI($DB, $row['id_user']) == 0) {
                        $pid = $row['id_user'];
                        echo "<a href='searchedprofile.php?pid=$pid']'> <img src='profile_img/default.png'
                        alt='Generic placeholder image' class=' col img-fluid img-thumbnail mt-2 mb-2'
                        style='width: 150px; z-index: 1'> </a>";
                      }
                      else if(hasPI($DB, $row['id_user']) == 1) {
                        $pid = $row['id_user'];
                        echo "<a href='searchedprofile.php?pid=$pid']'> <img src='profile_img/profile{$row['id_user']}.jpg?".mt_rand()."'
                        alt='Generic placeholder image' class=' col img-fluid img-thumbnail mt-2 mb-2'
                        style='width: 150px; z-index: 1'> </a>";
                      }
                echo "<p class='mx-3 h4 d-block d-sm-inline '>{$row['id_user']} {$row['fname']} {$row['lname']}</p>";
             
                    //   CHECK STATUS 

                      // (NULL ~ No data)
                      if(statusBtn($DB, $_SESSION['id'],$row['id_user']) == "empty") {
                        echo "<form class='d-inline' action='scripts/addsoul-scr.php' method='post'>";
                        echo "<button type='submit' name='newBtn' value='{$row['id_user']}' class='btn btn-info btn-lg text-white'>ADD</button>";
                        echo "</form>";
                    }

                    // (3 ~ Canceled | 4 ~ Breakup)
                    if(statusBtn($DB, $_SESSION['id'],$row['id_user']) == 34) {
                        echo "<form class='d-inline' action='scripts/addsoul-scr.php' method='post'>";
                        echo "<button type='submit' name='addBtn' value='{$row['id_user']}' class='btn btn-info btn-lg text-white'>ADD</button>";
                        echo "</form>";
                    }
                
                    // (0 ~ New)
                    if(statusBtn($DB, $_SESSION['id'],$row['id_user']) == 0) {
                        echo "<form class='d-inline' action='scripts/addsoul-scr.php' method='post'>";
                        echo "<button type='submit' name='rqsBtn' value='{$row['id_user']}' class='rqsBtn btn btn-warning btn-lg opacity-25'>REQUESTED</button>";
                        echo "</form>";
        
                    }
                    // (1 ~ Active)
                    if(statusBtn($DB, $_SESSION['id'],$row['id_user']) == 1) {
                        echo "<form class='d-inline' action='scripts/addsoul-scr.php' method='post'>";
                        echo "<button type='submit' name='succBtn' value='{$row['id_user']}' class='btn btn-success btn-lg text-white'>ADDED</button>";
                        echo "</form>";
                    }
              echo "</div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                    Error: There's no search results!
              </div>";
            }
        
        }
        
    }


    // FUNCTIONS ofr *searchedprofile.php*

    // Functions for finding info from url pid
    function findInfo($id, $DB, $i) {

        
     
        $sqlFind = "SELECT * FROM users WHERE id_user = ?";
        $STMT = mysqli_stmt_init($DB);
  
        if(!mysqli_stmt_prepare($STMT, $sqlFind)) {
            echo "<div class='alert alert-danger' role='alert'>
                  Error: STMT didn't execute properly!
                </div>";
        
        } else {
            mysqli_stmt_bind_param($STMT, "i", $id);
            mysqli_stmt_execute($STMT);
            $resultFI = mysqli_stmt_get_result($STMT);

    // Find number of posts logged user posted
    $sqlPost = "SELECT * FROM posts WHERE id_user = {$id};";
    $resultPO = mysqli_query($DB, $sqlPost);


    // Number of rows
    $numRows = mysqli_num_rows($resultPO);

           $row = mysqli_fetch_assoc($resultFI);
             
                if($i == "lname") {
                
                    return $row[$i];              
                }

                if($i == "fname") {
                    return $row[$i];
                }

                if($i == 'taken') {
                    return $row[$i];
                }

                if($i == "numRows") {
                    return $numRows;
                }

           
            
            
               

        }
   

    }

    // Function for checking status of the relationship
    // Create return function which return number of the status
    // The if statement has to be in the searchUser function
    function statusBtn($DB, $id1, $id2) {

        $sqlRel = "SELECT * FROM relationships WHERE id_user1 = ? AND id_user2 = ?;";
        $STMT = mysqli_stmt_init($DB);
        if(!mysqli_stmt_prepare($STMT, $sqlRel)) {
            echo "<div class='alert alert-danger' role='alert'>
                  Error: STMT didn't execute properly!
                </div>";
        
        } else {
            mysqli_stmt_bind_param($STMT, "ii", $id1, $id2);
            mysqli_stmt_execute($STMT);
            $resultRE = mysqli_stmt_get_result($STMT);

    

    $row = mysqli_fetch_assoc($resultRE);

    if(isset($row['status'])) {
    if($row['status'] == "3" || $row['status'] == "4") {

        return 34;
    } 
    else if($row['status'] == '0') {
     
        return 0;
    }
    else if($row['status'] == '1') {
      
        return 1;
    } 
}  else {
    return "empty";
}

    
    }
}

// soulmateRqs function
// SELECT ALL WHO INITATE REQUEST TO SESSION USER BUT NOT THE ONES WHICH SESSION USER INIATES
function soulmateRqs($DB) {
    $sqlRqs = "SELECT * FROM relationships INNER JOIN users ON relationships.id_user1 = users.id_user  WHERE id_user2 = ? AND status = ?;";
    $STMT = mysqli_stmt_init($DB);
    $status = 0;

    if(!mysqli_stmt_prepare($STMT, $sqlRqs)) {
        echo "<div class='alert alert-danger' role='alert'>
        Error: STMT didn't execute properly!
      </div>";
    } else {
        mysqli_stmt_bind_param($STMT,"ii", $_SESSION['id'], $status);
        mysqli_stmt_execute($STMT);
        $resultRQ = mysqli_stmt_get_result($STMT);

        while($row = mysqli_fetch_assoc($resultRQ)) {
            echo "<div class='alert alert-secondary ' role='alert'>";
            
            if(hasPI($DB, $row['id_user1']) == 0) {
                echo "<img src='profile_img/default.png'
                alt='Generic placeholder imagessss' class='col img-fluid img-thumbnail mt-2 mb-2'
                style='width: 150px; z-index: 1'>";
              }
              else if(hasPI($DB, $row['id_user1']) == 1) {
                $pid = $row['id_user2'];
                echo "<a href='searchedprofile.php?pid=$pid']'> <img src='profile_img/profile{$row['id_user1']}.jpg?".mt_rand()."'
                alt='Generic placeholder imagedddd' class='col img-fluid img-thumbnail mt-2 mb-2'
                style='width: 150px; z-index: 1'> </a>";
                
              }
              
              echo "<p class='mx-3 h4 d-block d-sm-inline '>{$row['id_user1']} {$row['fname']} {$row['lname']}</p>";

             
                echo "<form class='d-inline' action='scripts/addsoul-scr.php' method='post'>";
                echo "<button type='submit' name='accBtn' value='{$row['id_user1']}' class='addBtn btn btn-warning btn-lg '>ACCEPT</button>";
                echo "</form>";

                if(statusBtn($DB, $_SESSION['id'],$row['id_user']) == 1) {
                    echo "<form class='d-inline' action='scripts/addsoul-scr.php' method='post'>";
                    echo "<button type='submit' name='succBtn' value='{$row['id_user2']}' class='btn btn-success btn-lg text-white'>ADDED</button>";
                    echo "</form>";
                }




         
        }
    }

}


   // Finding information about logged user
   function infoUser($DB, $i) {
    $sqlInfo = "SELECT * FROM users WHERE id_user = {$_SESSION['id']};";
    $resultIN = mysqli_query($DB, $sqlInfo);

    $row = mysqli_fetch_assoc($resultIN);

    // Find number of posts logged user posted
    $sqlPost = "SELECT * FROM posts WHERE id_user = {$_SESSION['id']};";
    $resultPO = mysqli_query($DB, $sqlPost);


    // Number of rows
    $numRows = mysqli_num_rows($resultPO);

if($i == "lname") {

    return $row[$i];              
}

if($i == "fname") {
    return $row[$i];
}

if($i == "taken") {
    return $row[$i];
}

if($i == 'numRows') {
    return $numRows;
}

}

// Find info about soulmate
function findYourSoulmate($DB, $i) {
    $sqlYS = "SELECT * FROM relationships INNER JOIN users ON relationships.id_user2 = users.id_user WHERE (id_user1 = {$_SESSION['id']} OR id_user2 = {$_SESSION['id']})  AND status = 1;";
    $resultYS = mysqli_query($DB, $sqlYS);

    $row = mysqli_fetch_assoc($resultYS);

    if($row['id_user1'] == $_SESSION['id']) {

        if($i == 'id_user') {
            return $row[$i];
        }
    
        if($i == 'lname') {
            return $row[$i];
        }

        if($i == 'fname') {
            return $row[$i];
        }
    }

    else {
        $sqlYS = "SELECT * FROM relationships INNER JOIN users ON relationships.id_user1 = users.id_user WHERE (id_user1 = {$_SESSION['id']} OR id_user2 = {$_SESSION['id']})  AND status = 1 LIMIT 10;";
    $resultYS = mysqli_query($DB, $sqlYS);

    $row = mysqli_fetch_assoc($resultYS);


        if($i == 'id_user') {
            return $row[$i];
        }

        if($i == 'lname') {
            return $row[$i];
        }

        if($i == 'fname') {
            return $row[$i];
        }
    }


}



// FUNCTIONS FOR   *relationchat.php*

function printChat($DB, $soulmateID) {

    $sqlChat = "SELECT * FROM rposts WHERE (id_sender = {$_SESSION['id']} or id_sender = {$soulmateID}) AND unavailable = 0 ORDER BY rpdate desc LIMIT 10;";
    $resultChat = mysqli_query($DB, $sqlChat);

    if(mysqli_num_rows($resultChat) > 0) {
        while($row = mysqli_fetch_assoc($resultChat)) {
            
          if($row['id_sender'] == $_SESSION['id']) {
            echo '<div class="d-sm-flex flex-column align-items-start text-white">';
            echo '<div class="card bg-info m-3 shadow-lg">';
            echo '<div class="card-header">';
            echo $row['rpdate'];
            echo '</div>';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">';
            echo $row['rptext'].' '.$row['emoji'];
            echo '</h4>';
            echo '<p class="card-text">';
            if($row['path'] != null) {
            echo "<img src='".$row['path']."'
            alt='Generic placeholder image' class='col img-fluid img-thumbnail mt-2 mb-2'
            style='width: 350px; z-index: 1'>";
            }
            echo '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

          } else if($row['id_sender'] == $soulmateID) {
            echo '<div class="d-sm-flex flex-column mr-5 align-items-end">';
            echo '<div class="card bg-warning m-3 mr-5 shadow-lg">';
            echo '<div class="card-header">';
            echo $row['rpdate'];
            echo '</div>';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">';
            echo $row['rptext'].' '.$row['emoji'];
            echo '</h4>';
            echo '<p class="card-text">';
            if($row['path'] != null) {
                echo "<img src='".$row['path']."'
                alt='Generic placeholder image' class='col img-fluid img-thumbnail mt-2 mb-2'
                style='width: 350px; z-index: 1'>";
                }
            echo '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          } 
          
        
            
        }

       
    } else {
        echo '<div class="d-sm-flex flex-column align-items-center">';
        echo '<div class="card bg-secondary m-3">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">There is no any messages yet...</h5>';
        echo '<img class = "rounded img-fluid d-block" style="width: 200px" src="images/undraw_date_night_bda8.svg">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }





}


// FUNCTIONS for home.php

function printPosts($DB) {

    $sqlPost = "SELECT * FROM posts ORDER BY pdate desc LIMIT 20;";
    $resultPost = mysqli_query($DB, $sqlPost);

    if(mysqli_num_rows($resultPost) > 0) {
        while($row = mysqli_fetch_assoc($resultPost)) {
            

        
          if($row['id_user'] == $_SESSION['id']) {
            echo '<div class="d-flex flex-column align-items-center text-white mx-auto">';
            echo '<div class="iPost  card m-2 bg-info w-50" >';
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
            echo '<div  class="iPost  card m-2 bg-dark w-50" >';
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
}



  


