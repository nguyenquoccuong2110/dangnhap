
<?php $db = mysqli_connect('localhost','root','','registration');
      $query ="SELECT * FROM users ";
      $result = mysqli_query($db,$query); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" contnet="text/html" charset="utf-8">
  <title>Tìm Kiếm User</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
    <body>
       
        
        <div class="header">
            <h2>Danh Sách User Cần Tìm Kiếm</h2>
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
    if (isset($_REQUEST['ok'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Vui Lòng Nhập Dữ Liệu Vào Ô Trống";
            } 
            else
            {
                // Kết nối sql
                $db = mysqli_connect('localhost','root','','registration');
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from users where username like '%$search%'";
                                
 
                // Thực thi câu truy vấn
                $result = mysqli_query($db,$query);
 
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($result);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num Kết quả trả về với từ khóa: <b>$search</b>";
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                  
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['username']}</td>";                            
                            echo "<td>{$row['email']}</td>";                                                     
                           
                        echo '</tr>';
                    }
                   
                } 
                else {
                    echo "Không Tìm Thấy Kết Quả!";
                }
            }
        }
    ?>
   
    </table>  
 
  </div>
    
  </form>
    </body>
</html>