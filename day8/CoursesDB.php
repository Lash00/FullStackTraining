<?php

$con = mysqli_connect("localhost", "root", "");
mysqli_query($con, "CREATE DATABASE IF NOT EXISTS courses");
mysqli_select_db($con, "courses");
mysqli_query($con, "CREATE TABLE IF NOT EXISTS coursData(
id INT PRIMARY KEY AUTO_INCREMENT,
title  VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
hours DECIMAL(5,2)	NOT NULL,
price DECIMAL(6,2)	NOT NULL
)");

mysqli_query($con, "CREATE TABLE IF NOT EXISTS students(
id INT PRIMARY KEY AUTO_INCREMENT,
name  VARCHAR(50) NOT NULL,
email VARCHAR(250) NOT NULL,
phone VARCHAR(20)	NOT NULL,
date  DATE	NOT NULL
)");

mysqli_query($con, "CREATE TABLE IF NOT EXISTS enrolles(
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    degree Varchar(3),
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES coursData(id) ON DELETE CASCADE
);
");
// mysqli_query($con, "DROP TABLE enrolles");


function addCourse($db, $title, $tableName, $description, $hours, $price)
{
    $query = "INSERT INTO $tableName VALUES ('','$title','$description','$hours','$price')";
    mysqli_query($db, $query);
}
function UpDateData($db, $title, $description, $hours, $price, $id)
{
    $query = "UPDATE coursData SET title = '$title' , description = '$description' , hours = $hours , price = $price WHERE id=$id ";
    mysqli_query($db, $query);
}
function deletCourse($db, $tableName, $id)
{
    $query = "DELETE FROM $tableName WHERE id= $id";
    mysqli_query($db, $query);
}
function getAllData($db, $tableName)
{
    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($db, $query);
    return $result;
}
function getOneData($db, $tableName, $id)
{
    $query = "SELECT * FROM $tableName WHERE id = $id";
    $result = mysqli_query($db, $query);
    return $result;
}

function upDateStudents($db, $name, $email, $phone, $date, $id)
{
    $query = "UPDATE students SET name = '$name' , email = '$email' , phone = '$phone' , date = '$date' WHERE id=$id ";
    mysqli_query($db, $query);
}

function spacificSelect($db, $tableName, $column)
{
    $query = "SELECT $column FROM $tableName";
    $res = mysqli_query($db, $query);
    return $res;
}


function addNewEnroll($db, $stdId, $corID, $deg)
{
    $query = "INSERT INTO enrolles VALUES('',$stdId,$corID,'$deg')";
    mysqli_query($db, $query);
}

?>