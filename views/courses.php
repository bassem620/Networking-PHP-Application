<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php require_once "components/head.php" ?>
    <title>Courses - Mentor Bootstrap Template</title>
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
    <?php require_once "components/header.php" ?>
    <main id="main" data-aos="fade-in" class="pt-5">
        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <?php
        require_once "../controllers/learningController.php";
        $learn = new Course;
        $result = $learn->getCourses();
        foreach ($result as $row) {
            echo "
                <div class=\"col-lg-4 col-md-6 d-flex align-items-stretch\">
                    <div class=\"course-item\">
                        <img src=\"assets/img/course-1.jpg\" class=\"img-fluid\" alt=\"...\">
                        <div class=\"course-content\">
                            <div class=\"d-flex justify-content-between align-items-center mb-3\">
                                <button type=\"button\" class=\"btn btn-success\"
                                    onclick=\"enrolCourse()\">Enroll</button>
                                <p class=\"price\">" . $row["price"] . "</p>
                            </div>
                            <h3><a href=\"course-details.html\">" . $row["name"] . "</a></h3>
                            <p>" . $row["desc"] . "</p>
                        </div>
                    </div>
                </div>
            ";
        }
        ?>
                </div>
            </div>
        </section>
    </main>

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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <?php require_once "components/footer.php" ?>
</body>

</html>