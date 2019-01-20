<?php

if(isset($_POST['form_login'])) 
{
	
	try {
	
		
		if(empty($_POST['username'])) {
			throw new Exception('Username can not be empty');
		}
		
		if(empty($_POST['password'])) {
			throw new Exception('Password can not be empty');
		}
	
		$password = $_POST['password']; // admin
		$password = md5($password);
		
		//include('config.php');
		include('../core/connect/database.php');
		
		$num=0;
		$statement = $db->prepare("select * from bank_login where username=? and password=?");
		$statement->execute(array($_POST['username'],$password));		
		
		$num = $statement->rowCount();
		
		//$result = mysql_query("select * from bank_login where username='$_POST[username]' and password='$_POST[password]'");
		//$num = mysql_num_rows($result);
		
		if($num>0) 
		{
			session_start();
			$_SESSION['name'] = "bankbd";
			header("location: bank_total_cash.php");
		}
		else
		{
			throw new Exception('Invalid Username or password');
		}
	
	
	
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>
<?php include 'header_only.php'; ?>

<body class="size-1140">
      <div id="all-content" class="with-sticky-footer">
         <!-- TOP NAV WITH LOGO -->
         <header>
         
         </header>
	<section>
            <!-- FIRST BLOCK -->
            <div id="first-block">
               <div class="line">
                  <div class="margin-bottom">
                     <div class="margin">
                        <article class="s-4 m-4 s-12 center">
						<h2>Login</h2>  
	
	<?php
	if(isset($error_message))
	{
		echo $error_message;
	}
	?>
	<br>
	<form action="" method="post">
	<table>
		<tr>
			<td>Username: </td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Login" name="form_login"></td>
		</tr>
	</table>
	</form>

	<br>
		<td><a href="../index.php">back to previous</a></td>

<?php include '../footer_pro.php'; ?>