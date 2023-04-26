<?php
    require_once "../controllers/premiumController.php";
    require_once "../controllers/learningController.php";
    require_once "../models/users/premium.php";

    if(!isset($_SESSION["id"]))
    {
        session_start();
    }

    echo $_SESSION["id"];
    echo "<br/>";
    echo $_SESSION["email"];

    // $db = new Course;
    // $result = $db->getCourses();
    // print_r($result);

    // $pr = new Premium;
    // $pr->id = $_SESSION["id"];
    // $Premium = new PremiumConrtroller;
    // $Premium->hideConnections($pr);

?>