<?php
    require_once "../controllers/learningController.php";
    if(!isset($_SESSION["id"]))
    {
        session_start();
    }

    // Get Courses
    $learn = new Course;
    $result = $learn->getCourses();

    // Check Premium
    global $checkPremium,$profileType;
    $checkPremium = "buy";
    $profileType = $_SESSION["profileType"];
    if($profileType == 1 || $profileType == 2){
        $checkPremium = "enroll";
    }

    // Enroll/Buy Button onClick
    if(array_key_exists('enroll', $_POST))
    {
        if($_SESSION["profileType"] == 1 || $_SESSION["profileType"] == 2)
        {
            // $enrolled = $learn->enrollCourse($_POST["enroll"], $_SESSION["id"]);
            if($learn->enrollCourse($_POST["enroll"], $_SESSION["id"]))
            {
                header("Location: course.php?course=".$_POST["enroll"]);
            }
        } else 
        {
            header("Location: pay.php");
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
    <?php require_once "components/header.php" ; ?>
    <main id="main" data-aos="fade-in" class="pt-5">
        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <?php        
        // Courses
        foreach ($result as $row) {
            echo "
                <div class=\"col-lg-4 col-md-6 d-flex align-items-stretch\">
                    <div class=\"course-item\">
                        <img src=\"assets/img/course-1.jpg\" class=\"img-fluid\" alt=\"...\">
                        <div class=\"course-content\">
                            <div class=\"d-flex justify-content-between align-items-center mb-3\">
                            <form method=\"POST\" action=\"browseCourses.php\">
                                <button type=\"submit\" name=\"enroll\" value=\"" . $row["course_id"] . "\" class=\"btn btn-success\" data-toggle=\"modal\" data-target=\"#myModal\">".$checkPremium."</button>
                            </form>
                                <p class=\"price\">" . $row["price"] . "</p>
                            </div>
                            <div id=\"alert\"></div>
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
    <!-- <div id="myModal" class="modal fade">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            This is an alert message!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        for(let i=0;i<document.getElementsByClassName("btn btn-success").length;i++){
        div = document.getElementsByClassName("btn btn-success")[i]
            div.addEventListener("click", function() {
            if(profileType == 0){
                console.log(profileType+" number "+i);
                    var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                    myModal.hide();
            }
        });}
        
    </script> -->
</body>
<!-- <style>
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-confirm {		
		color: #636363;
		width: 325px;
		margin: 30px auto;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-confirm .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -15px;
	}
	.modal-confirm .form-control, .modal-confirm .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-confirm .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}	
	.modal-confirm .modal-footer {
		border: none;
		text-align: center;
		border-radius: 5px;
		font-size: 13px;
	}	
	.modal-confirm .icon-box {
		color: #fff;		
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -70px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #82ce34;
		padding: 15px;
		text-align: center;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.modal-confirm .icon-box i {
		font-size: 58px;
		position: relative;
		top: 3px;
	}
	.modal-confirm.modal-dialog {
		margin-top: 80px;
	}
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #82ce34;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
	.modal-confirm .btn:hover, .modal-confirm .btn:focus {
		background: #6fb32b;
		outline: none;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style> -->

</html>