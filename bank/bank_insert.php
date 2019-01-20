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

if(isset($_POST['form1'])) {

	$cname = trim($_POST['username']);
   $cdate = trim($_POST['date']);

	try {
		//$stmt = $db->prepare("SELECT username FROM bank WHERE username=:cname OR date=:cdate");
       //  $stmt->execute(array(':cname'=>$cname, ':cdate'=>$cdate));
        // $row=$stmt->fetch(PDO::FETCH_ASSOC);

        // if((($row['username']==$cname) || ($row['date']==$cdate))=== false) {
          //  throw new Exception('sorry this date payment already taken !');
        // }
	
		if(empty($_POST['username'])) {
			throw new Exception('Account Name can not be empty');
		}
		
		if(empty($_POST['cash'])) {
			throw new Exception('Cash payment can not be empty');
		}
		if(empty($_POST['date'])) {
			throw new Exception('Date can not be empty');
		}
		
		

		
		
					$statement = $db->prepare("select * from bank where username like '$cname'");
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $row)
		//$result = mysql_query("select * from tbl_login where password='$password'");
		//$num = mysql_num_rows($result);
		
		
		if($row['date']==$cdate) {
			throw new Exception("Sorry ( $cdate )date payment already taken from $cname !");
		}

		$statement = $db->prepare("insert into bank (username,cash,date,insart_date) values(?,?,?,?)");
		$statement->execute(array($_POST['username'],$_POST['cash'],$_POST['date'],$_POST['insart_date']));
		
	
		$success_message = 'Data has been inserted successfully.';
		//$result = mysql_query("insert into bank (username,cash,date) values('$_POST[username]', '$_POST[cash]','$_POST[date]') ");

		
		
	
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>
<?php include('header.php'); ?>
	<h2>Insert Data</h2>

	<?php  
	if(isset($error_message)) {echo "<div class='error'>".$error_message."</div>";}
	if(isset($success_message)) {echo "<div class='success'>".$success_message."</div>";}
	?>

	<br>

	
	<?Php
error_reporting(0);
$todo=$_POST['todo'];

if(isset($todo) and $todo=="submit"){

$month=$_POST['month'];

$dt=$_POST['dt'];

$year=$_POST['year'];


$date_value="$dt-$month-$year";

}



?>

	<table>
		<tr>
			<td>Date Change: </td>
			<td>
<form method=post name=f1 action='' autocomplete="on"><input type=hidden name=todo value=submit>
<select name=dt '>

<option value='01'>01</option>
<!--
<option value='02'>02</option>
<option value='03'>03</option>
<option value='04'>04</option>
<option value='05'>05</option>
<option value='06'>06</option>
<option value='07'>07</option>
<option value='08'>08</option>
<option value='09'>09</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
--->
</select>

<select name=month value=''>Select Month</option>
<option value='01'>January</option>
<option value='02'>February</option>
<option value='03'>March</option>
<option value='04'>April</option>
<option value='05'>May</option>
<option value='06'>June</option>
<option value='07'>July</option>
<option value='08'>August</option>
<option value='09'>September</option>
<option value='10'>October</option>
<option value='11'>November</option>
<option value='12'>December</option>
</select>



<?php
	$this_year = date("Y");
	$span = $this_year + 2;


	$starting_year  = 2014;
	$ending_year    = $span;


	for($starting_year; $starting_year <= $ending_year; $starting_year++) {
		$years[] = '<option value="'.$starting_year.'">'.$starting_year.'</option>';
	}

?>
 <select name="year" onchange='this.form.submit()'>
    <?php echo implode("\n\r", $years);  ?>
</select>



<noscript><input type="submit" value="Submit"></noscript>
</td>

</form>
</tr>
	<form action="" method="post">
		<tr>
		<td>date: </td>
			<td>
			<input  type="text" name="date" value="<?php echo "$date_value"; ?>">
			</td>
		</tr>
		<tr>
			<td>Account Name: </td>
			<td>
			
			
			
			<select name="username">
				<option value="">Select a Account Name</option>
				<?php
				$statement = $db->prepare("SELECT * FROM users ORDER BY username ASC");
				$statement->execute();
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row)
				{
					?>
					<option value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></option>
					<?php
				}
				?>

			
			
			</td>
		</tr>
		<tr>
			<td>Cash Payment: </td>
			<td><input class="multiple" type="text" name="cash" value="500"></td>
		</tr>
		<tr>
	
		</tr>
		<input  type="hidden" name="insart_date" value="<?php date_default_timezone_set("Asia/Dhaka");
    echo date('F j, Y, g:i a'); ?>" >
		<tr>
			<td></td>
			<td><input class="multiple"  type="submit" value="Insert" name="form1"></td>
		</tr>
	
	</form>
	
		</tr>
	</table>

<?php include('footer.php'); ?>