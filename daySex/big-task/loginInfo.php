<?php

// session_start();
include "navepar.php";
// echo $_SERVER['SERVER_NAME'];
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
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Admin Name</th>
                    <th>Status</th>
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
                
                $infoData = file_get_contents('usersFolder/admin.log');
                $lines = explode("\n", $infoData);
                foreach ($lines as $line) {
                    $line = trim($line);
                    echo "<tr>";
                    foreach (explode(" ", $line) as $info) {
                        if ($info === 'Success')
                            echo '<td class="status-active text-success">' . $info . '</td>';
                        else if ($info === 'Faild')
                            echo '<td class="status-inactive text-danger">' . $info . '</td>';
                        else
                            echo '<td>' . $info . '</td>';

                    }
                    echo "</tr>";
                }
                ?>


            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.bundle.js"></script>
</body>

</html>