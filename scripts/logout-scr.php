<?php

session_start();
session_unset();
session_destroy();

setcookie("id", $emailExist["id_user"], time()-1, "/");

header("location: ../login.php");
exit();