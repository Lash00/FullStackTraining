<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lash System</title>
    <link rel="stylesheet" href="/NTI/api_task/css/bootstrap.css">
    <link rel="stylesheet" href="/NTI/api_task/css/all.min.css">
    <link rel="stylesheet" href="/NTI/api_task/css/normalize.css">
    <link rel="stylesheet" href="/NTI/api_task/css/master.css">

    <style>
        .navbar-custom {
            /* background: linear-gradient(to right, #1f1c2c, #928dab); */
            /* background: linear-gradient(to right, #4830b1, #209b95); */
            background-color: white;
        }

        * {
            font-family: cursive;
        }


        th {
            background-color: #002a57 !important;
            color: white !important;

            /* background: linear-gradient(135deg, #6A11CB, #2575FC, #00DBDE) !important; */

        }

        table {
            table-layout: auto;
            width: 100%;

        }

        .navbar-brand {
            font-weight: bold;
            /* color: white !important; */
            font-size: 1.6rem;
            display: flex;
            align-items: center;
        }

        .navbar-brand i {
            margin-right: 8px;
        }

        .nav-link {
            /* color: white !important; */
            position: relative;
            font-weight: 500;
            margin-left: 15px;
            transition: all 1s ease-in-out;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            height: 3px;
            width: 0;
            left: 0;
            bottom: 0;
            background-color: red;
            transition: width 0.3s ease-in-out;
        }

        .nav-link:hover::before {
            width: 100%;
        }

        .btn-login {
            background-color: #ffc107;
            border: none;
            color: black;
            font-weight: bold;
        }

        .btn-login:hover {
            background-color: #e0a800;
        }

        .bg-linear {
            background: linear-gradient(135deg, #6A11CB, #2575FC, #00DBDE) !important;

        }

        .myShadow {
            box-shadow: 0px 0px 50px #4d4d4d;
            border: none
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom  myShadow">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="#">
                <i class="fas fa-bolt text-warning"></i> <span class="text-danger fw-bold fs-2">L</span>ash
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarNav"
                style="justify-content: end !important;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="http://localhost/NTI/api_task/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="http://localhost/NTI/api_task/user-Featcher/coursesPage.php">Courses</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/NTI/api_task/user-Featcher/students.php">Students</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/NTI/api_task/user-Featcher/enrolles.php">Enrolles</a>
                    </li>



            </div>
        </div>
    </nav>

    <script src="/NTI/api_task/js/bootstrap.bundle.js"></script>
    <script>
        let token = JSON.parse(localStorage.getItem('token'));

        let ur = JSON.parse(localStorage.getItem('user'));
        console.log("the current user Token " + token)
        // console.log("the current user name " + ur.name)
        // console.log("the current user role  " + ur.role)
        if (token == null) {
            window.location.href = "http://localhost/NTI/api_task/Auth/pleaseLogin.html";
        }
        let user = JSON.parse(localStorage.getItem('user'));
        let role = user.role;
        let nav = document.querySelector('.navbar-nav');

        if (Number(role) != 0) {
            nav.innerHTML += ` 
<li class="nav-item">
                        <a class="nav-link" href="http://localhost/NTI/api_task/admin/addCourse.php">Add Courses</a>
                    </li>


<li class="nav-item">
                        <a class="nav-link" href="http://localhost/NTI/api_task/admin/addStudent.php">Add Students</a>
                    </li>


<li class="nav-item">
                        <a class="nav-link" href="http://localhost/NTI/api_task/admin/addEnrolles.php">Add Enrollers</a>
                    </li>
                    
                    
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">Actevites</a>
                        <ul class="dropdown-menu p-2">
                            <li><a class="dropdown-item" href="http://localhost/NTI/api_task/seting.php">Seting</a></li>
                            <li><a class="dropdown-item" href="http://localhost/NTI/api_task/admin/Parftcipations.php">Parftcipations</a></li>
                            <li><a class="dropdown-item" href="http://localhost/NTI/api_task/admin/singUpAdmin.php">Add New User</a></li>
                            <!-- <li>
                            
                            </li> -->
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="overflow-hidden">
                                <form action="" method="get"  id='signOut'>
                                    <input type="submit" name="btn" value="Logout" id="del"
                                        class="btn btn-warning w-100 px-4 text-center ">
                                </form>
                            </li>
                        </ul>
                    </li>
                    
                    `;
        } else {
            nav.innerHTML += ` 
            
              <li class="nav-item">
                        <a class="nav-link" href="http://localhost/NTI/api_task/seting.php">Seting</a>
                    </li>
            <li class="overflow-hidden">
                                <form action="" method="get" id='signOut'>
                                    <input type="submit" name="btn" value="Logout" id="del"
                                        class="btn btn-warning w-100 px-4 ms-3 me-3 text-center rounded-5">
                                </form>
                            </li>`;
        }
        // console.log(role);
        // console.log(Number(role) === 0);

        let signOut = document.getElementById('signOut');
        signOut.addEventListener("submit", (e) => {
            e.preventDefault();
            localStorage.clear();
            window.location.href = "http://localhost/NTI/api_task/Auth/login.html";
        });
        // let u = localStorage.getItem('user');
        // console.log("the out is done user now is " + u.role)
    </script>
</body>

</html>