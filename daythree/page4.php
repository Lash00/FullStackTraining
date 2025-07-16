<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/master.css">
</head>

<body class="bg-dark ">
    <div class="container">
        <!-- Start the Table  -->
        <div class="row mt-4 ">
            <div class="col">
                <table class="table caption-top " cellspacing="10">
                    <caption class="text-light">List of users</caption>
                    <thead>
                        <tr>
                            <th scope="col" class="bg-danger text-light ">#</th>
                            <th scope="col" class="bg-danger text-light">First</th>
                            <th scope="col" class="bg-danger text-light">Last</th>
                            <th scope="col" class="bg-danger text-light">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Lash</td>
                            <td>Master</td>
                            <td>@Leshoo</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>John</td>
                            <td>Doe</td>
                            <td>@social</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End the Table  -->

        <!-- Start the Form  -->
        <div class="row">
            <div class="col">
                <form action="" class="was-validated">
                    <label for="Name" class="form-label mt-2 text-light">User Name </label>
                    <input type="text" name="name" id="validationServer01" class="form-control is-valid w-100" required>


                    <label for="phone" class="form-label mt-2 text-light">User Phone </label>
                    <input type="text" name="phone" id="validationServer02" class="form-control is-valid" required>

                    <label for="city" class="form-label mt-2 text-light">User City </label>
                    <input type="text" name="city" id="validationServer02" class="form-control is-valid" required>
                    <div class="d-flex"> <input type="submit" value="Login"
                            class="btn btn-danger w-50 mt-3 text-center m-1">

                        <button type="button" class="btn d- btn-warning w-50 mt-3 text-center m-1"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">Help</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end  the Form  -->

        <!-- Code for the model  -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Help</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1>Hello with our Team </h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus reiciendis at expedita quasi
                            alias, sint dicta id repellat fugit, corrupti esse sit atque magnam consectetur minus et.
                            Iusto, et voluptatibus.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>
        <script src="./js/bootstrap.bundle.js"></script>

        <!-- End the model code   -->
</body>

</html>