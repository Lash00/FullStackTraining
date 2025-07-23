<?php
require_once("CoursesDB.php");
include_once("navebar.php");

if (isset($_GET['del'])) {
    deletCourse($con, 'coursData',$_GET['del']);
}
if (isset($_GET['edit'])) {
    $showModal = true;
}
if (isset($_POST['added'])) {
    $titulo = $_POST["title"];
    $desc = $_POST["desc"];
    $hours = $_POST["hours"];
    $price = $_POST["price"];
    UpDateData($con, $titulo, $desc, $hours, $price, $_GET['edit']);
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
        <h2 class="text-center mb-4">Admin Panel</h2>

        <div class="table-responsive-md table-responsive-sm">
            <table class="table table-striped table-bordered table-striped custom-table text-center shadow">
                <thead class="text-center">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Hours</th>
                        <th>Price</th>
                        <th>Actions </th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                $courseData = getAllData($con, "coursData");
                if (mysqli_num_rows($courseData) == 0) {
                    echo "<tr><td colspan='5' class='text-center text-danger fs-3'>There is no cources Yet</td></tr>";
                } else {
                    while ($row = mysqli_fetch_assoc($courseData)) {
                        echo "<tr>";
                        // echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['hours'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
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
                    $coursData = getOneData($con, "coursData", $id);
                    $data=mysqli_fetch_assoc($coursData);
                    ?>
                    <form action="" method="post" class="was-validated p-5">
                        <section>
                            <label for="title" class="form-label">Course Title</label>
                            <input type="text" name="title" id="title" class="is-valid form-control" required
                                value=<?php echo '"'.$data['title'].'"'?>>
                        </section>
                        <section>
                            <label for="desc" class="form-label">Course Description</label>
                            <textarea name="desc" id="desc" class="is-valid form-control text-start" required>
                           <?php echo  $data['description'];  ?>
                            </textarea>
                        </section>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section>
                                    <label for="hours" class="form-label">Course Hours</label>
                                    <input type="number" step="0.5" min="0" name="hours" id="hours"
                                        class="is-valid form-control" required
                                        value=<?php echo '"' . $data['hours'] . '"' ?>>
                                </section>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section>
                                    <label for="price" class="form-label">Course Price</label>
                                    <input type="number" step="0.5" min="0" name="price" id="price"
                                        class="is-valid form-control" required
                                        value=<?php echo '"' . $data['price'] . '"' ?>>
                                </section>
                            </div>
                        </div>
                        <section class="text-center">
                            <input type="hidden" name="added" value="1">
                            <input type="submit" value="Add" data-bs-dismiss="modal"
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