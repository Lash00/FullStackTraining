<?php

$con = mysqli_connect("localhost", "root", '', 'lashtest');
if (
    mysqli_query($con, "CREATE DATABASE IF NOT EXISTS lashTest")
) {
    echo "has created ";
} else
    echo "has errors ";
// mysqli_select_db($con, "lashtest");
// mysqli_query($con, "");
$lash = mysqli_query($con, "CREATE TABLE IF NOT EXISTS usersData
(
id int auto_increment PRIMARY KEY,
name varchar(50) NOT NULL ,
email  varchar(50) NOT NULL ,
password  varchar(50) NOT NULL 
)
");
echo $lash;
// $res = mysqli_query($con, 'SELECT * FROM students');
// if (mysqli_num_rows($res) > 0) {
//     while ($row = mysqli_fetch_assoc($res)) {
//         var_dump($row);
//     }
// }



?>