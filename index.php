<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" contnet="text/html; charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home page</h2>
  <div>
     <a href="dangky.php">Đăng Ký</a>
     <a href="dangnhap.php">Đăng Nhập</a>
     <a href="xuatuser.php">Danh Sách User</a>
     <a href="search.php">Tìm Kiếm</a>

  </div>


 

  <div class="contnet">
    <?php if(isset($_SESSION['success'])): ?>
      <div class="erorr success">
        <h3>
          <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
          ?>
        </h3>
        
      </div>
    <?php endif ?>
    <?php if(isset($_SESSION["username"])):?>
      <p>Wellcome <strong><?php echo $_SESSION ['username']; ?></strong></p>
      <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
    <?php endif ?>
    
  </div>

</body>
</html>