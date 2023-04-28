<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "crudgroup";

$connection = new mysqli($servername,$username,$password,$database);

$title = "";
$description = "";
$date = "";

$errorMessage = "";
$successMessage = "";

$id=$_GET['id'];


if(isset($_POST['submit'])){
    $title = $_POST["title"];
    $description= $_POST["description"];
    $date = $_POST["date"];


    $sql = "UPDATE crud2 " . 
            "SET title = '$title',description ='$description',date ='$date' " . 
            "WHERE id = $id ";


    $result = $connection->query($sql);

    if ($result) {
        header("location: /Networking-PHP-Application-main/event.php");
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groups</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Update Event</h2>


        <?php
if ( !empty ($errorMessage) ) {
echo "
<div class='alert alert-warning alert-dismissible fade show' role-'alert'>
<strong> $errorMessage </strong>
<button type='button' class= 'btn-close' data-bs-dismiss='alert' aria-label='Close'> </div> ";
}
?>

<form method="post">

<div class="row mb-3">
<label  class="col-sm-3 col-form-label">Event name</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="title" value=" <?php echo $title; ?>" >
</div>
</div>

<div class="row mb-3">
<label  class="col-sm-3 col-form-label">description</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="description" value="<?php echo $description; ?>" >
</div>
</div>

<div class="row mb-3">
<label  class="col-sm-3 col-form-label">date</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="date" value="<?php echo $date; ?>" >
</div>
</div>


  <?php
if (!empty ($successMessage) ) {
echo "
<div class='row mb-3'>
<div class='offset-sm-3 col-sm-6'>
<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>$successMessage</strong>
<button type= 'button' class='btn-close' data-bs-dismiss='alert' aria-label='Close' </div>
</div>
</div>
";
}
?>




  <div class="row mb-3">
    <div class="offset-sm-3 col-sm-3 d-grid">
  <button type="submit" class="btn btn-primary" name="submit" >Update</button>
  </div>
  <div class="col-sm-3 d-grid">
<a class="btn btn-outline-primary" href="/Networking-PHP-Application-main/event.php" role="button" >Cancel</a>
  </div>
        </form>
    </div>
</body>
</html>