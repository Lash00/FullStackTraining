<?php
if (array_key_exists("goToProducts", $_GET)) {

    $name = $_GET["name"];
    $email = $_GET["email"];
    header("location:products.php?name=$name&email=$email");


}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/all.min.css">

    <style>
        .bg-linear {
            background: linear-gradient(135deg, #ff512f, #dd2476, #1e90ff);

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
    </style>
</head>

<body class="d-flex bg-linear justify-content-center align-items-center text-break " style="min-height: 100vh;">
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
                        move_uploaded_file($imgTempName, "./product-images/$imgName");
                        echo "
 <div class='col-lg-4 col-md-4 col-sm-12 mx-auto text-center w-sm-50 mt-2 shadow '>
                <div class='card p-3'>
                    <img src='./product-images/$imgName' alt='lass' class='img-fluid w-100 rounded myShadow mx-auto d-block '
                        style='max-height: 300px; object-fit: contain;'>
                    <ul class='list-group mt-4 '>
                        <li class='list-group-item d-flex justify-content-between shadow'>
                            <font color='red'>Name :</font> $name
                        </li>
                        <li class='list-group-item d-flex justify-content-between mt-2 shadow'>
                            <font color='red'>Email :</font> $email
                        </li>
                    </ul>
                    <h5 class='text-secondary mt-4'>Welcom in our World </h5>
                    <form action='' method='get'>
                    <input type='hidden' name='name' value='$usrName'>
                    <input type='hidden' name='email' value='$userEmail'>
                        <input type='hidden' name='goToProducts'>
                        <input type='submit'  value=' Produsts' name='btnProducts'
                            class='btn bg-linear p-2 w-50 text-center border-0 myShadow text-light'>
                    </form>
               
                </div>
            </div>

";
                    } else if ($type != 'image' && $size <= '186619') {
                        $errors[] = "the File : ( $imgName ) is not an image ";
                    } else
                        $errors[] = "the File : ( $imgName ) Size is To big ";
                }
            }
            ?>
            <div class="col-lg-8 col-md-8 col-sm-12 mx-auto  mt-2  shadow">
                <div class="card  p-5">
                    <?php
                    if ((array_key_exists('hasSend', $_POST))) {

                        if (count($errors))
                            echo "<div class='alert alert-warning ' type='alert'>" . $errors[0] . "</div>";
                        else
                            echo "<div class='alert alert-success ' type='alert'>Acount has created Successfuly
                       </div>";
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
                        <section class='mt-2'>
                            <label for="pass " class="form-label">User Email</label>
                            <!-- <input type="password" name="pass" id="pass" class="form-control is-invalid" required> -->
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" id="email" class="form-control is is-valid rounded-2 " name="email"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter ur Email
                                </div>
                            </div>

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
                            <?php
                            if (!(array_key_exists('hasSend', $_POST))) {
                                echo '
                                <a href="http://localhost/NTI/dayfive/big-task/login.php" class="text-light">
                                <button type="button" class="btn mt-3 bg-linear p-2 w-50 text-center border-0 myShadow text-light">Login</button></a>';

                            }
                            ?>
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