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

if (isset($_POST['likeOrUnlike']) && isset($_POST['postId'])) {
    if ($_POST['likeOrUnlike'] == "black") {
        if ($postsControllers->addLike($_SESSION["id"], $_POST['postId'])) {
            header("location: groupsTimeline.php#" . $_POST["postId"] . "");
        } else {
            $errMsg = $_SESSION["errMsg"];
        }
    } else {

        if ($postsControllers->unlike($_POST['postId'], $_SESSION["id"])) {
            header("location: groupsTimeline.php#" . $_POST["postId"] . "");
        } else {
            $errMsg = $_SESSION["errMsg"];
        }

    }
}

if (isset($_POST['commentText']) && isset($_POST['postId'])) {
    if (!empty($_POST['commentText']) && !empty($_POST['postId'])) {
        $Controllers = new PostController;
        $result = $Controllers->addComment($_SESSION["id"], $_POST["commentText"], $_POST["postId"]);
        if (!$result) {


        } else {
            header("location: groupsTimeline.php#" . $_POST["postId"] . "");
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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
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
        <h3 class="pt-4 fw-bold">Groups Posts (
            <?php
            if ($posts) {
                echo count($posts);
            } else {
                echo "0";
            }
            ?>)
        </h3>
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
                                                        <input type="text" class="form-control rounded-corner"
                                                            name="postDesc" placeholder="add description for post">
                                                    </div>

                                            </div>
                                            <div class="widget change-password">
                                                <h3 class="widget-header user">add group</h3>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="group">
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
                                                        <button class="btn btn-primary f-s-12 rounded-corner"
                                                            type="submit">publish post</button>
                                                    </span>



                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        $counter = 0;
                                        if ($posts) {
                                            foreach ($posts as $key => $row) {

                                                $getComments = $postsControllers->getComments($row["id"]);
                                                $getLikes = $postsControllers->getLikes($row["id"]);
                                                $likeOrUnlike = "black";
                                                if ($getLikes != null) {
                                                    foreach ($getLikes as $key2 => $row2) {
                                                        if ($row2["id"] == $_SESSION["id"]) {
                                                            $likeOrUnlike = "blue";
                                                            break;
                                                        }
                                                    }
                                                }
                                                $commentCounts = 0;
                                                if ($getComments != null) {
                                                    $commentCounts = count($getComments);
                                                }
                                                $LikesCounts = 0;
                                                if ($getLikes != null) {
                                                    $LikesCounts = count($getLikes);
                                                }

                                                echo "
                    
                                            <div class=\"timeline-body mb-5\">
                                 <div class=\"timeline-header\">
                                    <span class=\"username\"><a href=\"javascript:;\">" . $row["firstName"] . " " . $row["lastName"] . "</a></span>
                                 </div>
                                 <div class=\"timeline-content\">
                                    <p>
                                       " . $row["desc"] . "
                                    </p>
                                 </div>
                                 <div class=\"timeline-likes\">
                                    <div class=\"stats-right\">
                                       <span class=\"stats-text\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal" . $counter . "\">" . $commentCounts . " comments</span>
                                    </div>
                                    <div class=\"stats\">
                                       <span class=\"stats-total\"data-bs-toggle=\"modal\" data-bs-target=\"#exampleModalLike" . $counter . "\">" . $LikesCounts . "</span>
                                       <span class=\"fa-stack fa-fw stats-icon\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModalLike" . $counter . "\">
                                          <i class=\"fa fa-circle fa-stack-2x text-primary\"></i>
                                          <i class=\"fa fa-thumbs-up fa-stack-1x fa-inverse\"></i>
                                       </span>
                                    </div>
                                 </div>
                                 <div class=\"timeline-footer\">
                                    <form method=\"POST\" action=\"groupsTimeline.php\">
                                    <input type=\"hidden\" name=\"postId\" value=\"" . $row["id"] . "\">
                                    <input type=\"hidden\" name=\"likeOrUnlike\" value=\"" . $likeOrUnlike . "\">
                                    <button type=\"submit\" class=\"m-r-15 btn btn-light\" style=\"color: " . $likeOrUnlike . ";\"><i class=\"fa fa-fw fa-thumbs-o-up\" aria-hidden=\"true\" style=\"color:" . $likeOrUnlike . "\" ></i> Like</button>
                                    </form>
                                 </div>
                                 <div class=\"timeline-comment-box\">
                                    <div class=\"input\">
                                          <form method=\"POST\" action=\"groupsTimeline.php\">
                                          <div class=\"input-group\">
                                          <input type=\"hidden\" name=\"postId\" value=\"" . $row["id"] . "\">
                                             <input type=\"text\" class=\"form-control rounded-corner\" name=\"commentText\" placeholder=\"Write a comment...\">
                                             <span class=\"input-group-btn p-l-10\">
                                                <button class=\"btn btn-primary f-s-12 rounded-corner\" type=\"submit\">Comment</button>
                                             </span>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              
                              <!-- modal of comments -->
                              <div class=\"modal fade\" id=\"exampleModal" . $counter . "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLongTitle\"
                                 aria-hidden=\"true\">
                                 <div class=\"modal-dialog modal-dialog-centered modal-lg\" role=\"document\">
                                    <div class=\"modal-content\">
                                       <div class=\"modal-header\">
                                          <h5 class=\"modal-title\" id=\"exampleModalLongTitle\">Comments</h5>
                                          <button type=\"button\" class=\"close\" data-bs-dismiss=\"modal\" aria-label=\"Close\">
                                             <span aria-hidden=\"true\">&times;</span>
                                          </button>
                                       </div>
                                       <div class=\"modal-body\">";
                                                if ($getComments != null)
                                                    foreach ($getComments as $key1 => $row1) {
                                                        echo "<h5>" . $row1["firstName"] . " " . $row1["lastName"] . "</h5>
                                          <p> &thinsp;&thinsp;&thinsp;&thinsp;" . $row1["comment"] . "</p>
                                          <hr>
                                       ";
                                                    }
                                                echo "</div><div class=\"modal-footer\">
                                       <div class=\"input-group\">
                                             <!--<input type=\"text\" class=\"form-control rounded-corner\" placeholder=\"Write a comment...\">
                                             <span class=\"input-group-btn \">
                                                <button class=\"btn btn-primary f-s-12 rounded-corner\" onclick=\"addComment()\" type=\"button\">Comment</button>
                                             </span>-->
                                             
                                          
                                          <button type=\"button\" class=\"btn btn-secondary pl-5 \" data-bs-dismiss=\"modal\">Close</button>
                                       </div> 
                                      </div>
                                    </div>
                                 </div>
                              </div>



                              <!-- modal of like -->
                              <div class=\"modal fade\" id=\"exampleModalLike" . $counter . "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLongTitle\"
                                 aria-hidden=\"true\">
                                 <div class=\"modal-dialog modal-dialog-centered modal-lg\" role=\"document\">
                                    <div class=\"modal-content\">
                                       <div class=\"modal-header\">
                                          <h5 class=\"modal-title\" id=\"exampleModalLongTitle\">Likes</h5>
                                          <button type=\"button\" class=\"close\" data-bs-dismiss=\"modal\" aria-label=\"Close\">
                                             <span aria-hidden=\"true\">&times;</span>
                                          </button>
                                       </div>
                                       <div class=\"modal-body\">";
                                                if ($getLikes != null)
                                                    foreach ($getLikes as $key4 => $row4) {
                                                        echo "<h5>" . $row4["firstName"] . " " . $row4["lastName"] . "</h5>
                                          <hr>
                                       ";
                                                    }
                                                echo "</div><div class=\"modal-footer\">
                                       <div class=\"input-group\">
                                             <!--<input type=\"text\" class=\"form-control rounded-corner\" placeholder=\"Write a comment...\">
                                             <span class=\"input-group-btn \">
                                                <button class=\"btn btn-primary f-s-12 rounded-corner\" onclick=\"addComment()\" type=\"button\">Likes</button>
                                             </span>-->
                                             
                                          
                                          <button type=\"button\" class=\"btn btn-secondary pl-5 \" data-bs-dismiss=\"modal\">Close</button>
                                       </div> 
                                      </div>
                                    </div>
                                 </div>
                              </div>
                                       
                    ";
                                                ;
                                                $counter++;
                                            }
                                        } ?>
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