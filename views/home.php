<?php
require_once "../controllers/userController.php";
require_once "../controllers/postController.php";
// Check Session
if (!isset($_SESSION["id"])) {
   session_start();
   if (!isset($_SESSION["id"])) {
      header("Location: auth/login.php");
      exit();
   }
}

$postsControllers = new PostController;
$post = $postsControllers->getPosts($_SESSION["id"]);
if (isset($_POST['commentText']) && isset($_POST['postId'])) {
   if (!empty($_POST['commentText']) && !empty($_POST['postId'])) {
      $Controllers = new PostController;
      $result = $Controllers->addComment($_SESSION["id"],$_POST["commentText"],$_POST["postId"]);
      if (!$result) {
         $errMsg = $_SESSION["errMsg"];
         
      } else {
         header("location: home.php");
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
   <title>LinkedIn - Home</title>
</head>

<body>
   <?php require_once "components/header.php"; ?>

   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
   <div class="container-lg">
      <div class="row pt-5">
         <div class="col-md-12">
            <div id="content" class="content content-full-width">
               <div class="profile-content">
                  <div class="tab-content p-0">
                     <div class="tab-pane fade active show" id="profile-post">
                        <ul class="timeline">
                           <li>
                              <?php
                              $counter = 0;
                              if ($post) {
                                 foreach ($post as $key=>$row) {
                                    $getComments = $postsControllers->getComments($row["id"]);
                                    $getLikes = $postsControllers->getLikes($row["id"]);
                                    $commentCounts =0;
                                    if($getComments != null){
                                    $commentCounts = count($getComments);}
                                    $LikesCounts = 0;
                                    if($getLikes != null){
                                       $LikesCounts = count($getLikes);}
                                    echo "
                              <div class=\"timeline-body mb-5\">
                                 <div class=\"timeline-header\">
                                    <span class=\"username\"><a href=\"javascript:;\">" . $row["firstName"]." " . $row["lastName"] . "</a></span>
                                 </div>
                                 <div class=\"timeline-content\">
                                    <p>
                                       ".$row["desc"]."
                                    </p>
                                 </div>
                                 <div class=\"timeline-likes\">
                                    <div class=\"stats-right\">
                                       <span class=\"stats-text\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal".$counter."\">". $commentCounts." comments</span>
                                    </div>
                                    <div class=\"stats\">
                                       <span class=\"stats-total\">".$LikesCounts."</span>
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
                                          <form method=\"POST\" action=\"home.php\">
                                          <div class=\"input-group\">
                                          <input type=\"hidden\" name=\"postId\" value=\"".$row["id"]."\">
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
                              <div class=\"modal fade\" id=\"exampleModal".$counter."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLongTitle\"
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
                                       if($getComments!=null)
                                       foreach ($getComments as $key1=>$row1) {
                                          echo "<h5>".$row1["firstName"]." ". $row1["lastName"]."</h5>
                                          <p> &thinsp;&thinsp;&thinsp;&thinsp;".$row1["comment"]."</p>
                                          <hr>
                                       ";}
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
                              
                              ";
                              $counter++;}}
                              
                              ?>
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
   <?php require_once "components/footer.php"?>

   
   
        

</body>

</html>