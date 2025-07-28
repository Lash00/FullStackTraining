<?php
header("Content-Type:application/json");
header("Access-Control-Allow-Origin: *");
$con = mysqli_connect('localhost', 'root', '', 'courses');

// $data = json_decode(file_get_contents("php://input"), true);
$cours = mysqli_query($con, 'SELECT id,title FROM coursdata');
$coursdata = [];
while ($row = mysqli_fetch_array($cours)) {
    $coursdata[] = $row;
}
// $data = json_decode(file_get_contents("php://input"), true);
$std = mysqli_query($con, 'SELECT id,name FROM students');
$stdData = [];
while ($row = mysqli_fetch_array($cours)) {
    $stdData[] = $row;
}




?>