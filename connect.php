<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "project_db";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}//!หมายถึงเรียกใช้ทันที

?>