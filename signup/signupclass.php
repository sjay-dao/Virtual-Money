
<?php

	include('../connect.php');

	switch ($_POST['form']) {


		case 'savesignup'://get the users count for the latest year
			$sql = "SELECT COUNT(id) as user_Cnt from tbl_user ";
			$res = mysqli_query($connection, $sql);
			$cnt=0;
			while ($row = mysqli_fetch_array($res)) {
				$cnt = strval($row['user_Cnt']+1);
			}

			for($x=0; $x<7-strlen($cnt); $x++){
					$zeroes .= "0";
			}
			$user_code = "USER-" .  $zeroes . $cnt;
			$timestamp = date('Y-m-d H:i:s');

			$sql = "INSERT INTO tbl_user set password = '".$_POST['password']."', username = '".$_POST['username']."', name = '".$_POST['name'].
			"', email = '". $_POST['email']."', contact = '". $_POST['contact']."', date = '".$timestamp ."', user_code = '" . $user_code . "'";
            
            echo $resultTans = mysqli_query($connection, $sql) or $arrckcp = 0;
            // echo "Cedula is successfully created!";
            echo $sql;
		break;

		case 'checkusername':
			# code...
			//get the users count for the latest year
					$sql = "SELECT COUNT(id) as user_Cnt from tbl_user where username = '".$_POST["username"]."'";
					$res = mysqli_query($connection, $sql);
					$row = mysqli_num_rows($reslogin);
					$cnt=0;
					while ($row = mysqli_fetch_array($res)) {
						$cnt = strval($row['user_Cnt']);
					}
				echo $cnt;
		break;
		
	}
?>

