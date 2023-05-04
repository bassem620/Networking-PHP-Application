<?php

require_once "../controllers/profileController.php";
require_once "../models/users/user.php";
require_once "../models/profile/profile.php";
require_once "../models/profile/certificate.php";
require_once "../models/profile/education.php";
require_once "../models/profile/skill.php";
require_once "../models/profile/website.php";

// Check Session
if (!isset($_SESSION["id"])) {
    session_start();
    if (!isset($_SESSION["id"])) {
        header("Location: auth/login.php");
        exit();
    }
}

$profileController = new ProfileController;

// Edit Personal Info
if ($_GET["fn"] == "personalInfo") {
    $user = new User;
    $profile = new Profile;
    $user->id = $_SESSION["id"];
    $user->email = $_POST["email"];
    $user->firstName = $_POST["firstName"];
    $user->lastName = $_POST["lastName"];
    $user->openTo = $_POST["openTo"];
    $profile->about = $_POST["about"];
    $profile->phone = $_POST["phone"];
    $profile->birthday = $_POST["birthday"];
    $result = $profileController->editProfile($user, $profile);
    if($result)
    {
        header("Location: profile.php?id=" . $_SESSION["id"]);
        exit();
    }
}

// Add Website
if ($_GET["fn"] == "addWebsite") {
    $web = new website;
    $web->type = $_POST["type"];
    $web->link = $_POST["url"];
    $result = $profileController->addWebsite($_SESSION["id"], $web);
    if($result)
    {
        header("Location: profile.php?id=" . $_SESSION["id"]);
        exit();
    }
}

// Add Certificate
if ($_GET["fn"] == "addCert") {
    $cert = new Certificate;
    $cert->name = $_POST["name"];
    $cert->organization = $_POST["organization"];
    $cert->issue_date = $_POST["issueDate"];
    $cert->exp_date = '';
    if($_POST["expDate"]){
        $cert->exp_date = $_POST["expDate"];
    }
    $cert->cred_url = $_POST["credUrl"];
    $cert->cred_id = $_POST["credId"];
    $result = $profileController->addCertification($_SESSION["id"], $cert);
    if($result)
    {
        header("Location: profile.php?id=" . $_SESSION["id"]);
        exit();
    }
}

print_r($_POST);
