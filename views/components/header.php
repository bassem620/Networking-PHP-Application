<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.html">LinkedIN</a></h1>
        <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href=<?php echo "profile.php?id=" . $_SESSION["id"]?>>Profile</a></li>
            <li><a href="network.php">Network</a></li>
            <li><a href="browseCourses.php">Courses</a></li>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="events.php">Events</a></li>
            <li class="dropdown"><a href="groupsTimeline.php"><span>Groups </span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="groups.php">Manage</a></li>
                    <li><a href="groupsTimeline.php">Timeline</a></li>
                </ul>
            </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
    <a href="auth/logout.php" class="get-started-btn">
        Logout
    </a>
    </div>
</header>