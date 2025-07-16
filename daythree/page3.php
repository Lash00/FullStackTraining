<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/master.css">
</head>

<body>
    <div class="container">
        <div class="row mt-4 ">
            <div class="col card p-5">
                <img src="./images/flower.jpeg" alt="lash" style="height: 50%;">
                <h1 class="card-title">Hello With Lash</h1>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda id officia,
                    saepe nobis repellat possimus blanditiis, deserunt incidunt vel fuga sunt voluptate, voluptas
                    laborum sed ipsam ad adipisci tempora iure?</p>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Join
                    Now
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Join Us</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Sing up to join us </h3>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"><a href="http://localhost/NTI/daythree/page2.php"
                            style="text-decoration: none;" class="text-light">Join
                            Now</a></button>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>