<?php

require_once "../controllers/userController.php";
require_once "../controllers/profileController.php";
require_once "../models/profile/profile.php";
require_once "../models/users/user.php";

// Check Session
if (!isset($_SESSION["id"])) {
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: auth/login.php");
        exit();
    }
}

$userController = new UserController;
$profileController = new ProfileController;
$result = $userController->getUser($_SESSION["id"]);
$user = new User;
$profile = new Profile;

$user->id = $result[0]["id"];
$user->email = $result[0]["email"];
$user->firstName = $result[0]["firstName"];
$user->lastName = $result[0]["lastName"];
$user->profileType = $result[0]["profile_type"];
$user->openTo = $result[0]["open_to"];

$profile->birthday = $result[0]["birthday"];
$profile->phone = $result[0]["phone"];
$profile->about = $result[0]["about"];

$skills = $profileController->getAllSkills($_SESSION["id"]);
$mySkills = $profileController->getMySkills($_SESSION["id"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Edit Profile</title>
    <!-- Mobile Specific Metas  -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Agency HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Classified Marketplace Template v1.0">
    <!-- favicon -->
    <link href="images/favicon.png" rel="shortcut icon">
    <!-- Essential stylesheets -->
    <link href="../views/assets/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../views/assets/plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
    <link href="../views/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../views/assets/plugins/slick/slick.css" rel="stylesheet">
    <link href="../views/assets/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="../views/assets/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="../views/assets/css_george/style.css" rel="stylesheet">

</head>

<body class="body-wrapper">
    <?php require_once "components/header.php" ?>
    <section class="user-profile section">
        <div class="container pt-5 mt-3">
            <div class="row">
                <!-- SideBar -->
                <div class="col-lg-12">
                    <div class="sidebar">
                        <div class="widget user">
                            <div class="image d-flex justify-content-center">
                                <img src="../views/assets/img/about.jpg" alt="" class="">
                            </div>
                            <h5 class="text-center"><?php echo $user->firstName . " " . $user->lastName; ?></h5>
                        </div>
                    </div>
                </div>
                <!-- Profile -->
                <div class="col-lg-12">
                    <div class="widget welcome-message">
                        <h2>profile</h2>
                    </div>
                    <div class="row">
                        <!-- Personal Info -->
                        <div class="col-lg-6 col-md-6">
                            <div class="widget personal-info">
                                <h3 class="widget-header user"> Personal Information</h3>
                                <form action="editProfileLogic.php?fn=personalInfo" method="POST">
                                    <div class="form-group">
                                        <label for="first-name">First Name</label>
                                        <input type="text" class="form-control" name="firstName" value=<?php echo $user->firstName ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="last-name">Last Name</label>
                                        <input type="text" class="form-control" name="lastName" value=<?php echo $user->lastName ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" value=<?php echo $user->email ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="birthday">Birthday</label>
                                        <?php
                                        $birthday = date('Y-m-d', strtotime($profile->birthday));
                                        ?>
                                        <input type="date" class="form-control" name="birthday" value=<?php echo $birthday; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone (+20)</label>
                                        <input type="phone" class="form-control" name="phone" value=<?php echo $profile->phone; ?>>
                                    </div>
                                    <div>
                                    <label for="openTo">Open To</label>
                                        <select name="openTo" id="openTo">
                                            <option value="work">Work</option>
                                            <option value="work">Hiring</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="floatingTextarea2">About</label>
                                        <textarea class="form-control" id="floatingTextarea2" name="about" style="height: 100px">value=<?php echo $profile->about; ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-transparent">Update</button>
                                </form>
                            </div>
                        </div>

                        <!-- Skills & Websites -->
                        <div class="col-lg-6 col-md-6">
                            <!-- Add Skills -->
                            <div class="widget change-password">
                                <h3 class="widget-header user">Add Skill</h3>
                                <form action="editProfileLogic.php?fn=addSkill" method="POST">
                                    <select class="form-select" aria-label="Default select example" name="skill">
                                        <option disabled selected>Select Skill</option>
                                        <?php
                                            foreach($skills as $key => $skill) {
                                                ?><option value=<?php echo $skill["id"] ?>><?php echo $skill["name"]?></option><?php
                                            }
                                        ?>
                                    </select>
                                    <button type="submit" class="btn btn-transparent">Add</button>
                                </form>
                            </div>

                            <!-- Remove Skills -->
                            <div class="widget change-password">
                                <h3 class="widget-header user">Remove Skill</h3>
                                <form action="editProfileLogic.php?fn=rmSkill" method="POST">
                                    <select class="form-select" aria-label="Default select example" name="skill">
                                        <option disabled selected>Select Skill</option>
                                        <?php
                                            foreach($mySkills as $key => $skill) {
                                                ?><option value=<?php echo $skill["id"] ?>><?php echo $skill["name"]?></option><?php
                                            }
                                        ?>
                                    </select>
                                    <button type="submit" class="btn btn-transparent">Remove</button>
                                </form>
                            </div>

                            <!-- Websites-->
                            <div class="widget change-email mb-0">
                                <h3 class="widget-header user">Websites</h3>
                                <form action="editProfileLogic.php?fn=addWebsite" method="POST">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="type">
                                    </div>
                                    <div class="form-group">
                                        <label for="organization">URL</label>
                                        <input type="text" class="form-control" name="url">
                                    </div>
                                    <button type="submit" class="btn btn-transparent">Add</button>
                                </form>
                            </div>
                        </div>

                        <!-- Position -->
                        <div class="col-lg-6 col-md-6">
                            <div class="widget change-password">
                                <h3 class="widget-header user">Position</h3>
                                <form action="editProfileLogic.php?fn=addPos" method="POST">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Company</label>
                                        <input type="text" class="form-control" name="company">
                                    </div>
                                    <div class="form-group">
                                        <label for="industry">Industry</label>
                                        <input type="text" class="form-control" name="industry">
                                    </div>
                                    <div class="form-group">
                                        <label for="curr">Currently Working</label>
                                        <input type="checkbox" name="curr">
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="start">Start date</label>
                                            <input type="date" class="form-control" name="start">
                                        </div>
                                        <div class="form-group">
                                            <label for="end">Expire date</label>
                                            <input type="date" class="form-control" name="end">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-transparent">Add</button>
                                </form>
                            </div>
                        </div>

                        <!-- Education -->
                        <div class="col-lg-6 col-md-6">
                            <div class="widget change-password">
                                <h3 class="widget-header user">Education</h3>
                                <form  action="editProfileLogic.php?fn=addEdu" method="POST">
                                    <div class="form-group">
                                        <label for="schoolName">School/University</label>
                                        <input type="text" class="form-control" name="schoolName">
                                    </div>
                                    <div class="form-group">
                                        <label for="fos">Field of study</label>
                                        <input type="text" class="form-control" name="fos" name="fos">
                                    </div>
                                    <div class="form-group">
                                        <label for="grade">Grade</label>
                                        <input type="text" class="form-control" name="grade" name="grade">
                                    </div>
                                    <div>
                                        <label for="degree">degree</label>
                                        <select name="degree" name="degree">
                                            <option value="Diploma">Diploma</option>
                                            <option value="Associate Degree">Associate Degree</option>
                                            <option value="Bachelor Degree">Bachelor Degree</option>
                                            <option value="Master's Degree">Master's Degree</option>
                                            <option value="Doctorate Degree">Doctorate Degree</option>
                                        </select>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="start">Start date</label>
                                            <input type="date" class="form-control" name="start">
                                        </div>
                                        <div class="form-group">
                                            <label for="end">Expire date</label>
                                            <input type="date" class="form-control" name="end">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-transparent">Add</button>
                                </form>
                            </div>
                        </div>

                        <!-- Certifications-->
                        <div class="col-lg-6 col-md-6">
                            <div class="widget change-email mb-0">
                                <h3 class="widget-header user">Certifications</h3>
                                <form action="editProfileLogic.php?fn=addCert" method="POST">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="organization">Organization</label>
                                        <input type="text" class="form-control" name="organization">
                                    </div>
                                    <div class="form-group">
                                        <label for="organization">Credential ID</label>
                                        <input type="text" class="form-control" name="credId">
                                    </div>
                                    <div class="form-group">
                                        <label for="organization">Credential URL</label>
                                        <input type="text" class="form-control" name="credUrl">
                                    </div>
                                    <div class="form-group">
                                        <label for="issueDate">Issue date</label>
                                        <input type="date" class="form-control" name="issueDate">
                                    </div>
                                    <div class="form-group">
                                        <label for="expDate">Expire date</label>
                                        <input type="date" class="form-control" name="expDate">
                                    </div>
                                    <button type="submit" class="btn btn-transparent">Add</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Essential Scripts -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/popper.min.js"></script>
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
    <script src="plugins/bootstrap/bootstrap-slider.js"></script>
    <script src="plugins/tether/js/tether.min.js"></script>
    <script src="plugins/raty/jquery.raty-fa.js"></script>
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
    <script src="plugins/google-map/map.js" defer></script>
    <script src="script.js"></script>
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