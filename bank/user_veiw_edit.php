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

if(isset($_REQUEST['username'])) {
	$username = $_REQUEST['username'];
}
else {
	header('location: bank_edit.php');
}
?>
<?php include('header.php'); ?>

<tr><h2>View All <?php echo $username; ?> Data from Database</h2></tr>


	<table  class="tbl2" border="1" cellspacing="0" cellpadding="5">
		<tr>
			<th>SL No</th>
			<th>Name</th>
			
			<th>Cash</th>
			<th>Date</th>
			<th>Edit and Delete</th>
		
			
		</tr>
	<?php
		$i=0;
		
		/*$statement = $db->prepare("select * from bank where username like '$username' ");
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)*/
		
		$statement = $db->prepare("select * from bank where username=? order by id DESC");
	$statement->execute(array($username));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
		
		/*$result = mysql_query("select * 
	from users t1
	right join bank t2
	on t1.username=t2.username");
		while($row=mysql_fetch_array($result)) */
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
				<a onclick="return confirm_delete();" href="bank_delete_user_veiw_edit.php?id=<?php echo $row['id']; ?>">Delete</a>
			</td>
			</tr>
			
			<?php
		}
		
		?>
		<th>&nbsp; </th>
		<th> Total </th>
		<th>
				<?php

				$results = $db->prepare("SELECT sum(cash) FROM bank WHERE username like '$username'");
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				echo $rows['sum(cash)'];
				}
				?>
		</th>
		<th> &nbsp; </th>
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