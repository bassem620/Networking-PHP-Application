<?php
require_once "../controllers/jobController.php";

// Check Session
if (!isset($_SESSION["id"])) {
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: auth/login.php");
        exit();
    }
}

// Events
$jobCont = new jobController;

// Delete event Button onClick
if (array_key_exists('delete', $_POST)) {
    $jobCont->deleteJob($_SESSION["id"], $_POST["delete"]);
}

// Going event Button onClick
// if (array_key_exists('going', $_POST)) {
//     $jobCont->goingEvent($_SESSION["id"], $_POST["going"]);
// }

// // Cancel Going event Button onClick
// if (array_key_exists('cancelGoing', $_POST)) {
//     $jobCont->cancelGoingEvent($_SESSION["id"], $_POST["cancelGoing"]);
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkedIn - Jobs</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <?php require_once "components/header.php" ?>
    <div class="container my-5 pt-5">
        <h2>My Jobs</h2>
        <a class="btn btn-primary " href="/linkedIn/views/createjob.php" role="button">Create a new Job Offer</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Requirements</th>
                    <th>Salary</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $jobCont->getMyOffers($_SESSION["id"]);
                if ($result) {
                    
                    foreach ($result as $row) {
                        $desc=$row["desc"];
                        if(strlen($row["desc"])>70)
                        {$desc = substr($row["desc"], 0, 70) . "...";}
                        $req = $row["req."];
                        if (strlen($row["req."]) > 70)
                       {$req = substr($row["req."], 0, 70) . "...";}
                        echo "
                        <tr>
                            <td>" . $row["title"] . "</td>
                            <td>" . $desc . "</td>
                            <td>" . $req . "</td>
                            <td>" . $row["salary"] . "</td>
                            <td>" . $row["company"] . "</td>
                            <td>" . $row["location"] . "</td>
                            <td>
                                <form method=\"POST\" action=\"postJob.php\">
                                    <button type=\"submit\" class='btn btn-danger btn-sm' name=\"delete\" value=" . $row["id"] . ">Delete</button>    
                                </form>
                            </td>
                        </tr>
                        ";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

        <?php require_once "components/script.php" ?>
    <?php require_once "components/footer.php" ?>
</body>

</html>