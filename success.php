<?php 
require 'core/init.php';
$general->logged_in_protect();



if(isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
}
else {
	header('location: index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="css/menu_styles.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="style.css" >
	<link rel="stylesheet" type="text/css" href="bank/css/style.css" >
	
	
    <style>
        .veryweak{
            color:#B40404;
        }
        .weak{
            color:#DF7401;
        }
        .medium{
            color:#FFFF00;
        }
        .strong{
            color:#9AFE2E;
        }
        .verystrong{
            color:#0B610B;
        }
    </style>
	
</head>
<body>	
	<div id="container">
<?php
		
		$statement = $db->prepare("SELECT * from users");
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row)

		{

			$email = $row['email']; 
			$email_code = $row['email_code']; 
	
		}
		//write php end and start code here.
		?>
		<div class="row">
			<div class="col-md-10 success_r">
		<a href="<?php echo "http://localhost/somiti/activate.php?email=" . $email . "&email_code=" . $email_code . "
		  ";;?>">Active Your Account</a>
			</div>
		</div>
<?php include 'footer.php'; ?>



























