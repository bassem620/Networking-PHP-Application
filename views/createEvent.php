<?php

require_once "../models/event.php";
require_once "../controllers/eventController.php";
if(!isset($_SESSION["id"]))
{
    session_start();
}

// Events
$eventCont = new EventController;

$errMsg = "";

if(isset($_POST['title']) && isset($_POST['desc']) && isset($_POST['date']))
{
    if(!empty($_POST['title']) && !empty($_POST['desc']) && !empty($_POST['date']))
    {
        $event = new Event;
        $controller = new EventController;

        $event->title = $_POST['title'];
        $event->desc = $_POST['desc'];
        $event->date = $_POST['date'];

        if(!isset($_SESSION["id"]))
        {
            session_start();
        }

        if(!$controller->createEvent($_SESSION["id"], $event))
        {
            $errMsg = $_SESSION["errMsg"];
        }
        else
        {
            header("location:/linkedIn/views/events.php");
        }
    }
    else
    {
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
    <title>LinkedIn - Create event</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>New Event</h2>

        <form method="POST" action="createEvent.php">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Event name</label>
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
                <label class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="date">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                    <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type= 'button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' </div>
                    </div>
                    </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/linkedIn/views/events.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
</body>

</html>