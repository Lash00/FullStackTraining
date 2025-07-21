<?php

// session_start();
include "navepar.php";
if ($_SERVER['SERVER_NAME'] != 'localhost') {
    header('location:invaledServerName.php');
}
if (count($_SESSION["currentAdmin"]) == 0) {
    header('location:login.php');

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <style>
        .myShadow {
            box-shadow: 0px 0px 50px #4d4d4d;
            border: none
        }

        .bg-linear {
            background: linear-gradient(135deg, #ff512f, #dd2476, #1e90ff);

        }

        .anmitions {
            transition: all 0.5s ease-in-out;
            animation: move 2s ease-in-out infinite;
        }

        @keyframes move {

            0%,
            100% {
                transform: translateY(-10px);
            }

            50% {
                transform: translateY(10px);

            }

        }
    </style>
</head>

<body class="bg-linear  font-monospace" style="min-height: 100vh;">

    <div class="container w-100 d-flex  justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="row">
            <div class="col-12">
                <div class="card bg-linear myShadow w-100 mx-auto p-5">
                    <?php
                    if (isset($_POST['btn'])) {
                        $userName = $_SESSION['currentAdmin']['name'];
                        $imageFolder = "prductsImages/$userName";
                        if (!file_exists($imageFolder)) {
                            mkdir($imageFolder, 0777, true);
                        }
                        $orgName = basename($_FILES["image"]["name"]);
                        $ext = pathinfo($orgName, PATHINFO_EXTENSION);
                        $secureName = uniqid('img_', true) . "." . $ext;
                        $target = $imageFolder . "/" . date("Y-M-D") . "_" . $secureName;
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target);
                        if (!isset($_SESSION["$userName-images"]))
                            $_SESSION["$userName-images"] = [];

                        $_SESSION["$userName-images"][] = [
                            "name" => $target,
                            "type" => $_FILES['image']['type'],
                            'size' => $_FILES['image']['size'],
                            "date" => date("Y-M-D,H:i:s"),
                            "category" => $_POST["category"],
                        ];

                        $imagesFileData = "prductsImages/$userName/$userName-images.txt";
                        $open = fopen($imagesFileData, "a");
                        fwrite($open, date("Y-M-D,H:i:s") . " " . $_SESSION['currentAdmin']['email'] . " " . $_POST["category"] . " " . $target . " " . $_FILES['image']['type'] . "\n");
                        fclose($open);
                        echo "<div class='alert alert-success' type='alert'>Product Add successfully</div>";
                    }

                    ?>
                    <form action="" method="post" class="was-validated " enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <label for="file" class="form-label">Produst Image </label>
                                <input type="file" name="image" id="file" required class="is-valid form-control"
                                    accept="image/*">
                            </div>
                            <div class="col">
                                <label for="type" class="form-label">Produst Category </label>
                                <select name="category" id="type" class="is-valid form-control" required>

                                    <option value="" selected hidden disabled>Category</option>
                                    <option value="HeadPhone">HeadPhone</option>
                                    <option value="Labtop">Labtop</option>
                                    <option value="Computer">Computer</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="Add" name="btn"
                                    class="btn bg-linear p-2 w-100 mt-4 text-center border-0 myShadow text-light">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>