<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}//!ถ้าไม่มีการรับSession username ให้ไปที่หน้าlogin/หน้าindex

?>

<!--ตั้งให้หน้าเเรกindexเป็นหน้าlogin-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello Your World</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body style="background-color:#262626;">
    <div class="container">
        <div class="input-group">
        <label>
            <?php echo "<h4>Hello Again</h4>"; ?>
        </label>
        <label>
        <?php echo $_SESSION['username']?>
        </label>
        </div>
        
    <a style="color:red; text-align: center;" href="logout.php"><h4>Logout.()</h4></a><!--เรียกใช้sessionให้ใช้usernameได้ ให้มันแสดงชื่อผู้ใช้-->
    
    </div>
      
</body>
</html>