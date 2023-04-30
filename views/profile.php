<?php




?>













<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>

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

    <!-- 
  Essential stylesheets
  =====================================-->
    <link href="plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="plugins/slick/slick.css" rel="stylesheet">
    <link href="plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">

    <link href="../views/assets/css/style.css" rel="stylesheet">

</head>

<body class="body-wrapper">


    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light navigation">
                        <a class="navbar-brand" href="index.html">
                            <img src="images/logo.png" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav ">
                                <li class="nav-item @@home">
                                    <a class="nav-link" href="index.html">Home</a>
                                </li>
                                <li class="nav-item dropdown dropdown-slide @@dashboard">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#!">Dashboard<span><i class="fa fa-angle-down"></i></span>
                                    </a>

                                    <!-- Dropdown list -->
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item @@dashboardPage" href="dashboard.html">Dashboard</a></li>
                                        <li><a class="dropdown-item @@dashboardMyAds" href="dashboard-my-ads.html">Dashboard My Ads</a></li>
                                        <li><a class="dropdown-item @@dashboardFavouriteAds" href="dashboard-favourite-ads.html">Dashboard Favourite Ads</a></li>
                                        <li><a class="dropdown-item @@dashboardArchivedAds" href="dashboard-archived-ads.html">Dashboard Archived Ads</a></li>
                                        <li><a class="dropdown-item @@dashboardPendingAds" href="dashboard-pending-ads.html">Dashboard Pending Ads</a></li>

                                        <li class="dropdown dropdown-submenu dropright">
                                            <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0501" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdown0501">
                                                <li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
                                                <li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown dropdown-slide active">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item @@about" href="about-us.html">About Us</a></li>
                                        <li><a class="dropdown-item @@contact" href="contact-us.html">Contact Us</a></li>
                                        <li><a class="dropdown-item active" href="user-profile.html">User Profile</a></li>
                                        <li><a class="dropdown-item @@404" href="404.html">404 Page</a></li>
                                        <li><a class="dropdown-item @@package" href="package.html">Package</a></li>
                                        <li><a class="dropdown-item @@singlePage" href="single.html">Single Page</a></li>
                                        <li><a class="dropdown-item @@store" href="store.html">Store Single</a></li>
                                        <li><a class="dropdown-item @@blog" href="blog.html">Blog</a></li>
                                        <li><a class="dropdown-item @@singleBlog" href="single-blog.html">Blog Details</a></li>
                                        <li><a class="dropdown-item @@terms" href="terms-condition.html">Terms &amp; Conditions</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown dropdown-slide @@listing">
                                    <a class="nav-link dropdown-toggle" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Listing <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item @@category" href="category.html">Ad-Gird View</a></li>
                                        <li><a class="dropdown-item @@listView" href="ad-list-view.html">Ad-List View</a></li>

                                        <li class="dropdown dropdown-submenu dropleft">
                                            <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0201" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdown0201">
                                                <li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
                                                <li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="login.html">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="ad-listing.html"><i class="fa fa-plus-circle"></i> Add Listing</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!--==================================
=            User Profile            =
===================================-->

    <section class="user-profile section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- User Widget -->
                        <div class="widget user">
                            <!-- User Image -->
                            <div class="image d-flex justify-content-center">
                                <img src="images/user/user-thumb.jpg" alt="" class="">
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
                                <div>
                                    <label for="start">Start</label>
                                    <select name="" id="start">
                                        <option value="from">From</option>
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--============================
=            Footer            =
=============================-->

    <footer class="footer section section-sm">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0 mb-4 mb-lg-0">
                    <!-- About -->
                    <div class="block about">
                        <!-- footer logo -->
                        <img src="images/logo-footer.png" alt="logo">
                        <!-- description -->
                        <p class="alt-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <!-- Link list -->
                <div class="col-lg-2 offset-lg-1 col-md-3 col-6 mb-4 mb-lg-0">
                    <div class="block">
                        <h4>Site Pages</h4>
                        <ul>
                            <li><a href="dashboard-my-ads.html">My Ads</a></li>
                            <li><a href="dashboard-favourite-ads.html">Favourite Ads</a></li>
                            <li><a href="dashboard-archived-ads.html">Archived Ads</a></li>
                            <li><a href="dashboard-pending-ads.html">Pending Ads</a></li>
                            <li><a href="terms-condition.html">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Link list -->
                <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0 col-6 mb-4 mb-md-0">
                    <div class="block">
                        <h4>Admin Pages</h4>
                        <ul>
                            <li><a href="category.html">Category</a></li>
                            <li><a href="single.html">Single Page</a></li>
                            <li><a href="store.html">Store Single</a></li>
                            <li><a href="single-blog.html">Single Post</a>
                            </li>
                            <li><a href="blog.html">Blog</a></li>



                        </ul>
                    </div>
                </div>
                <!-- Promotion -->
                <div class="col-lg-4 col-md-7">
                    <!-- App promotion -->
                    <div class="block-2 app-promotion">
                        <div class="mobile d-flex  align-items-center">
                            <a href="index.html">
                                <!-- Icon -->
                                <img src="images/footer/phone-icon.png" alt="mobile-icon">
                            </a>
                            <p class="mb-0">Get the Dealsy Mobile App and Save more</p>
                        </div>
                        <div class="download-btn d-flex my-3">
                            <a href="index.html"><img src="images/apps/google-play-store.png" class="img-fluid" alt=""></a>
                            <a href="index.html" class=" ml-3"><img src="images/apps/apple-app-store.png" class="img-fluid" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </footer>
    <!-- Footer Bottom -->
    <footer class="footer-bottom">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-3 mb-lg-0">
                    <!-- Copyright -->
                    <div class="copyright">
                        <p>Copyright &copy; <script>
                                var CurrentYear = new Date().getFullYear()
                                document.write(CurrentYear)
                            </script>. Designed & Developed by <a class="text-white" href="https://themefisher.com">Themefisher</a></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Social Icons -->
                    <ul class="social-media-icons text-center text-lg-right">
                        <li><a class="fa fa-facebook" href="https://www.facebook.com/themefisher"></a></li>
                        <li><a class="fa fa-twitter" href="https://www.twitter.com/themefisher"></a></li>
                        <li><a class="fa fa-pinterest-p" href="https://www.pinterest.com/themefisher"></a></li>
                        <li><a class="fa fa-github-alt" href="https://www.github.com/themefisher"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Container End -->
        <!-- To Top -->
        <div class="scroll-top-to">
            <i class="fa fa-angle-up"></i>
        </div>
    </footer>

    <!-- 
Essential Scripts
=====================================-->
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

</body>

</html>