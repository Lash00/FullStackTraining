<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body class="d-flex justify-content-center align-items-center " style="min-height: 100vh;">
    <div class="container ">
        <div class="row">
            <div class="col">
                <div class="card w-75 mx-auto p-5">
                    <h1 class="card-title text-center">User Profile</h1>
                    <div class="alert alert-success" type="alert">
                        welcom , <?php echo isset($_POST['name']) ? ucfirst($_POST['name']) : "enter ur name"; ?>
                    </div>
                    <h2>User information</h2>
                    <!-- اكسبلود بتعمل حاجه زي الاسبليت كدا و هترجعلك اراي من الاسترينجس ... اخر عنص في الاراي بيبقي نوع الفايل  -->
                    <!--  //echo (explode("/", $_FILES["image"]["name"]))[0]; 
                    //echo $_FILES["image"]["size"];  -->
                    <?php
                    // echo (explode("/", $_FILES["image"]["name"]))[0];
                    $type = (explode("/", $_FILES["image"]["type"]))[0];
                    $size = $_FILES["image"]["size"];
                    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                        $name = $_FILES['image']['name'];
                        $tem = $_FILES['image']['tmp_name'];
                        if ($type == 'image' && $size == '186619') {
                            move_uploaded_file($tem, "images/$name");
                            echo "<img src='images/" . $name . "'alt='error' class='img-fluid rounded shadow mx-auto d-block mt-3'
                        style='max-height: 300px; object-fit: contain;'>";
                        } else if ($size <= '186619' && $tem != 'image') {
                            echo "<div class='alert alert-warning'>Please upload an Image file</div>";

                        } else {
                            echo "<div class='alert alert-warning'>IMage is too big</div>";

                        }
                    }
                    ?>
                    <ul class="list-group ">
                        <li class="list-group-item d-flex justify-content-between px-5"><span>Name
                                :</span><?php echo ucfirst(htmlentities($_POST['name'])) ?> </li>
                        <li class="list-group-item d-flex justify-content-between px-5"><span>Email
                                :</span><?php echo htmlentities($_POST['email']) ?> </li>
                        <li class="list-group-item d-flex justify-content-between px-5"><span>Age
                                :</span><?php echo htmlentities($_POST['age']) ?> </li>
                        <li class="list-group-item d-flex justify-content-between px-5"><span>City
                                :</span><?php echo strtoupper(htmlentities($_POST['city'])) ?> </li>
                        <?php
                        // $gitprice = fn($x, $z, $y) => $x + $y + $z;
                        function gitprice($x, $z, $y)
                        {
                            return $x + $y + $z;
                        }
                        echo "                        <li class='list-group-item d-flex justify-content-between px-5'><span>Price 
                                :</span>" . gitprice(20, 50, 60) . "</li>";

                        $tax = fn($x) => $x + ($x * 0.20);
                        echo "                        <li class='list-group-item d-flex justify-content-between px-5'><span>Price with Tax ( 20% )
                                :</span>" . $tax(gitprice(20, 50, 60)) . "</li>";

                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>