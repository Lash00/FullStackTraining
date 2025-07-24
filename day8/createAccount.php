<?php
require_once("CoursesDB.php");
session_start();
if (array_key_exists("goToProducts", $_GET)) {

    $name = $_GET["name"];
    $email = $_GET["email"];
    header("location:products.php?name=$name&email=$email");


}

$btnName = 'login';
if (isset($_SESSION["currentUser"]) && count($_SESSION["currentUser"]) && $_SESSION["currentUser"]['role'] == 1) {
    $btnName = "Home";

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/all.min.css">

    <style>
    .bg-linear {
        background: linear-gradient(135deg, #6A11CB, #2575FC, #00DBDE);

    }

    body {
        font-family: cursive;
    }


    .myShadow {
        box-shadow: 0px 0px 50px #4d4d4d;
        border: none
    }

    a {
        text-decoration: none;
    }

    body {
        background-image: url("./images/bg.jpg");
        background-size: contain;
    }
    </style>
</head>

<body class="d-flex justify-content-center  text-break " style="min-height: 100vh;">
    <div class="container">
        <div class="row ">
            <?php
            if (array_key_exists('hasSend', $_POST)) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $errors = array();
                $imgName;
                $imgTempName;
                $type;
                // isset($_FILES["image"]) && $_FILES["image"]["error"] == 0
                if (isset($_FILES["image"]) && $_FILES['image']['error'] == 0) {
                    $type = (explode('/', $_FILES['image']['type']))[0];
                    $size = $_FILES['image']['size'];
                    $imgName = $_FILES['image']['name'];
                    $imgTempName = $_FILES['image']['tmp_name'];
                    // 
                    $usrName = $_POST["name"];
                    $userEmail = $_POST["email"];
                    // 
                    if ($type == 'image' && $size <= '186619') {
                        $imgName = basename($_FILES['image']['name']);
                        $folder = "usersPhotos/";
                        if (!file_exists($folder))
                            mkdir($folder, 0777, true);
                        $ex = pathinfo($imgName, PATHINFO_EXTENSION);
                        $hashName = md5_file("$imgTempName") . "." . "$ex";
                        $target = $folder . time() . $hashName;
                        $hasimg = base64_encode($target);
                        move_uploaded_file($imgTempName, "$target");

                    } else if ($type != 'image' && $size <= '186619') {
                        $errors[] = "the File : ( $imgName ) is not an image ";
                    } else
                        $errors[] = "the File : ( $imgName ) Size is To big ";
                }

            }
            ?>
            <div class="col-lg-8 col-md-8 col-sm-12 mx-auto shadow">
                <h1 class=" bg-linear text-white p-4 text-center mb-3 m-0">Join Us NOw </h1>
                <div class="card myShadow p-3">
                    <?php
                    if ((array_key_exists('hasSend', $_POST))) {

                        if (count($errors))
                            echo "<div class='alert alert-warning ' type='alert'>" . $errors[0] . "</div>";
                        else {
                            $isEmailExists = getSpacificData($con, "users", "email ='$email'");
                            if (mysqli_num_rows($isEmailExists) == 0) {
                                $hashPass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
                                if (isset($_POST['role']) && $_POST['role'] == 1)
                                    addNewAdmin($con, $_POST['name'], $_POST['email'], $hashPass, "$hasimg");
                                else
                                    addNewUser($con, $_POST['name'], $_POST['email'], $hashPass, "$hasimg");

                                echo "<div class='alert alert-success ' type='alert'>Acount has created Successfuly
                          </div>";
                            } else
                                echo "<div class='alert alert-danger' type='alert'>Email already exists
                       </div>";

                        }
                    }

                    ?>
                    <form action=<?php echo "'" . $_SERVER['PHP_SELF'] . "'"; ?> method="post" class="was-validated "
                        enctype="multipart/form-data">

                        <section class='mt-2'>
                            <label for="name" class="form-label">User Name</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" id="name" class="form-control is is-valid rounded-2" name="name"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter ur Name
                                </div>
                            </div>

                        </section>
                        <div class="row">
                            <div class="col">
                                <section class='mt-2'>
                                    <label for="pass " class="form-label">User Email</label>
                                    <!-- <input type="password" name="pass" id="pass" class="form-control is-invalid" required> -->
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="email" id="email" class="form-control is is-valid rounded-2 "
                                            name="email" required>
                                        <div class="invalid-feedback">
                                            Please enter ur Email
                                        </div>
                                    </div>

                                </section>
                            </div>
                            <?php
                            if (isset($_SESSION["currentUser"]) && count($_SESSION["currentUser"])) {
                                if ($_SESSION["currentUser"]['role'] == 1) {
                                    echo '
                             <div class="col">
                                <section class="mt-2">
                                    <label for="role " class="form-label">User Role</label>
                                    <!-- <input type="password" name="pass" id="pass" class="form-control is-invalid" required> -->
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-users-cog"></i>
                                        </span>
                                        <select name="role" id="role" class="form-control is-valid" required>

                                            <option value="" selected hidden disabled>Select User Rol</option>
                                            <option value="0">User</option>
                                            <option value="1">Admin</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please enter User Powers
                                        </div>
                                    </div>

                                </section>
                            </div>
                            ';
                                }

                            }



                            ?>
                        </div>
                        <!-- <section class='mt-2'>
                            <label for="pass " class="form-label">User Email</label>
                            <input type="password" name="pass" id="pass" class="form-control is-invalid" required>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" id="email" class="form-control is is-valid rounded-2 " name="email"
                                required>
                            <div class="invalid-feedback">
                                Please enter ur Email
                            </div>
                        </div> -->

                        </section>
                        <section class='mt-2'>
                            <label for="pass " class="form-label">User Password</label>
                            <!-- <input type="password" name="pass" id="pass" class="form-control is-invalid" required> -->
                            <div class="input-group">
                                <span class="input-group-text">
                                    <button type="button" class="btnEyes" style="border: none;"> <i
                                            class="fas fa-eye"></i></button>
                                </span>
                                <input type="password" id="pass" class="form-control is is-valid rounded-2" name="pass"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter ur password
                                </div>
                            </div>

                        </section>
                        <section class='mt-2'>
                            <label for="image" class="form-label">User Image</label>
                            <input type="file" name="image" id="image" class="form-control is-invalid rounded-2"
                                required>
                        </section>
                        <section class="mt-4  mx-auto text-center">
                            <input type="hidden" name="hasSend">
                            <input type="submit" value="Create"
                                class="btn bg-linear p-2 w-50 text-center border-0 myShadow text-light">

                            <a href=<?php echo $btnName . ".php"; ?> class="text-light">
                                <button type="button"
                                    class="btn mt-3 bg-linear p-2 w-50 text-center border-0 myShadow mb-0 text-light"><?php echo $btnName; ?></button></a>';



                        </section>

                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    let eyeBtn = document.querySelector(".btnEyes");
    let pass = document.getElementById('pass');
    let flag = 0;
    eyeBtn.onclick = () => {
        if (flag) {
            pass.setAttribute('type', 'text');
            flag = !flag;
        } else {
            pass.setAttribute('type', 'password');
            flag = !flag;
        }
    }
    </script>
</body>

</html>