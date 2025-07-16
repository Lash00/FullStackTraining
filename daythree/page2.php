<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/master.css">
</head>

<body style="min-height: 100vh;" class="bg-dark">
    <div class="container mt-5">
        <div class="row d-flex justify-content-center  ">
            <div class="col card p-5 bg-success">
                <form action="" class="was-validated">
                    <label for="Name" class="form-label mt-2 text-light">User Name </label>
                    <input type="text" name="name" id="validationServer01" class="form-control is-valid w-100" required>


                    <label for="phone" class="form-label mt-2 text-light">User Phone </label>
                    <input type="text" name="phone" id="validationServer02" class="form-control is-valid" required>

                    <label for="city" class="form-label mt-2 text-light">User City </label>
                    <input type="text" name="city" id="validationServer02" class="form-control is-valid" required>
                    <input type="submit" value="Login" class="btn btn-danger w-100 mt-3 text-center">
                </form>
            </div>
        </div>
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    </div>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>