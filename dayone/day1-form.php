<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/master2.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body class="bg-success">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link ">About</a>
                    </li>
                </ul>
                <div class="d-flex logo">
                    Lash
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row d-flex justify-content-center  ">
            <div class="col-lg-6 col-md-12 ">
                <form class="bg-light mt-4 p-5 w-100 rounded-5" action="welcom.php" method="post">
                    <h3 class="text-center mb-4 fst-italic font-monospace">User Information </h3>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fst-italic font-monospace">Email
                            address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name='email'>
                        <div id="emailHelp" class="form-text font-monospace">We'll never share your email with anyone
                            else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="userName" class="form-label fst-italic font-monospace">User Name </label>
                        <input type="text" class="form-control" id="userName" aria-describedby="emailHelp" name="name">
                        <div id="emailHelp" class="form-text font-monospace">welcome with our company </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label fst-italic font-monospace">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label fst-italic font-monospace">Age</label>
                        <input type="number" class="form-control" id="age" name="age">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label fst-italic font-monospace">City</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input " id="exampleCheck1">
                        <label class="form-check-label font-monospace" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fst-italic font-monospace">Submit</button>
                </form>
            </div>

        </div>
    </div>



    <script type="module" src="./js/bootstrap.bundle.js"></script>
    <!-- <script type="module" src="./js/bootstrap.js"></script> -->
</body>

</html>