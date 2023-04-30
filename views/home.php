<?php
require_once "../controllers/userController.php";
require_once "../controllers/premiumController.php";
require_once "../controllers/learningController.php";
require_once "../controllers/DBController.php";
require_once "../models/users/premium.php";

if (!isset($_SESSION["id"])) {
    session_start();
}

echo $_SESSION["id"];
echo "<br/>";
echo $_SESSION["email"];

// $db = new Course;
// $result = $db->getCourses();
// print_r($result);

// $pr = new Premium;
// $pr->id = $_SESSION["id"];
// $Premium = new PremiumConrtroller;
// $Premium->hideConnections($pr);

// $usr = new User;
// $usr->id = $_SESSION["id"];
// $usrCont = new UserController;
// $usrCont->upgradeToPremium($usr);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>LinkedIn - Home</title>
</head>

<body>
    <?php require_once "components/header.php" 
    ?>
    <div></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <?php require_once "components/footer.php" 
    ?>
</body>

</html>