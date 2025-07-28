<?php
header("Content-Type:application/json");
header("Access-Control-Allow-Origin: *");
$con = mysqli_connect('localhost', 'root', '', 'courses');

$data = json_decode(file_get_contents("php://input"), true);
$type = $data["type"];

if ($type == "coursdata") {
    $title = $data["title"];
    $desc = $data["desc"];
    $hours = $data["hours"];
    $price = $data["price"];
    $succ = mysqli_query($con, "INSERT INTO coursdata VALUES ('',' $title','$desc',$hours,$price) ");
    if ($succ == true) {
        echo json_encode([
            "success" => true,
            "message" => "Course have been add successFuly "
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Try again later "
        ]);
    }
} else if ($type == "students") {
    $name = $data["name"];
    $email = $data["email"];
    $phone = $data["phone"];
    $date = $data["date"];

    $allstudebnts = mysqli_query($con, "SELECT * FROM students WHERE email='$email' ");
    if (mysqli_num_rows($allstudebnts)) {
        echo json_encode([
            "success" => false,
            "message" => "User Already Exsits "
        ]);
        return;
    } else {

        $succ = mysqli_query($con, "INSERT INTO students VALUES ('',' $name','$email',$phone,'$date') ");
        if ($succ == true) {
            echo json_encode([
                "success" => true,
                "message" => "Student have been add successFuly "
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Try again later "
            ]);
        }
    }

} else if ($type == "enrolles") {
    $stdId = $data['std_id'];
    $coursId = $data['cours_id'];
    $degree = $data['deg'];
    $allEnrolles = mysqli_query($con, "SELECT * FROM enrolles WHERE student_id=$stdId");
    if (mysqli_num_rows($allEnrolles)) {
        $flag = false;
        while ($row = mysqli_fetch_array($allEnrolles)) {
            if ($row['course_id'] == $coursId) {
                $flag = true;
                break;
            }
        }
        if ($flag) {
            echo json_encode([
                'success' => false,
                'message' => "Student Already Take this Course"
            ]);
        } else {
            $succ = mysqli_query($con, "INSERT INTO enrolles VALUES ('',$stdId,$coursId,'$degree') ");
            if ($succ == true) {
                echo json_encode([
                    "success" => true,
                    "message" => "Student have been Enrolled successFuly "
                ]);
            } else {
                echo json_encode([
                    "success" => false,
                    "message" => "Try again later some error happen "
                ]);
            }
        }
    } else {
        $succ = mysqli_query($con, "INSERT INTO enrolles VALUES ('',$stdId,$coursId,'$degree') ");
        if ($succ == true) {
            echo json_encode([
                "success" => true,
                "message" => "Student have been Enrolled successFuly "
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Try again later some error happen "
            ]);
        }
    }


}




?>