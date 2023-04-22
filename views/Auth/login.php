<?php

require_once "../../models/user.php";
require_once "../../controllers/authController.php";

$errMsg = "";

if(isset($_POST['email']) && isset($_POST['password']))
{
    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        $user = new User;
        $auth = new AuthController;

        $user->email = $_POST['email'];
        $user->password = $_POST['password'];

        if(!$auth->login($user))
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
            echo "logged";
            header("location: ../home.php");
        }
    }
    else
    {
        $errMsg = "Email and password are required";
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
    <title>LinkedIn - Login</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100 bg-grey">
        <div class="rounded-5 bg-light shadow h-auto p-5" style="width: 500px;">
            <h2>Login</h2>
            <form action="login.php" method="POST">
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
</body>
</html>