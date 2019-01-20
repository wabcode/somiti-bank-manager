<?php
require 'core/init.php';
$general->logged_in_protect();
?>
<?php include 'header.php'; ?> 
		<section>
            <!-- FIRST BLOCK -->
            <div id="first-block">
               <div class="line">
                  <div class="margin-bottom">
                     <div class="margin">
                        <article class="s-12">
		<h1>Confirm password recover</h1>
		<?php
		if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
			?>	
			<h3>Thanks, please check your email to confirm your request for a password.</h3>
			<?php
		} else {
			?>
		    <h2>Recover Username / Password</h2>
		    <p>Enter your email below so we can confirm your request.</p>
		    <hr />
		    <?php
			if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
				if ($users->email_exists($_POST['email']) === true){
					$users->confirm_recover($_POST['email']);

					header('Location:confirm-recover.php?success');
					exit();
					
				} else {
					echo 'Sorry, that email doesn\'t exist.';
				}
			}
			?>
			<form class="customform" action="" method="post">
			<div class="line">
			<div class="margin">
			<div class="s-12 m-6 l-4 center">
			<ul>
				
					<input class="s-12 m-6 l-4 center" placeholder="Your e-mail" title="Your e-mail" type="text" required name="email">
				
				<input class=" center" type="submit" value="Recover">
			</ul>
			</div>
			</div>
			</div>
			</form>
			<?php	
		}
		?>
<?php include 'footer_pro.php'; ?>