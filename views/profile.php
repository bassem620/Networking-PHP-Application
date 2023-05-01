<?php

// Check Session
if (!isset($_SESSION["id"])) {
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: auth/login.php");
        exit();
    }
}

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

    <!-- ** Basic Page Needs ** -->
    <meta charset="utf-8">
    <title>Classimax | Classified Marketplace Template</title>

    <!-- ** Mobile Specific Metas ** -->
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
                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- User Widget -->
                        <div class="widget user">
                            <!-- User Image -->
                            <div class="image d-flex justify-content-center">
                                <img src="../views/assets/img/about.jpg" alt="" class="">
                            </div>
                            <!-- User Name -->
                            <h5 class="text-center">Samanta Doe</h5>
                        </div>
                        <!-- Dashboard Links -->
                        <div class="widget user-dashboard-menu">
                            <ul>
                                <li><a href="index.html">Savings Dashboard</a></li>
                                <li><a href="index.html">Saved Offer <span>(5)</span></a></li>
                                <li><a href="index.html">Favourite Stores <span>(3)</span></a></li>
                                <li><a href="index.html">Recommended</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- Edit Profile Welcome Text -->
                    <div class="widget welcome-message">
                        <h2>profile</h2>

                    </div>
                    <!-- Personal Info -->
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="widget personal-info">
                                <h3 class="widget-header user"> Personal Information</h3>
                                <form action="#">
                                    <!-- First Name -->
                                    <div class="form-group">
                                        <label for="first-name">First Name</label>
                                        <input type="text" class="form-control" id="first-name">
                                    </div>
                                    <!-- Last Name -->
                                    <div class="form-group">
                                        <label for="last-name">Last Name</label>
                                        <input type="text" class="form-control" id="last-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">email</label>
                                        <input type="text" class="form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="birthday">birthday</label>
                                        <input type="text" class="form-control" id="birthday">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">phone</label>
                                        <input type="text" class="form-control" id="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="about">about</label>
                                        <input type="text" class="form-control" id="about">
                                        <button class="btn btn-transparent">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <!-- position -->
                            <div class="widget change-password">
                                <h3 class="widget-header user">position</h3>

                                <!-- title -->
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="titel">
                                </div>
                                <!-- company -->
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" id="company">
                                </div>

                                <div class="form-group">
                                    <label for="industry">Industry</label>
                                    <input type="text" class="form-control" id="industry">
                                </div>
                                <div class="form-group">
                                    <label for="currently_working">Currently working</label>
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="yes">
                                    <label for="vehicle1">Yes</label>
                                    <input type="checkbox" id="vehicle2" name="vehicle2" value="no">
                                    <label for="vehicle2">No</label>


                                </div>
                                <div>
                                    <label for="start">Start</label>
                                    <select name="" id="start">
                                        <option value="from">From</option>
                                        <option value="2018">2015</option>
                                        <option value="2018">2016</option>
                                        <option value="2018">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2028</option>
                                        <option value="2030">2030</option>
                                    </select>
                                    <label for="end">End</label>
                                    <select name="" id="end">
                                        <option value="to">To</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2028</option>
                                        <option value="2030">2030</option>
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <button class="btn btn-transparent">Add</button>
                                <button class="btn btn-transparent">Remove</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <!-- education -->
                            <div class="widget change-password">
                                <h3 class="widget-header user">Education</h3>

                                <!-- title -->
                                <div class="form-group">
                                    <label for="sch.uni">School/University</label>
                                    <input type="text" class="form-control" id="sch.uni">
                                </div>

                                <!-- field of study -->
                                <div class="form-group">
                                    <label for="fos">Field of study</label>
                                    <input type="text" class="form-control" id="fos">
                                </div>




                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <input type="text" class="form-control" id="grade">
                                </div>




                                <!-- degree-->

                                <div>
                                    <label for="start">degree</label>
                                    <select name="" id="degree">
                                        <option value="2018"></option>
                                        <option value="2018">Diploma</option>
                                        <option value="2018">Associate Degree</option>
                                        <option value="2018">Bachelor Degree</option>
                                        <option value="2018">Master's Degree</option>
                                        <option value="2018">Doctorate Degree</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="start">Start</label>
                                    <select name="" id="start">
                                        <option value="from">From</option>
                                        <option value="2018">2015</option>
                                        <option value="2018">2016</option>
                                        <option value="2018">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2028</option>
                                        <option value="2030">2030</option>
                                    </select>
                                    <label for="end">End</label>
                                    <select name="" id="end">
                                        <option value="to">To</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2028</option>
                                        <option value="2030">2030</option>
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <button class="btn btn-transparent">Add</button>
                                <button class="btn btn-transparent">Remove</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <!-- skilles -->
                            <div class="widget change-password">
                                <h3 class="widget-header user">Skilles</h3>

                                <!-- skilles -->
                                <div class="form-group">
                                    <label for="title">Skilles: </label>
                                    <input type="checkbox" id="v1" name="v1" value="e">
                                    <label for="v1">Engineering</label>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">Project Managment</label>
                                    <input type="checkbox" id="v3" name="v3" value="en">
                                    <label for="v2">English</label>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">Research Skills</label>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">Marketing</label><br>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">Adobe Photoshop</label>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">Communication</label><br>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">Strategy</label>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">Analytical Skills</label>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">Finance</label><br>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">Data Analysis</label>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">AutoCAD </label>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">video editing</label><br>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">sales</label><br>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">front-end development</label><br>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">back-end development</label><br>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">Arabic</label><br>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">English</label><br>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">German</label><br>
                                    <input type="checkbox" id="v2" name="v2" value="pm">
                                    <label for="v2">french</label><br>
                                </div>


                                <!-- Submit Button -->
                                <button class="btn btn-transparent">Save</button>

                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <!-- certifications-->
                            <div class="widget change-email mb-0">
                                <h3 class="widget-header user">Certifications</h3>
                                <form action="#">
                                    <!-- name-->
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <!-- organization -->
                                    <div class="form-group">
                                        <label for="organization">Organization</label>
                                        <input type="email" class="form-control" id="organization">
                                    </div>
                                    <!-- date -->
                                    <div class="form-group">
                                        <label for="issue_date">Issue date</label>
                                        <input type="date" class="form-control" id="issue_date">
                                    </div>
                                    <!-- Submit Button -->
                                    <button class="btn btn-transparent">Add</button>
                                    <button class="btn btn-transparent">Remove</button>
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