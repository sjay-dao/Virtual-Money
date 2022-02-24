<?php
	include('../connect.php');
	session_start();
	switch ($_POST['form']) {

		case 'loadtblsample':
			$sql = "SELECT * FROM tbl_user WHERE name Like '%".$_POST['key']."%' or email like '%".$_POST['key'].
			"%' or contact like '%".$_POST['key']."%' or user_code like '%".$_POST['key']."%' ";
			$res = mysqli_query($connection, $sql);
			while ($row = mysqli_fetch_array($res)) {
				echo "
                      <tr id='tr-".$row['id']."'>
                          <td width='14%'>".$row['user_code']."</td>
                          <td width='14%'>".$row['name']."</td>
                          <td width='14%'>".$row['email']."</td>
                          <td width='14%'>".$row['contact']."</td>
                          <td width='14%'>".$row['date']."</td>
                          <td width='14%' align='center'>
                            <button style='' class='btn btn-success btn-xs btn-flat' onclick='editUser(".json_encode($row).", false);' title='Edit'>Edit</button>
                            <button class='btn btn-primary btn-xs btn-flat' onclick='deleteUser(".json_encode($row).", true);' title='Delete'>Delete</button>
                          </td>

                      </tr>
                  ";
			}
		break;
	}
?>