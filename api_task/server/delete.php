<?php
header("Content-Type:application/json");
// header("Access-Control-Allow-Origin: *");
$con = mysqli_connect('localhost', 'root', '', 'courses');

$data = json_decode(file_get_contents("php://input"), true);
$id = $data["id"];
$type = $data["type"];
// $=mysqli_query($con,"DELETE FROM '$type' WHERE id=$id");

$del = mysqli_query($con, "DELETE FROM $type WHERE id=$id");
if ($del) {
    echo json_encode([
        'success' => true,
        'message' => "the delete Done Successfuly "
    ]);
} else {

    echo json_encode([
        'success' => false,
        'message' => "Some thing happen when delete Try again later",
        'del' => $del
    ]);
}
// echo json_encode([
//     'id' => (int) $id,
//     'message' => "id is work here = $id "
// ]);

?>