<?php
if (array_key_exists('admin', $_GET)) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    header("location:admin.php?name=$name&email=$email");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <style>
        .bg-linear {
            background: linear-gradient(135deg, #ff512f, #dd2476, #1e90ff);

        }

        .myShadow {
            box-shadow: 0px 0px 50px #4d4d4d;
            border: none
        }

        .over {
            overflow: hidden;
        }

        .w-45 {
            width: 47%;
        }

        @media (max-width: 768px) {
            .w-45 {
                width: 100%;
                margin-top: 5%;
            }
        }
    </style>
</head>

<body class="d-flex bg-linear justify-content-center align-items-center text-break font-monospace"
    style="min-height: 100vh;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card p-5">
                    <h1 class="text-light  text-center fw-font bg-linear p-2 w-50 mx-auto rounded-4 ">Products</h1>
                    <form action="" method="post" class="was-validated " enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-md-6">
                                <label for="name" class="form-lable">Product Name</label>
                                <input type="text" name="name" id="name" required class="form-control is-invalid">
                            </div>
                            <div class="col-lg-6 col-sm-12 col-md-6">
                                <label for="disc" class="form-lable">Product Description</label>
                                <input type="text" name="disc" id="disc" required class="form-control is-invalid">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="image" class="form-lable">Product images</label>
                                <input type="file" name="images[ ]" id="image" required class="form-control is-invalid"
                                    multiple>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <input type="hidden" name="hasSended">
                                <input type="submit" value="Add Products"
                                    class="btn bg-linear p-2  mx-auto mt-3 text-light fw-bold border-0 myShadow"
                                    style="width: 35%;">
                            </div>
                        </div>

                    </form>
                    <div class='d-flex flex-wrap justify-content-between gap-2 mt-5'>
                        <?php
                        // the success code 
                        $email = $_GET['email'];

                        if (array_key_exists("hasSended", $_POST)) {
                            $len = count($_FILES['images']['name']);

                            $files = [];

                            for ($i = 0; $i < $len; $i++) {

                                $files[] = [
                                    'name' => $_FILES['images']['name'][$i],
                                    'type' => $_FILES['images']['type'][$i],
                                    'tem-name' => $_FILES['images']['tmp_name'][$i],
                                    'size' => $_FILES['images']['size'][$i],
                                ];
                            }

                            $errors = [];
                            foreach ($files as $file) {
                                $type = (explode("/", $file['type']))[0];
                                $size = $file['size'];
                                if ($type != 'image' && $size <= '186619') {
                                    $errors[] = "" . $file['name'] . "  Not an image";
                                } else if ($type == 'image' && $size > '186619') {
                                    $errors[] = "" . $file['name'] . "  Size is more than 18k ";
                                }

                            }
                            ;

                            if (count($errors)) {
                                echo "<div class='alert alert-warning w-100'  type='alert'>
    Pleace change this files To fixe this errors :
    <ul class='list group'>";
                                foreach ($errors as $error) {
                                    echo "<li class='list-group-items'>" . $error . "</li>";
                                }

                                echo "</ul> </div>";
                            } else {
                                foreach ($files as $file) {
                                    $name = $file['name'];
                                    move_uploaded_file($file['tem-name'], "./product-images/$name");
                                    //             echo "<img src='product-images/" . $name . "'alt='error' class='img-fluid rounded shadow mx-auto d-block mt-3'
                                    // style='max-height: 300px; object-fit: contain;'> <br>";
                                    $proname = $_POST['name'];
                                    $desc = $_POST['disc'];
                                    echo "
                        
                    <div class='card over bg-linear w-45 w-sm-100 border-0 myShadow ' style='    max-height: fit-content;' '>
                        <div class='row'>
                            <div class='col-lg-6 col-sm-12 col-md-12 me-0 p-0'><img src='./product-images/$name'  
                                    alt='error' class='img-fluid rounded shadow '
                                    style='height: 300px;width: 100%; object-fit: containt; margin: -1px !important;'>
                            </div>
                            <div class='col-lg-6 col-sm-12 col-md-12 p-4 '>
                                <h3 class='text-light fw-bold text-center mx-auto '>Product INfo</h3>
                                <ul class='list-group w-100 '>
                                    <li class='list-group-item w-100 d-flex justify-content-between fw-bold'>Name :
                                        <span>$proname </span>
                                    </li>
                                    <li class='list-group-item w-100 fw-bold'>Descroption :
                                        <span>$desc</span>
                                    </li>
                                    <li class='list-group-item w-100 d-flex justify-content-between fw-bold'>Add by :
                                        <span>$email</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                        
                       
                        
                        
                        ";
                                }
                            }



                        }

                        ?>
                    </div>
                    <div class="text-center mx-auto mt-3 " style="width: 35%;">
                        <form action="">
                            <input type="hidden" name="admin">
                            <input type="hidden" name="name" value=<?php echo $_GET['name'] ?>>
                            <input type="hidden" name="email" value=<?php echo $_GET['email'] ?>>
                            <input type="submit" value="Admin Dashboard"
                                class="btn bg-linear p-x-5 w-100  mx-auto mt-3 text-light fw-bold border-0 myShadow">
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
</body>

</html>