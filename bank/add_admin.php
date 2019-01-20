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
	header('location: bank_view.php');
}


if(isset($_POST['form1'])) {

	try {

		

		//$result = mysql_query("select * from tbl_login where password='$password'");
		//$num = mysql_num_rows($result);
		
			
		$statement = $db->prepare("update users set admin=? where id=?");
		$statement->execute(array($_POST['admin'],$id));
		
		header('location: add_account_number.php');
		
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>
<?php include('header.php'); ?>
	<h2>Add and Edit Account Number</h2>

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

<?php

	/*$result = mysql_query("select * from bank where id='$id'");
	while($row=mysql_fetch_array($result)) */
	
	$statement = $db->prepare("select * from users where id=?");
	$statement->execute(array($id));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	
	{
		$username_old = $row['username'];
		$admin_old = $row['admin'];
		
		
	}

	?>


	<form action="" method="post">
	<table class="tbl2">
		<tr>
			<td>User Name: </td>
			<td><?php echo $username_old; ?></td>
		</tr>
		<tr>
			<td>Add Admin: </td>
			<td></select>

<select name=admin value=''>Select Month</option>
<option value='ua'>Delete Admin</option>
<option value='ad'>Add Admin</option>

</select></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Update" name="form1"></td>
		</tr>
	</table>

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	</form>


<?php include('footer.php'); ?>