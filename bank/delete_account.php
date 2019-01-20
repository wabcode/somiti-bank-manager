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
	
	$statement = $db->prepare("delete from users where id=?");
	$statement->execute(array($id));
	//$result = mysql_query("delete from bank where id='$id'");
		
	header('location: add_account_number.php');
}
else {
	header('location: add_account_number.php');
}