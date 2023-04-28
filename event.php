
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>

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
    <div class="container my-5">
        <h2>Your Events</h2>
        <a class="btn btn-dark " href="/Networking-PHP-Application-main/controllers/eventController/create2.php" role="button">Create a new Event</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
<tbody>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "crudgroup";

    $connection = new mysqli($servername,$username,$password,$database);

    if($connection->connect_error) {
        die("connection failed: ".$connection->connect_error);
    }

    $sql = "SELECT * FROM crud2 ";
    $result = $connection->query($sql);

    if(!$result){
        die("invalid query: ".$connection->connect_error);
    }

    while($row = $result->fetch_assoc()){
        echo "
        
        <tr>
        <td>$row[id]</td>
        <td>$row[title]</td>
        <td>$row[description]</td>
        <td>$row[date]</td>
        <td>
        <a class='btn btn-secondary btn-sm' href='/Networking-PHP-Application-main/controllers/eventController/edit2.php?id=$row[id]'>Edit</a>
        <a class='btn btn-danger btn-sm' href='/Networking-PHP-Application-main/controllers/eventController/delete2.php?id=$row[id]'>Delete</a>    
        </td>
    </tr>

        ";
    }

    ?>
</tbody>
        </table>
    </div>

   <!-- ======= Popular Group Section ======= -->
   <section id="popular-courses" class="courses">
     <div class="container" data-aos="fade-up">

       <div class="section-title" >
           <br>
         <h2>Another</h2>
         <p>Events</p>
       </div>

       <div class="row" data-aos="zoom-in" data-aos-delay="100">

         <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
           <div class="course-item">
             <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
             <div class="course-content">
               <div class="d-flex justify-content-between align-items-center mb-3">
                 <h4>Web Development</h4>
                 
               </div>

               <h3><a href="course-details.html">Website Design</a></h3>
               <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
               <div class="trainer d-flex justify-content-between align-items-center">
                 <div class="trainer-profile d-flex align-items-center">

                 <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" />
  <label class="form-check-label" for="flexSwitchCheckDefault">Going</label>
</div>
                 </div>
                 <div class="trainer-rank d-flex align-items-center">

                 </div>
               </div>
             </div>
           </div>
         </div> <!-- End Group Item-->

         <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
           <div class="course-item">
             <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
             <div class="course-content">
               <div class="d-flex justify-content-between align-items-center mb-3">
                 <h4>Marketing</h4>
           
               </div>

               <h3><a href="course-details.html">Search Engine Optimization</a></h3>
               <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
               <div class="trainer d-flex justify-content-between align-items-center">
                 <div class="trainer-profile d-flex align-items-center">
                
                 <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" />
  <label class="form-check-label" for="flexSwitchCheckDefault">Going</label>
</div>
                 </div>
                 <div class="trainer-rank d-flex align-items-center">
                  
                 </div>
               </div>
             </div>
           </div>
         </div> <!-- End Group Item-->

         <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0 ">
           <div class="course-item">
             <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
             <div class="course-content ">
               <div class="d-flex justify-content-between align-items-center mb-3 " > 
                   <h4> Content </h4>
               
            
               </div>

               <h3><a href="course-details.html">Copywriting</a></h3>
               <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
               <div class="trainer d-flex justify-content-between align-items-center">
                 <div class="trainer-profile d-flex align-items-center">

                 <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" />
  <label class="form-check-label" for="flexSwitchCheckDefault">Going</label>
</div>                  
                 </div>
                 <div class="trainer-rank d-flex align-items-center">
                  
                 </div>
               </div>
             </div>
           </div>
         </div> <!-- End Group Item-->

       </div>

     </div>
   </section><!-- End Popular Group Section -->




</body>


<!-- ======= Footer ======= -->
<footer id="footer" >

<div class="footer-top">
  <div class="container my-5">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>Mentor</h3>
        <p>
          A108 Adam Street <br>
          New York, NY 535022<br>
          United States <br><br>
          <strong>Phone:</strong> +1 5589 55488 55<br>
          <strong>Email:</strong> info@example.com<br>
        </p>
      </div>

      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-6 footer-newsletter">
        <h4>Join Our Newsletter</h4>
        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
        <form action="" method="post">
          <input type="email" name="email"><input type="submit" value="Subscribe">
        </form>
      </div>

    </div>
  </div>
</div>

<div class="container d-md-flex py-4">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      &copy; Copyright <strong><span>Mentor</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
  <div class="social-links text-center text-md-right pt-3 pt-md-0">
    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
  </div>
</div>
</footer><!-- End Footer -->

</html>