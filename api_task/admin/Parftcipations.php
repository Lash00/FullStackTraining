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
        <h1 class="text-light text-center ">Our Users System</h1>
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

        tableHead.innerHTML = `
                                <tr>
                                    <th class='text-center'>Name </th>
                                    <th class='text-center'>Email </th>
                                    <th class='text-center'>Role </th>
                                      <th class='text-center bg-success'>Power</th>
                                    <th class='text-center bg-danger'>Delete</th>
                                </tr>

    `;

        fetch("http://localhost/NTI/api_task/LashSystem.php?type=users")
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
                    <td class='${element.role == 0 ? 'text-success' : 'text-danger'}'>${element.role == 0 ? 'User' : 'Admin'}</td>
                    `;
                        if (element.email == "admin@gmail.com")
                            row +=
                                '<td colspan=2 class=" text-center text-light bg-secondary"><h3>Root Admin</h3></td></tr>';
                        else {
                            if (element.role == 1) {
                                row += `
                          <td><button class='btn logBtnColor text-light p-2 w-100 update' value='${element.id}'>Make User</button></td>
                    
                    <td><button class='btn btn-danger p-2 w-100 delete'  value='${element.id}'>Delete</button></td>
                    </tr>`;
                            } else {
                                row += `
                                        <td><button class='btn btn-primary p-2 w-100 update'  value='${element.id}'  >Make Admin</button></td>
                    
                    <td><button class='btn btn-danger p-2 w-100 delete'  value='${element.id}'>Delete</button></td>
                    </tr>`;
                            }
                        }

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
                                    type: 'users'
                                })
                            }).then(res => res.json())
                                .then(data => {
                                    console.log(data);
                                    if (data.success === true) {
                                        // window.location.reload();
                                        window.alert(data.message + "✅ ✅");
                                        let us = JSON.parse(localStorage.getItem('user'));
                                        if (id == us.id) {
                                            localStorage.clear();
                                            window.location.href =
                                                "http://localhost/NTI/api_task/Auth/login.html";
                                        } else {

                                            window.location.reload(true);
                                        }
                                        // window.location.href =
                                        //     "http://localhost/NTI/api_task/user-Featcher/coursesPage.php";

                                    } else
                                        window.alert(data.message + "Done = false ");
                                })
                        });
                    });

                    document.querySelectorAll(".update").forEach(btn => {
                        btn.addEventListener('click', () => {
                            fetch('../server/put.php', {
                                method: "PUT",
                                headers: {
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    type: "users",
                                    id: btn.value,
                                })

                            }).then(res => res.json())
                                .then(data => {
                                    if (data.success == true) {
                                        console.log(data);
                                        window.alert(data.message);
                                        let us = JSON.parse(localStorage.getItem('user'));
                                        if (data.email == us.email) {
                                            us.role = Number(data.role);
                                            localStorage.setItem("user", JSON.stringify(us));
                                            window.location.href =
                                                "http://localhost/NTI/api_task/home.php";
                                        } else {

                                            window.location.reload();
                                        }

                                    } else {

                                        window.alert(data.message + "Try again later");
                                    }
                                })
                        })
                    })






                } else {
                    let row =
                        `<tr><td colspan="6" class='text-center fs-3 text-danger'>${data.data.message}</td></tr>`;
                    tableBody.innerHTML = row;
                }

            });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>