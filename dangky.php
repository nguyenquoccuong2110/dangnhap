<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Đăng Ký</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Đăng Ký</h2>
	</div>
  <form method="post" action="dangky.php">
  	<!-- display validation errors here -->
  	<?php include ('errors.php'); ?>
  	<div class="input-group">
  		<label>Tên Đăng Nhập</label>
  		<input type="text" name="username" value="<?php echo $username; ?>">  		
  	</div>
  	<div class="input-group">
  		<label>Địa Chỉ Email</label>
  		<input type="text" name="email" value="<?php echo $email; ?>">  		
  	</div>
  	<div class="input-group">
  		<label>Mật Khẩu</label>
  		<input type="password" name="password_1">  		
  	</div>
  	<div class="input-group">
  		<label>Nhập Lại Mật Khẩu</label>
  		<input type="password" name="password_2">  		
  	</div>
  	<div class="input-group">
  		<button type="submit" name="register" class="btn">Đăng Ký</button> 		
  	</div>
  	<p>
  		Bạn Đã Có Tài Khoản?<a href="dangnhap.php"> Đăng Nhập</a>
  	</p>

  </form>

</body>
</html>