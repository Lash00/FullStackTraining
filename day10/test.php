<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("");
$con = mysqli_connect('localhost', 'root', '', );
mysqli_select_db($con, 'courses');
$users = mysqli_query($con, 'SELECT * FROM users');
// echo "<pre>";
$data = [];
if (mysqli_num_rows($users)) {
    while ($row = mysqli_fetch_assoc($users)) {
        $data["users"][] = $row;
        // print_r($row);

    }
} else {
    $data["users"] = [
        "message" => "there is no users yet",
    ];
}

$courses = mysqli_query($con, 'SELECT * FROM coursdata');
if (mysqli_num_rows($courses)) {
    while ($row = mysqli_fetch_assoc($courses)) {
        $data["courses"][] = $row;
        // print_r($row);

    }
} else {
    $data["courses"] = [
        "message" => "there is no courses yet",
    ];
}
$students = mysqli_query($con, 'SELECT * FROM students');

if (mysqli_num_rows($students)) {

    while ($row = mysqli_fetch_assoc($students)) {
        $data["students"][] = $row;
        // print_r($row);

    }
} else {
    $data["students"] = [
        "message" => "there is no students yet",
    ];
}

$enrolles = mysqli_query($con, 'SELECT * FROM enrolles');

if (mysqli_num_rows($enrolles)) {


    while ($row = mysqli_fetch_assoc($enrolles)) {
        $data["enrolles"][] = $row;
        // print_r($row);

    }
} else {
    $data["enrolles"] = [
        "message" => "there is no enrolles yet",
    ];
}

// echo "</pre>";
// print_r($data);
$dataType = $_GET['type'] ?? 'all';
switch ($dataType) {
    case 'users':
        echo json_encode($data['users']);
        break;
    case 'courses':
        echo json_encode($data['courses']);
        break;
    case 'students':
        echo json_encode($data['students']);
        break;
    case 'enrolles':
        echo json_encode($data['enrolles']);
        break;
    default:
        echo json_encode($data);

}


?>