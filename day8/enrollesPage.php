<?php
require_once("CoursesDB.php");
include_once("navebar.php");

if (isset($_GET['del'])) {
    deletCourse($con, 'enrolles', $_GET['del']);
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
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Course Title</th>
                        <th>Course Degree</th>
                        <th>Course desc</th>
                        <th>Actions </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $enrollData = mysqli_query(
                        $con,
                        "  SELECT 
        enrolles.id ,
        students.name,
        students.email,
        students.phone,
        coursData.title,
        enrolles.degree,
        coursData.description 
    FROM
        enrolles
    JOIN students ON students.id = enrolles.student_id
    JOIN coursData ON coursData.id = enrolles.course_id
"
                    );
                    if (mysqli_num_rows($enrollData) == 0) {
                        echo "<tr><td colspan='6' class='text-center text-danger fs-3'>No one Enrolled yet </td></tr>";

                    }
                    while ($row = mysqli_fetch_assoc($enrollData)) {
                        echo "<tr>";
                        foreach ($row as $key => $value) {
                            if ($key == 'id')
                                continue;
                            echo "<td>" . $value . "</td>";
                        }
                        echo '<td>   <form action="" method="get">
                                             <button type="submit" class="btn btn-danger w-100 p-2 text-light mt-1 " name="del" value="' . $row['id'] . '">Sign Out</button>
                                        </form></td></tr>';
                        // echo "";
                    }

                    ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="./js/bootstrap.bundle.js"></script>

</body>


</html>