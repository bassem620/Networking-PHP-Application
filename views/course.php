<?php
    require_once "../controllers/learningController.php";
    if(!isset($_SESSION["id"]))
    {
        session_start();
    }
    $learn = new Course;
    $course = $learn->openEnrolledCourse($_GET["course"], $_SESSION["id"]);
    echo "ID :" . $course[0]['course_id'];
    echo "<br>";
    echo "Name :" . $course[0]['name'];
    echo "<br>";
    echo "Desc : " . $course[0]['desc'];
    echo "<br>";
    echo "Skills : " . $course[0]['skills'];
    echo "<br>";
    echo "Hours : " . $course[0]['hours'];
    echo "<br>";
    echo "Price : " . $course[0]['price'];
?>