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

	<?php  
	//if(isset($error_message)) {echo $error_message;}
	//if(isset($success_message)) {echo $success_message;}
	?>

	<table class="tbl2" border="1" cellspacing="0" cellpadding="5">
		<tr>
			<th>User Name</th>
			<th>Total Cash</th>
			<th>Edit and Delete</th>	
		</tr>
		<?php
		$i=0;
				
		$statement = $db->prepare("SELECT a.*, 
		SUM(b.cash) AS cash
		FROM users a LEFT JOIN bank b
		ON(a.username = b.username)
		GROUP BY a.username");
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)
		
		/* $result = mysql_query("SELECT a.*, 
		SUM(b.cash) AS cash
		FROM users a LEFT JOIN bank b
		ON(a.username = b.username)
		GROUP BY b.username");
		while($row=mysql_fetch_array($result)) */
		{
			$i++;
			?>
			
			<tr>
			
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['cash']; ?></td>
			<td><a href="user_veiw_edit.php?username=<?php echo $row['username']; ?>">Edit</a></td>
			
			
			
			</tr>
			
			<?php
		}
		
		?>
		
			<tr>
				<th> Total </th>
				<th>
				<?php

				$results = $db->prepare("SELECT sum(cash) FROM bank");
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				echo $rows['sum(cash)'];
				}
				?>
				</th>
				<th> &nbsp; </th>

			</tr>
	</table>
	<br>
	<script>
		function confirm_delete() {
			return confirm('are you sure want to delete this data?');
		}
	</script>

	
<?php include('footer.php'); ?>