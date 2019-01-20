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
	
	$statement = $db->prepare("delete from bank where id=?");
	$statement->execute(array($id));
	//$result = mysql_query("delete from bank where id='$id'");
	$success_message2 = "user has been deleted successfully.";	
	
}
else {
	header('location: bank_total_cash.php');
}
?>
<?php include('../core/connect/database.php'); ?>
<?php include('header.php'); ?>

<table  class="tbl2" border="1" cellspacing="0" cellpadding="5">
		<tr>
<?php
if(isset($success_message2)) {echo "<div class='success'>".$success_message2."</div>";}
?>
		</tr>
		</table>
		
		<script type="text/javascript">
window.setTimeout('history.back();', 1000); // waits 5 seconds before going back
</script>

<?php include('footer.php'); ?>