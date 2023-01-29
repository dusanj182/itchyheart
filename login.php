
    <?php 
    require_once("header1.php"); 

  
    
    if(isset($_COOKIE["id"])) {
        // session_start();
        $emailExist = emailExists($DB, $_COOKIE['email']);
        $_SESSION["id"] =  $emailExist["id_user"];
        $_SESSION["email"] =  $emailExist["email"];
        $_SESSION["fname"] = $emailExist["fname"];
        $_SESSION["lname"] = $emailExist["lname"];
    }

    redirect_home();


    ?>

    <!-- SHOWCASE -->
    <section class="bg-secondary p-5">
        <div class="container p-1">
            <div class="row justify-content-center">
                <div class="col-md-5 g-3">
                    <div id="form-card" class="card bg-warning">
                        <h3 class="text-center my-3 p-1">Show attention to those who matter</h3>
                        <!-- LOGIN SECTION -->
                 
                            <form id="log-in" class="p-4" action="scripts/login-scr.php" method="post">
                                 
                                        <!-- email -->
                                <label for="email" class="form-label my-1">Email address:</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="peterj@gmail.com">
                                        <!-- password -->
                                <label for="password" class="col-sm-3 col-form-label mt-3" id="pass">Password:</label>
                                <input type="password" class="form-control" name="pass"  id="password">

                                <div class="row my-5 justify-content-center">
                               
                                <div class="col-auto text-center">
                                    <input type="submit" value="LOG ME IN" class="btn btn-secondary" name="btn-log">
                                  </div>
                                

                                <div class="col-auto p-2">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="rememberme" value="remember">
                                      <label class="form-check-label" for="rememberme">
                                        Remember me
                                      </label>
                                    </div>
                                  </div>
                                </div>
                                <a href="registration.php" class="p-3 position-absolute bottom-0 end-0" id="register-link">Don't have an account yet? Register here...</a>
                            </form>
                                                      

                    </div>
                </div>
                <div class="col-md g-3 text-center">
                    <img id="showcase-img" src="images/couple_messages.svg" class="img-fluid my-5" alt="couple_messages">
                </div>
            </div>
        </div>
            <!-- ERROR MESSAGES (PHP) -->
       <?php
            if(isset($_GET["error"])) {

                if($_GET["error"] == "emptyInput") {
                    echo "<p class = 'h4 text-center p-2 m-0 bg-danger'> Error: Fill in all information! </p>";
                }
            
                
                else if($_GET["error"] == "wrongLogin1") {
                    echo "<p class = 'h4 text-center p-2 m-0 bg-danger'>  Error: You've entered incorrect informations!  </p>";
        
                }

                else if($_GET["error"] == "wrongLogin2") {
                    echo "<p class = 'h4 text-center p-2 m-0 bg-danger'> Error: You've entered incorrect informations! </p>";
        
                }
                
     
               
            }
     

    ?>  
    </section>

   


    <!-- FOOTER -->
    <footer class="p-4 bg-info">
         <div class="container ">
            <p class="lead fw-bold text-center">Copyright &copy; 2022 Itchy Heart</p>
            </div>
    </footer>





    <!-- BOOTSTRAP JS -->
    <script src="js/bootstrap.js"></script>
</body>
</html>