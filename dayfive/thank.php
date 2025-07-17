<?php
if (isset($_POST['name'])) {
    // echo $_POST['name'];
    echo "
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
        <link rel='stylesheet' href='./css/bootstrap.css'>
    <link rel='stylesheet' href='./css/master.css'>
</head>

<body class='font-monospace' >
    <div class='container  d-flex justify-content-center align-items-center'>
        <div class='row'>
            <div class='col'>
                <div class='card text-center w-100 p-5 mt-5'>
<h1 class='text-success text-center card-title'>Welcome With Lash</h1>
<h5 class='card-text'>Name:<span class='ms-3'>" . $_POST['name'] . "</span> </h5>
<h5 class='card-text'>Email: <span class='ms-3'>" . $_POST['email'] . "</span> </h5>
<h5 class='card-text'>Phone:<span  class='ms-3'> " . $_POST['phone'] . "</span> </h5>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


";


}

?>