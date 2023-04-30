<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Helwan University</h3>
                    <p>
                        Documentation <br>
                        Implementation <br>
                        PHP - HTML - CSS - JS <br>
                        <strong>Course : </strong>Software Engineering - PHP<br>
                        <strong>Project : </strong>Networking Website<br>
                    </p>
                </div>

                <?php 
                        if(isset($_SESSION["id"]))
                        {   
                            ?>
                            <div class="col-lg-2 col-md-6 footer-links">
                                <h4>Useful Links</h4>
                                <ul>
                                    <li><i class="bx bx-chevron-right"></i> <a href="home.php">Home</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="profile.php">Profile</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="browseCourses.php">Courses</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="jobs.php">Jobs</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="events.php">Events</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="groups.php">Groups</a></li>
                                </ul>
                            </div>
                            <?php
                        }
                    ?>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Team Members</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a target="_blank" href="https://github.com/Martinayousry">Martina Yousry</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a target="_blank" href="https://github.com/MarinaAymanHanna">Marina Ayman</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a target="_blank" href="https://github.com/Georgegithup">George Walid</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a target="_blank" href="https://github.com/bishoy004">Beshoy Magdy</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a target="_blank" href="https://github.com/beshoybahaa">Beshoy Bahaa</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a target="_blank" href="https://github.com/El-Abbady">Abanoub Abbady</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a target="_blank" href="https://github.com/bassem620">Bassem Saeed</a></li>
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
                &copy; Copyright <strong><span>FCAI</span></strong>. All Rights Reserved
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer>