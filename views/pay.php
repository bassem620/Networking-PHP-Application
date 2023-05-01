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
$learn = new LearningController;
if(isset($_GET["enteredPrice"])){
    if($_GET["enteredPrice"]==$_GET["price"]){
        if ($learn->enrollCourse($_SESSION["id"], $_GET["id"])) {
            header("Location: course.php?id=" . $_GET["id"]);
            exit();
        }

    }
    $errMsg = "Wrong price";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>LinkedIn - Pay</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100 bg-grey">
        <div class="rounded-5 bg-light shadow h-auto p-5" style="width: 500px;">
            <h2>Pay</h2>
            <form action="pay.php" method="GET">
                <div class="mb-3">
                    <label class="form-label">Price (<?php echo  $_GET["price"]?>)</label>
                    <input type="text" class="form-control" name="enteredPrice">
                    <input type="hidden" name="price" value = <?php echo $_GET["price"]?>>
                    <input type="hidden" name="id" value =<?php echo $_GET["id"] ?>>
                    <div class="text-danger" id="errorMessage"><?php echo $errMsg ?></div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="browseCourses.php" class="btn btn-secondary">close</a>
            </form>
        </div>
    </div>
</body>

</html>