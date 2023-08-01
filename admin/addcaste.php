<?php
include "sessioncheck.php";
include "../db.php";

$username = $_SESSION['admin'];

if (isset($_POST['submit'])) {
    $msg = null;
    $wrong = null;
    $name = mysqli_real_escape_string($connection,$_POST['name']);     
    
    $data = mysqli_query($connection, "INSERT INTO caste(name,status) VALUES('$name','1')");

    if($data > 0){
        $msg = "Caste Added Successfully.";
    }else{
        $wrong = "Please check details. Try again!!!";
    }
}    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$projectName?> : Admin Add Caste </title>
    <meta content="Thing in Everything" name="description">
    <meta content="IOT,Web Developement, Trainings" name="keywords">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link href="assets/img/varadlaxmi.png" rel="icon">
    <link href="assets/img/varadlaxmi.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <?php
    include "nav.php";
    ?>
    <div class="row col-lg-4 col-xs-12  col-lg-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">Add Caste</div>
            <div class="panel-body">
                <form method="post" action="">
                    <?php
                    if (isset($wrong)) {
                        echo '
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.
                                $wrong
                            .'</div>';
                    } 
                    if (isset($msg)) {
                        echo '
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.
                                $msg
                            .'</div>';
                    }
                    ?>                   

                    <div class="form-group">
                        <label for="exampleInputPassword1">Caste Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Caste Name" required pattern="[a-zA-Z\s]+">
                    </div>                    
            </div>
            <div class="panel-footer">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-danger">Clear</button>
            </div>
            </form>
        </div>
    </div>
</body>

</html>