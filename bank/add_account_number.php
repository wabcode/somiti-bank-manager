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
?>

	<?php include('header.php'); ?>
	<h2>Add Account Number</h2>
 <button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back()
}
</script>

	<table  class="tbl2" border="1" cellspacing="0" cellpadding="5">
		<tr>
			<th>User Name</th>
			<th>Account Set</th>
			<th>Delete</th>
			<th>Add Admin</th>
		</tr>
		<?php
		$i=0;
		
		$statement = $db->prepare("select * from users");
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

			<td><?php echo $row['username']; ?></td>
			
			<td>
			<a href="insert_account.php?id=<?php echo $row['id']; ?>"><?php
				if(empty($row['account'])) {
			      echo "Account Set";
				}
				else{
				echo $row['account'];
				}?></a>
				</td>
			<td><a onclick="return confirm_delete();" href="delete_account.php?id=<?php echo $row['id']; ?>">Delete</a></td>
			<td><a onclick="return confirm_add_admin();" href="add_admin.php?id=<?php echo $row['id']; ?>" id="<?php echo $row['admin']; ?>">ADD Admin</a></td>
			

			
			</tr>
			
			<?php
		}
		$id_admin = $row['admin'];
		?>
		
		
			<tr>

</tr>
		<script>
		function confirm_add_admin() {
			return confirm('are you sure want to add admin?');
		}
		</script>		<script>
		function confirm_delete() {
			return confirm('are you sure want to delete this data?');
		}
		</script>
	</table>


<?php include('../footer_pro.php'); ?>