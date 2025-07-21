<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lash</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body>

    <div class="container">
        <div class="alert alert-success" type="alert">

            <ul>
                <?php
                $str = " mohamd lashin is here ! ";
                echo "<li>" . strlen($str) . "</li>";
                echo "<li>" . strtoupper($str) . "</li>";
                echo "<li>" . strtolower($str) . "</li>";
                echo "<li>" . trim($str) . "</li>";
                echo "<li>" . ucfirst($str) . "</li>";
                echo "<li>" . str_replace(" ", "_", $str) . "</li>";
                // echo "<li>".strlen($str)."</li>";
                


                ?>
            </ul>


        </div>
    </div>

    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>