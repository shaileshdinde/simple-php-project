<?php
include "sessioncheck.php";
include "../db.php";

$username = $_SESSION['admin'];

if (isset($_POST['update'])) {
    $msg = null;
    $wrong = null;
    $id = mysqli_real_escape_string($connection,$_POST['id']);
    $status = mysqli_real_escape_string($connection,$_POST['status']);

    try {
        $data = mysqli_query($connection, "UPDATE caste SET status = '$status' WHERE id = '$id'");

        if ($data > 0) {
            $msg = "Caste updated successfully.";
        } else {
            $wrong = "Please check details. Try again!!!";
        }
    } catch (Exception $e) {
        $wrong = "Please check details. Try again!!!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$projectName?> : Admin Caste List </title>
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
    <div class="row col-lg-4 col-xs-12  col-lg-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading ">Caste List</div>
            <div class="panel-body">
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
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th class="dt-head-center">Srno</th>
                            <th class="dt-head-center">Caste</th>
                            <th class="dt-head-center">Status</th>
                            <th class="dt-head-center">Change</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($connection, "SELECT * FROM caste");
                        $srno = 0;
                        while ($row = mysqli_fetch_assoc($data)) {
                            echo '<tr>';
                            echo '<td class="text-center">' . ++$srno . '</td>';
                            echo '<td class="text-center">' . $row['name'] . '</td>';
                            echo '<td class="text-center">' . $row['status'] . '</td>';
                            echo "<form method='post' action=''>";
                            echo "<input type='hidden' name = 'id' value='" . $row['id'] . "'>";
                            if ($row['status'] == 1) {
                                echo "<input type='hidden' name = 'status' value='0'>";
                                echo  '<td class="text-center"><button type="submit" name="update" class="btn btn-danger">Disable</button></tr>';
                            } else {
                                echo "<input type='hidden' name = 'status' value='1'>";
                                echo  '<td class="text-center"><button type="submit" name="update" class="btn btn-success">Enable</button></tr>';
                            }
                            echo "</form>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="dt-head-center">Srno</th>
                            <th class="dt-head-center">Caste</th>
                            <th class="dt-head-center">Status</th>
                            <th class="dt-head-center">Change</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({});

    })
</script>


</html>