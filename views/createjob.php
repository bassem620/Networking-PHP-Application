<?php
require_once "../models/job.php";
require_once "../controllers/jobController.php";

// Check Session
if (!isset($_SESSION["id"])) {
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: auth/login.php");
        exit();
    }
}

$errMsg = "";

if (isset($_POST['title']) && isset($_POST['desc']) && isset($_POST['req']) && isset($_POST['salary']) && isset($_POST['company']) && isset($_POST['location'])) {
    if (!empty($_POST['title']) && !empty($_POST['desc']) && !empty($_POST['req']) && !empty($_POST['salary']) && !empty($_POST['company']) && !empty($_POST['location'])) {
        $job = new Job;
        $controller = new JobController;

        $job->title = $_POST['title'];
        $job->desc = $_POST['desc'];
        $job->req = $_POST['req'];
        $job->salary = $_POST['salary'];
        $job->company = $_POST['company'];
        $job->location = $_POST['location'];

        if (!$controller->offerJob($_SESSION["id"], $job)) {
            $errMsg = $_SESSION["errMsg"];
        } else {
            header("location:/linkedIn/views/postJob.php");
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
    <title>LinkedIn - Create Job</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>New Job</h2>

        <form method="POST" action="createjob.php">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Title of the job</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="title">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="desc">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Requirements</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="req">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Salary</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="salary">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Company</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="company">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">location</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="location">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/linkedIn/views/postJob.php" role="button">Cancel</a>
                </div>
            </div>
            <p class="text-danger">
                <?php
                if ($errMsg !== "") {
                    echo $errMsg;
                } else {
                    echo "";
                }
                ?>
            </p>
        </form>
</body>

</html>