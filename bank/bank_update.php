<?php
ob_start();
session_start();
if($_SESSION['name']!='bankbd')
{
	header('location: bank_login.php');
}
?>
<?php
//include('config.php');
include('../core/connect/database.php');

if(isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
}
else {
	header('location: bank_edit.php');
}

if(isset($_POST['form1'])) {

	try {
	
	
		if(empty($_POST['username'])) {
			throw new Exception('username can not be empty');
		}
		
		if(empty($_POST['cash'])) {
			throw new Exception('Cash payment can not be empty');
		}
		if(empty($_POST['date'])) {
			throw new Exception('Date payment can not be empty');
		}
		
		
		
		
		
		//$result = mysql_query("insert into tbl_student (st_name,st_roll,st_age,st_email) values('$_POST[st_name]','$_POST[st_roll]','$_POST[st_age]','$_POST[st_email]') ");
		
		//$result = mysql_query("update bank set username='$_POST[username]', cash='$_POST[cash]', date='$_POST[date]' where id='$id'");
		
		$statement = $db->prepare("update bank set username=?,cash=?,date=?,update_time=? where id=?");
		$statement->execute(array($_POST['username'],$_POST['cash'],$_POST['date'],$_POST['update_time'],$id));
		
		$success_message = 'Data has been updated successfully.';

	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>
<?php include('header.php'); ?>
	
	<h2>Update Data</h2>

 <button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back()
}
</script>


		<?php  
		if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
		if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";}
		?>


	<br>

	<?php

	/*$result = mysql_query("select * from bank where id='$id'");
	while($row=mysql_fetch_array($result)) */
	
	$statement = $db->prepare("select * from bank where id=?");
	$statement->execute(array($id));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	
	{
		$username_old = $row['username'];
		$cash_old = $row['cash'];
		$date_old = $row['date'];
		
	}

	?>


	<form action="" method="post">
	<table class="tbl2">
		<tr>
			<td>Account Name: </td>
			<td><input type="text" name="username" value="<?php echo $username_old; ?>"></td>
		</tr>
		<tr>
			<td>Cash Payment: </td>
			<td><input type="text" name="cash" value="<?php echo $cash_old; ?>"></td>
		</tr>
		<tr>
			<td>Date: </td>
			<td><input type="text" name="date" value="<?php echo $date_old; ?>"></td>
		</tr>
		
		<tr>
			<td></td>
			<td><a href="http://www.somiti.orgfree.com" id="deletec-confirm""><input type="submit" value="Update" name="form1"></a></td>
		</tr>
	</table>

	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<input  type="hidden" name="update_time" value="<?php date_default_timezone_set("Asia/Dhaka");
    echo date('F j, Y, g:i a'); ?>" >

	</form>


<?php include('footer.php'); ?>