<?php

if ($_SERVER['REMOTE_ADDR'] == "::1")
    header("Location:http://localhost/NTI/dayfive/page2.php");
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css" />
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="row">
            <div class="col">
                <div class="card p-3 shadow">
                    <h5 class="text-center">Hi in the hill</h5>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Key</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo "<tr><td>PHP_SELF</td><td>" . $_SERVER['PHP_SELF'] . "</td></tr>";
                            echo "<tr><td>SERVER_NAME</td><td>" . $_SERVER['SERVER_NAME'] . "</td></tr>";
                            echo "<tr><td>HTTP_HOST</td><td>" . $_SERVER['HTTP_HOST'] . "</td></tr>";
                            echo "<tr><td>USER_AGENT</td><td>" . $_SERVER['HTTP_USER_AGENT'] . "</td></tr>";
                            echo "<tr><td>REQUEST_METHOD</td><td>" . $_SERVER['REQUEST_METHOD'] . "</td></tr>";
                            echo "<tr><td>REMOTE_ADDR</td><td>" . $_SERVER['REMOTE_ADDR'] . "</td></tr>";
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>