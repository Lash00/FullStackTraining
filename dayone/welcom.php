<?php


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['age']) && isset($_POST['city'])) {
    echo "
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='./css/master2.css'>
    <link rel='stylesheet' href='./css/bootstrap.css'>
<style>
.card p span{
    margin-right: 2%;
    text-transform: capitalize;
    color: green;
    font-size: larger;
    font-weight: bold;
}
</style>
</head>

<body class='bg-success'>
    <nav class='navbar navbar-expand-lg bg-body-tertiary'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='#'>Navbar</a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
                data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false'
                aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                    <li class='nav-item'>
                        <a class='nav-link active' aria-current='page' href='#'>Home</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='#'>Link</a>
                    </li>

                    <li class='nav-item'>
                        <a class='nav-link '>About</a>
                    </li>
                </ul>
                <div class='d-flex logo'>
                    Lash
                </div>
            </div>
        </div>
    </nav>
    <div class='container'>
        <div class='row d-flex justify-content-center  '>
            <div class='col-lg-6 col-md-12 '>
              <div class='card  mt-4 p-5 w-80 rounded-5 '>
              <p class='font-monospace fst-italic text-bg-danger text-center p-2'>User Data</p>
                <p class='mb-2 mt-2 font-monospace fst-italic'><span>userName  :</span>" . $_POST["name"] . "</p> 
                <p class='mb-2 font-monospace fst-italic'><span>userEmail  :</span>" . $_POST["email"] . "</p> 
                <p class='mb-2 font-monospace fst-italic'><span>userage  :</span>" . $_POST["age"] . "</p> 
                <p class='mb-2 font-monospace fst-italic'><span>userpassword  :</span>" . $_POST["city"] . "</p> 
                <p class='mb-2 font-monospace fst-italic'><span>usercity  :</span>" . $_POST["pass"] . "</p> 
              </div>
            </div>

        </div>
    </div>



    <script type='module' src='./js/bootstrap.bundle.js'></script>
    <!-- <script type='module' src='./js/bootstrap.js'></script> -->
</body>

</html>

";
}
