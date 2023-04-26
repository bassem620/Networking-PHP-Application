<?php
    require_once "../controllers/premiumController.php";
    require_once "../models/users/premium.php";

    if(!isset($_SESSION["id"]))
    {
        session_start();
    }

    echo $_SESSION["id"];
    echo "<br/>";
    echo $_SESSION["email"];

?>