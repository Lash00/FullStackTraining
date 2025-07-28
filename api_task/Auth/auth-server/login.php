<?php
header("Content-Type:application/json");

$data = json_decode(file_get_contents("php://input"), true);
// print_r($data);
if ($data == null) {
    echo json_encode([
        "success" => false,
        "message" => 'Rong way to access data  ',
    ]);
    return;
}

$email = $data["email"];
$pass = $data["password"];

$con = mysqli_connect('localhost', 'root', '', 'courses');
$user = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($user) == 0) {
    echo json_encode([
        "success" => false,
        "message" => 'Not Found User Please Sing IN And Join Us ',
    ]);
    return;
} else {
    $flag = false;
    while ($row = mysqli_fetch_array($user)) {
        if (password_verify($pass, $row['password'])) {
            $flag = true;
            echo json_encode([
                "success" => true,
                "email" => $row["email"],
                "name" => $row["name"],
                "role" => $row["role"],
                "image" => $row["image"],
                "id" => $row["id"],
                "message" => 'Welcome back to our Home ',
            ]);
            return;
        }

    }
    if (!$flag) {
        echo json_encode([
            "success" => false,
            "message" => 'Rong email or password ',
        ]);
    }

}


?>