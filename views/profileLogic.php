<?php

// Connect
if ($_GET["fn"] == "connect") {
    if ($result) {
        header("Location: profile.php?id=" . $_SESSION["id"]);
        exit();
    }
}

// Pending OR Remove
if ($_GET["fn"] == "rmRequest") {
    if ($result) {
        header("Location: profile.php?id=" . $_SESSION["id"]);
        exit();
    }
}

// Upgrade To Premium
if ($_GET["fn"] == "upgradeToPremium") {
    if ($result) {
        header("Location: profile.php?id=" . $_SESSION["id"]);
        exit();
    }
}

// Cancel Subscription
if ($_GET["fn"] == "cancelSubscription") {
    if ($result) {
        header("Location: profile.php?id=" . $_SESSION["id"]);
        exit();
    }
}

// Hide Connections
if ($_GET["fn"] == "hideConnections") {
    if ($result) {
        header("Location: profile.php?id=" . $_SESSION["id"]);
        exit();
    }
}

// Show Connections
if ($_GET["fn"] == "showConnections") {
    if ($result) {
        header("Location: profile.php?id=" . $_SESSION["id"]);
        exit();
    }
}