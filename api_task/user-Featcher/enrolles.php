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
        <h1 class="text-light text-center ">Current Class Courses</h1>
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
                                    <th class='text-center'>Course Title</th>
                                    <th class='text-center'>Course Description</th>
                                    <th class='text-center'>Degree</th>
                                      
                                    <th class='text-center bg-danger'>Delete</th>
                                </tr>

    `;

            fetch("http://localhost/NTI/api_task/LashSystem.php?type=enrollesData")
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
                    <td>${element.title}</td>
                    <td>${element.description}</td>
                    <td>${element.degree}</td>
                    
                    <td><button class='btn btn-danger px-4 w-100 delete'  value='${element.id}'>Delete</button></td>
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
                                        type: 'enrolles'
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

                    } else {
                        let row =
                            `<tr><td colspan="7" class='text-center fs-3 text-danger'>${data.data.message}</td></tr>`;
                        tableBody.innerHTML = row;
                    }

                });

        } else {
            tableHead.innerHTML = `
                                <tr>
                                    <th class='text-center'>Student Name </th>
                                    <th class='text-center'>Email </th>
                                    <th class='text-center'>Phone </th>
                                    <th class='text-center'>Course Title</th>
                                    <th class='text-center'>Course Description</th>
                                    <th class='text-center'>Degree</th>
                                </tr>

    `;

            fetch("http://localhost/NTI/api_task/LashSystem.php?type=enrollesData")
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
                    <td>${element.title}</td>
                    <td>${element.description}</td>
                    <td>${element.degree}</td>
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