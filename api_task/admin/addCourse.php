<?php
include("../navebar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
</head>

<body class="main-bg  flex-column m-auto ">
    <div class="container  center " style="min-height: 90vh;">
        <div class="row">
            <div class="col ">
                <div class="card shape w-75 p-5 mx-auto myShadow" style=" background-color: #12988d;">
                    <form action="" method="post" class="was-validated p-5 bg-light shape " id="addCourse">
                        <h3 class="text-center text-success fw-bold">Add Course </h3>
                        <div class="error"> </div>
                        <section class="mt-4">
                            <!-- <label for="title" class="form-label">Course Title</label> -->
                            <input placeholder="Add course Title" type="text" name="title" id="title"
                                class="is-valid form-control" required>
                        </section>
                        <section class="mt-4">
                            <!-- <label for="desc" class="form-label">Course Description</label> -->
                            <textarea placeholder="Add course Descreption" name="desc" id="desc"
                                class="is-valid form-control" required></textarea>
                        </section>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section class="mt-4">
                                    <!-- <label for="hours" class="form-label">Course Hours</label> -->
                                    <input placeholder="add the Course hours" type="number" step="0.5" min="0"
                                        name="hours" id="hours" class="is-valid form-control" required>
                                </section>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section class="mt-4">
                                    <!-- <label for="price" class="form-label">Course Price</label> -->
                                    <input placeholder="add course price " type="number" step="0.5" min="0" name="price"
                                        id="price" class="is-valid form-control" required>
                                </section>
                            </div>
                        </div>
                        <section class="text-center mt-3">
                            <input type="hidden" name="added" value="1">
                            <input type="submit" value="Add Course " id="add"
                                class="btn shape logBtnColor text-light p-2 w-100 mt-2">
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let form = document.getElementById('addCourse');
        let title = document.getElementById('title');
        let desc = document.getElementById('desc');
        let hours = document.getElementById('hours');
        let price = document.getElementById('price');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            fetch('../server/post.php', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    type: 'coursdata',
                    title: title.value,
                    desc: desc.value,
                    hours: hours.value,
                    price: price.value
                })
            }).then(res => res.json())
                .then(data => {
                    console.log(data);
                    if (data.success == true) {
                        window.alert(data.message);
                        title.value = '';
                        desc.value = '';
                        hours.value = '';
                        price.value = '';
                    } else {
                        let err = document.querySelector('.error')
                        err.innerHTML = `
                
                <div class='alert alert-danger text-center'>${data.message}</div>
                `;
                    }
                })
        })
    </script>
    <!-- <script>
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
            fetch("./auth-server/sinup.php", {
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
                        localStorage.setItem("user", JSON.stringify({
                            name: data.data.name,
                            email: data.data.email,
                            image: data.data.image,
                            role: data.data.role,
                        }));
                        localStorage.setItem("token", Math.random());
                        window.location.href = '../home.php';
                    } else {
                        let errorDiv = document.querySelector('.error');
                        let error = `<div class='alert alert-danger ' type='alert'>${data.message}</div>`;
                        errorDiv.innerHTML = '';
                        errorDiv.innerHTML = error;
                    }
                    console.error(data.message);
                })
        });

        // console.log(user.name)
    </script> -->
</body>

</html>