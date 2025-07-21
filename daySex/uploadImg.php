<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body>
    <div class="container">
        <div class="alert alert-success">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // step one get the original name 
                $orgName = basename($_FILES['image']['name']);
                // step two get make the folder 
                $folder = "uploads/" . date("Y-M-d") . "/";
                // step three the get ensure the folder is exixst
                if (!file_exists($folder))
                    mkdir($folder, 0777, true);

                // step four get the extention
                $ext = pathinfo($orgName, PATHINFO_EXTENSION);
                $uniq_name = uniqid("img_", true) . "." . $ext;
                $target = $folder . time() . "_" . $uniq_name;
                $allowed = ['image/png', "image/jpeg"];
                if (in_array($_FILES['image']['type'], $allowed)) {
                    move_uploaded_file($_FILES['image']['tmp_name'], $target);
                    echo "Uploded to $target";

                } else
                    echo "invalid type <br>";
                echo $_FILES['image']['type'];


            }





            ?>
        </div>
    </div>
</body>

</html>