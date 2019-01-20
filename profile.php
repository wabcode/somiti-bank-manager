<?php 
include 'core/init.php';
if(isset($_GET['username']) && empty($_GET['username']) === false) { // Putting everything in this if block.

 	$username   = htmlentities($_GET['username']); // sanitizing the user inputed data (in the Url)
	if ($users->user_exists($username) === false) { // If the user doesn't exist
		header('Location:index.php'); // redirect to index page. Alternatively you can show a message or 404 error
		die();
	}else{
		$profile_data 	= array();
		$user_id 		= $users->fetch_info('id', 'username', $username); // Getting the user's id from the username in the Url.
		$profile_data	= $users->userdata($user_id);
	} 
	?>
<?php include 'header.php'; ?>
			<section>
            <!-- FIRST BLOCK -->
            <div id="first-block">
               <div class="line">
                  <div class="margin-bottom">
                     <div class="margin">
                        <article class="s-12">

						<h1><?php echo $profile_data['username']; ?>'s Profile</h1>

						<div id="profile_picture">

							<?php 
								$image = $profile_data['image_location'];
								echo "<img class='s-5 l-4 center' src='$image'>";
							?>
						</div>
	    	<div id="personal_info">
	    		

	    		<?php if(!empty($profile_data['first_name']) || !empty($profile_data['last_name'])){?>

		    		<span><strong>Name</strong>: </span>
		    		<span><?php if(!empty($profile_data['first_name'])) echo $profile_data['first_name'], ' '; ?></span>
		    		<span><?php if(!empty($profile_data['last_name'])) echo $profile_data['last_name']; ?></span>

		    		<br>
					<?php }
					if(!empty($profile_data['phone'])){
		    		?>
		    		<span><strong>Phone Number</strong>: </span>
		    		<span><?php echo $profile_data['phone']; ?></span>
					<br>
					<?php }
					if(!empty($profile_data['account'])){
		    		?>
		    		<span><strong>Account Number</strong>: </span>
		    		<span><?php echo $profile_data['account']; ?></span>
					<br>
					<?php }
					if(!empty($profile_data['address'])){
		    		?>
		    		<span><strong>Address</strong>: </span>
		    		<span><?php echo $profile_data['address']; ?></span>
				
				<br>
				<?php 
	    		} 
	    		
	    		if($profile_data['gender'] != 'undisclosed'){
	    		?>
		    		<span><strong>Gender</strong>: </span>
		    		<span><?php echo $profile_data['gender']; ?></span>
		    
		    		<br>
				<?php 
	    		} 
	    		
	    		if(!empty($profile_data['blood'])){
	    		?>
		    		<span><strong>Blood Group</strong>: </span>
		    		<span><?php echo $profile_data['blood']; ?></span>
		    
		    		<br>
	    		<?php } 

	    		if(!empty($profile_data['bio'])){
		    		?>
		    		<span><strong>Bio</strong>: </span>
		    		<span><?php echo $profile_data['bio']; ?></span>
		    		<?php 
	    		}
	    		?>
				
				<table  class="tbl2" border="1" cellspacing="0" cellpadding="5">
					<tr>
						<th>Serial No</th>
						<th>Name</th>
						
						<th>Cash</th>
						<th>Date</th>
					
						
					</tr>
					<?php
					$i=0;
					
					$statement = $db->prepare("select * from bank where username like '$username' order by id DESC LIMIT 5");
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

			</tr>
	
			</table>
		
			</br>
	
				<table class="tbl2" border="1" cellspacing="0" cellpadding="5">
				<caption class="d-1"> <a href="profile_details.php?username=<?php echo $user['username'];?>">Details your all Payment</a></caption>
				<tr>
				<th> Total Cash of All Member TK. </th>
					<th>
						<?php

						$results = $db->prepare("SELECT sum(cash) FROM bank");
						$results->execute();
						for($i=0; $rows = $results->fetch(); $i++){
						echo $rows['sum(cash)'];
						}
						?>
					</th>
				</tr>
				</table>
				
	    	</div>
     
	     
<?php include 'footer_pro.php'; ?>
	<?php  
}