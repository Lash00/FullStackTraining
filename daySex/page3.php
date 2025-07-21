<?php
session_start();
if (!isset($_SESSION["user"])) {
    $_SESSION["user"] = [];
}
if (isset($_GET['btn']) && $_GET['btn'] == "Done") {
    $_SESSION["user"][] = [
        "name" => $_GET['name'],
        "email" => $_GET['email'],
        "pass" => $_GET['pass'],
    ];
}
if (isset($_GET['btn']) && $_GET['btn'] == "remove-last") {
    array_pop($_SESSION["user"]);
}
if (isset($_GET['btn']) && $_GET["btn"] == "clear") {
    $_SESSION["user"] = [];
    // session_unset();
    // session_destroy();

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lash</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body class="bg-dark p-5">
    <div class="container">
        <div class="card mx-auto w-75 p-5">
            <form action="" method="get" class="was-validated">
                <label for="name" class="form-label">User Name </label>
                <input type="text" name="name" id="name" class="form-control has-is-invalid" required>

                <label for="email" class="form-label">User Email </label>
                <input type="email" name="email" id="email" class="form-control has-is-invalid" required>

                <label for="pass" class="form-label">User Password </label>
                <input type="Password" name="pass" id="pass" class="form-control has-is-invalid" required>


                <input type="hidden" name="send" value="1">
                <input type="submit" name='btn' value="Done" class="btn btn-primary p-2 w-100 mt-3 mx-auto text-center">

            </form>
            <div class="mb-3 mt-3">
                <form action="" method="get" class="d-flex gap-2 w-100">
                    <button type="submit" value="remove-last" class="btn btn-success p-2 w-50 mt-3 mx-auto text-center"
                        name="btn">Remove last</button>
                    <button type="submit" value="clear" class="btn btn-warning  p-2 w-50 mt-3 mx-auto text-center"
                        name="btn">Clear</button>
                </form>


            </div>
            <?php
            if (count($_SESSION['user']) == 0) {

                echo '<div class="alert alert-danger" type="alert">There is no users </div>';

            }
            ?>
            <table class="table table-bordered text-center mt-2 shadow ">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>email</th>
                    </tr>
                </thead>
                <?php


                foreach ($_SESSION["user"] as $user) {
                    echo "<tr>";
                    echo "<td>" . $user["name"] . "</td>";
                    echo "<td>" . $user["email"] . "</td>";
                    echo "</tr>";
                }




                // print_r($_SESSION['user']);
                
                ?>

            </table>

        </div>
    </div>
</body>

</html>