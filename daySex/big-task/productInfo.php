<?php

// session_start();
include "navepar.php";
if ($_SERVER['SERVER_NAME'] != 'localhost') {
    header('location:invaledServerName.php');
}
if (count($_SESSION["currentAdmin"]) == 0) {
    header('location:login.php');

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/normalize.css">

    <style>
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

        <table class="table table-bordered table-striped custom-table shadow">
            <thead class="text-center">
                <tr>
                    <th>DATA</th>
                    <th>Admin Email</th>
                    <th>Category</th>
                    <th>Path</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>

                <?php
                // $infoData = scandir('usersFolder/admin.log');
                // foreach ($infoData as $admin) {
                //     if ($admin == '.' || $admin == '')
                //         continue;
                //     echo '' . $admin . '<br>';
                // }
                $userName = $_SESSION['currentAdmin']['name'];
                if (file_exists("prductsImages/$userName/$userName-images.txt")) {
                    $infoData = file_get_contents("prductsImages/$userName/$userName-images.txt");
                    $lines = explode("\n", $infoData);
                    if (count($lines)) {
                        foreach ($lines as $line) {
                            $line = trim($line);
                            echo "<tr>";
                            foreach (explode(" ", $line) as $info) {

                                if ($info === 'HeadPhone' || $info === 'Computer' || $info === 'Labtop')
                                    echo '<td class="status-active text-success">' . $info . '</td>';
                                /*else if ($info === 'Success')
                                    echo '<td class="status-active text-success">' . $info . '</td>';*/
                                else if ((explode('/', $info)[0]) === 'prductsImages')
                                    echo '<td class="status-inactive text-danger">' . $info . '</td>';
                                else
                                    echo '<td>' . $info . '</td>';

                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr ><td colspan='5' class='text-center text-danger fs-3'>There is no Products yet ,go and Add some</td></tr>";

                    }

                } else {
                    echo "<tr ><td colspan='5' class='text-center text-danger fs-3'>There is no Products yet ,go and Add some</td></tr>";
                }


                ?>


            </tbody>
        </table>
        <?php
        // echo "<pre>";
        // $name = $_SESSION['currentAdmin']['name'];
        
        // print_r($_SESSION["$name-images"]);
        // echo "</pre>";
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.bundle.js"></script>
</body>

</html>