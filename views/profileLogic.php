<?php

// Check Session
if (!isset($_SESSION["id"])) {
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: auth/login.php");
        exit();
    }
}

require_once "../controllers/userController.php";
require_once "../controllers/premiumController.php";

$userController = new UserController;
$premiumController = new PremiumConrtroller;

// Connect
if ($_GET["fn"] == "connect") {
    $result = $userController->connect($_SESSION["id"], $_GET["id"]);
    if ($result) {
        header("Location: profile.php?id=" . $_GET["id"]);
        exit();
    }
}

// Pending OR Remove
if ($_GET["fn"] == "rmRequest") {
    $result = $userController->removeConnect($_SESSION["id"], $_GET["id"]);
    if ($result) {
        header("Location: profile.php?id=" . $_GET["id"]);
        exit();
    }
}

// Upgrade To Premium
// if ($_GET["fn"] == "upgradeToPremium") {
//     if ($result) {
//         header("Location: profile.php?fn=" . $_SESSION["id"]);
//         exit();
//     }
// }

// Cancel Subscription
if ($_GET["fn"] == "cancelSubscription") {
    $result = $premiumController->cancelPremium($_SESSION["id"]);
    if ($result) {
        header("Location: profile.php?id=" . $_SESSION["id"]);
        exit();
    }
}

// Export Connections
if ($_GET["fn"] == "exportConnections") {
    $result = $premiumController->exportConnections($_SESSION["id"]);
    if ($result) {
        header("Location: profile.php?id=" . $_SESSION["id"]);
        exit();
    }
}

// // Hide Connections
// if ($_GET["fn"] == "hideConnections") {
//     if ($result) {
//         header("Location: profile.php?fn=" . $_SESSION["id"]);
//         exit();
//     }
// }

// // Show Connections
// if ($_GET["fn"] == "showConnections") {
//     if ($result) {
//         header("Location: profile.php?fn=" . $_SESSION["id"]);
//         exit();
//     }
// }