<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/master.css">
</head>

<body class="font-monospace bg-secondary">
    <div class="container">

        <div class="row mt-4 ">
            <div class="col">

                <div class="card  p-5 w-75 mx-auto">
                    <form action="thank.php" method="post" class="was-validated">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold text-danger ">Name</label>
                            <input type="text" class="form-control  is-valid shadow" id="name"
                                aria-describedby="emailHelp" name="name" required>
                            <div id="emailHelp" class="form-text fw-bold ">We'll never share your email
                                with
                                anyone else.</div>
                            <div class="invalid-feedback">
                                Please Enter Ur Name
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold text-danger">Email address</label>
                            <input type="email" class="form-control is-valid shadow" id="email"
                                aria-describedby="emailHelp" name="email" required>
                            <div id="emailHelp" class="form-text fw-bold ">We'll never share your email
                                with
                                anyone else.</div>
                            <div class="invalid-feedback">
                                Please Enter Ur Email
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label fw-bold text-danger">Password</label>
                            <input type="password" class="form-control is-valid shadow" id="pass" name="pass" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label fw-bold text-danger">Phone</label>
                            <input type="Phone" class="form-control is-valid shadow" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                style="border: 1px solid black !important;">
                            <label class="form-check-label text-danger fw-bold" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>