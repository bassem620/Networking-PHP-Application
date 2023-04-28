<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "crudgroup";

$connection = new mysqli($servername,$username,$password,$database);


$name = "";
$stat = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
    $name = $_POST["name"];
    $stat= $_POST["stat"];
    do {
        if(empty($name)||empty($stat)){
            $errorMessage ="All the fields are required";
            break;
        }

        $sql = "INSERT INTO crud (name, stat) " .
                "VALUES ('$name' ,'$stat') ";
        $result = $connection->query ($sql);

if (!$result) {
    $errorMessage = "Invalid query: " . $connection->error;
    break;
}

        $name = "";
        $stat= "";

        $successMessage = "Group added correctly";

        header("location: /Networking-PHP-Application-main/group.php");
        exit;

    } while(false);

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
        <h2>New Group</h2>


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
    <label  class="col-sm-3 col-form-label">Group name</label>
    <div class="col-sm-6">
    <input type="text" class="form-control"  name="name" value=" <?php echo $name; ?>" >
    </div>
  </div>

  <div class="row mb-3">
    <label  class="col-sm-3 col-form-label">Stat</label>
    <div class="col-sm-6">
    <input type="text" class="form-control"  name="stat" value="<?php echo $stat; ?>" >
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
  <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
  </div>
  <div class="col-sm-3 d-grid">
<a class="btn btn-outline-primary" href="/Networking-PHP-Application-main/group.php" role="button" >Cancel</a>
  </div>
        </form>
    </div>
</body>
</html>