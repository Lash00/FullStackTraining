<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body>
    <div class="container"><?php
    $date = date("Y-M-D_H-i-s");
    $path = "fplders/$date";
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
        echo " <div class='alert alert-success 'type='alert'>created at $date</div><br>";
    } else
        echo " <div class='alert alert-success 'type='alert'>Dir is already exisst </div><br>";




    ?></div>
</body>

</html>