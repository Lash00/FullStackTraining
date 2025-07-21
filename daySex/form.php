


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing IN </title>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body class="d-flex justify-content-center align-items-center bg-dark " style="min-height: 100vh;">
    <div class="container ">
        <div class="row">
            <div class="col">
                <div class="card shadow mx-auto w-50  ">
                    <div class=" bg-danger p-3" style="margin: -1px !important; border-radius: 5px;">
                        <h1 class="card-title text-center text-light text-praimary">
                            Course Registration
                        </h1>
                    </div>
                    <form action="welcom.php" enctype="multipart/form-data" class="was-validated p-3" method="post">
                        <section class="name mt-2">
                            <label class="form-label fw-bold " for="name">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control is-valid " required>
                        </section>
                        </section>
                        <section class="email mt-2">
                            <label class="form-label fw-bold " for="email">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control is-valid" required>
                        </section>
                        <section class="age mt-2">
                            <label class="form-label fw-bold " for="age">age</label>
                            <input type="number" min="0" max="99" name="age" id="age" class="form-control is-valid"
                                required>
                        </section>
                        <section class="city mt-2">
                            <label class="form-label fw-bold " for="city">City</label>
                            <input type="text" name="city" id="city" class="form-control is-valid" required>
                        </section>
                        <section class="image mt-2">
                            <label class="form-label fw-bold " for="image">UR image</label>
                            <input type="file" accept="image/*" name="image" id="image" class="form-control is-valid"
                                required>
                        </section>
                        <section>
                            <input type="hidden" name="submited">
                            <input type="submit" value="Submit" class="btn btn-primary w-100 mx-auto p-2 mt-3">
                        </section>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="error">
        <div class="card bg-danger text-light ">
            <?php
            $errors = array();
            if (array_key_exists("submited", $_POST)) {
                if (!isset($_POST['name'])) {
                    $errors[] = 'please enter ur name ';
                }

                if (!isset($_POST['email'])) {
                    $errors[] = 'please enter ur email ';
                }

                if (!isset($_POST['age'])) {
                    $errors[] = 'please enter ur age ';
                }

                if (!isset($_POST['city'])) {
                    $errors[] = 'please enter ur city ';
                }

            }
            if (count($errors)) {
                echo "<ul>";
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul>";
            }
            ?>

        </div>
    </div>
</body>
<!-- accept attr 
accept="image/*"  


-->

</html>