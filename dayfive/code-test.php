<?php
//the old fail code 
$len = count($_FILES['images']['name']);

$files = [];

for ($i = 0; $i < $len; $i++) {

    $files[] = [
        'name' => $_FILES['images']['name'][$i],
        'type' => $_FILES['images']['type'][$i],
        'tem-name' => $_FILES['images']['tem-name'][$i],
        'size' => $_FILES['images']['size'][$i],
    ];
}

$errors = array_filter($files, function ($file) {
    $type = (explode("/", $file['type']))[0];
    $size = $file['size'];
    if ($type != 'image' && $size <= '186619') {
        return "" . $file['name'] . "Not an image";
    } else if ($type == 'image' && $size > '186619') {
        return "" . $file['size'] . "is to big";
    }

});

if (count($errors)) {
    echo "<div class='alert alert-warning '  type='alert'>
    Pleace change this files To fixe this errors :
    <ul class='list group'>";
    foreach ($errors as $error) {
        echo "<li class='list-group-items'>" . $error . "</li>";
    }

    echo "</ul> </div>";
} else {
    foreach ($files as $file) {
        $name = $file['name'];
        move_uploaded_file($file['tem-name'], "images/$name");
        echo "<img src='images/" . $name . "'alt='error' class='img-fluid rounded shadow mx-auto d-block mt-3'
                        style='max-height: 300px; object-fit: contain;'> <br>";
    }
}



?>


<?php
// the success code 


if (array_key_exists("hasSended", $_POST)) {
    $len = count($_FILES['images']['name']);

    $files = [];

    for ($i = 0; $i < $len; $i++) {

        $files[] = [
            'name' => $_FILES['images']['name'][$i],
            'type' => $_FILES['images']['type'][$i],
            'tem-name' => $_FILES['images']['tmp_name'][$i],
            'size' => $_FILES['images']['size'][$i],
        ];
    }

    $errors = [];
    foreach ($files as $file) {
        $type = (explode("/", $file['type']))[0];
        $size = $file['size'];
        if ($type != 'image' && $size <= '186619') {
            $errors[] = "" . $file['name'] . "  Not an image";
        } else if ($type == 'image' && $size > '186619') {
            $errors[] = "" . $file['name'] . "  Size is more than 18k ";
        }

    }
    ;

    if (count($errors)) {
        echo "<div class='alert alert-warning '  type='alert'>
    Pleace change this files To fixe this errors :
    <ul class='list group'>";
        foreach ($errors as $error) {
            echo "<li class='list-group-items'>" . $error . "</li>";
        }

        echo "</ul> </div>";
    } else {
        foreach ($files as $file) {
            $name = $file['name'];
            move_uploaded_file($file['tem-name'], "images/$name");
            echo "<img src='images/" . $name . "'alt='error' class='img-fluid rounded shadow mx-auto d-block mt-3'
                        style='max-height: 300px; object-fit: contain;'> <br>";
        }
    }



}





?>