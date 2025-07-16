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

            <h1 class="text-success "> Employee data </h1>
            <ul class="list-group shadow rounded p-3 bg-dark">
                <?php
                $Books = array(
                    "1" => [
                        "Name" => "Mohamed Lashin",
                        "Job Title" => "Senior SoftWare",
                        "Departement" => "Web development",
                        "Salary" => "200,000",
                    ]
                );
                foreach ($Books as $key => $Book) {
                    foreach ($Book as $key2 => $Book2) {
                        echo "<li class='list-group-item mt-1'><h3 class='text-success'>" . $key2 . "</h3>" . $Book2 . "</li>";
                        // echo "<li class='list-group-item mt-1'>" . $Book2 . "</li>";
                        // echo "<li class='list-group-item mt-1'>" . $Book["Departement"] . "</li>";
                        // echo "<li class='list-group-item mt-1'>" . $Book["Salary"] . "</li>";
                
                    }

                }
                ?>
            </ul>
        </div>

    </div>



    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>