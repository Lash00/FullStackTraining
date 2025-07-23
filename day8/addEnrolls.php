<?php
require_once("CoursesDB.php");
include_once("navebar.php");
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
                <div class="card w-100 myShadow">
                    <h1 class="p-2 text-center bg-danger mt-0 text-light " style="margin: -1px !important;">Add Enrolls
                    </h1>
                    <form action="" method="post" class="was-validated p-5">
                        <?php
                        if (isset($_POST["enrol"])) {
                            addNewEnroll($con, $_POST["stdName"], $_POST["coursName"], $_POST['degree']);
                            echo '  <div class="alert alert-success" type="alert">Enroll was accepted </div>';

                        }


                        // $courses = getAllData($con, "coursData");
                        // $courses = spacificSelect($con, "coursData", 'title');
                        $courses = getAllData($con, 'coursData');
                        $students = getAllData($con, "students");
                        // $students = getAllData($con, "students");
                        if (mysqli_num_rows($courses) == 0 && mysqli_num_rows($students) == 0) {
                            echo "<div class='alert alert-danger 'type='alert'>Please Add an Student and Courses Frist </div>";
                        } else if (mysqli_num_rows($courses) >= 0 && mysqli_num_rows($students) == 0) {
                            echo "<div class='alert alert-warning 'type='alert'>Please Add an Student Frist </div>";
                        } else if (mysqli_num_rows($courses) == 0 && mysqli_num_rows($students) >= 0) {
                            echo "<div class='alert alert-warning 'type='alert'>Please Add an Courses Frist </div>";
                        } else {
                            // echo "<div class='alert alert-success 'type='alert'>U are ready to desplay now  </div>";
                            ?>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <section>
                                                <label for="std_name" class="form-label">Student Name</label>
                                                <select name="stdName" id="std_name" class="form-control is-valid" required>
                                                    <option value="" hidden selected disabled>Select Student Name</option>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($students)) {
                                                    echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                                                }
                                                ?>
                                                </select>
                                            </section>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <section>
                                                <label for="cours_name" class="form-label">Course Title</label>
                                                <select name="coursName" id="cours_name" class="form-control is-valid" required>
                                                    <option value="" hidden selected disabled>choose Course Title</option>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($courses)) {
                                                    echo "<option value='" . $row["id"] . "'>" . $row["title"] . "</option>";
                                                }
                                                ?>
                                                </select>
                                            </section>

                                        </div>
                                    </div>
                                    <select name="degree" id="deg" class="form-control is-valid mt-2" required>
                                    <?php
                                    $dgress = array('A', 'B', 'C', 'D', 'f');
                                    echo "<option value='' hidden selected disabled>choose student Degree</option>";

                                    foreach ($dgress as $v) {
                                        echo "<option value='$v'>$v</option>";

                                    }
                                    ?>
                                    </select>


                                    <section class="text-center">
                                        <input type="hidden" name="enrol" val="1">
                                        <input type="submit" value="Enroll Now "
                                            class="p-2 w-75 mx-auto text-center bg-linear text-light border-0 mt-2 rounded-3">
                                    </section>

                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>