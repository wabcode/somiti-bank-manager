<?php 
require 'core/init.php';
$general->logged_in_protect();

?>
<?php include 'header.php'; ?>

<section>
            <!-- FIRST BLOCK -->
            <div id="first-block">
               <div class="row">
                  <div class="margin-bottom">
                     <div class="well">
                        <article class="lg-12">
                           
		<h1>Activate your account</h1>

    	<?php
        
        if (isset($_GET['success']) === true && empty ($_GET['success']) === true) {
	        ?>
	        <h3>Thank you, we've activated your account. You're free to log in!</h3>
	        <?php
	            
        } else if (isset ($_GET['email'], $_GET['email_code']) === true) {
            
            $email		=trim($_GET['email']);
            $email_code	=trim($_GET['email_code']);	
            
            if ($users->email_exists($email) === false) {
                $errors[] = 'Sorry, we couldn\'t find that email address';
            } else if ($users->activate($email, $email_code) === false) {
                $errors[] = 'Sorry, we have failed to activate your account';
            }
            
			if(empty($errors) === false){
			
				echo '<p>' . implode('</p><p>', $errors) . '</p>';	
		
			} else {
                header('Location: ./');
                exit();
            }
        
        } else {
            header('Location: index.php');
            exit();
        }
        ?>
                        </article>
                     </div>
                  </div>
               </div>
            </div>
         </section>


<?php include 'footer.php'; ?>




<?php 
require 'core/init.php';
$general->logged_in_protect();

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<title>Activate</title>
</head>
<body>	
	<div id="container">
	

	</div>
</body>
</html>