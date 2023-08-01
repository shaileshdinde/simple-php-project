<?php
include "sessioncheck.php";
include "../db.php";

$username = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?=$projectName?> : Caste List </title>
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
        <div class="panel panel-success">
            <div class="panel-heading ">Caste List</div>
            <div class="panel-body">                
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th class="dt-head-center">Srno</th>
                            <th class="dt-head-center">Caste</th>                            
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
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="dt-head-center">Srno</th>
                            <th class="dt-head-center">Caste</th>                            
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