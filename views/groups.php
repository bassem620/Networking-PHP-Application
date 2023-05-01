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

// Groups
$groupCont = new GroupController;

// Delete group Button onClick
if (array_key_exists('delete', $_POST)) {
    $groupCont->deleteGroup($_SESSION["id"], $_POST["delete"]);
}

// Join group Button onClick
if (array_key_exists('join', $_POST)) {
    $groupCont->joinGroup($_SESSION["id"], $_POST["join"]);
}

// Leave group Button onClick
if (array_key_exists('leave', $_POST)) {
    $groupCont->leaveGroup($_SESSION["id"], $_POST["leave"]);
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
    <div class="container mt-5 pt-5">
        <h2 class="ms-3">Groups</h2>
        <a class="btn btn-primary ms-3" href="/linkedIn/views/createGroup.php" role="button">Create a new Group</a>
    <!-- All Groups -->
    <section id="popular-courses" class="courses">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <br>
                <h2>My</h2>
                <p>Groups</p>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <?php
                $myGroups = $groupCont->getMyGroups($_SESSION["id"]);
                if ($myGroups) {
                    foreach ($myGroups as $row) {
                        echo "
                        <div class=\"col-lg-4 col-md-6 d-flex align-items-stretch\">
                        <div class=\"course-item w-100 shadow-sm\">
                            <div class=\"course-content\">
                                <h3 class=\"text-primary fs-bold\">" . $row["name"] . "</h3>
                                <p><a href=\"course-details.html\" class=\"text-dark\">" . $row["desc"] . "</a></p>
                            <div class=\"trainer d-flex justify-content-between align-items-center\">
                                <form action=\"groups.php\" method=\"POST\" class=\"w-100\">
                                    <button type=\"submit\" class=\"btn btn-danger w-100\" name=\"delete\" value=" . $row["id"] . ">Delete</button>
                                </form>
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

    <!-- Joined Groups -->
    <section id="popular-courses" class="courses">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <br>
                <h2>Joined</h2>
                <p>Groups</p>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <?php
                $joined = $groupCont->getJoinedGroups($_SESSION["id"]);
                if ($joined) {
                    foreach ($joined as $row) {
                        echo "
                        <div class=\"col-lg-4 col-md-6 d-flex align-items-stretch\">
                        <div class=\"course-item w-100 shadow-sm\">
                            <div class=\"course-content\">
                            <h3 class=\"text-primary fs-bold\">" . $row["name"] . "</h3>
                            <p><a href=\"course-details.html\" class=\"text-dark\">" . $row["desc"] . "</a></p>
                            <div class=\"trainer d-flex justify-content-between align-items-center\">
                                <form action=\"groups.php\" method=\"POST\" class=\"w-100\">
                                    <button type=\"submit\" class=\"btn btn-warning w-100\" name=\"leave\" value=" . $row["id"] . ">Leave</button>
                                </form>
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

    <!-- All Groups -->
    <section id="popular-courses" class="courses">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <br>
                <h2>All</h2>
                <p>Groups</p>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <?php
                $groups = $groupCont->getAllGroups($_SESSION["id"]);
                if ($groups) {
                    foreach ($groups as $row) {
                        echo "
                        <div class=\"col-lg-4 col-md-6 d-flex align-items-stretch\">
                        <div class=\"course-item w-100 shadow-sm\">
                            <div class=\"course-content\">
                            <h3 class=\"text-primary fs-bold\">" . $row["name"] . "</h3>
                            <p><a href=\"course-details.html\" class=\"text-dark\">" . $row["desc"] . "</a></p>
                            <div class=\"trainer d-flex justify-content-between align-items-center\">
                                <form action=\"groups.php\" method=\"POST\" class=\"w-100\">
                                    <button type=\"submit\" class=\"btn btn-success w-100\" name=\"join\" value=" . $row["id"] . ">Join</button>
                                </form>
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
    </div>
    <?php require_once "components/script.php" ?>
    <?php require_once "components/footer.php" ?>
</body>

</html>