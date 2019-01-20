<?php 
include_once 'core/init.php';
$general->logged_out_protect();
?>

                        
		<?php
	    if (isset($_GET['success']) && empty($_GET['success'])) {
	                
	    } else{

            if(empty($_POST) === false) {		
			if(empty($errors) === true) {				
					$LastLogin 	= htmlentities(trim($_POST['LastLogin']));

					
					$users->update_LastLogin($LastLogin, $user_id);
					
					exit();
				
				} else if (empty($errors) === false) {
					echo "<div class='error'>" . implode("<div> <div class='error'>", $errors) . "</div>";	
				}	
            }
    		?>
			
			
			
			
			
			
         
<body>

            <form class="customform" action="" method="post" enctype="multipart/form-data">

            



					<input type="text" name="LastLogin" value="<?php date_default_timezone_set("Asia/Dhaka");
    echo date('F j, Y, g:i a');?>">
				
					

                                   <input type="submit" value="Update">
               
            </form>
               
</body>
	
<?php
}