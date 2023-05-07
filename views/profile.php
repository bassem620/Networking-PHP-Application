<?php

require_once "../controllers/userController.php";
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
$result = $userController->getUser($_GET["id"]);
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

$checkResult = $userController->checkConnection($_SESSION["id"], $_GET["id"]);
$pending = null;
if ($checkResult) {
    if ($checkResult[0]["state"] == 0) {
        $pending = true;
    } else {
        $pending = false;
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
    <title><?php echo $user->firstName . " " . $user->lastName; ?></title>

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
                <div class="col-12">
                    <div class="sidebar">
                        <div class="widget user">
                            <!-- User Image -->
                            <div class="image d-flex justify-content-center">
                                <img src="../views/assets/img/about.jpg" alt="" class="">
                            </div>
                            <!-- User Name -->
                            <h5 class="text-center"><?php echo $user->firstName . " " . $user->lastName; ?></h5>
                            <?php
                            // Premium Badge
                            if ($user->profileType > 0) { ?>
                                <h6 class="text-center">
                                    (Premium User)
                                </h6> <?php
                                    }
                                        ?>
                            <div class="d-flex justify-content-center align-items-center">
                                <?php
                                // Buttons
                                if ($_GET["id"] == $_SESSION["id"]) { ?>
                                    <a href="editProfile.php" class="get-started-btn">
                                        Edit Profile
                                    </a> <?php
                                        } else {
                                            if (!$checkResult) { ?>
                                        <a href="profileLogic.php?fn=connect" class="get-started-btn">
                                            Connect
                                        </a> <?php
                                            } else if ($pending) { ?>
                                        <a href="profileLogic.php?fn=rmRequest" class="get-started-btn">
                                            Pending
                                        </a> <?php
                                            } else { ?>
                                        <a href="profileLogic.php?fn=rmRequest" class="get-started-btn">
                                            Remove
                                        </a> <?php
                                            }
                                        }
                                        // Subscription 
                                        if ($_GET["id"] == $_SESSION["id"] && $user->profileType == 0) { ?>
                                    <a href="profileLogic.php?fn=upgradeToPremium" class="get-started-btn">
                                        Upgrade To Premium
                                    </a> <?php
                                        } else if ($_GET["id"] == $_SESSION["id"] && $user->profileType > 0) { ?>
                                    <a href="profileLogic.php?fn=cancelSubscription" class="get-started-btn">
                                        Cancel Subscription
                                    </a>
                                    <a href="profileLogic.php?fn=exportConnections" class="get-started-btn">
                                        Export Connections
                                    </a>
                                    <?php
                                            if ($user->profileType == 1) { ?>
                                        <a href="profileLogic.php?fn=hideConnections" class="get-started-btn">
                                            Hide Connections
                                        </a>
                                    <?php
                                            } else { ?>
                                        <a href="profileLogic.php?fn=showConnections" class="get-started-btn">
                                            Show Connections
                                        </a>
                                <?php
                                            }
                                        }
                                ?>
                            </div>
                        </div>
                        <!-- Dashboard Links -->
                        <div class="widget user-dashboard-menu">
                            <ul>
                                <li class="m-3">
                                    <h6 class="d-inline">Email: </h6> <?php echo $user->email; ?>
                                </li>
                                <?php
                                if ($profile->birthday) { ?>
                                    <li class="m-3">
                                        <h6 class="d-inline">Birthday: </h6> <?php echo $profile->birthday; ?>
                                    </li><?php
                                        }
                                            ?>
                                <?php
                                if ($user->openTo) { ?>
                                    <li class="m-3">
                                        <h6 class="d-inline">Open To: </h6> <?php echo $user->openTo; ?>
                                    </li><?php
                                        }
                                            ?>
                                <?php
                                if ($profile->phone) { ?>
                                    <li class="m-3">
                                        <h6 class="d-inline">Phone: </h6> <?php echo "+20" . $profile->phone; ?>
                                    </li><?php
                                        }
                                            ?>
                                <?php
                                if ($profile->about) { ?>
                                    <li class="m-3">
                                        <h6 class="d-inline">About: </h6> <?php echo $profile->about; ?>
                                    </li><?php
                                }
                                ?>
                            </ul>
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