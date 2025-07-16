<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    echo $_SERVER["SERVER_NAME"];
    echo "<br>";
    echo $_SERVER["REMOTE_ADDR"];
    echo "<br>";
    echo $_SERVER["SERVER_ADDR"];
    echo "<br>";
    echo "<pre>";
    print_r($_SERVER);
    echo "</pre>";
    ?>
</body>

</html>