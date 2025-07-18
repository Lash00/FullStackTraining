<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login in </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <style>
        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;

        }

        .card-over {
            height: fit-content;
            overflow: hidden;
        }

        .logo {
            font-family: cursive;
            margin: 0;
            font-size: 4.5rem;
            color: transparent;
            /* background: linear-gradient(45deg, #d92828, red); */
            /* background: linear-gradient(135deg, #4facfe, #00f2fe); */
            /* background: linear-gradient(135deg, #ff512f, #dd2476);
             */
            background: linear-gradient(135deg, #ff512f, #dd2476, #1e90ff);
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        input[type='submit'] {
            background: linear-gradient(135deg, #ff512f, #dd2476, #1e90ff) !important;
            border: none;
        }

        .photo {
            /* background-image: url('../images/flower.jpeg');
            background-size: cover; */
            border-radius: 15px;
            /* background: url('../images/flower.jpeg') no-repeat center center/cover; */
            /* filter: blur(5px); */
            /* opacity: 0.4; */
            /* filter: brightness(0.5); */
            /* background: url('../images/flower.jpeg') filter(); */
            min-height: 20vh;
            background: linear-gradient(135deg, #ff512f, #dd2476, #1e90ff);
            overflow: hidden;
        }

        .overlay-text {
            z-index: 100;
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
<!-- align-items-center -->

<body class="d-flex justify-content-center  font-monospace" style="min-height: 80vh;">


    <div class="container">
        <img src="../images/bg-header-login.png" style="height: 15vh; width: 100%; background-color: white;">
        <div class="card card-over  shadow">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 p-5 text-center">
                    <div>
                        <?php
                        $users = [
                            "1" => [
                                "email" => "lash@gmail.com",
                                "password" => "1234",
                                "name" => "Lashin",
                            ],
                            "2" => [
                                "email" => "mohamed@gmail.com",
                                "password" => "a1234",
                                "name" => "Mohamed",
                            ],
                        ];
                        if (array_key_exists("hasSend", $_POST)) {
                            $flag = false;
                            $name = '';
                            $email = '';
                            foreach ($users as $user) {
                                if ($user["email"] == $_POST['email'] && $user["password"] == $_POST['pass']) {
                                    $flag = true;
                                    $name = $user['name'];
                                    $email = $user['email'];
                                    break;
                                } else
                                    $flag = false;
                            }

                            if ($flag)
                                header("location:admin.php?name=$name&email=$email");
                            else
                                echo "<div class='alert alert-danger   text-center  ' type='alert'>⚠ Rong error or password </div>";

                        }

                        ?>
                        <h4 class="text-secondary card-subtitle anmitions">Welcome To </h3>
                            <h1 class="card-title logo" style="font-family: cursive;"><i class="fas fa-code"></i> Lash
                            </h1>
                            <p class="text-secondary card-subtitle mt-1">Log in to get in the moment updates on the
                                things
                            </p>
                            <p class="text-secondary card-subtitle">that interest you </p>
                    </div>
                    <div>
                        <form action="" class="was-validated" method="POST">
                            <section class="mt-3">
                                <!-- <label for="username" class="form-label">Username</label> -->
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="email" id="email" class="form-control is is-valid"
                                        placeholder="Enter your Email" name="email" required>
                                    <div class="invalid-feedback">
                                        Please enter ur Email
                                    </div>
                                </div>
                            </section>
                            <section class="mt-3">
                                <!-- <label for="username" class="form-label">Username</label> -->
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <button type="button" class="btnEyes" style="border: none;"> <i
                                                class="fas fa-eye"></i></button>
                                    </span>
                                    <input type="password" id="pass" class="form-control is is-valid"
                                        placeholder="Enter your Passord" name="pass" required>
                                    <div class="invalid-feedback">
                                        Please enter ur password
                                    </div>
                                </div>
                            </section>
                            <input type="hidden" name="hasSend">
                            <input type="submit" value="LogIn" class="btn p-2 w-100 mt-2">
                        </form>
                    </div>
                </div>
                <div
                    class="col-lg-6 col-md-6 col-sm-12 p-5 photo d-flex justify-content-center flex-column align-items-center text-light text-center">
                    <h1 class=" text-white text-center anmitions">
                        Welcom In Our Company</h1>
                    <p class="text-dark fw-bold">Hope u will enjoy with us and with our new Services then lets
                        start our
                        journy</p>
                    <div class="d-flex">
                        <?php
                        for ($i = 0; $i < 5; $i++) {
                            echo "<i class='fas fa-star text-warning me-2'></i>";
                        }
                        ?>
                    </div>
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