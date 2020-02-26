<?php
	session_start();

	$username ="";
	$email ="";
	$errors = array();

	// connet to the database
	$db = mysqli_connect('localhost','root','','registration');

	//if the register button is clicked
	if (isset($_POST['register'])){
		$username =mysqli_real_escape_string($db,$_POST['username']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

		// ensure that form fields are fille properlly
		if(empty($username)){
			array_push($errors, "Bạn Chưa Nhập Tên Đăng Nhập"); 
		}
		if(empty($email)){ 
			array_push($errors, "Bạn Chưa Nhập Email"); 
		}
		if(empty($password_1)){ 
			array_push($errors, "Bạn Chưa Nhập Mật Khẩu"); 
		}

		if($password_1 != $password_2){
			array_push($errors, "Xác Nhận Mật Khẩu Không Trùng Khớp");
		}
		$query ="SELECT * FROM users WHERE username = '$username' ";
		$result = mysqli_query($db,$query);
		if(mysqli_num_rows($result)==1){
			 array_push($errors,"Tài Khoản Đã Tồn Tại");
		}
			//if there are no errors, save uesr to database
		if(count($errors)==0){
			$password = md5($password_1); //encrypt password before storing in database(security)
			$sql = "INSERT INTO users (username,email,password)
							 VALUES ('$username', '$email','$password')";
			
			mysqli_query($db,$sql);
			array_push($errors,"Đăng Ký Thành Công");
		}	
	
	
	}

	//log user in from login page
	if(isset($_POST['login'])){
		$username =mysqli_real_escape_string($db,$_POST['username']);		
		$password = mysqli_real_escape_string($db,$_POST['password']);

		// ensure that form fields are fille properlly
		if(empty($username)){
			array_push($errors, "Bạn Chưa Nhập Tên Đăng Nhập"); 
		}
		if(empty($password)){ 
			array_push($errors, "Bạn Chưa Nhập Mật Khẩu"); 
		}

		if(count($errors)== 0){
			$password = md5($password);//encrypt password before comparing with that database
			$query ="SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$result = mysqli_query($db,$query);

			if(mysqli_num_rows($result)==1){
				//log user in
				$_SESSION['username'] =$username;
				$_SESSION['success'] = "Bạn Đã Đăng Nhập Thành Công";
				header('location: index.php'); //redirect to home page
			}else{
				array_push($errors,"Tên Đăng Nhập/Mật Khẩu Không Tồn Tại ");			
			}
		}
	}


	//logout
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location: dangnhap.php');
	}
	//tim kiếm user	
	
  ?>