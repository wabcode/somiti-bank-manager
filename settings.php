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
				if (isset($_POST['last_name']) && !empty ($_POST['last_name'])){
					if (ctype_alpha($_POST['last_name']) === false) {
					$errors[] = 'Please enter your Last Name with only letters!';
					}	
				}
				
				if (isset($_POST['phone']) && !empty ($_POST['phone'])){
					if (ctype_digit($_POST['phone']) === false) {
					$errors[] = 'Please enter your Phone number with only d!';
					}	
				
				else if (strlen($_POST['phone']) <11){
					$errors[] = 'Your phone number must be atleast 11 digit';
					} 
					else if (strlen($_POST['phone']) >11){
					$errors[] = 'Your phone Number cannot be more than 11 digit log ';
					}
					}
				/*if (isset($_POST['account']) && !empty ($_POST['account'])){
					 if ($users->account_exists($_POST['account']) === true) {
					$errors[] = 'That account already exists';
					}
					else if (ctype_digit($_POST['account']) === false) {
					$errors[] = 'Please enter your account number with only digit!';
					}
					else if (strlen($_POST['account']) <6){
					$errors[] = 'Your Account Number must be atleast 6 digit';
					} 
					else if (strlen($_POST['account']) >6){
					$errors[] = 'Your Account Number cannot be more than 6 digit log ';
					
					
					}
				   
				}*/
				/*if (isset($_POST['address']) && !empty ($_POST['address'])){
					if (ctype_cntrl($_POST['address']) === false) {
					$errors[] = 'Please enter your address with only letters and digit!';
					}	
				}
				*/
				if (isset($_POST['gender']) && !empty($_POST['gender'])) {
					
					$allowed_gender = array('undisclosed', 'Male', 'Female');

					if (in_array($_POST['gender'], $allowed_gender) === false) {
						$errors[] = 'Please choose a Gender from the list';	
					}

				} 
				
				if (isset($_POST['blood']) && !empty($_POST['blood'])) {
					
					$allowed_gender = array('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-');

					if (in_array($_POST['blood'], $allowed_gender) === false) {
						$errors[] = 'Please choose a Blood Group from the list';	
					}

				} 

				if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name'])) {
					
					$name 			= $_FILES['myfile']['name'];
					$tmp_name 		= $_FILES['myfile']['tmp_name'];
					$allowed_ext 	= array('jpg', 'jpeg', 'png', 'gif' );
					$a 				= explode('.', $name);
					$file_ext 		= strtolower(end($a)); unset($a);
					$file_size 		= $_FILES['myfile']['size'];		
					$path 			= "avatars";
					
					if (in_array($file_ext, $allowed_ext) === false) {
						$errors[] = 'Image file type not allowed';	
					}
					
					if ($file_size > 2097152) {
						$errors[] = 'File size must be under 2mb';
					}
					
				} else {
					$newpath = $user['image_location'];
				}

				if(empty($errors) === true) {
					
					if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name']) && $_POST['use_default'] != 'on') {
				
						$newpath = $general->file_newpath($path, $name);

						move_uploaded_file($tmp_name, $newpath);

					}else if(isset($_POST['use_default']) && $_POST['use_default'] === 'on'){
                        $newpath = 'avatars/default_avatar.png';
                    }
							
					$first_name 	= htmlentities(trim($_POST['first_name']));
					$last_name 		= htmlentities(trim($_POST['last_name']));
					$phone 			= htmlentities(trim($_POST['phone']));
					//$account 		= htmlentities(trim($_POST['account']));
					$address 		= htmlentities(trim($_POST['address']));
					$gender 		= htmlentities(trim($_POST['gender']));
					$blood			= htmlentities(trim($_POST['blood']));
					$bio 			= htmlentities(trim($_POST['bio']));
					$image_location	= htmlentities(trim($newpath));
					
					$users->update_user($first_name, $last_name, $phone, $account, $address, $gender, $blood, $bio, $image_location,$admin, $user_id);
					header('Location: settings.php?success');
					exit();
				
				} else if (empty($errors) === false) {
					echo "<div class='error'>" . implode("<div> <div class='error'>", $errors) . "</div>";	
				}	
            }
    		?>
         
    		<h2>Settings.</h2> <p><b>Note: Information you post here is made viewable to others.</b></p>
            <hr />

            <form class="customform" action="" method="post" enctype="multipart/form-data">
                <div id="profile_picture">
                 
               		<h3>Change Profile Picture</h3>
                    <ul>
                        
        				<?php
                        if(!empty ($user['image_location'])) {
                            $image = $user['image_location'];
                            echo "<img class='s-5 l-2 center' src='$image'>";
                        }
                        ?>
                        
                  
					<div class="btn1 s-8 1-6 center">
                        <input class="btn s-8 1-6 center" type="file" name="myfile" />
                    </div>
                        <?php if($image != 'avatars/default_avatar.png'){ ?>
	                        <h4>
	                            <input type="checkbox" name="use_default" id="use_default" /> <label for="use_default">Use default picture</label>
	                        </h4>
	                        <?php 
                        }
                        ?>
                    </ul>
                </div>
            
            	<div id="personal_info">
	            	<h3 >Change Profile Information </h3>
	                <table>
					<tr>
						<td>First name:</td>
						<td><input type="text" name="first_name" value="<?php if (isset($_POST['first_name']) ){echo htmlentities(strip_tags($_POST['first_name']));} else { echo $user['first_name']; }?>"></td>
					</tr>
					<tr>
						<td>Last name:</td>
						<td><input type="text" name="last_name" value="<?php if (isset($_POST['last_name']) ){echo htmlentities(strip_tags($_POST['last_name']));} else { echo $user['last_name']; }?>"></td>
					</tr>
					
					<tr>
						<td>Phone Number:</td>
						<td><input type="text" name="phone" value="<?php if (isset($_POST['phone']) ){echo htmlentities(strip_tags($_POST['phone']));} else { echo $user['phone']; }?>"></td>
					</tr>
					
					<tr>
						<td>Address:</td>
						<td><textarea id="address" name="address"><?php if (isset($_POST['address']) ){echo htmlentities(strip_tags($_POST['address']));} else { echo $user['address']; }?>
						 </textarea></td>
					</tr>
					<tr>
						<td>Gender:</td>
						<td><?php
						$gender = $user['gender'];
						$options 	= array("undisclosed", "Male", "Female");
						echo '<select name="gender">';
						foreach($options as $option){
							if($gender == $option){$sel = 'selected="selected"';
							}else{$sel='';}
							echo '<option '. $sel .'>' . $option . '</option>';
							}?>
							</select>
		
							</td>
							
						
						</select></td>
					</tr>
					<tr>
						<td>Blood Group:</td>
						<td><?php
							$blood 	= $user['blood'];
							$options 	= array("A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-");
							echo '<select name="blood">';
							foreach($options as $option){
								if($blood == $option){
									$sel = 'selected="selected"';
								}else{
									$sel='';
								}
								echo '<option '. $sel .'>' . $option . '</option>';
							}
						?>
						</select></td>
					</tr>
					<tr>
						<td>Bio:</td>
						<td><textarea id="bio" name="bio"><?php if (isset($_POST['bio']) ){echo htmlentities(strip_tags($_POST['bio']));} else { echo $user['bio']; }?></textarea></td>
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
    

	<?php include 'footer_pro.php'; ?>
	
<?php
}