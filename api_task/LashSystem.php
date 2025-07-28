<?php

use function PHPSTORM_META\type;

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
// header("");
$con = mysqli_connect('localhost', 'root', '', );
mysqli_select_db($con, 'courses');
$users = mysqli_query($con, 'SELECT * FROM users');
// echo "<pre>";
$data = [];
$suc_user;
$suc_cour;
$suc_stu;
$suc_enroll;
$suc_enrollData;
if (mysqli_num_rows($users)) {
    while ($row = mysqli_fetch_assoc($users)) {
        $data["users"][] = $row;
        // print_r($row);

    }
    $suc_user = true;
} else {
    $data["users"] = [
        "message" => "there is no users yet",

    ];
    $suc_user = false;
}

$coursdata = mysqli_query($con, 'SELECT * FROM coursdata');
if (mysqli_num_rows($coursdata)) {
    while ($row = mysqli_fetch_assoc($coursdata)) {
        $data["coursdata"][] = $row;
        // print_r($row);

    }
    $suc_cour = true;

} else {
    $data["coursdata"] = [
        "message" => "there is no coursdata yet",

    ];
    $suc_cour = false;
}
$students = mysqli_query($con, 'SELECT * FROM students');

if (mysqli_num_rows($students)) {

    while ($row = mysqli_fetch_assoc($students)) {
        $data["students"][] = $row;
        // print_r($row);

    }
    $suc_stu = true;

} else {
    $data["students"] = [
        "message" => "there is no students yet",

    ];
    $suc_stu = false;
}

$enrolles = mysqli_query($con, 'SELECT * FROM enrolles');

if (mysqli_num_rows($enrolles)) {


    while ($row = mysqli_fetch_assoc($enrolles)) {
        $data['enrolles'][] = $row;
        // print_r($row);

    }
    $suc_enroll = true;

} else {
    $data["enrolles"] = [
        "message" => "there is no enrolles yet",
    ];
    $suc_enroll = false;

}

$enRollData = mysqli_query($con, "
    SELECT
        students.name,
        enrolles.id,
        students.phone,
        students.email,
        coursdata.title,
        coursdata.description,
        enrolles.degree
    FROM enrolles
    JOIN students ON students.id = enrolles.student_id
    JOIN coursdata ON coursdata.id = enrolles.course_id
");


if (mysqli_num_rows($enRollData)) {


    while ($row = mysqli_fetch_assoc($enRollData)) {
        $data['enrollesData'][] = $row;
        // print_r($row);

    }
    $suc_enrollData = true;

} else {
    $data["enrollesData"] = [
        "message" => "No one Enroll any Course Yet",
    ];
    $suc_enrollData = false;

}



// echo "</pre>";
// print_r($data);
$dataType = $_GET['type'] ?? '';
$id = $_GET['id'] ?? '';
if ($dataType == '' && $id == '') {
    echo json_encode([
        'data' => $data,
        'success' => true,
    ]);
} else if ($id == '' && $dataType != '') {
    switch ($dataType) {
        case 'users':
            echo json_encode([
                'data' => $data['users'],
                'success' => $suc_user,
            ]);
            break;
        case 'coursdata':
            echo json_encode([
                'data' => $data['coursdata'],
                'success' => $suc_cour,
            ]);
            break;
        case 'students':
            echo json_encode([
                'data' => $data['students'],
                'success' => $suc_stu,
            ]);
            break;
        case 'enrolles':
            echo json_encode([
                'data' => $data['enrolles'],
                'success' => $suc_enroll,
            ]);
            break;
        case 'enrollesData':
            echo json_encode([
                'data' => $data['enrollesData'],
                'success' => $suc_enrollData,
            ]);
            break;
        default:
            echo json_encode([
                'message' => "There is now Data from table = $dataType",
                'success' => false,
            ]);

    }
} else if ($id != '' && $dataType != '') {

    if ($dataType == 'users' || $dataType == 'students' || $dataType == 'enrolles' || $dataType == 'coursdata') {
        $user = mysqli_query($con, "SELECT * FROM $dataType WHERE id = $id ");
        if (mysqli_num_rows($user)) {
            $Userdata = mysqli_fetch_assoc($user);
            echo json_encode([
                'data' => $Userdata,
                'success' => true,
            ]);
        } else {
            echo json_encode([
                'message' => "There is now Id = $id",
                'success' => false,
            ]);
        }




    } else {
        echo json_encode([
            'message' => "There is now Data from table = $dataType",
            'success' => false,
        ]);
    }

} else {
    echo json_encode([
        'message' => 'rong way to access our api ',
        'success' => false,
    ]);
}

?>