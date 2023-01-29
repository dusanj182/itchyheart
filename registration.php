
<?php 

require_once("header1.php"); 
redirect_home();

?>

    
    <!-- SHOWCASE -->
    <section class="bg-info p-5">
        <div class="container p-1">
            <div class="row justify-content-center">
                <div class="col-md-5 g-3">
                    <div id="form-card" class="card bg-warning">
                        <h3 class="text-center my-3 p-1">Register Today</h3>
                        
                        <!-- REGISTER SECTION -->

                        <form id="registration-form" class="p-4" action="scripts/registration-scr.php" method="post">
                            <!-- first name -->
                            <label for="fname" class="col-form-label mt-3">Your First Name:</label>
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="Peter">
                            <!-- last name -->
                            <label for="lname" class="col-form-label mt-3">Your Last Name:</label>
                            <input type="text" class="form-control" name="lname" id="lname" placeholder="J">
                            <!-- email -->
                            <label for="email" class="col-form-label mt-3">Email address:</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="peterj@gmail.com">
                            <!-- password -->
                            <label for="password" class="col-form-label mt-3">Password:</label>
                            <input type="password" class="form-control" name="pass" id="password">

                            <!-- password repeat -->
                            <label for="password" class="col-form-label mt-3">Password:</label>
                            <input type="password" class="form-control" name="passrep" id="passrep">

                            <div class="row my-5 justify-content-center">

                                <div class="col-auto text-center">
                                    <button type="submit" name="btn-reg" class="btn btn-secondary">REGISTER</button>
                                </div>



                            </div>



                        </form>

                    </div>
                </div>
                <div class="col-md g-3 text-center">
                    <img id="showcase-img" src="images/undraw_everywhere_together_re_xe5a.svg" class="img-fluid d-none d-sm-block p-5" 
                        alt="couple_messages">
                </div>
            </div>
        </div>
        
                          <!-- ERROR MESSAGES (PHP) -->
    <?php
            if(isset($_GET["error"])) {

                if($_GET["error"] == "emptyInput") {
                    echo "<p class = 'h4 text-center p-2 m-0 bg-danger'> Error: Fill in all information! </p>";
                }
                
                else if($_GET["error"] == "invalidEmail") {
                    echo "<p class = 'h4 text-center p-2 m-0 bg-danger'> Error: You've entered invalid email! </p>";
                }
                
                else if($_GET["error"] == "passwordIncompatibility") {
                    echo "<p class = 'h4 text-center p-2 m-0 bg-danger'> Error: Passwords don't match! </p>";
                }
                
                else if($_GET["error"] == "statementFailed") {
                    echo "<p class = 'h4 text-center p-2 m-0 bg-danger'> Error: Something went wrong! </p>";
                }
                
                else if($_GET["error"] == "emailExist") {
                    echo "<p class = 'h4 text-center p-2 m-0 bg-danger'> Error: This email already exists! </p>";
                }

                else if($_GET["error"] == "none") {
                    echo "<p class = 'h4 text-center bg-success'> You've successfully signed up! </p>";
                }
            }


    ?>  
    </section>



    <!-- BOXES -->
    <section class="p-5 bg-dark">
        <div class="container">
            <div class="row text-center">
                <div class="col-md  p-3">
                    <div class="card bg-secondary">
                        <div class="h1 mb-3">
                            <i class="bi-heart-fill text-warning"></i>
                        </div>
                        <h3 class="card-title mb-3">Post Publicly</h3>
                        <p class="card-text mb-3 p-3">With our main portal, you can share all your thoughts and pictures
                            with your partner publicly and if you don't have one yet, you can meet them right here.</p>
                    </div>
                </div>
                <div class="col-md p-3">
                    <div class="card bg-secondary">
                        <div class="h1 mb-3">
                            <i class="bi-envelope-fill text-info"></i>
                        </div>
                        <h3 class="card-title mb-3">Communication One 2 One</h3>
                        <p class="card-text mb-3 p-3">We make smiles appear on one to one communication with your
                            partner. Show your beloved one's that you miss them when they are not by your side. </p>
                    </div>
                </div>
                <div class="col-md  p-3">
                    <div class="card bg-secondary">
                        <div class="h1 mb-3">
                            <i class="bi bi-file-lock-fill"></i>
                        </div>
                        <h3 class="card-title mb-3">We Value Privacy</h3>
                        <p class="card-text mb-3 p-1">You want to communicate with you loved ones but you're not sure
                            about privacy of the app? It's good to know that Itchy Heart respects the privacy of each user, everything you send to your partner will be only viewed by you and beloved one. </p>
                    </div>
                </div>

            </div>
        </div>
    </section>




    <!-- FOOTER -->
    <footer class="p-5 bg-warning position-relative">
        <div class="container">
            <p class="lead fw-bold">Copyright &copy; 2022 Itchy Heart</p>
            <a href="registration.php" class="position-absolute bottom-0 end-0 p-5">
                <i class="bi bi-arrow-up-circle h1 text-dark"></i>
            </a>
        </div>
       
    </footer>

    <!-- MODAL -->
    <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="register-modal-Label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="register-modal-Label">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="lead">Register your account here</p>
                    <form action="">
                        <div class="mb-3">
                            <label for="fname" class="col-form-label">
                                First Name:
                            </label>
                            <input type="text" name="fname" id="fname" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="lname" class="col-form-label">
                                Last Name:
                            </label>
                            <input type="text" name="lname" id="lname" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">
                                E-mail:
                            </label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="col-form-label">
                                Password
                            </label>
                            <input type="text" name="pass" id="pass" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

  

</body>

</html>