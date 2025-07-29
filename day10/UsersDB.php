<?php
$con = mysqli_connect("localhost", "root", "");

mysqli_query($con, "CREATE DATABASE IF NOT EXISTS customers ");
mysqli_select_db($con, "customers");
mysqli_query($con, "CREATE TABLE IF NOT EXISTS users (
id int auto_increment primary key,
name varchar(50) not null,
email varchar(200) not null,
password varchar(100) not null,
image text not null
) ");
mysqli_query($con, "CREATE TABLE IF NOT EXISTS products (
id int auto_increment primary key,
adminEmail varchar(200) not null,
name varchar(50) not null,
description Text not null,
image text not null
) ");
// important ********************************************************************
// the is conseder ans an relation between the users and products 
// u need to improve the normlization
// 2- some error will happen when delet users have an products 
function getAllData($con, $tableName)
{
    return mysqli_query($con, "SELECT * FROM $tableName");
}
function getSpacificData($con, $tableName, $where)
{
    return mysqli_query($con, "SELECT * FROM $tableName WHERE $where ");
}
function addNewUser($con, $name, $email, $password, $image)
{
    $query = "INSERT INTO users VALUES ('','$name','$email','$password','$image')";
    mysqli_query($con, $query);
}
function addNewProducts($con, $adminEmail, $name, $desc, $image)
{
    $query = "INSERT INTO products VALUES ('','$adminEmail','$name','$desc','$image')";
    mysqli_query($con, $query);
}

function deletRow($con, $tableName, $where)
{
    mysqli_query($con, "DELETE FROM $tableName WHERE $where");
}




?>