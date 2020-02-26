<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" contnet="text/html; charset="utf-8">
  <title>Đăng Nhập</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Đăng Nhập</h2>
	</div>
  <form method="post" action="dangnhap.php">
    <!-- display validation errors here -->
    <?php include ('errors.php'); ?>
  	<div class="input-group">
  		<label>Tên Đăng Nhập</label>
  		<input type="text" name="username">  		
  	</div>  
  	<div class="input-group">
  		<label>Mật Khẩu</label>
  		<input type="password" name="password">  		
  	</div>  	
  	<div class="input-group">
  		<button type="submit" name="login" class="btn">Đăng Nhập</button> 		
  	</div>
  	<p>
  		Bạn Chưa Đăng Ký?<a href="dangky.php"> Đăng Ký</a>
  	</p>
  </form>

</body>
</html>