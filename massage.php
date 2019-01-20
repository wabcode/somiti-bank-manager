<?php 
include_once 'core/init.php';
$general->logged_out_protect();
?>

		<?php include 'header.php'; ?> 
		<section>
            <!-- FIRST BLOCK -->
            <div id="first-block">
               <div class="line">
                  <div class="margin-bottom">
                     <div class="margin">
                        
		<?php
	    if (isset($_GET['success']) && empty($_GET['success'])) {
	        echo "<div class='success'>" .'<h3>Your details have been updated!</h3>'. "</div>";	        
	    } else{
			if(empty($_POST) === false) {		
				
					if (isset($_POST['first_name']) && !empty ($_POST['first_name'])){
						if (ctype_alpha($_POST['first_name']) === false) {
						$errors[] = 'Please enter your First Name with only letters!';
						}	
					}

						
					$from 	= htmlentities(trim($_POST['from']));
					$to 		= htmlentities(trim($_POST['to']));
					$message 			= htmlentities(trim($_POST['message']));
					$is_read 		= htmlentities(trim($_POST['is_read']));
					$time 		= htmlentities(trim($_POST['time']));
					
					$users->insert_massage($from, $to, $message, $is_read, $time);
					header('Location: massage.php?success');
					exit();
				
				}	
            
    		?>
         
    		<h2>Settings.</h2> <p><b>Note: Information you post here is made viewable to others.</b></p>
            <hr />

            <form class="customform" action="" method="post" enctype="multipart/form-data">
               
            
            	<div id="personal_info">
	            	<h3 >Change Profile Information </h3>
	                <table>
					<tr>
						<td>First name:</td>
						<td><input type="text" name="from" value="<?php if (isset($_POST['from']) ){echo htmlentities(strip_tags($_POST['from']));} else { echo $user['from']; }?>"></td>
					</tr>
					<tr>
						<td>Last name:</td>
						<td><input type="text" name="to" value="<?php if (isset($_POST['to']) ){echo htmlentities(strip_tags($_POST['to']));} else { echo $user['to']; }?>"></td>
					</tr>
					
					<tr>
						<td>Phone Number:</td>
						<td><input type="text" name="message" value="<?php if (isset($_POST['message']) ){echo htmlentities(strip_tags($_POST['message']));} else { echo $user['message']; }?>"></td>
					</tr>
					
					<tr>
						<td>Address:</td>
						<td><textarea id="is_read" name="is_read"><?php if (isset($_POST['is_read']) ){echo htmlentities(strip_tags($_POST['is_read']));} else { echo $user['is_read']; }?>
						 </textarea></td>
					</tr>
		
					</tr>
					<tr>
						<td>Bio:</td>
						<td><textarea id="bio" name="bio"><?php if (isset($_POST['bio']) ){echo htmlentities(strip_tags($_POST['bio']));} else { echo $user['bio']; }?></textarea></td>
					</tr>
					<tr>
						<td>time:</td>
						<td><input type="text" name="time" value="<?php date_default_timezone_set("Asia/Dhaka");
    echo date('F j, Y, g:i a'); ?>"></td>
					</tr>
		
				</table> 
            	</div>
            	<div class="clear"></div>
            	<hr />
            		<span>Update Changes:</span>
                    <input type="submit" value="Update">
               
            </form>
			<br>
			<br>
    
  
	<a href="bank/">Bank data insert</a>

	<?php include 'footer_pro.php'; ?>
	
<?php
}