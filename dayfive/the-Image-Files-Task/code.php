<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container ">
        <div class="row">
            <div class="col">
                <div class="card w-75 mx-auto p-5 bg-primary">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="img" class="form-label text-light fw-bold">Choose Images </label>
                        <input type="file" name="images[ ]" id="img" class="form-control" multiple>
                        <input type="hidden" name="hasSended">
                        <input type="submit" value="send " class="btn btn-danger mt-2 text-light text-center p- w-100">
                    </form>
                </div>
            </div>
        </div>

        <?php
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
                // else 
                //     return "";
        
            }
            ;

            if (count($errors)) {
                echo "<div class='alert alert-warning '  type='alert'>
    Pleace change this files To fixe this errors :
    <ul class='list group'>";
                foreach ($errors as $error) {
                    echo "<li class='list-group-items'>" . $error . "</li>";
                }

                echo "</ul> </div>";
            } else {
                foreach ($files as $file) {
                    $name = $file['name'];
                    move_uploaded_file($file['tem-name'], "images/$name");
                    echo "<img src='images/" . $name . "'alt='error' class='img-fluid rounded shadow mx-auto d-block mt-3'
                        style='max-height: 300px; object-fit: contain;'> <br>";
                }
            }



        }

        ?>

    </div>
</body>

</html>