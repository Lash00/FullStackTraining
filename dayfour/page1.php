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

    <div class="container mt-3 d-flex justify-content-center align-items-center " style="min-height: 100vh;">

        <div class="card w-50 mx-auto p-4">

            <h1 class="text-success "> Books List </h1>
            <ul class="list-group shadow rounded p-3 bg-dark">
                <?php
                $Books = array("Hary Poter", "Rich Father Boor Father", "Ante5rostos", "3 Way to Hell");
                foreach ($Books as $Book) {
                    echo "<li class='list-group-item mt-1'>$Book</li>";

                }
                ?>
            </ul>
        </div>

    </div>



    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>