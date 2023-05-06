<?php
require_once "../controllers/jobController.php";
// Check Session
    $jobController = new JobController;
    global $jobData;
    $errmsg="";
    if (!isset($_SESSION["id"])) {
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: auth/login.php");
        exit();
    
    
    
}}
if (array_key_exists('getJobId', $_POST)) {
        // collect value of input field
        $jobData = $jobController->getJob($_POST['getJobId']);
    }else{
        $errmsg="error in page";
    }
if (array_key_exists('getApply', $_POST)) {
    $jobController->applyJob($_SESSION["id"],$_POST["getApply"]);
    header("Location: browseJobs.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $jobData[0]["title"] ?></title>
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
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container mt-5">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <div class="text-start ps-4">
                                <h3 class="mb-3"><?php echo $jobData[0]["title"] ?></h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $jobData[0]["location"] ?></span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $jobData[0]["salary"] ?></span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            <p><?php echo $jobData[0]["desc"] ?></p>
                            <h4 class="mb-3">Requirements</h4>
                            <p><?php echo $jobData[0]["req."] ?></p>
                        </div>
                    </div>
        
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: <?php echo $jobData[0]["salary"] ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location:<?php echo $jobData[0]["location"] ?></p>
                            <form method="POST" action="jobs.php" class="w-100 d-flex justify-content-center">              
                                <button type="submit" class='btn btn-primary btn-md' name="getApply" value=<?php echo $jobData[0]["id"] ?>> Apply Now</button>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->

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

