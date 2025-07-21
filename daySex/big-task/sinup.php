<?php
session_start();
// include "navepar.php";
if ($_SERVER['SERVER_NAME'] != 'localhost') {
    header('location:invaledServerName.php');
}
if (!isset($_SESSION["admins"])) {
    $_SESSION["admins"] = [];
}
if (isset($_POST['btn']) && $_POST['btn'] == "Create") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $gender = $_POST["gender"];
    $job = $_POST["job"];
    $imageName = $_FILES["image"]['name'];
    $imagetemp = $_FILES["image"]['tmp_name'];
    $_SESSION["admins"][] = [
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "pass" => $_POST['pass'],
        "gender" => $_POST['gender'],
        "job" => $_POST['job'],
        "image" => $_FILES['image'],

    ];
    echo "<div class='alert alert-success' type='alert'>Email doese create successfuly Welcom with us,login Now' </div>";

    $UsersFolder = "usersFolder/";
    if (!file_exists($UsersFolder)) {
        mkdir($UsersFolder, 0777, true);
    }
    $open = fopen("$UsersFolder/adminsSingupSheet.log", "a");
    fwrite($open, "new user at " . date("Y-M-D H:i:s") . "
name =>$name
email =>$email
password =>$pass
gender =>$gender
job =>$job
imageOrName =>$imageName
imagetmpName =>$imagetemp

" . "\n");
    fclose($open);
    // print_r($_SESSION['admins']);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
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

<body class="bg-linear " style="min-height: 100vh;">

    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col">
                <div class="card shadow p-5 mt-3 mx-auto">
                    <form action=<?php echo "'" . $_SERVER['PHP_SELF'] . "'"; ?> method="post" class="was-validated "
                        enctype="multipart/form-data">
                        <!-- Start use  name -->
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
                        <!-- end user  name -->
                        <!-- start user  email -->
                        <section class='mt-2'>
                            <label for="Email " class="form-label">User Email</label>
                            <!-- <input type="password" name="pass" id="pass" class="form-control is-invalid" required> -->
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" id="email" class="form-control  is-valid rounded-2 " name="email"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter ur Email
                                </div>
                            </div>

                        </section>
                        <!-- end user  email -->
                        <!-- start user  pass -->
                        <section class='mt-2'>
                            <label for="pass " class="form-label">User Password</label>
                            <!-- <input type="password" name="pass" id="pass" class="form-control is-invalid" required> -->
                            <div class="input-group">
                                <span class="input-group-text">
                                    <button type="button" class="btnEyes" style="border: none;"> <i
                                            class="fas fa-eye"></i></button>
                                </span>
                                <input type="password" id="pass" class="form-control  is-valid rounded-2" name="pass"
                                    required>
                                <div class="invalid-feedback">
                                    Please enter ur password
                                </div>
                            </div>

                        </section>
                        <!-- end user  pass -->

                        <div class="row">
                            <div class="col">
                                <!-- start user  gender -->
                                <section class='mt-2'>
                                    <label for="gender " class="form-label">Gender</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-users"></i>
                                        </span>
                                        <select name="gender" id="gendar" class="is-valid form-control" required>

                                            <option value="" hidden disabled selected> Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="women">Women</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            PleaseSelect ur gender
                                        </div>
                                    </div>

                                </section>
                                <!-- end user  gender -->
                            </div>
                            <div class="col">
                                <!-- start user  job -->
                                <section class='mt-2'>
                                    <label for="job" class="form-label">Posetion</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-briefcase"></i>
                                        </span>
                                        <select name="job" id="job" class="is-valid form-control" required>
                                            <option value="" hidden disabled selected> Select Posetion</option>
                                            <option value="developer">Developer</option>
                                            <option value="designer">Designer</option>
                                            <option value="editor">Editor</option>
                                            <option value="leader">Leader</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            PleaseSelect ur gender
                                        </div>
                                    </div>

                                </section>
                                <!-- end user  job -->
                            </div>
                        </div>
                        <!-- start user image  -->
                        <section class='mt-2'>
                            <label for="image" class="form-label">User Image</label>
                            <input type="file" name="image" id="image" class="form-control is-valid rounded-2" required>
                        </section>
                        <!-- end  user image  -->
                        <section class="mt-4  mx-auto text-center">
                            <input type="hidden" name="hasSend">
                            <input type="submit" value="Create" name="btn"
                                class="btn bg-linear p-2 w-50 text-center border-0 myShadow text-light">
                            <a href="http://localhost/NTI/daysex/big-task/login.php"><button type="button"
                                    class="btn bg-linear p-2 w-50 text-center border-0 myShadow text-light mt-3">Login</button></a>
                        </section>

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

<!-- code for the login input #
  
  if (!(array_key_exists('hasSend', $_POST))) {
      echo '
                                <a href="http://localhost/NTI/dayfive/big-task/login.php" class="text-light">
                                <button type="button" class="btn mt-3 bg-linear p-2 w-50 text-center border-0 myShadow text-light">Login</button></a>';

  }
  ?>
-->