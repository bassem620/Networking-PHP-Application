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
    <?php require_once "../components/head.php" ?>
    <title>LinkedIn - Register</title>
</head>
<body>
    <?php require_once "../components/header.php" ?>
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