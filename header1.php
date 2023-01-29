 <?php
    
    require_once("scripts/functions-scr.php");
    require_once("scripts/functions2-scr.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS CUSTOM LINK -->
    <link rel="stylesheet" href="style.css">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- EMOJI CSS -->
    <link rel="stylesheet" href="emojionearea.min.css">
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Menu</title>
    <!-- JQUERY CDN -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    
    
</head>
<body>
 
 <!-- NAVBAR -->
 <nav id="menu" class="navbar navbar-expand-sm bg-dark navbar-dark py-2">
        <div class="container">
                        <!-- ICON BRAND -->
            <a href="#" class="navbar-brand">
                <i class="bi-heart text-warning h1"></i>
                <span class="h2">Itchy Heart</span>
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu-links">
                <span class="navbar-toggler-icon"></span>
            </button>

                        <!-- MENU LINKS -->
            <div id="menu-links" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                 
                    <?php
                        if(isset($_SESSION["id"])) {
                            // Home link
                            echo  "<li class='nav-item'>";
                            echo  "<a href='home.php' class='nav-link'>HOME</a>  </li>";
                            // Profile link
                            echo  "<li class='nav-item'>";
                            echo  "<a href='profile.php' class='nav-link'>".$_SESSION['fname']."</a>  </li>";
                            // Logout link
                            echo  "<li class='nav-item'>";
                            echo  "<a href='scripts/logout-scr.php' class='nav-link'> LOG OUT</a>  </li>";
       
                        
                        }
                        else {
                           
                        echo "<li class='nav-item'>";
                        echo   "<a href='registration.php' class='nav-link'>Registration</a> </li>";
                        echo "<li class='nav-item'>";
                        echo   "<a href='login.php' class='nav-link'>Login</a> </li>";    
                        }

                    ?>
                    <!-- <li class="nav-item">
                        Find Your Partner
                    </li> -->
                    <!-- <li class="nav-item">
                        Profile
                    </li> -->
                </ul>

            </div>

            
        </div>
    </nav>