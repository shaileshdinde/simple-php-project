<?php
include "sessioncheck.php";
include "../db.php";

$username = $_SESSION['user'];

if (isset($_POST['submit'])) {
    $msg = null;
    $wrong = null;

    $target_dir = "../userphotos/";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo(basename($_FILES["photo"]["name"]), PATHINFO_EXTENSION));
    $target_file = $target_dir . $_SESSION['id'] . "." . $imageFileType;
    $photo =  $_SESSION['id'] . "." . $imageFileType;

    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        $wrong = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $wrong =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $data = mysqli_query($connection, "UPDATE user SET photo = '$photo' WHERE email = '$username'");
            if ($data > 0) {
                $msg = "Profile photo updated successfully.";
            } else {
                $wrong = "Please check details. Try again!!!";
            }
        } else {
            $wrong = "Sorry, there was an error uploading your file.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $projectName ?> : User Change Photo </title>
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
            <div class="panel-heading text-center">User Change Photo</div>
            <div class="panel-body">
                <form method="post" action="" enctype="multipart/form-data">
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
                    $data = mysqli_query($connection, "SELECT photo FROM user WHERE email = '$username'");
                    $row = mysqli_fetch_assoc($data);
                    ?>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter Name" value="<?= $username ?>" readonly>
                    </div>

                    <div id="display-image" class="form-group col-lg-12">
                        <?php
                        if ($row['photo'] == null) {
                            echo '<img src="../userphotos/default.png" class="img-circle  " alt="' . $username . '" width="200" height="200" id="preview-selected-image">';
                        } else {
                            echo '<img src="../userphotos/' . $row['photo'] . '" class="img-circle " alt="' . $username . '" width="200" height="200" id="preview-selected-image">';
                        }
                        ?>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Photo</label>
                        <input type="file" name="photo" accept="image/*" class="form-control" required onchange="previewImage(event);">
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
<script>
    const previewImage = (event) => {
        const imageFiles = event.target.files;
        const imageFilesLength = imageFiles.length;
        if (imageFilesLength > 0) {
            const imageSrc = URL.createObjectURL(imageFiles[0]);
            const imagePreviewElement = document.querySelector("#preview-selected-image");
            imagePreviewElement.src = imageSrc;
            imagePreviewElement.style.display = "block";
        }
    };
</script>

</html>