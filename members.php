<?php 
require 'core/init.php';
$general->logged_out_protect();
$members 		=$users->get_users();
$member_count 	= count($members);
?>
<?php include 'header.php'; ?>
	
	<section>
            <!-- FIRST BLOCK -->
            <div id="first-block">
               <div class="line">
                  <div class="margin-bottom">
                     <div class="margin">
                        <article class="s-12">
			
			
					<h1>Our members</h1>
		<p>We have a total of <strong><?php echo $member_count; ?></strong> registered users. </p>

		
			
				
					
					<?php 

					foreach ($members as $member) {
						$username = htmlentities($member['username']);
						$image = htmlentities($member['image_location']);
						$name_1 = htmlentities($member['first_name']);
						$name_2 = htmlentities($member['last_name']);
						$phone = htmlentities($member['phone']);
						$blood = htmlentities($member['blood']);
						?>
						
							
								
									
									<div class="s-12 l-4 margin-bottom">
										<div id="box profile_picture_m">
											<?php echo "<img  class='s-5 l-12 center' src='$image'>"; ?>
										</div>
										<div class=" class="s-5 l-12 center">
											<a href="member_profile.php?username=<?php echo $username; ?>"><?php echo $username?></a>
										
										
											</br>
											<span><strong>Name</strong>: </span>
											<span><?php echo $name_1; ?></span>
											<span><?php echo $name_2; ?></span>
											</br>
											<span><strong>Phone No.:</strong> </span>
											<span><?php echo $phone; ?></span>
											</br>
											<span><strong>Blood Group:</strong> </span>
											<span><?php echo $blood; ?></span>
											<p>joined: <?php echo date('F j, Y', $member['time']) ?></p>
										</div>
									</div>
							
							
						
						<?php
					}

					?>


	
	<?php include 'footer_pro.php'; ?>