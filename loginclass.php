<?php
	include("connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'loginuser':
			$sqllogin = "SELECT * from tbl_user WHERE username = '".$_POST['txtusername']."' AND password = '".$_POST['txtpassword']."' ";
			$reslogin = mysqli_query($connection, $sqllogin);
			$rowlogin = mysqli_fetch_array($reslogin);
			$numlogin = mysqli_num_rows($reslogin);

			if($numlogin > 0){
				$_SESSION['userinfo'] = $rowlogin;
			}
			echo $numlogin;
			// echo $sqllogin;
		break;
	}
?>