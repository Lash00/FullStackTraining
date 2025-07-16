<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/master.css">
</head>

<body class="bg-dark">

    <div class="container mt-3 d-flex justify-content-center align-items-center" style="min-height: 100vh;">

        <div class="card w-50 mx-auto p-4">
            <h1 class="card-title text-light bg-danger p-3 text-center  mb-3" style="margin: -1px !important;">Members
                List
            </h1>
            <table class="table table-striped table-bordered table-hover text-center card-body mt-2">
                <thead>
                    <tr>
                        <th class="bg-dark text-light p-2">Id</th>
                        <th class="bg-dark text-light p-2">Name</th>
                        <th class="bg-dark text-light p-2">Price</th>
                        <th class="bg-dark text-light p-2">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $products = array(
                        "1" => [
                            "name" => "Lashin",
                            "salary" => 200000,
                            "depatment" => "IS",
                        ],

                        "2" => [
                            "name" => "Ayman",
                            "salary" => 8000,
                            "depatment" => "IT",
                        ],

                        "3" => [
                            "name" => "Ahmed",
                            "salary" => 5000,
                            "depatment" => "CS",
                        ],

                        "4" => [
                            "name" => "Layla",
                            "salary" => 10000,
                            "depatment" => "IT",
                        ],
                        "5" => [
                            "name" => "Menna",
                            "salary" => 9000,
                            "depatment" => "IS",
                        ],

                    );
                    foreach ($products as $id => $product) {

                        if ($product["salary"] > 8000) {
                            echo "<tr>";
                            echo "<td>" . $id . "</td>";
                            echo "<td>" . $product["name"] . "</td>";
                            echo "<td>" . $product["salary"] . "</td>";
                            echo "<td>" . $product["depatment"] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>



    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>