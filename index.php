<!--
	#ให้indexเป็นหน้าlogin 
	1.สร้างฐานข้อมูล
	2.แก้ไข้ฐานข้อมูลด้วยการเชื่อมฐานข้อมูลด้วยphp
	3.ทำหน้ารับข้อมูลเพื่อเป็นตัวset
	4.หน้าregis ก็จะมีการตรวจเช็คก่อนที่จะบันทึกข้อมูลเพิ่ม
	5.มีการเรียกใช้session
	6.ทำระบบเช็คerror
	7.login มีการตรวจเช็คตรงรหัส
	8.มีระบบlogout
-->
<?php 

include 'connect.php';
session_start();
error_reporting(0);//การแสดงข้อผิดพลาดของโปรแกรม

if (isset($_SESSION['username'])) {
    header("Location: hello.php");
}//!ถ้าไม่มีการรับSession username ให้ไปที่หน้าlogin

if (isset($_POST['confirm'])) {//ถ้ามีการกดคอนเฟิร์ม
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: hello.php");
	} else {
		echo "<script>alert('รหัสไม่ถูกต้อง')</script>";
	}
}

?>
<!--Session คือทำให้ทุกหน้าใช้ตัวแปรนั้นร่วมกันได้ เก็บข้อมูลเป็นarray-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form - Pure Coding</title>
	
</head>
<body style="background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(b4.jpg);">

		<form action="" method="POST" class="container">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="confirm" class="btn">Login</button>
			</div>
			<a href="register.php">ลงทะเบียน</a>
		</form>
	

</body>
</html>