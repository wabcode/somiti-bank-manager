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
		 if(empty($_POST['account'])) {
			throw new Exception('Account Name can not be empty');}
	
		else if (ctype_digit($_POST['account']) === false) {
			throw new Exception('Please enter your account number with only digit!');
		
					}
		else if (strlen($_POST['account']) <6) {
			throw new Exception('Your Account Number must be at least 6 digit!');
		
					}
		else if (strlen($_POST['account']) >6) {
			throw new Exception('Your Account Number cannot be more than 6 digit log!');
		
					}
					
		

		
		if(empty($_POST['first_name'])) {
			throw new Exception('First name can not be empty');
		}
		
		if(empty($_POST['username'])) {
			throw new Exception('User name can not be empty');
		}
		
		/*$num=0;
		
		
		$statement = $db->prepare("select * from users where username=?");
		$statement->execute(array($_POST['username']));
		$num = $statement->rowCount();
		
		//$result = mysql_query("select * from tbl_login where password='$password'");
		//$num = mysql_num_rows($result);
		
		
		
		
		if($num==0) {
			throw new Exception("User name dose not match !");
		}
		*/
			
		$statement = $db->prepare("update users set first_name=?,username=?,account=? where id=?");
		$statement->execute(array($_POST['first_name'],$_POST['username'],$_POST['account'],$id));
		
		$success_message = 'Data has been updated successfully.';
		
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
		$first_name_old = $row['first_name'];
		$username_old = $row['username'];
		$account_old = $row['account'];
		
		
	}

	?>


	<form action="" method="post">
	<table class="tbl2">
		<tr>
			<td>First Name: </td>
			<td><input type="text" name="first_name" value="<?php echo $first_name_old; ?>"></td>
		</tr>
		<tr>
			<td>User Name: </td>
			<td><input type="text" name="username" value="<?php echo $username_old; ?>"></td>
		</tr>
		<tr>
			<td>Account Number: </td>
			<td><input type="text" name="account" value="<?php echo $account_old; ?>"></td>
		</tr>
		<tr>
		<td id="note"><p>A/C NO.:100001</p></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Update" name="form1"></td>
		</tr>
	</table>

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	</form>


<?php include('footer.php'); ?>