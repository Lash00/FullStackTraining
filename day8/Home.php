<?php
require_once("CoursesDB.php");
include_once("navebar.php");
// echo $_SESSION["currentUser"]['role'];
// echo '<br>';
// echo $_SESSION["currentUser"]['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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

<body class="bg-linear  font-monospace" style="min-height: 100vh;">

    <div class="container w-100 d-flex  justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="row">
            <div class="col-12">
                <div class="card anmitions  bg-linear myShadow w-100 mx-auto p-5">
                    <div class="alert alert-success text-center p-4 " type="alert">
                        <h3> <i class="fas fa-check-square" style="font-size: 20px;"></i>
                            <?php echo ($_SESSION["currentUser"]['role'] == 1 ? "Welcome To the Admin : " . $_SESSION["currentUser"]['name'] : "Welcome To Our Student : " . $_SESSION["currentUser"]['name']) ?>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>