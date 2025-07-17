<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body>
    <div class="mx-2 mt-3">
        <div class="alert alert-warning" type="alert">
            Access denied invalid host
        </div>
        <div class="alert alert-warning" type="alert">
            Request method is : <?php echo $_SERVER['REQUEST_METHOD'] ?>
        </div>
    </div>
</body>

</html>