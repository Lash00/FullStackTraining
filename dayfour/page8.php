<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/master.css">
</head>

<body class="bg-secondary">

    <div class="container mt-3 d-flex justify-content-center align-items-center " style="min-height: 100vh;">

        <div class="card w-75 mx-auto p-4 ">

            <h1 class="text-primary "> Top Products </h1>
            <ul class="list-group shadow rounded p-2 bg-danger mb-3">
                <?php
                $products = array(

                    "Phone" => "10000",
                    "Smart Watch" => "2000",
                    "Head Phone" => "5000",
                    "Ring" => "500",
                    "Tablet" => "8000",

                );
                $Fpro = array_filter(
                    $products,
                    function ($value) {
                        return $value > "5000";
                    }

                );
                foreach ($Fpro as $key => $product) {
                    echo "<li class='list-group-item mt-1 d-flex justify-content-between align-items-center'>
                    <h3 class='text-danger'>$key</h3>
                    <button class='btn-dark text-light px-3 btn  '>$product EGP</button>
                    </li>";

                }
                ?>
            </ul>

            <h1 class="card-title text-light bg-danger p-3 text-center mt-3  mb-3" style="margin: -1px !important;">
                Products
                List
            </h1>
            <table class="table table-striped table-bordered table-hover text-center card-body mt-2 mb-4">
                <thead>
                    <tr>
                        <th class="bg-dark text-light p-2">Product</th>
                        <th class="bg-dark text-light p-2">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($Fpro as $k => $Fro) {
                        echo "<tr>";
                        echo "<td> $k</td>";
                        echo "<td>$Fro</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <h4 class="text-secondary">Number of the hieghts Product Price is : <span
                    class="text-danger"><?php echo count($Fpro); ?></span></h4>
        </div>





        <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>