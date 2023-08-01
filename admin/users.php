<?php
include "sessioncheck.php";
include "../db.php";

$username = $_SESSION['admin'];

$query = "SELECT u.*, c.name as cityname, ca.name as castename 
            FROM 
            user as u left join city as c on u.cityid = c.id
            left join caste as ca on u.casteid = ca.id ";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$projectName?> : User List </title>
    <meta content="Thing in Everything" name="description">
    <meta content="IOT,Web Developement, Trainings" name="keywords">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link href="assets/img/varadlaxmi.png" rel="icon">
    <link href="assets/img/varadlaxmi.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
</head>

<body>
    <?php
    include "nav.php";
    ?>

    <div class="container">
        <h2>User Details</h2>

        <div class="row" id="userslist">
            <?php
            $data = mysqli_query($connection, $query);
            $srno = 0;
            while ($row = mysqli_fetch_assoc($data)) {
            ?>

                <div class="col-md-4">
                    <div class="thumbnail">
                        <?php
                        if ($row['photo'] == null) {
                            echo '<img src="../userphotos/default.png" class="img-circle  " alt="' . $username . '" width="200" height="200" id="preview-selected-image">';
                        } else {
                            echo '<img src="../userphotos/' . $row['photo'] . '" class="img-circle " alt="' . $username . '" width="200" height="200" id="preview-selected-image">';
                        }
                        ?>

                        <div class="caption">
                            <h3 class="text-center"><?= $row['name'] ?></h3>
                            <hr>
                            <div class="alert alert-success">
                                <strong>Caste : </strong> <?= $row['castename'] ?> .<br>
                                <strong>DOB : </strong> <?= $row['dob'] ?> .
                            </div>
                            <div class="alert alert-info">
                                <strong>Address : </strong> <?= $row['address'] . ", " . $row['cityname'] ?>. <br>
                                <strong>Email : </strong> <?= $row['email'] ?> <br>
                                <strong>Mobile : </strong> <?= $row['mobile'] ?>
                            </div>

                            <div class="alert alert-warning">
                                <strong>Family Details : </strong> <?= $row['familydetails'] ?> .<br>
                                <strong>Details : </strong> <?= $row['description'] ?> .
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>




</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

</html>