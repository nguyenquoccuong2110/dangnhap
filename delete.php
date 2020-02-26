<?php
require 'server.php';
$id = (int)$_GET['id'];
// if (!$user_id) {
// 	die('loi'. mysqli_error($user_id));
// }
$sql = "delete from users where id = $id";
	if (!mysqli_query($db,$sql)) {
		die('loi'. mysqli_error($db));
	}
	echo "delete thành công";
	header("Location:xuatuser.php ");
?>