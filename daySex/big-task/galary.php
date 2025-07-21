<?php

// session_start();
include "navepar.php";
$userName = $_SESSION['currentAdmin']['name'];
if (isset($_GET['btn'])) {
    unset($_SESSION["$userName-images"][$_GET['btn']]);
    $_SESSION["$userName-images"] = array_values($_SESSION["$userName-images"]);
}
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
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Size</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $userName = $_SESSION['currentAdmin']['name'];
                if (!isset($_SESSION["$userName-images"]))
                    $_SESSION["$userName-images"] = [];
                if (count($_SESSION["$userName-images"])) {
                    foreach ($_SESSION["$userName-images"] as $index => $value) {
                        echo "<tr><td class='text-start'><img src='" . $value['name'] . "' alt='Error'  class='img-fluid rounded shadow mx-auto d-block mt-3'
                        style='max-height: 100px; object-fit: contain;'></td>";
                        $ApstractName = (explode("img_", $value["name"])[1]);
                        echo "<td class='text-danger'>img_" . $ApstractName . "</td>";
                        echo "<td class='text-success'>" . $value['category'] . "</td>";
                        $imgType = explode("/", $value["type"])[1];
                        echo "<td class='text-primary'>" . $imgType . "</td>";
                        echo "<td class='text-primary'>" . $value['size'] . "</td>";
                        echo "<td class='text-primary'>" . "            <form action='' method='get'>
<button value='$index' name='btn' class='btn btn-warning p-2 text-light '>Delete</button>

                        </form>" . "
                        </td></tr>";
                    }
                } else
                    echo "<tr ><td colspan='6' class='text-center text-danger fs-3'>There is no Products yet ,go and Add some</td></tr>";

                ?>

            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.bundle.js"></script>
</body>

</html>