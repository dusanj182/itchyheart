<?php



require_once 'functions2-scr.php';

$new = $_POST['newC'];

$soulmateID = findYourSoulmate($DB, "id_user");

$sqlChat = "SELECT * FROM rposts WHERE (id_sender = {$_SESSION['id']} or id_sender = {$soulmateID}) AND unavailable = 0  ORDER BY rpdate desc LIMIT $new;";
$resultChat = mysqli_query($DB, $sqlChat);

if(mysqli_num_rows($resultChat) > 0) {
    while($row = mysqli_fetch_assoc($resultChat)) {
        
      if($row['id_sender'] == $_SESSION['id']) {
        echo '<div class="d-sm-flex flex-column align-items-start text-white">';
        echo '<div class="ss card bg-info m-3 shadow-lg">';
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
    echo '</div>';
    echo '</div>';
    echo '</div>';
}


require_once 'footer.php';

?>



