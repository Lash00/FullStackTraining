<?php
require_once("CoursesDB.php");
include_once("navebar.php");

if (isset($_GET['del'])) {
    deletCourse($con, 'students',$_GET['del']);
}
if (isset($_GET['edit'])) {
    $showModal = true;
}
if (isset($_POST['added'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $date = $_POST["date"];
upDateStudents($con, $name, $email, $number, $date, $_GET['edit']);
    $_GET['edit']="";
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
            <?php echo ($_SESSION["currentUser"]['role'] == 1 ? $_SESSION["currentUser"]['name'] . "  Admin Student Panel : " : 'Your Class Mate ') ?>

        </h2>
        <div class="table-responsive-md table-responsive-sm">

            <table class="table table-striped table-bordered table-striped custom-table text-center shadow">
                <thead class="text-center">
                    <tr>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Date of Bearth</th>
                        <?php echo ($_SESSION["currentUser"]['role'] == 1 ? "<th>Actions </th>" : ''); ?>
                    </tr>
                </thead>
                <tbody>

                    <?php

            $courseData = getAllData($con, "students");
            
                    $numOfRows = $_SESSION["currentUser"]['role'] == 1 ? 5 : 4;

                    if (mysqli_num_rows($courseData) == 0) {
                echo "<tr><td colspan='$numOfRows' class='text-center text-danger fs-3'>There is no cources Yet</td></tr>";
            } else {
                while ($row = mysqli_fetch_assoc($courseData)) {
                    echo "<tr>";
                    // echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                            if ($_SESSION["currentUser"]['role'] == 1) {
                                echo ' 
                    <td>   
                        <div class="row">
                                <div class="col">         
                                        <form action="" method="get">
                                            <button type="submit" class="btn btn-warning w-100 px-4 text-light mt-1 " name="edit" value="' . $row['id'] . '" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $id = $_GET['edit'];
                    echo $id;
                    $student = getOneData($con, "students", $id);
                    $data=mysqli_fetch_assoc( $student);
                    ?>
                    <form action="" method="post" class="was-validated p-5">
                        <section>
                            <label for="name" class="form-label">Student Name</label>
                            <input type="text" name="name" id="name" class="is-valid form-control" required
                                value=<?php echo '"' . $data['name'] . '"' ?>>
                        </section>
                        <section>
                            <label for="email" class="form-label">Student Email</label>
                            <input type="email" name="email" id="eamil" class="is-valid form-control" required
                                value=<?php echo '"' . $data['email'] . '"' ?>>
                        </section>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section>
                                    <label for="number" class="form-label">User Number </label>
                                    <input type="text" name="number" id="number" class="is-valid form-control" required
                                        value=<?php echo '"' . $data['phone'] . '"' ?>>
                                </section>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section>
                                    <label for="date" class="form-label">Date of Bearth</label>
                                    <input type="date" name="date" id="date" class="is-valid form-control" required
                                        value=<?php echo '"' . $data['date'] . '"' ?>>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>


    <script src="./js/bootstrap.bundle.js"></script>
    <?php if($showModal):?>
    <script>
    let modal = new bootstrap.Modal(document.getElementById('exampleModal'));
    window.onload = () => {
        modal.show();
    }
    </script>
    <?php endif;?>
</body>


</html>