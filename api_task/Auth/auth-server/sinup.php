<?php

header("Content-Type:application/json");
header("Access-Control-Allow-Origin: *");

// $data = json_decode(file_get_contents("php://input"), true);
// if ($data == null) {
//     echo json_encode([
//         "success" => false,
//         "message" => 'Error Hase Acurce try again later',
//     ]);
//     return;
// }
$con = mysqli_connect('localhost', 'root', '', 'courses');
// $name = $data['name'];
// $email = $data['email'];
// $password = $data['password'];
// $image = $data['image'];

// $imageName = uniqid('user_', true) . '.jpg';
// $folder = 'api_task/images/userImages/';
// if (!file_exists($folder)) {
//     mkdir($folder, 0777, true);
// }
// file_put_contents($folder . $imageName, base64_decode($image));

// $imgname = $_FILES['image']['name'];


$name = $_POST['name'];
$email = $_POST['email'];
$role = $_POST['role'] ?? 0;
$password = $_POST['pass'];
$imageName = basename($_FILES['image']['name']);
$folder = 'api_task/images/userImages';
if (!file_exists($folder)) {
    mkdir($folder, 0777, true);
}
$imgTempName = $_FILES['image']['tmp_name'];
$path = pathinfo($imageName, PATHINFO_EXTENSION);
$target = uniqid(date('Y-M-Y_H-i-s'), true) . '.' . $path;
move_uploaded_file($imgTempName, $folder . '/' . $target);
$hashImage = base64_encode($target);

$hashPass = password_hash($password, PASSWORD_DEFAULT);
/****************************************************************************if user exists */
$allUsersEmail = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
if (mysqli_num_rows($allUsersEmail)) {
    echo json_encode([
        "success" => false,
        "message" => 'This Email Is already Exsits try another one Or Login ',
    ]);
    return;
} else {
    mysqli_query($con, "INSERT INTO users VALUES ('','$name','$email','$hashPass',$role,'$hashImage')");
    $currentUser = mysqli_query($con, "SELECT role,id FROM users WHERE email='$email'");
    $role = mysqli_fetch_assoc($currentUser);
    echo json_encode([
        'data' => [
            'email' => $email,
            'name' => $name,
            'image' => $target,
            'role' => $role['role'],
            "id" => $role["id"],
        ],
        "success" => true,
        "message" => "User add Successuly ✅ ✅  ",
    ]);
}


?>