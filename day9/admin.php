<?php
session_start();
if (count($_SESSION["currentUser"]) == 0 || !isset($_SESSION["currentUser"])) {
    header("location:pleaseLogin.php");
}
if (array_key_exists("hasSend", $_POST)) {
    if ($_POST["btn"] == "Logout") {
        $_SESSION["currentUser"] = [];
        header("location:login.php");
    } else if ($_POST["btn"] == "Product")
        header("location:products.php");
    else if ($_POST["btn"] == "Create-Acc")
        header("location:createAccount.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <!-- <link rel="stylesheet" href="../css/bootstrap.css"> -->
    <style>
    .myShadow {
        box-shadow: 0px 0px 50px #4d4d4d;
        border: none
    }

    .bg-linear {
        background: linear-gradient(135deg, #6A11CB, #2575FC, #00DBDE);

    }

    .anmitions {
        transition: all 0.5s ease-in-out;
        animation: move 2s ease-in-out infinite;
    }

    @keyframes move {

        0%,
        100% {
            transform: translateY(-10px);
        }

        50% {
            transform: translateY(10px);

        }

    }
    </style>
</head>

<body class="d-flex bg-linear justify-content-center align-items-center  font-monospace" style="min-height: 100vh;">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card anmitions  bg-linear myShadow w-75 mx-auto p-5">
                    <div class="alert alert-success text-center " type="alert">
                        <h3> <i class="fas fa-check-square" style="font-size: 20px;"></i> Welcom Admin {
                            <?php echo $_SESSION["currentUser"]['name'] ?> }
                        </h3>
                    </div>
                    <div class="btns">
                        <form action="" method="post" class="d-flex justify-content-between">
                            <input type="hidden" name="hasSend">
                            <?php
                            function createBTN($value, $name)
                            {
                                echo "<input type='submit' class='btn btn-danger p-2 me-1 myShadow w-50 ' name='$name' value=$value>";
                            }
                            createBTN("Logout", 'btn');
                            createBTN("Product", 'btn');
                            // createBTN("Create-Acc", 'btn');
                            
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>