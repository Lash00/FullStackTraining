<?php
header("Content-Type:application/json");

$data = json_decode(file_get_contents("php://input"), true);
$type = $data["type"];
$con = mysqli_connect('localhost', 'root', '', 'courses');
if ($type == "coursdata") {
    $title = $data["title"];
    $desc = $data["desc"];
    $hours = $data["hours"];
    $price = $data["price"];
    $id = $data["id"];
    $succ = mysqli_query($con, "UPDATE coursdata SET title='$title',description='$desc',hours=$hours,price=$price WHERE id=$id");
    if ($succ) {
        echo json_encode([
            'message' => "Update Done Successfuly ✅ ✅",
            'success' => true,
        ]);
    } else {
        echo json_encode([
            'message' => "cant Upate this coursè ",
            'success' => false,
        ]);
    }

} else if ($type == "students") {
    $name = $data["name"];
    $email = $data["email"];
    $phone = $data["phone"];
    $date = $data["date"];
    $id = $data["id"];
    $succ = mysqli_query($con, "UPDATE students SET name='$name',email='$email',phone=$phone,date='$date' WHERE id=$id");
    if ($succ) {
        echo json_encode([
            'message' => "Update Done Successfuly ✅ ✅",
            'success' => true,
        ]);
    } else {
        echo json_encode([
            'message' => "cant Upate this coursè ",
            'success' => false,
        ]);
    }

} else if ($type == "users") {
    $id = $data["id"];
    $user = mysqli_query($con, "SELECT role,email FROM users WHERE id=$id ");
    $user = mysqli_fetch_assoc($user);
    $newRole = $user["role"] == 1 ? 0 : 1;
    $succ = mysqli_query($con, "UPDATE users SET role=$newRole WHERE id=$id");
    if ($succ) {
        echo json_encode([
            "role" => $newRole,
            "email" => $user["email"],
            'message' => "Update Done Successfuly ✅ ✅",
            'success' => true,
        ]);
    } else {
        echo json_encode([
            'message' => "cant Upate this coursè ",
            'success' => false,
        ]);
    }

}



?>