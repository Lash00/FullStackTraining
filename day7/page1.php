<?php

session_start();
$_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;
?>

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
        <div class="alert alert-primary">Number of visit : <?php echo $_SESSION['count']; ?></div>
    </div>

</body>

</html>