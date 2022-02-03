<?php 

include 'connect.php';

error_reporting(0);//seterrorเป็น0

session_start();//ประกาศใช้session

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}//ถ้ามีการรับusername ให้เข้าไปหน้าindex

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$confirmpassword = md5($_POST['confirmpassword']);
	//ทำการquery ดึงข้อมูลจากตารางออกมา
	if ($password == $confirmpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";//เลือกข้อมูลทั้งหมดของตารางuser 
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {//ถ้าไม่มีชุดข้อมูลที่ส่งกลับมาให้ทำการเพิ่มข้อมูลในฐานข้อมูล
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('ลงทะเบียนสำเร็จ')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['confirmpassword'] = "";
			} 
		} 
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form - Pure Coding</title>
</head>
<body style="background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(b3.jpg);">
	
		<form action="" method="POST" class="container">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="confirmpassword" value="<?php echo $_POST['confirmpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<a href="index.php">กลับไปหน้าLogin ></a>
		</form>

</body>
</html>