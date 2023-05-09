<?php
require_once "../controllers/userController.php";
require_once "../controllers/searchController.php";

// Check Session
if (!isset($_SESSION["id"])) {
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: auth/login.php");
        exit();
    }
}


// User
$userCont = new UserController;
$search = new SearchController;
$users = $userCont->getNetworkUsers($_SESSION["id"]);
$searchResult = [];
$pending = $userCont->getPendingRequests($_SESSION["id"]);

// Connect Button onClick
if (array_key_exists('connect', $_POST)) {
    $userCont->connect($_SESSION["id"], $_POST["connect"]);
    header("Location: network.php");
    exit();
}

// Search Button onClick
if (array_key_exists('search', $_GET)) {
    if ($_GET["search"] != "") {
        $searchResult = $search->searchMember($_GET["search"], $_SESSION["id"]);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkedIn - Network</title>

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
    <div class="container" data-aos="fade-up">
        <!-- ======= Search & Pending Btn ======= -->
        <div class="search w-100 mb-3 mt-5">
            <form action="network.php" method="GET"
                class="input-group d-flex justify-content-between align=items-center">
                <div>
                    <div class="section-title p-0 pt-4">
                        <br>
                        <h2>Search</h2>
                    </div>
                    <div class="form-outline">
                        <input type="search" id="form1" name="search" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Search
                    </button>
                </div>
                <div>
                    <span class="btn btn-warning mt-5" data-bs-toggle="modal" data-bs-target="#exampleModalLike">
                        Show Pending
                    </span>
                </div>
            </form>
        </div>
        <!-- ======= Search Result ======= -->
        <?php
        if ($searchResult) { ?>
            <section id="popular-courses" class="courses">
                <div class="section-title">
                    <br>
                    <h2>Search Results</h2>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <?php
                    foreach ($searchResult as $key => $row) {
                        $premium = "";
                        if ($row["profile_type"] > 0) {
                            $premium = "<div class=\"d-inline-block ms-3\">
                                <h4>Premium</h4>
                            </div>";
                        }
                        echo "
                        <div  class=\"col-lg-3 col-md-6 d-flex mt-4 align-items-stretch\">
                        <a href=\"profile.php?id=" . $row["id"] . "\" >
                        <div class=\"course-item shadow-sm\">
                                <img src=\"assets/img/3135768.png\" class=\"img-fluid\" \>
                            <div class=\"course-content\">
                            <h3><a href=\"course-details.html\">" . $row["firstName"] . " " . $row["lastName"] . $premium . "</a></h3>
                            <div class=\"trainer d-flex justify-content-between align-items-center\">
                                <div class=\"trainer-rank d-flex align-items-center\">
                                </div>
                            </div>
                            </div>
                        </div> </a>
                        </div>
                        ";
                    } ?>
                </div>
            </section>
            <?php
        }
        ?>
        <!-- ======= People ======= -->
        <section id="popular-courses m-0" class="courses">
            <div class="section-title p-0">
                <br>
                <h2>Network</h2>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <?php
                if ($users) {
                    foreach ($users as $key => $row) {
                        $premium = "";
                        if ($row["profile_type"] > 0) {
                            $premium = "<div class=\"d-inline-block ms-3\">
                                <h4>Premium</h4>
                            </div>";
                        }
                        echo "
                        <div  class=\"col-lg-3 col-md-6 d-flex mt-4 align-items-stretch\">
                        <a href=\"profile.php?id=" . $row["id"] . "\" >
                        <div class=\"course-item shadow-sm\">
                                <img src=\"assets/img/3135768.png\" class=\"img-fluid\" \>
                            <div class=\"course-content\">
                            <h3><a href=\"course-details.html\">" . $row["firstName"] . " " . $row["lastName"] . $premium . "</a></h3>
                            <div class=\"trainer d-flex justify-content-between align-items-center\">
                                <div class=\"trainer-profile d-flex align-items-center\">
                                    <form method=\"POST\" action=\"network.php\" class=\"w-100\">
                                        <button type=\"submit\" class='btn btn-primary btn-md' name=\"connect\" value=" . $row["id"] . ">Connect</button>    
                                    </form>
                                </div>
                                <div class=\"trainer-rank d-flex align-items-center\">
                                </div>
                            </div>
                            </div>
                        </div> </a>
                        </div>
                        ";
                    }
                }
                ?>
            </div>
        </section>
    </div>

    <!-- ======= Modal of Pending ======= -->
    <div class="modal fade" id="exampleModalLike" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Pending Requests</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    if ($pending) {
                        foreach ($pending as $key => $row1) {
                            echo "
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <h5 class=\"mr-3\">" . $key + 1 . ") " . $row1["firstName"] . " " . $row1["lastName"] . "</h5>
                                <a href=\"profileLogic.php?fn=acceptConnection&id=" . $row1["id"] . "\"class=\"btn btn-success\">Accept</a>
                            </div>
                            <hr>
                        ";
                        }
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <div class="input-group">
                        <button type="button" class="btn btn-secondary pl-5 " data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once "components/script.php" ?>
    <?php require_once "components/footer.php" ?>
</body>

</html>