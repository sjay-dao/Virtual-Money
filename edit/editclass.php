
<?php
	session_start();	
	include('../connect.php');

	switch ($_POST['form']) {


		case 'edituser'://get the users count for the latest year
			$sql = "UPDATE tbl_user AS a SET a.name = '".$_POST['name']."', email = '".$_POST['email']."', contact = '".$_POST['contact']."', imageurl = '".$_POST['imageurl'].
			"' WHERE user_code = '".$_POST['user_code']."'";
            echo $resultTans = mysqli_query($connection, $sql) or $arrckcp = 0;
            // echo "Cedula is successfully created!";
            echo $sql;
		break;
		
		case 'deleteuser':
			 $sql = "Delete from tbl_user where user_code = '".$_POST['user_code']."'";
			 $resultTans = mysqli_query($connection, $sql) or $arrckcp = 0;
			 echo $sql;
		break;
	}
?>

