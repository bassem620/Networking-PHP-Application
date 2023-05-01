<?php
require_once "../controllers/groupController.php";

// Check Session
if (!isset($_SESSION["id"])) {
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: auth/login.php");
        exit();
    }
}

// Events
$groupCont = new GroupController;

// Delete group Button onClick
if (array_key_exists('delete', $_POST)) {
    $groupCont->deleteGroup(1, $_POST["delete"]);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Group</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
        <h2>Group</h2>
        <a class="btn btn-primary " href="/linkedIn/views/createGroup.php" role="button">Create a new Group</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>State</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $groupCont->getJoinedGroups($_SESSION["id"]);
                if ($result) {
                    foreach ($result as $row) {
                        echo "
                        <tr>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["state"] . "</td>
                            <td>
                                <form method=\"POST\" action=\"groups.php\">
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

    <!-- ======= Popular Group Section ======= -->
    <section id="popular-courses" class="courses">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <br>
                <h2>All</h2>
                <p>Events</p>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <?php
                $groups = $groupCont->getAllGroups();
                if ($groups) {
                    foreach ($groups as $row) {
                        echo "
                        <div class=\"col-lg-4 col-md-6 d-flex align-items-stretch\">
                        <div class=\"course-item\">
                            <img src=\"assets/img/course-1.jpg\" class=\"img-fluid\" alt=\"...\">
                            <div class=\"course-content\">
                            <div class=\"d-flex justify-content-between align-items-center mb-3\">
                                <h4>" . $row["name"] . "</h4>
                            </div>
                            <h3><a href=\"course-details.html\">" . $row["state"] . "</a></h3>
                            <div class=\"trainer d-flex justify-content-between align-items-center\">
                                <div class=\"trainer-profile d-flex align-items-center\">
                                    <div class=\"form-check form-switch\">
                                        <input class=\"form-check-input\" type=\"checkbox\" role=\"switch\" id=\"flexSwitchCheckDefault\" />
                                        <label class=\"form-check-label\" for=\"flexSwitchCheckDefault\">Join</label>
                                    </div>
                                </div>
                                <div class=\"trainer-rank d-flex align-items-center\">
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        ";
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <?php require_once "components/script.php" ?>
    <?php require_once "components/footer.php" ?>
</body>

</html>