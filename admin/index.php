<?php
include "sessioncheck.php";
include "../db.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$projectName?> : Admin </title>
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
    <div class="container">
        <div class="row">
            <div class="panel-group">
                <div class="panel panel-primary col-lg-3 col-md-6 col-xs-12" style="margin: 10px 10px 10px 10px;">
                    <div class="panel-heading">City</div>
                    <div class="panel-body text-center">
                        <?php
                        $data = mysqli_query($connection, "SELECT count(*) as count FROM city WHERE status='1'");
                        $data = mysqli_fetch_array($data);
                        ?>
                        <h1 style="display:inline;">
                            <?= $data['count'] ?>
                        </h1>
                        <sub style="display:inline;">Total Cities</sub>
                    </div>
                    <div class="panel-footer" style="background-color: transparent;">
                        <a href="city.php">Total cities</a>
                    </div>
                </div>

                <div class="panel panel-success col-lg-3 col-md-6 col-xs-12 " style="margin: 10px 10px 10px 10px;">
                    <div class="panel-heading">Caste</div>
                    <div class="panel-body text-center">
                        <?php
                        $data = mysqli_query($connection, "SELECT count(*) as count FROM caste WHERE status='1'");
                        $data = mysqli_fetch_array($data);
                        ?>
                        <h1 style="display:inline;">
                            <?= $data['count'] ?>
                        </h1>
                        <sub style="display:inline;">Total Castes</sub>
                    </div>
                    <div class="panel-footer" style="background-color: transparent;">
                        <a href="caste.php">Total Castes</a>
                    </div>
                </div>

                <div class="panel panel-danger col-lg-3 col-md-6 col-xs-12" style="margin: 10px 10px 10px 10px;">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body text-center">
                        <?php
                        $data = mysqli_query($connection, "SELECT count(*) as count FROM user WHERE status='1'");
                        $data = mysqli_fetch_array($data);
                        ?>
                        <h1 style="display:inline;">
                            <?= $data['count'] ?>
                        </h1>
                        <sub style="display:inline;">Total Users</sub>
                    </div>
                    <div class="panel-footer" style="background-color: transparent;">
                        <a href="users.php">Total Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>