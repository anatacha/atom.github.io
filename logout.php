<?php 

session_start();
session_destroy();
unset($_SESSION['username']);
header("Location: index.php");
//ล้างข้อมูลเด้งไปหน้าlogin/index
?>