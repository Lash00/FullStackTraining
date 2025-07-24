<!DOCTYPE html>
<html lang="en">
<?php
// session_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET["btn"])) {
    $_SESSION["currentUser"] = [];
    header('location:login.php');
}
if (count($_SESSION["currentUser"]) == 0) {
    header("location:pleaseLogin.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lash Navbar</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <style>
    .navbar-custom {
        /* background: linear-gradient(to right, #1f1c2c, #928dab); */
        background: linear-gradient(to right, #4830b1, #209b95);
    }

    * {
        font-family: cursive;
    }


    th {
        background-color: #008cff !important;
        color: white !important;
        /* background: linear-gradient(135deg, #6A11CB, #2575FC, #00DBDE) !important; */

    }

    table {
        table-layout: auto;
        width: 100%;

    }

    .navbar-brand {
        font-weight: bold;
        color: white !important;
        font-size: 1.6rem;
        display: flex;
        align-items: center;
    }

    .navbar-brand i {
        margin-right: 8px;
    }

    .nav-link {
        color: white !important;
        font-weight: 500;
        margin-left: 15px;
    }

    .nav-link:hover {
        color: #ffc107 !important;
    }

    .btn-login {
        background-color: #ffc107;
        border: none;
        color: black;
        font-weight: bold;
    }

    .btn-login:hover {
        background-color: #e0a800;
    }

    .bg-linear {
        background: linear-gradient(135deg, #6A11CB, #2575FC, #00DBDE) !important;

    }

    .myShadow {
        box-shadow: 0px 0px 50px #4d4d4d;
        border: none
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom  myShadow">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="#">
                <i class="fas fa-bolt text-warning"></i> Lash
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarNav"
                style="justify-content: end !important;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="Home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="coursesPage.php">Courses</a>
                    </li>
                    <?php
                    if ($_SESSION["currentUser"]['role'] == 1) {
                        echo '<li class="nav-item">
                        <a class="nav-link" href="addCourse.php">Add Courses</a>
                    </li>';
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="StudentPage.php">Students</a>
                    </li>
                    <?php
                    if ($_SESSION["currentUser"]['role'] == 1) {
                        echo ' <li class="nav-item">
                        <a class="nav-link" href="addStudent.php">Add Students</a>
                    </li>';
                    }
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="enrollesPage.php">Enrolles</a>
                    </li>
                    <?php
                    if ($_SESSION["currentUser"]['role'] == 1) {
                        echo '  <li class="nav-item">
                        <a class="nav-link" href="addEnrolls.php">Add Enrollers</a>
                    </li>
                ';
                    }
                    ?>
                    <!-- <li class="nav-item">


                    </li> -->
                    <?php
                    if ($_SESSION["currentUser"]['role'] == 1) {
                        echo '  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">Actevites</a>
                        <ul class="dropdown-menu p-2">
                            <li><a class="dropdown-item" href="allUsers.php">Parftcipations</a></li>
                            <li><a class="dropdown-item" href="createAccount.php">Add New User</a></li>
                            <!-- <li>
                            
                            </li> -->
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="overflow-hidden">
                                <form action="" method="get">
                                    <input type="submit" name="btn" value="Logout" id="del"
                                        class="btn btn-warning w-100 px-4 text-center ">
                                </form>
                            </li>
                        </ul>
                    </li>';
                    } else
                        echo '  <li class="overflow-hidden">
                                <form action="" method="get">
                                    <input type="submit" name="btn" value="Logout" id="del"
                                        class="btn btn-warning w-100 px-4 text-center ">
                                </form>
                            </li>';

                    ?>
            </div>
        </div>
    </nav>

    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>