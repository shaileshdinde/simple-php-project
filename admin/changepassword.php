<?php
include "sessioncheck.php";
include "../db.php";

if (isset($_POST['submit'])) {
    $msg = null;
    $wrong = null;
    $username = $_SESSION['admin'];
    $oldPassword = mysqli_real_escape_string($connection,$_POST['oldpassword']);
    $encPassword = md5($oldPassword);

    $newPassword = mysqli_real_escape_string($connection,$_POST['newpassword']);
    $confirmPassword = mysqli_real_escape_string($connection,$_POST['confirmpassword']);     //To encrypt password 

    $data = mysqli_query($connection, "SELECT * FROM admin WHERE username = '$username' AND password = '$encPassword' AND status='1'");

    if (mysqli_num_rows($data) == 1) {
        if ($newPassword == $confirmPassword) {
            $encPassword = md5($newPassword);
            $data = mysqli_query($connection, "UPDATE admin SET password = '$encPassword' WHERE username = '$username'");
            $msg = "Password updated successfully.";
        } else {
            $wrong = "New Password and Confirm Password is not matched.";
        }
    } else {
        // Inccorect current password
        $wrong = "Please enter correct current password.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$projectName?> : Admin Change Password </title>
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
            <div class="panel-heading text-center">Change Admin Password </div>
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
                        <label for="exampleInputPassword1">Current Password</label>
                        <input type="password" name="oldpassword" class="form-control" placeholder="Enter Old Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" name="newpassword" class="form-control" placeholder="Enter New Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Enter New Password Again">
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