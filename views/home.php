<?php
session_start();
    

    echo $_SESSION["id"];
    echo "<br/>";
    echo $_SESSION["email"];
    require_once "../controllers/learningController.php";
    
    $db = new courses;
    $result = $db->getCourses();
    echo $result;

    
?>