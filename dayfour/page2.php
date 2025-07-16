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
            <h1 class="card-title text-light bg-danger p-3 text-center  mb-3" style="margin: -1px !important;">Products
                List
            </h1>
            <table class="table table-striped table-bordered table-hover text-center card-body mt-2">
                <thead>
                    <tr>
                        <th class="bg-dark text-light p-2">Name</th>
                        <th class="bg-dark text-light p-2">Price</th>
                        <th class="bg-dark text-light p-2">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $products = array(
                        "1" => [
                            "name" => "Laptop",
                            "price" => "15000",
                            "quantity" => "5",
                        ],
                        "2" => [
                            "name" => "Computer",
                            "price" => "20000",
                            "quantity" => "3",
                        ],
                        "3" => [
                            "name" => "Mouse",
                            "price" => "750",
                            "quantity" => "10",
                        ],
                        "4" => [
                            "name" => "Bada",
                            "price" => "150",
                            "quantity" => "30",
                        ],

                    );
                    foreach ($products as $product) {
                        echo "<tr>";
                        echo "<td>" . $product["name"] . "</td>";
                        echo "<td>" . $product["price"] . "</td>";
                        echo "<td>" . $product["quantity"] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>



    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>