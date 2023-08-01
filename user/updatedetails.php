<?php
include "sessioncheck.php";
include "../db.php";

$username = $_SESSION['user'];

if (isset($_POST['submit'])) {
    $msg = null;
    $wrong = null;
    $casteid = mysqli_real_escape_string($connection,$_POST['caste']);
    $dob = mysqli_real_escape_string($connection,$_POST['dob']);
    $family = mysqli_real_escape_string($connection,$_POST['familydetails']);
    $description = mysqli_real_escape_string($connection,$_POST['description']);

    $data = mysqli_query($connection, "UPDATE user SET 
                                    casteid = '$casteid', familydetails = '$family', dob='$dob', description = '$description' 
                                    WHERE email = '$username'"
                                    );

    if ($data > 0) {
        $msg = "User Details updated successfully.";
    } else {
        $wrong = "Please check details. Try again!!!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$projectName?> : User Change Details </title>
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
        <div class="panel panel-success">
            <div class="panel-heading text-center">User Change Details</div>
            <div class="panel-body">
                <form method="post" action="">
                    <?php
                    if (isset($wrong)) {
                        echo '
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
                            $wrong
                            . '</div>';
                    }
                    if (isset($msg)) {
                        echo '
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
                            $msg
                            . '</div>';
                    }
                    ?>

                    <?php
                    $data = mysqli_query($connection, "SELECT * FROM user WHERE email = '$username'");
                    $row = mysqli_fetch_assoc($data);
                    ?>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter Name" value="<?= $username ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Caste</label>
                        <?php 
                            $casteList = mysqli_query($connection,"SELECT id,name FROM caste WHERE status=1");                            
                        ?>
                        <select class="form-control" id="caste" name="caste" required>
                            <option value="">Select caste</option>
                            <?php
                                while($caste = mysqli_fetch_assoc($casteList)){
                                    if($caste['id']==$row['casteid']){
                                        echo '<option value="'.$caste['id'].'" selected>'.$caste['name'].'</option>';
                                    }else{
                                        echo '<option value="'.$caste['id'].'">'.$caste['name'].'</option>';
                                    }                                    
                                }
                            ?>                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">DOB</label>
                        <input type="date" name="dob" class="form-control" placeholder="Enter DOB" value="<?= $row['dob'] ?>" required max="<?=date('Y-m-d', strtotime('-18 year'));?>">
                        <small class="form-text text-muted">Age should not be less than 18 years.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Family Details</label>
                        <textarea class="form-control" name="familydetails" rows="3" placeholder="Enter family details" id="familydetails" required><?= $row['familydetails'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Enter Description" id="description" required><?= $row['description'] ?></textarea>
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