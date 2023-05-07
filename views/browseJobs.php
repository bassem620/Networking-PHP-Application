<?php
require_once "../controllers/jobController.php";
$jobController = new JobController;
// Check Session
if (!isset($_SESSION["id"])) {
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: auth/login.php");
        exit();
    }
}

// if (array_key_exists('getJobId', $_POST)) {
//     header("Location: jobs.php?id=" . $getJobs[$_POST["getCourse"]]["id"]);
//     exit();
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jobs</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../views/assets/job_files/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../views/assets/job_files/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../views/assets/job_files/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../views/assets/job_files/css/style.css" rel="stylesheet">
</head>

<body>
    <?php require_once "components/header.php" ?>
    <?php require_once "components/head.php" ?>
    <div class="container-xxl bg-white pt-5">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Browse Jobs</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <h6 class="mt-n1 mb-0">Jobs</h6>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <h6 class="mt-n1 mb-0">Applied Jobs</h6>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <?php

                            $getJobs = $jobController->getJobs($_SESSION["id"]);
                            if ($getJobs != null) {
                                foreach ($getJobs as $key => $row) {
                                    echo "<div class=\"job-item p-4 mb-4\">
                                            <div class=\"row g-4\">
                                            <div class=\"col-sm-12 col-md-8 d-flex align-items-center\">
                                            <div class=\"text-start ps-4\">
                                            <h5 class=\"mb-3\">" . $row["title"] . "</h5>
                                            <span class=\"text-truncate me-3\"><i class=\"fa fa-map-marker-alt text-primary me-2\"></i>" . $row["location"] . "</span>
                                            <span class=\"text-truncate me-0\"><i class=\"far fa-money-bill-alt text-primary me-2\"></i>" . $row["salary"] . "</span>
                                        </div>
                                        </div>
                                    <div class=\"col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center\">
                                        <div class=\"d-flex mb-3\">
                                        <form method=\"POST\" action=\"jobs.php\" class=\"w-100\">
                                            <!--<a class=\"btn btn-primary\" href=\"\">Apply Now</a>-->
                                            <button type=\"submit\" class='btn btn-primary btn-md' name=\"getJobId\" value=" . $row["id"] . "> Apply Now</button>    
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                                }
                            } else {
                                echo "No jobs offers available now";
                            }
                            ?>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <?php
                            $getJobs = $jobController->getAllMyAppliedJobs($_SESSION["id"]);
                            if ($getJobs) {
                                foreach ($getJobs as $key => $row) {
                                    echo "
                                                <div class=\"job-item p-4 mb-4\">
                                                <div class=\"row g-4\">
                                                <div class=\"col-sm-12 col-md-8 d-flex align-items-center\">
                                                <div class=\"text-start ps-4\">
                                                <h5 class=\"mb-3\">" . $row["title"] . "</h5>
                                                <span class=\"text-truncate me-3\"><i class=\"fa fa-map-marker-alt text-primary me-2\"></i>" . $row["location"] . "</span>
                                                <span class=\"text-truncate me-0\"><i class=\"far fa-money-bill-alt text-primary me-2\"></i>" . $row["salary"] . "</span>
                                            </div>
                                            </div>
                                        <div class=\"col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center\">
                                        </div>
                                    </div>
                                </div>";
                                }
                            } else {
                                echo "You didn't apply for jobs";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jobs End -->

            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../views/assets/job_files/lib/wow/wow.min.js"></script>
        <script src="../views/assets/job_files/lib/easing/easing.min.js"></script>
        <script src="../views/assets/job_files/lib/waypoints/waypoints.min.js"></script>
        <script src="../views/assets/job_files/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="../views/assets/job_files/js/main.js"></script>
        <?php require_once "components/footer.php" ?>
</body>

</html>