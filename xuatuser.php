
<?php include('server.php'); ?>
<?php $db = mysqli_connect('localhost','root','','registration');
      $query ="SELECT * FROM users ";
      $result = mysqli_query($db,$query); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" contnet="text/html" charset="utf-8">
  <title>Danh Sách User</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Danh Sách User</h2>
	</div>
   <div align="center">
            <form action="search.php" method="get">
                <input type="text" name="search" placeholder="Nhập từ khóa" />
                <input type="submit" name="ok" value="Tìm Kiếm" />
            </form>
    </div>
  <form>
    <div class="table" id="table_user">
    <table class="table_1" border="1">
      <tr>
        <th >ID</th>
        <th >Tên Đăng Nhập</th>
        <th >Địa Chỉ Email</th>
        
      </tr>  
       <?php
    while ($row = mysqli_fetch_array($result)) { ?>
    <tr>
       <td><?php  echo $row["id"]; ?></td>
       <td><?php  echo $row["username"]; ?></td>
       <td><?php  echo $row["email"]; ?></td>
       
       <td><a href="delete.php?id=<?php echo $row['id']; ?>">Xóa</a></td>    
    </tr>
   <?php
    }
    ?>   
    </table>  
 
  </div>
    
  </form>
    

    <div class="content">
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