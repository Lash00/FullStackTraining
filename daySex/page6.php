<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body class="bg-dark">

    <div class="container">

        <div class="card p-5 mt-4">
            <?php

            if (isset($_GET["btn"])) {
                $target = $_GET["btn"];
                echo $target;
                unlink("uploads/2025-Jul-20/$target");
                echo "<div class='alert alert-success ' type='alert '>Image hase deleted successfuly </div>";

            }

            ?>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-light bg-danger "> ID </th>
                        <th class="text-light bg-danger "> Img </th>
                        <th class="text-light bg-danger "> Name </th>
                        <th class="text-light bg-danger "> Btn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $files = scandir("uploads/2025-Jul-20/");
                    $i = 1;
                    foreach ($files as $file) {
                        if ($file != "." && $file != "..") {
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td><img src='uploads/2025-Jul-20/$file' alt='Error'  class='img-fluid rounded shadow mx-auto d-block mt-3'
                        style='max-height: 150px; object-fit: contain;'></td>";
                            echo "<td>$file</td>";
                            echo '<td><form action="" method="get">
                        <button class="btn btn-danger p-2" name="btn" value="' . $file . '">Delete</buttton>
                    </form></td>';
                            echo "</tr>";
                            $i++;

                        }
                    }

                    ?>

                </tbody>
            </table>
        </div>

    </div>
</body>

</html>