<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lash</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body>
    <div class="container">
        <div class="card mx-auto w-75 p-5">
            <form action="" method="get" class="was-validated">
                <input type="hidden" value="send">
                <label for="word" class="form-label">Enter Word</label>
                <input type="text" name="word" class="form-control has-is-invalid" required>
                <input type="submit" value="Done" class="btn btn-primary p-2 w-100 mt-3 mx-auto text-center">
            </form>
            <ul class="list-group mt-2">
                <?php
                if (isset($_GET["word"])) {
                    $word = $_GET["word"];
                    echo '<li class="list-group-item d-flex justify-content-between px-5"><font color="red">strlen:  </font>' . strlen($word) . "</li>";
                    echo '<li class="list-group-item d-flex justify-content-between px-5"><font color="red">str_replace:  </font>' . str_replace("bad", "good", $word) . "</li>";
                    echo '<li class="list-group-item d-flex justify-content-between px-5"><font color="red">substr:   </font>' . substr($word, 0, 10) . "</li>";
                    echo '<li class="list-group-item d-flex justify-content-between px-5"><font color="red">strtoupper:  </font>' . strtoupper($word) . "</li>";
                    echo '<li class="list-group-item d-flex justify-content-between px-5"><font color="red">ucfirst:  </font>' . ucfirst($word) . "</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</body>

</html>