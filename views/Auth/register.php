<?php

require_once "../../models/users/user.php";
require_once "../../controllers/authController.php";

$errMsg = "";

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName']))
{
    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['firstName']) && !empty($_POST['lastName']))
    {
        $user = new User;
        $auth = new AuthController;

        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->firstName = $_POST['firstName'];
        $user->lastName = $_POST['lastName'];

        if(!$auth->register($user))
        {
            if(!isset($_SESSION["id"]))
            {
                session_start();
            }
            $errMsg = $_SESSION["errMsg"];
        }
        else
        {
            if(!isset($_SESSION["id"]))
            {
                session_start();
            }
            echo "Registered And Logged in as " . $_SESSION["email"];
            header("location: ../home.php");
        }
    }
    else
    {
        $errMsg = "Fill all the credentials";
    }
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
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>LinkedIn - Register</title>
</head>
<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="index.html">LinkedIN</a></h1>
        <a href="login.php" class="get-started-btn">
            Login
        </a>
        </div>
    </header>
    <div class="container d-flex justify-content-center align-items-center vh-100 bg-grey">
        <div class="rounded-5 bg-light shadow h-auto p-5" style="width: 500px;">
            <h2>Register</h2>
            <form action="register.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstName">
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastName">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="login.php" class="d-block pt-2">Already have an account?</a>
                <?php
                    if($errMsg != "")
                    {
                        ?>
                            <div id="error" class="form-text text-danger pt-2"><?php echo $errMsg; ?></div>
                        <?php
                    }
                ?>
            </form>
        </div>
    </div>
    <?php require_once "../components/script.php" ?> 
    <?php require_once "../components/footer.php" ?> 
</body>
</html>