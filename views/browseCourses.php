<?php
require_once "../controllers/learningController.php";

// Check Session
if (!isset($_SESSION["id"])) {
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: auth/login.php");
        exit();
    }
}

$errMsg = "";

// Get Courses
$learn = new LearningController;
$myCourses = $learn->getMyCourses($_SESSION["id"]);
$courses = $learn->getCourses($_SESSION["id"]);
$myCoursesCount = 0;
$coursesCount = 0;
if($myCourses){
    $myCoursesCount = count($myCourses);
}
if($courses){
    $coursesCount = count($courses);
}

// Check Premium
global $checkPremium;
$checkPremium = "buy";
if ($_SESSION["profileType"] == 1 || $_SESSION["profileType"] == 2) {
    $checkPremium = "enroll";
}

// Enroll/Buy Button onClick
if (array_key_exists('getCourse', $_POST)) {
    if ($_SESSION["profileType"] == 1 || $_SESSION["profileType"] == 2) {
        if ($learn->enrollCourse($_SESSION["id"], $courses[$_POST["getCourse"]]["course_id"])) {
            header("Location: course.php?id=" . $courses[$_POST["getCourse"]]["course_id"]);
            exit();
        }
        $errMsg = $_SESSION["errMsg"];
    } else {
        header("Location: pay.php?id=" . $courses[$_POST["getCourse"]]["course_id"] . "&price=" . $courses[$_POST["getCourse"]]["price"]);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php require_once "components/head.php" ?>
    <title>LinkedIn - Courses</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <?php require_once "components/header.php"; ?>
    <!-- ======= My Courses ======= -->
    <section id="popular-courses" class="courses">
        <div class="container mt-3" data-aos="fade-up">
            <p class="text-danger">
                <?php
                if ($errMsg !== "") {
                    echo $errMsg;
                } else {
                    echo "";
                }
                ?>
            </p>
            <div class="section-title">
                <br>
                <h2>My</h2>
                <p>Courses (<?php echo $myCoursesCount?>)</p>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <?php
                if ($myCourses) {
                    foreach ($myCourses as $row) {
                        echo "
                        <div class=\"col-lg-4 col-md-6 d-flex align-items-stretch\">
                        <div class=\"course-item\">
                            <img src=\"assets/img/course-1.jpg\" class=\"img-fluid\" alt=\"...\">
                            <div class=\"course-content\">
                            <h3><a href=\"course-details.html\">" . $row["name"] . "</a></h3>
                            <p>" . $row["desc"] . "</p>
                            <div class=\"trainer d-flex justify-content-between align-items-center\">
                                <div class=\"trainer-profile d-flex align-items-center\">
                                    <form method=\"POST\" action=\"events.php\" class=\"w-100\">
                                        <a href=\"course.php?id=" . $row["course_id"] . "\" class='btn btn-success btn-md'>Open</a>    
                                    </form>
                                </div>
                                <div class=\"trainer-rank d-flex align-items-center\">
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        ";
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!-- ======= All Courses ======= -->
    <section id="popular-courses" class="courses pt-0">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <br>
                <h2>All</h2>
                <p>Courses (<?php echo $coursesCount?>)</p>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <?php
                if ($courses) {
                    foreach ($courses as $key=>$row) {
                        echo "
                        <div class=\"col-lg-4 col-md-6 d-flex align-items-stretch\">
                        <div class=\"course-item\">
                            <img src=\"assets/img/course-1.jpg\" class=\"img-fluid\" alt=\"...\">
                            <div class=\"course-content\">
                            <div class=\"d-flex justify-content-between align-items-center mb-3\">
                                <h4>" . $row["price"] . "</h4>
                            </div>
                            <h3><a href=\"course-details.html\">" . $row["name"] . "</a></h3>
                            <p>" . $row["desc"] . "</p>
                            <div class=\"trainer d-flex justify-content-between align-items-center\">
                                <div class=\"trainer-profile d-flex align-items-center\">
                                    <form method=\"POST\" action=\"browseCourses.php\" class=\"w-100\">
                                    <input type=\"hidden\" name=\"getPrice\" value=".$row["price"].">
                                        <button type=\"submit\" class='btn btn-success btn-md' name=\"getCourse\" value=" . $key . ">" . $checkPremium . "</button>    
                                    </form>
                                </div>
                                <div class=\"trainer-rank d-flex align-items-center\">
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        ";
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!-- PreLoader -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <?php require_once "components/footer.php" ?>
</body>

</html>