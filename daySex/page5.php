<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body>

    <div class="container mt-3">
        <div class="card p-5">

            <form action="uploadImg.php" method="post" enctype="multipart/form-data" class="was-validated">
                <label class="form-label" for="image">Profile Photo</label>
                <input type="file" name="image" id="image" class="is-invalid form-control" required>
                <input type="submit" value="UpLoad" class="btn btn-danger w-100 mt-3">

            </form>
        </div>
    </div>
</body>

</html>