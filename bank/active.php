
<?php
ob_start();
session_start();
if($_SESSION['name']!='bankbd')
{
	header('location: bank_login.php');
}
?>
<?php// include('config.php'); ?>
<?php include('../core/connect/database.php'); ?>
<?php include('header.php'); ?>

	<h2>View All Data from Database</h2>
	<table class="tbl2" border="1" cellspacing="0" cellpadding="5">
		<tr>
			<th>Serial No</th>
			<th>Active code</th>
			<th>Check</th>
	<?php
		$i=0;
				
		$statement = $db->prepare("SELECT * from users");
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		
	
		{
			$i++;
			?>
			
			<tr>
			<td><?php echo $i; ?></td>
			<td><a href="http://shometi.6te.net/activate.php?email=<?php echo $row['email']; ?>&email_code=<?php echo $row['email_code']; ?>">Active</a></td>
			
			<td><?php echo $row['confirmed']; ?></td>
			</tr>
			
			<?php
		}
		
		?>
	
	



	</table>
	<br>
	<script>
		function confirm_delete() {
			return confirm('are you sure want to active this account?');
		}
	</script>
	
<?php include('footer.php'); ?>

