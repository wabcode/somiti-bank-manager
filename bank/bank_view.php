<?php
ob_start();
session_start();
if($_SESSION['name']!='bankbd')
{
	header('location: bank_login.php');
}
?>
<?php //include('config.php'); ?>
<?php include('../core/connect/database.php'); ?>
<?php include('header.php'); ?>

	
	<h2>View All Data from Database</h2>

	<?php  
	//if(isset($error_message)) {echo $error_message;}
	//if(isset($success_message)) {echo $success_message;}
	?>

	<br>

	<table  class="tbl2" border="1" cellspacing="0" cellpadding="5">
		<tr>
			<th>SL No</th>
			<th>Name</th>
			<th>Cash</th>
			<th>Date</th>			
		</tr>
		<?php
		$i=0;
		
		$statement = $db->prepare("select * from users t1 right join bank t2
		on t1.username=t2.username order by 'id' DESC");
		$statement->execute();
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
			</tr>
			
			<?php
		}
		
		?>
			<tr>
				<th>&nbsp; </th>
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
<th>&nbsp; </th>
<th>&nbsp; </th>
</tr>
		
	</table>

	<br>

	<br>

	<script>
		function confirm_delete() {
			return confirm('are you sure want to delete this data?');
		}
	</script>

<?php include('footer.php'); ?>