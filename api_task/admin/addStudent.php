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
                        <h3 class="text-center text-success fw-bold">Add Student </h3>
                        <div class="error"> </div>
                        <section class="mt-3">
                            <!-- <label for="name" class="form-label">Student Name</label> -->
                            <input placeholder="Enter Std Name" type="text" name="name" id="name"
                                class="is-valid form-control" required>
                        </section>
                        <section class="mt-3">
                            <!-- <label for="email" class="form-label">Student Email</label> -->
                            <input placeholder="Enter Student Email" type="email" name="email" id="email"
                                class="is-valid form-control" required>
                        </section>
                        <div class="row mt-3">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section>
                                    <!-- <label for="number" class="form-label">User Number </label> -->
                                    <input placeholder="User Number" type="text" name="phone" id="phone"
                                        class="is-valid form-control" required>
                                </section>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section>
                                    <!-- <label for="date" class="form-label">Date of Bearth</label> -->
                                    <input placeholder="Date of Bearth" type="date" name="date" id="date"
                                        class="is-valid form-control" required>
                                </section>
                            </div>
                        </div>
                        <section class="text-center">
                            <input type="submit" value="Add Student " id="add"
                                class="btn shape logBtnColor text-light p-2 w-100 mt-3">
                        </section>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let form = document.getElementById('addCourse');
        let name = document.getElementById('name');
        let email = document.getElementById('email');
        let phone = document.getElementById('phone');
        let date = document.getElementById('date');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            fetch('../server/post.php', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    type: 'students',
                    name: name.value,
                    email: email.value,
                    phone: phone.value,
                    date: date.value
                })
            }).then(res => res.json())
                .then(data => {
                    console.log(data);
                    if (data.success == true) {
                        window.alert(data.message);
                        name.value = '';
                        email.value = '';
                        phone.value = '';
                        date.value = '';
                    } else {
                        let err = document.querySelector('.error')
                        err.innerHTML = `
                
                <div class='alert alert-danger text-center'>${data.message}</div>
                `;
                    }
                })
        })
    </script>

</body>

</html>