<?php
require_once("CoursesDB.php");
session_start();
if (isset($_GET['del'])) {
    deletCourse($con, 'users', $_GET['del']);
}
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $person = getSpacificData($con, 'users', "id=$id");
    $person = mysqli_fetch_assoc($person);
    $roleNum = ($person['role'] == 1 ? 0 : 1);
    mysqli_query($con, "UPDATE users SET role=$roleNum where id=$id");

    if ($_SESSION["currentUser"]['email'] == $person['email']) {
        $_SESSION["currentUser"]['role'] = $roleNum;
        header('location:Home.php');
        exit();
    }
    // echo $_SESSION["currentUser"]['role'];
}

require_once("navebar.php");
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

    .custom-table thead {
        background-color: #343a40;
        color: white;
    }

    .custom-table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .status-active {
        color: green;
        font-weight: bold;
    }

    .status-inactive {
        color: red;
        font-weight: bold;
    }
    </style>
</head>

<body class="bg-light">

    <div class="container py-5">
        <h2 class="text-center mb-4">
            All Partecepnt
        </h2>
        <div class="table-responsive-md table-responsive-sm">

            <table class="table table-striped table-bordered table-striped custom-table text-center shadow">
                <thead class="text-center">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Power</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $courseData = getAllData($con, "users");

                    // $numOfRows = $_SESSION["currentUser"]['role'] == 1 ? 5 : 4;
                    
                    if (mysqli_num_rows($courseData) == 0) {
                        echo "<tr><td colspan='5' class='text-center text-danger fs-3'>There is no cources Yet</td></tr>";
                    } else {
                        while ($row = mysqli_fetch_assoc($courseData)) {
                            echo "<tr>";
                            // echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td class='text-" . ($row['role'] == 1 ? 'danger' : "success") . "'>" . ($row['role'] == 1 ? 'Admin' : "User") . "</td>";
                            if ($row["email"] == 'admin@gmail.com' && $row['name'] == 'admin') {
                                echo '<td><h3 class="bg-secondary text-light p-2 w-100">This is Root </h3></td>';
                            } else {
                                echo ' 
                    <td>   
                        <div class="row">
                                <div class="col">         
                                        <form action="" method="get">
                                            <button type="submit" class="btn btn-' . ($row['role'] == 1 ? 'primary' : "success") . ' w-100 px-4 text-light mt-1 " name="edit" value="' . $row['id'] . '">' . ($row['role'] == 1 ? "Make User" : 'Make Admin') . '</button>
                                         </form>
                                </div>
                                <div class="col">  
                                        <form action="" method="get">
                                             <button type="submit" class="btn btn-danger w-100 p-2 text-light mt-1 " name="del" value="' . $row['id'] . '">delet</button>
                                        </form>
                                </div>
                        </div>
   
                    </td>';
                            }

                            echo "</tr>";
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>


</html>