<?php
include "sessioncheck.php";
include "../db.php";

$username = $_SESSION['user'];
$query = "SELECT u.*, c.name as cityname, ca.name as castename 
            FROM 
            user as u left join city as c on u.cityid = c.id
            left join caste as ca on u.casteid = ca.id 
            WHERE u.status=1";

if (isset($_POST['submit'])) {

    if (isset($_POST['city']) && $_POST['city'] != "") {
        $query = $query . " and u.cityid = " . $_POST['city'];
    }

    if (isset($_POST['caste']) && $_POST['caste'] != "") {
        $query = $query . " and u.casteid = " . $_POST['caste'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$projectName?> : Users List </title>
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
        <h2>Users</h2>
        <div class="row">
            <form method="post" action="" class="form-inline">
                <div class="form-group">
                    <label for="exampleInputPassword1">Caste</label>
                    <?php
                    $casteList = mysqli_query($connection, "SELECT id,name FROM caste WHERE status=1");
                    ?>
                    <select class="form-control" id="caste" name="caste">
                        <option value="">Select caste</option>
                        <?php
                        while ($caste = mysqli_fetch_assoc($casteList)) {
                            echo '<option value="' . $caste['id'] . '">' . $caste['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <?php
                    $cityList = mysqli_query($connection, "SELECT id,name FROM city WHERE status=1");
                    ?>
                    <select class="form-control" id="city" name="city">
                        <option value="">Select City</option>
                        <?php
                        while ($city = mysqli_fetch_assoc($cityList)) {
                            echo '<option value="' . $city['id'] . '">' . $city['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" name="submit" id="submit" class="btn btn-success btn-sm">Submit</button>
                <button type="reset" class="btn btn-danger btn-sm">Clear</button>
            </form>
        </div>
        <hr>

        <div class="row" id="userslist">
            <?php
            $data = mysqli_query($connection, $query);
            $srno = 0;
            while ($row = mysqli_fetch_assoc($data)) {
            ?>

                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="details.php?id=<?= $row['id'] ?>" target="_blank">
                            <?php
                            if ($row['photo'] == null) {
                                echo '<img src="../userphotos/default.png" class="img-circle  " alt="' . $username . '" width="200" height="200" id="preview-selected-image">';
                            } else {
                                echo '<img src="../userphotos/' . $row['photo'] . '" class="img-circle " alt="' . $username . '" width="200" height="200" id="preview-selected-image">';
                            }
                            ?>
                            <div class="caption">
                                <h3 class="text-center"><?= $row['name'] ?></h3>
                            </div>
                        </a>
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