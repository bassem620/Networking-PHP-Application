<?php
require_once "../controllers/groupController.php";
require_once "../controllers/postController.php";

// Check Session
if (!isset($_SESSION["id"])) {
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: auth/login.php");
        exit();
    }
}


$groupCont = new GroupController;
$posts = $groupCont->getGroupsPosts($_SESSION["id"]);
$myGroups = $groupCont->getJoinedGroups($_SESSION["id"]);
$postsControllers = new PostController;
if (isset($_POST["postDesc"]) && isset($_POST["group"])) {
    if (!empty($_POST["postDesc"]) && !empty($_POST["group"])) {
        if ($postsControllers->addPostGroup($_SESSION["id"], $_POST['postDesc'], $_POST["group"])) {
            header("location: groupsTimeline.php");
        } else {
            $errMsg = $_SESSION["errMsg"];
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="../views/assets/css_beshoy/style.css" rel="stylesheet">
    <title>LinkedIn - Group Timeline</title>
</head>

<body>
    <?php require_once "components/header.php"; ?>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container-lg pt-5">
        <h3 class="pt-4 fw-bold">Groups Posts (<?php 
            if($posts) {
                echo count($posts); 
            } else {
                echo "0";
            }
        ?>) </h3>
        <div class="row pt-5">
            <div class="col-md-12">
                    <div id="content" class="content content-full-width">
                        <div class="profile-content">
                            <div class="tab-content p-0">
                                <div class="tab-pane fade active show" id="profile-post">
                                    <ul class="timeline">
                                        <li>
                                <div class="timeline-body mb-5">
                                 <div class="timeline-header">
                                    <span class="username">Create Post</span>
                                 </div>
                                 <div class="timeline-content">
                                    <form method="POST" action="groupsTimeline.php">
                                          <div class="input-group">
                                             <input type="text" class="form-control rounded-corner" name="postDesc" placeholder="add description for post">
                                          </div>
                                       
                                </div>
                                <div class="widget change-password">
                                <h3 class="widget-header user">add group</h3>
                                    <select class="form-select" aria-label="Default select example" name="group">
                                        <option disabled selected>Select Group</option>
                                        <?php
                                            foreach ($myGroups as $key => $group) {
                                                ?>
                                                <option value=<?php echo $group["id"] ?>><?php echo $group["name"] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    
                                </div>
                                    <div class="timeline-comment-box">
                                    <div class="input">
                                          
                                             <span class="input-group-btn p-l-10">
                                                <button class="btn btn-primary f-s-12 rounded-corner" type="submit">publish post</button>
                                             </span>
                                          
                                       
                                    
                                 </form>
                                 </div>
                                 </div>
                                </div>

            <?php 
            if($posts) {
                foreach($posts as $key => $post) {
                    echo "
                    
                                            <div class=\"timeline-body\">
                                                <div class=\"timeline-header\">
                                                    <span class=\"username\">" . $post["title"] ."</span>
                                                </div>
                                                <div class=\"timeline-content\">
                                                    <p>
                                                        " . $post["desc"] ."
                                                    </p>
                                                </div>
                                                <div class=\"timeline-likes\">
                                                    <div class=\"stats\">
                                                        <span class=\"stats-total\">000k</span>
                                                        <span class=\"fa-stack fa-fw stats-icon\">
                                                            <i class=\"fa fa-circle fa-stack-2x text-primary\"></i>
                                                            <i class=\"fa fa-thumbs-up fa-stack-1x fa-inverse\"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class=\"timeline-footer\">
                                                    <a href=\"javascript:;\" class=\"m-r-15 text-inverse-lighter\"><i class=\"fa fa-thumbs-up fa-fw fa-lg m-r-3\"></i> Like</a>
                                                </div>
                                                <div class=\"timeline-comment-box\">
                                                    <div class=\"input\">
                                                        <form action=\"\">
                                                            <div class=\"input-group\">
                                                                <input type=\"text\" class=\"form-control rounded-corner\" placeholder=\"Write a comment...\">
                                                                <span class=\"input-group-btn p-l-10\">
                                                                    <button class=\"btn btn-primary f-s-12 rounded-corner\" type=\"button\">Comment</button>
                                                                </span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                       
                    ";
                }
            }?>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
    <?php require_once "components/footer.php"
    ?>
</body>

</html>