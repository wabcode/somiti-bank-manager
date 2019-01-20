<?php
ob_start();
session_start();
if($_SESSION['name']!='bankbd')
{
	header('location: bank_login.php');
}
?>
<?php include('../core/connect/database.php'); ?>
<?php include('header.php'); ?>
	<h2>View All Data from Database</h2>
	
	<?php  
	//if(isset($error_message)) {echo $error_message;}
	//if(isset($success_message)) {echo $success_message;}
	?>

	<br>

	<table class="tbl2" border="1" cellspacing="0" cellpadding="5">
		<tr>
			<th>Serial No</th>
			<th>Name</th>
			<th>Cash</th>
			<th>Date</th>
			<th>Change data</th>
		</tr>
		<?php
		$i=0;
		/*$result = mysql_query("select * from bank");
		while($row=mysql_fetch_array($result))*/

		$statement = $db->prepare("select * from bank order by id DESC");
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
			
		{
			$i++;
			?>
			
			<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['cash']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td>
				<a href="bank_update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;|&nbsp;
				<a onclick="return confirm_delete();" href="bank_delete.php?id=<?php echo $row['id']; ?>">Delete</a>
			</td>
			</tr>
			
			<?php
		}
		
		?>

	</table>
	<script>
		function confirm_delete() {
			return confirm('are you sure want to delete this data?');
		}
	</script>


<?php include('footer.php'); ?>