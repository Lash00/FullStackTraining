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
        <h1 class="text-light text-center ">Student Avaliable Tasks </h1>
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
                            <h3 class="text-center text-success fw-bold">Update Course Data </h3>
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
                                        <input placeholder="add course price " type="number" step="0.5" min="0"
                                            name="price" id="price" class="is-valid form-control" required>
                                    </section>
                                </div>
                            </div>
                            <section class="text-center mt-3">
                                <input type="hidden" name="added" value="1">
                                <input type="submit" value="Update Course " id="add"
                                    class="btn shape logBtnColor text-light p-2 w-100 mt-2">
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
    <!-- <script src="../js/main.js"></script> -->
    <script>
        let tableHead = document.getElementById("tableHead");
        let tableBody = document.getElementById("tableBody");
        // let user = localStorage.getItem('user');
        // console.log("role in courses is = " + user.role);
        if (Number(user.role) != 0) {
            // remove("coursedata",'remove');
            tableHead.innerHTML = `
                                <tr>
                                    <th class='text-center'>Course Name </th>
                                    <th class='text-center'>Course Description </th>
                                    <th class='text-center'>Hourse </th>
                                    <th class='text-center'>Price </th>
                                    <th class='text-center bg-success'>Update</th>
                                    <th class='text-center bg-danger'>Delete</th>
                                </tr>

    `;

            fetch("http://localhost/NTI/api_task/LashSystem.php?type=coursdata")
                .then(res => res.json())
                .then(data => {
                    console.log(data)
                    // console.log(data[3])
                    console.log(data.success);
                    // console.log(data.data.length);
                    if (data.success) {
                        data.data.forEach(element => {
                            // console.log(element.id);
                            let row = `
                    <tr>
                    <td>${element.title}</td>
                    <td>${element.description}</td>
                    <td>${element.hours}</td>
                    <td>${element.price}</td>
                    <td><button class='btn btn-success p-2 w-100 update'  value='${element.id}'   data-bs-toggle="modal" data-bs-target="#exampleModal">Update</button></td>
                    
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
                                        type: 'coursdata'
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
                        let title = document.getElementById('title');
                        let desc = document.getElementById('desc');
                        let hours = document.getElementById('hours');
                        let price = document.getElementById('price');
                        let id;
                        document.querySelectorAll(".update").forEach(update => {
                            update.addEventListener('click', () => {
                                id = update.value;
                                fetch(
                                    `http://localhost/NTI/api_task/LashSystem.php?type=coursdata&id=${update.value}`
                                )
                                    .then(res => res.json())
                                    .then(data => {
                                        console.log(data);
                                        title.value = data.data.title;
                                        desc.value = data.data.description;
                                        hours.value = data.data.hours;
                                        price.value = data.data.price;
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
                                    type: 'coursdata',
                                    title: title.value,
                                    desc: desc.value,
                                    hours: hours.value,
                                    price: price.value,
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

            // console.log("btn is " + remove);


        } else {
            tableHead.innerHTML = `
                                <tr>
                                    <th class='text-center'>Course Name </th>
                                    <th class='text-center'>Course Description </th>
                                    <th class='text-center'>Hourse </th>
                                    <th class='text-center'>Price </th>
                                </tr>

    `;

            fetch("http://localhost/NTI/api_task/LashSystem.php?type=coursdata")
                .then(res => res.json())
                .then(data => {
                    console.log(data)
                    // console.log(data[3])
                    console.log(data.success);
                    // console.log(data.data.length);
                    if (data.success) {
                        data.data.forEach(element => {
                            // console.log(element.id);
                            let row = `
                    <tr>
                    <td>${element.title}</td>
                    <td>${element.description}</td>
                    <td>${element.hours}</td>
                    <td>${element.price}</td>
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