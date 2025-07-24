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
                    <h1 class="p-2 text-center bg-danger mt-0 text-light " style="margin: -1px !important;">Add Student
                    </h1>
                    <form action="" method="post" class="was-validated p-5">
                        <?php


                        if (isset($_POST["added"])) {
                            $name = $_POST["name"];
                            $email = $_POST["email"];
                            $number = $_POST["number"];
                            $date = $_POST["date"];
                            addCourse($con, $name, "students", $email, $number, $date);
                            echo '  <div class="alert alert-success" type="alert">Student add Successfuly</div>';
                        }
                        ?>
                        <section>
                            <label for="name" class="form-label">Student Name</label>
                            <input type="text" name="name" id="name" class="is-valid form-control" required>
                        </section>
                        <section>
                            <label for="email" class="form-label">Student Email</label>
                            <input type="email" name="email" id="eamil" class="is-valid form-control" required>
                        </section>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section>
                                    <label for="number" class="form-label">User Number </label>
                                    <input type="text" name="number" id="number" class="is-valid form-control" required>
                                </section>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section>
                                    <label for="date" class="form-label">Date of Bearth</label>
                                    <input type="date" name="date" id="date" class="is-valid form-control" required>
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