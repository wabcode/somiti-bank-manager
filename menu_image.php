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


						<div id="profile_picture" class="center" style="width: 45px; height: 45px; color: yellow;">

							<?php 
								$image = $profile_data['image_location'];
								echo "<img class='center menu_image' style='width: 40px; height: 40px; border-radius: 30px; padding: 0 7px;' src='$image'>"; echo"</br>";
								 echo $profile_data['username'];
							?>
						</div>

	<?php  
}else{
	echo "<img class='s-5 l-12 center'src='img/logo.png'>"; // redirect to index if there is no username in the Url
}