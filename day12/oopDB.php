<?php
$con = new mysqli("localhost", "root", "", "courses");

if ($con->connect_error) {
    die("Error in Conniction : " . $con->connect_error);
}
// select all users data 
// $result = $con->query('SELECT * FROM users');
// while ($row = $result->fetch_assoc()) {
//     echo "<br>" . $row['name'] . "<br>";
//     echo "" . $row['email'] . "<br><hr>";
// }

$id = 3;
$stmt = $con->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) {
    echo "<br>" . $row['name'] . "<br>";
    echo "" . $row['email'] . "<br><hr>";
}


// in native 
$id2 = 5;
$lash = mysqli_connect("localhost", "root", "", "courses");
$stm = mysqli_prepare($lash, "SELECT * FROM users WHERE id=?");
mysqli_stmt_bind_param($stm, "i", $id2);
mysqli_execute($stm);
$res = mysqli_stmt_get_result($stm);
while ($row = mysqli_fetch_assoc($res)) {
    echo "<br>" . $row['name'] . "<br>";
    echo "" . $row['email'] . "<br><hr>";
}

?>