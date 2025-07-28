<?php include("../navebar.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page </title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
</head>

<body class="main-bg  flex-column ">
    <!-- <div class="lashNave"> </div> -->
    <div class="container m-auto ">
        <div class="row">
            <div class="col">
                <div class="card shape w-50 p-4 mt-3 mx-auto myShadow" style=" background-color: #12988d;">
                    <form action="" method="post" class="was-validated p-5 bg-light shape " id="singUpForm"
                        enctype="multipart/form-data">
                        <div class="err"> </div>
                        <!-- input the user name  -->
                        <div class="row">
                            <div class="col">
                                <section class='mt-2'>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user  p-2 "></i>
                                        </span>
                                        <input placeholder="Enter User name" type="text" id="name"
                                            class="form-control  is-valid rounded-2" name="name" required>
                                        <div class="invalid-feedback">
                                            Please enter ur Name
                                        </div>
                                    </div>

                                </section>
                            </div>
                        </div>
                        <!-- input the user email  -->
                        <div class="row">
                            <div class="col">
                                <section class='mt-2'>

                                    <!-- <input type="password" name="pass" id="pass" class="form-control is-invalid" required> -->
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope p-2"></i>
                                        </span>
                                        <input placeholder="Enter user Email" type="email" id="email"
                                            class="form-control is is-valid rounded-2 " name="email" required>
                                        <div class="invalid-feedback">
                                            Please enter ur Email
                                        </div>
                                    </div>

                                </section>
                            </div>
                        </div>
                        <!-- input the user pass -->
                        <div class="row">
                            <div class="col">
                                <section class='mt-2'>
                                    <!-- <input type="password" name="pass" id="pass" class="form-control is-invalid" required> -->
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <button type="button" class="btnEyes" style="border: none;"> <i
                                                    class="fas fa-eye p-1"></i></button>
                                        </span>
                                        <input placeholder="Enter ur pass" type="password" id="pass"
                                            class="form-control is is-valid rounded-2" name="pass" required>
                                        <div class="invalid-feedback">
                                            Please enter ur password
                                        </div>
                                    </div>

                                </section>
                            </div>

                            <div class="col">
                                <section class='mt-2'>
                                    <!-- <input type="password" name="pass" id="pass" class="form-control is-invalid" required> -->
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user-tie"></i>
                                        </span>
                                        <select name="role" id="role" class="is-valid form-control" required>
                                            <option value="" hidden selected disabled>Access Power</option>
                                            <option value="1">Admin</option>
                                            <option value="0">User</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Give The Power
                                        </div>
                                    </div>

                                </section>
                            </div>

                        </div>
                        <!-- input for the user image  -->
                        <section class='mt-2'>

                            <div class="input-group">

                                <input type="file" placeholder="Choose Ur Personal Image" name="image" id="image"
                                    class="form-control is-valid rounded-2" accept="image/*" required>

                                <div class="invalid-feedback">
                                    Choose Ur Personal Image
                                </div>
                            </div>
                            <input type="submit" value="Add User" id="singup"
                                class="btn shape logBtnColor text-light p-2 w-100 mt-2">



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
        // let btn=document.getElementById('login');
        const form = document.getElementById("singUpForm");
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            // let email = document.getElementById('email');
            // let name = document.getElementById('name');
            // let password = document.getElementById('pass');
            // let image = document.getElementById('image');
            // const form = document.getElementById("myForm");
            const formData = new FormData(form);
            fetch("../Auth/auth-server/sinup.php", {
                method: "POST",
                body: formData,
                // headers: { "Content-Type": "application/json" },
                // body: JSON.stringify({
                //     email: email.value,
                //     name: name.value,
                //     password: password.value,
                //     image: image.image,
                // })
            })
                .then(res => res.json())
                .then(data => {
                    console.log("data is " + data.data);
                    if (data.success) {
                        alert(data.message);
                        window.location.reload();
                    } else {
                        let error = document.getElementById('err');
                        error.innerHTML = `
                       <div class='alert alert-danger' type='alert'>${data.message}</div>
                       `;
                    }
                    console.log(data.message);
                })
        });

        // console.log(user.name)
    </script>
</body>

</html>