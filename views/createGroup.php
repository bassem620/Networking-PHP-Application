<?php

require_once "../models/group.php";
require_once "../controllers/groupController.php";

// Check Session
if (!isset($_SESSION["id"])) {
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: auth/login.php");
        exit();
    }
}

// Groups
$groupCont = new GroupController;

$errMsg = "";

if (isset($_POST['name']) && isset($_POST['desc'])) {
    if (!empty($_POST['name']) && !empty($_POST['desc'])) {
        $group = new Group;
        $controller = new GroupController;

        $group->name = $_POST['name'];
        $group->desc = $_POST['desc'];

        if (!$controller->createGroup($_SESSION["id"], $group)) {
            $errMsg = $_SESSION["errMsg"];
        } else {
            header("location: groups.php");
            exit();
        }
    } else {
        $errMsg = "Invalid credentials";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkedIn - Create group</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>New group</h2>

        <form method="POST" action="createGroup.php">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Group name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="desc">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/linkedIn/views/groups.php" role="button">Cancel</a>
                </div>
            </div>
            <p class="text-danger">
                <?php 
                    if($errMsg !== "") {
                        echo $errMsg;
                    } else {
                        echo "";
                    }
                ?>
            </p>
        </form>
</body>

</html>