<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/master.css">
</head>

<body class="bg-danger">

    <div class="container mt-3 d-flex justify-content-center align-items-center " style="min-height: 100vh;">

        <div class="card w-50 mx-auto p-4">

            <h1 class="text-success "> Courses </h1>
            <ul class="list-group shadow rounded p-3 bg-warning">
                <?php
                $courses = array("HTML", "CSS", "JS", "PHP");
                array_push($courses, "MYSQL");
                array_shift($courses);
                array_unshift($courses, "GIT");
                foreach ($courses as $cours) {
                    echo "<li class='list-group-item mt-1'>$cours</li>";

                }
                ?>
            </ul>
        </div>

    </div>



    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>