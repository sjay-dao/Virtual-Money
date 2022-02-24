
<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

	session_start();	
	include('../connect.php');

	switch ($_POST['form']) {


		case 'sendemail':

			//create randome code
			$rand = strval(rand(0,999999));
            for($x=0; $x<6-strlen($rand); $x++){$zeroes .= "0";}
            $code = $zeroes . $rand;

			$msg = "
					<html>
					<head>
					<title>Forgot Password Verification Code</title>
					</head>
					<body>
						<p>This email contains a code to reset your password</p>
						<p>Here is the verification code to change your password: " . $code.
					"</body>
					</html>
					";

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <dao.davon.au@gmail.com>' . "\r\n";

			// use wordwrap() if lines are longer than 70 characters
			//$msg = wordwrap($msg,70);

			// send email
			mail($_POST['email'],"Mickey Mouse Money - Forgot Password",$msg, $headers);

			$sql = "UPDATE tbl_user AS a SET passwordcode = '".$code."' WHERE email = '".$_POST['email']."'";
            echo $resultTans = mysqli_query($connection, $sql) or $arrckcp = 0;
            // echo "Cedula is successfully created!";
            echo $sql;
		break;

		case 'verifycode':
			 $sql = "SELECT COUNT(id) as user_Cnt from tbl_user where passwordcode = '".$_POST["passwordcode"]."'";
					$res = mysqli_query($connection, $sql);
					$cnt=0;
					while ($row = mysqli_fetch_array($res)) {
						$cnt = strval($row['user_Cnt']);
					}
					echo $cnt;
		break;

		case 'changepassword':
			$sql = "UPDATE tbl_user SET password = '".$_POST['password'].
			"' WHERE passwordcode = '".$_POST['passwordcode']."'";
            echo $resultTans = mysqli_query($connection, $sql) or $arrckcp = 0;
            // echo "Cedula is successfully created!";
            echo $sql;
		break;
		
	}
?>
