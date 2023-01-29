<?php

require_once 'header1.php';


// Redirect to profile if the user is already in relationship
if(infoUser($DB, "taken") == 1) {
    header("location: profile.php?error=alreadyInRelation");
    exit();
}
?>



<section class="p-5 bg-secondary" style="min-height: 500px;">
  
    <div class="container h-100">
        <div class="row">

     
                             <!-- Button trigger modal -->
                             <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Soulmate Request
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title w-100" id="exampleModalLabel"> 
        <?php
        soulmateRqs($DB);
        ?>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

            <div class="col-md text-white bg-dark border border-info rounded-3 p-3">

                <!-- FORM for searching users -->
               <form action="search.php" method="post">
               
               <div class="input-group mb-3">
              
                <input type="text" class="form-control" name="userInput" placeholder="username" aria-label="username" aria-describedby="basic-addon2">
                <div class="input-group-append">
    
    <button class="btn btn-info text-white" name="searchBtn" type="submit">Search</button>
  </div>
</div>

  


            </form>
            <div class="m-2 text-white bg-dark border border-info rounded-3 p-3">
                <?php
               
                searchUser($DB);
                
                ?>
            </div>
            </div>


          
     

            
        </div>
    </div>
</section>

<?php

 require_once 'footer.php';

 ?>

