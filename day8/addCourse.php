<?php
require_once("CoursesDB.php");
include_once("navebar.php");
if ($_SESSION["currentUser"]['role'] != 1) {
    header('location:powerNotEnough.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/all.min.css">
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

<body class="font-monospace bg-linear" style="min-height: 100vh;">

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="row">
            <div class="col">
                <div class="card myShadow">
                    <h1 class="p-2 text-center bg-danger mt-0 text-light " style="margin: -1px !important;">Add Courses
                    </h1>
                    <form action="" method="post" class="was-validated p-5">
                        <?php


                        if (isset($_POST["added"])) {
                            $titulo = $_POST["title"];
                            $desc = $_POST["desc"];
                            $hours = $_POST["hours"];
                            $price = $_POST["price"];
                            addCourse($con, $titulo, "coursData", $desc, $hours, $price);
                            echo '  <div class="alert alert-success" type="alert">Course add Successfuly</div>';
                        }
                        ?>
                        <section>
                            <label for="title" class="form-label">Course Title</label>
                            <input type="text" name="title" id="title" class="is-valid form-control" required>
                        </section>
                        <section>
                            <label for="desc" class="form-label">Course Description</label>
                            <textarea name="desc" id="desc" class="is-valid form-control" required></textarea>
                        </section>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section>
                                    <label for="hours" class="form-label">Course Hours</label>
                                    <input type="number" step="0.5" min="0" name="hours" id="hours"
                                        class="is-valid form-control" required>
                                </section>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section>
                                    <label for="price" class="form-label">Course Price</label>
                                    <input type="number" step="0.5" min="0" name="price" id="price"
                                        class="is-valid form-control" required>
                                </section>
                            </div>
                        </div>
                        <section class="text-center">
                            <input type="hidden" name="added" value="1">
                            <input type="submit" value="Add"
                                class="w-75 mx-auto text-center bg-linear myShadow p-2 mt-2 text-light">
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>