<?php

session_start();
include "db.php";
include "mail/mail.php";

if(isset($_POST['submit'])){
    $msg = null;
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    $encpassword = md5($password);     //To encrypt password 

    $data = mysqli_query($connection,"SELECT * FROM admin WHERE username = '$username' AND password = '$encpassword' AND status='1'");

    if(mysqli_num_rows($data)==1){

        $row = mysqli_fetch_assoc($data);
        //Login successful
        $_SESSION['admin'] = $username;
        $_SESSION['fullname'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("location: admin/index.php");
    }else{
        // Login fail
        $msg = "Please enter correct username and password.";
    }
}

if (isset($_POST['forgot'])) {
    $msg = null;
    $wrong = null;
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);

    $res = mysqli_query($connection, "select * from admin where email = '$email' and username = '$username' and status='1'");
    if (mysqli_num_rows($res) == 1) {
        $password =  substr(str_shuffle("123456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ"), 0, 6);
        $encpassword = md5($password);

        $body =  "Dear " . $username . "  ,  <br/>            
      Your Account Password is reset successfully at our Website Account. 
      <br/> We thank you for connecting with us.<br/><br/>

      Your  New Password is : " . $password . "<br/><br/>
      We request you to keep your login information confidential.<br/><br/>
                
      
      Regards,<br/>               
      ";

        $subject = "Password Reset for Account";

        $mailstatus = sendMail($email, $subject, $body);

        if ($mailstatus == 'Success') {
            $data = mysqli_query($connection, "update admin set password = '$encpassword' where username = '$username'");
            $msg = "Please check email address for new Password.";
        } else {
            $wrong = "Please Try after sometime!!!";
        }
    }else{
        $wrong = "Please Enter Correct Details and Try Again!!!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$projectName?></title>
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

    <style>
        .center {

            margin: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <div class="panel panel-primary center">
        <div class="panel-heading text-center">Login to Admin panel</div>
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
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Username" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                </div>
        </div>
        <div class="panel-footer">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger">Clear</button>
            <a class="btn btn-warning" data-toggle="modal" data-target="#forgot">Forgot Password</a>
        </div>
        </form>
    </div>

     <!-- Forgot password modal -->
     <div id="forgot" class="modal fade modal-danger" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Forgot Password</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="">                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Username" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email" required>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="forgot" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger">Clear</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>