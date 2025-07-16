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

            <h1 class="text-success "> Products Rsort </h1>
            <ul class="list-group shadow rounded p-3 bg-danger">
                <?php
                $products = array(

                    "Phone" => "10000",
                    "Smart Watch" => "2000",
                    "Head Phone" => "5000",
                    "Ring" => "500",
                    "Tablet" => "1000",

                );
                arsort($products);
                foreach ($products as $key => $product) {
                    echo "<li class='list-group-item mt-1 d-flex justify-content-between align-items-center'>
                    <h3 class='text-danger'>$key</h3>
                    <button class='btn-dark  btn text-light p-2  '>$product </button>
                    </li>";

                }
                ?>
            </ul>
            <h1 class="text-success "> Products Asort </h1>
            <ul class="list-group shadow rounded p-3 bg-danger">
                <?php
                asort($products);
                foreach ($products as $key => $product) {
                    echo "<li class='list-group-item mt-1 d-flex justify-content-between align-items-center'>
                    <h3 class='text-danger'>$key</h3>
                    <button class='btn-dark  btn text-light p-2  '>$product </button>
                    </li>";
                }
                ?>
            </ul>
        </div>

    </div>



    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>