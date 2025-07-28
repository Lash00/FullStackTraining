<?php
include("../navebar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="http://localhost/NTI/api_task/css/bootstrap.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/master.css"> -->

</head>

<body class="main-bg">
    <div class="container">
        <h1 class="text-light text-center ">Class Mate </h1>
        <div class="row">
            <div class="col">
                <div class="card p-4">
                    <div class="table-responsive">
                        <table class="table table-success table-striped gap-1" id="table"
                            style="border-collapse: separate; ">
                            <thead id="tableHead">

                            </thead>
                            <tbody id="tableBody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card myShadow">
                        <form action="" method="post" class="was-validated p-5 bg-light shape " id="update">
                            <h3 class="text-center text-success fw-bold">Update Student </h3>
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
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Update Values </button> -->
                </div>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.js"></script>
    <script>
        let tableHead = document.getElementById("tableHead");
        let tableBody = document.getElementById("tableBody");
        // let user = localStorage.getItem('user');
        // console.log("role in courses is = " + user.role);
        if (Number(user.role) != 0) {
            tableHead.innerHTML = `
                                <tr>
                                    <th class='text-center'>Student Name </th>
                                    <th class='text-center'>Email </th>
                                    <th class='text-center'>Phone </th>
                                    <th class='text-center'>Date of Barth </th>
                                      <th class='text-center bg-success'>Update</th>
                                    <th class='text-center bg-danger'>Delete</th>
                                </tr>

    `;

            fetch("http://localhost/NTI/api_task/LashSystem.php?type=students")
                .then(res => res.json())
                .then(data => {
                    console.log(data)
                    console.log(data[3])
                    console.log(data.success);
                    // console.log(data.data.length);
                    if (data.success) {
                        data.data.forEach(element => {
                            // console.log(element.id);
                            let row = `
                    <tr>
                    <td>${element.name}</td>
                    <td>${element.email}</td>
                    <td>${element.phone}</td>
                    <td>${element.date}</td>
                                        <td><button class='btn btn-success p-2 w-100 update'  value='${element.id}'  data-bs-toggle="modal" data-bs-target="#exampleModal">Update</button></td>
                    
                    <td><button class='btn btn-danger p-2 w-100 delete'  value='${element.id}'>Delete</button></td>
                    </tr>
                    `;
                            tableBody.innerHTML += row;
                        });
                        document.querySelectorAll(".delete").forEach(remove => {
                            remove.addEventListener('click', (e) => {
                                let id = e.target.value;
                                console.log("id num =" + id);
                                fetch(`../server/delete.php`, {
                                    method: 'DELETE',
                                    headers: {
                                        "Content-Type": "application/json"
                                    },
                                    body: JSON.stringify({
                                        id: id,
                                        type: 'students'
                                    })
                                })
                                    .then(res => res.json())
                                    .then(data => {
                                        console.log(data);
                                        if (data.success === true) {
                                            // window.location.reload();
                                            window.alert(data.message + "✅ ✅");
                                            window.location.reload(true);
                                            // window.location.href =
                                            //     "http://localhost/NTI/api_task/user-Featcher/coursesPage.php";

                                        } else
                                            window.alert(data.message + "Done = false ");
                                    })
                            });
                        });
                        // update Logic***************************************************

                        // let update = document.querySelector('.update');
                        let name = document.getElementById('name');
                        let email = document.getElementById('email');
                        let phone = document.getElementById('phone');
                        let date = document.getElementById('date');
                        let id;
                        document.querySelectorAll(".update").forEach(update => {
                            update.addEventListener('click', () => {
                                id = update.value;
                                fetch(
                                    `http://localhost/NTI/api_task/LashSystem.php?type=students&id=${id}`
                                )
                                    .then(res => res.json())
                                    .then(data => {
                                        console.log(data);
                                        name.value = data.data.name;
                                        email.value = data.data.email;
                                        phone.value = data.data.phone;
                                        date.value = data.data.date;
                                    })
                            });
                        });
                        let formupdate = document.getElementById('update');
                        formupdate.addEventListener('submit', (e) => {
                            // e.preventDefault();
                            fetch('../server/put.php', {
                                method: "PUT",
                                headers: {
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    type: 'students',
                                    name: name.value,
                                    email: email.value,
                                    phone: phone.value,
                                    date: date.value,
                                    id: id
                                })
                            }).then(res => res.json())
                                .then(data => {
                                    console.log(data);
                                    if (data.success == true) {
                                        window.alert(data.message);
                                    } else {
                                        let err = document.querySelector('.error')
                                        err.innerHTML = `
                
                <div class='alert alert-danger text-center'>${data.message}</div>
                `;
                                    }
                                })
                        });


                    } else {
                        let row =
                            `<tr><td colspan="6" class='text-center fs-3 text-danger'>${data.data.message}</td></tr>`;
                        tableBody.innerHTML = row;
                    }

                });



        } else {
            tableHead.innerHTML = `
                                <tr>
                                    <th class='text-center'>Student Name </th>
                                    <th class='text-center'>Email </th>
                                    <th class='text-center'>Phone </th>
                                    <th class='text-center'>Date of Barth </th>
                                </tr>

    `;

            fetch("http://localhost/NTI/api_task/LashSystem.php?type=students")
                .then(res => res.json())
                .then(data => {
                    console.log(data)
                    console.log(data[3])
                    console.log(data.success);
                    // console.log(data.data.length);
                    if (data.success) {
                        data.data.forEach(element => {
                            // console.log(element.id);
                            let row = `
                    <tr>
                    <td>${element.name}</td>
                    <td>${element.email}</td>
                    <td>${element.phone}</td>
                    <td>${element.date}</td>
                    </tr>
                    `;
                            tableBody.innerHTML += row;
                        });
                    } else {
                        let row =
                            `<tr><td colspan="4" class='text-center fs-3 text-danger'>${data.data.message}</td></tr>`;
                        tableBody.innerHTML = row;
                    }

                });


        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>