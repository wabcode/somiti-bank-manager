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
                        <article class="s-12">
	
		<style type="text/css">

.form-container {
   border: 1px solid #f2e3d2;
   background: #c9b7a2;
   background: -webkit-gradient(linear, left top, left bottom, from(#f2e3d2), to(#c9b7a2));
   background: -webkit-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -moz-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -ms-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -o-linear-gradient(top, #f2e3d2, #c9b7a2);
   background-image: -ms-linear-gradient(top, #f2e3d2 0%, #c9b7a2 100%);
   -webkit-border-radius: 25px;
   -moz-border-radius: 25px;
   border-radius: 25px;
   -webkit-box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   -moz-box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   font-family: 'Helvetica Neue',Helvetica,sans-serif;
   text-decoration: none;
   vertical-align: middle;
   min-width:300px;
   padding:20px;
   width:350px;
   }
.form-field {
   border: 1px solid #c9b7a2;
   background: #e4d5c3;
   -webkit-border-radius: 5px;
   -moz-border-radius: 5px;
   border-radius: 5px;
   color: #c9b7a2;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 1px 1px;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 1px 1px;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 1px 1px;
   padding:8px;
   margin-bottom:20px;
   width:280px;
   }
.form-field:focus {
   background: #fff;
   color: #725129;
   }
.form-container h2 {
   text-shadow: #fdf2e4 0 1px 0;
   font-size:18px;
   margin: 0 0 10px 0;
   font-weight:bold;
   text-align:center;
    }
.form-title {
   margin-bottom:10px;
   color: #725129;
   text-shadow: #fdf2e4 0 1px 0;
   }
.submit-container {
   margin:8px 0;
   text-align:right;
   }
.submit-button {
   border: 1px solid #447314;
   background: #6aa436;
   background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
   background: -webkit-linear-gradient(top, #8dc059, #6aa436);
   background: -moz-linear-gradient(top, #8dc059, #6aa436);
   background: -ms-linear-gradient(top, #8dc059, #6aa436);
   background: -o-linear-gradient(top, #8dc059, #6aa436);
   background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
   -webkit-border-radius: 30px;
   -moz-border-radius: 30px;
   border-radius: 30px;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   text-shadow: #addc7e 0 1px 0;
   color: #31540c;
   font-family: helvetica, serif;
   padding: 8.5px 18px;
   font-size: 14px;
   text-decoration: none;
   vertical-align: middle;
   margin: auto;

   }
.submit-button:hover {
   border: 1px solid #447314;
   text-shadow: #31540c 0 1px 0;
   background: #6aa436;
   background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
   background: -webkit-linear-gradient(top, #8dc059, #6aa436);
   background: -moz-linear-gradient(top, #8dc059, #6aa436);
   background: -ms-linear-gradient(top, #8dc059, #6aa436);
   background: -o-linear-gradient(top, #8dc059, #6aa436);
   background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
   color: #fff;
   }
.submit-button:active {
   text-shadow: #31540c 0 1px 0;
   border: 1px solid #447314;
   background: #8dc059;
   background: -webkit-gradient(linear, left top, left bottom, from(#6aa436), to(#6aa436));
   background: -webkit-linear-gradient(top, #6aa436, #8dc059);
   background: -moz-linear-gradient(top, #6aa436, #8dc059);
   background: -ms-linear-gradient(top, #6aa436, #8dc059);
   background: -o-linear-gradient(top, #6aa436, #8dc059);
   background-image: -ms-linear-gradient(top, #6aa436 0%, #8dc059 100%);
   color: #fff;
   }

	
	</style>

      
    	<?php

        if(empty($_POST) === false) {
           
            if(empty($_POST['current_password']) || empty($_POST['password']) || empty($_POST['password_again'])){

                $errors[] = 'All fields are required';

            }else if($bcrypt->verify($_POST['current_password'], $user['password']) === true) {

                if (trim($_POST['password']) != trim($_POST['password_again'])) {
                    $errors[] = 'Your new passwords do not match';
                } else if (strlen($_POST['password']) < 6) { 
                    $errors[] = 'Your password must be at least 6 characters';
                } else if (strlen($_POST['password']) >18){
                    $errors[] = 'Your password cannot be more than 18 characters long';
                } 

            } else {
                $errors[] = 'Your current password is incorrect';
            }
        }

        if (isset($_GET['success']) === true && empty ($_GET['success']) === true ) {
    		echo '<p>Your password has been changed!</p>';
        } else {?>

            <h2>Change Password</h2>
            <hr />
            
            <?php
            if (empty($_POST) === false && empty($errors) === true) {
                $users->change_password($user['id'], $_POST['password']);
                header('Location: change-password.php?success');
            } else if (empty ($errors) === false) {
                    
                echo '<p>' . implode('</p><p>', $errors) . '</p>';  
            
            }
            ?>
		<form method="post" action="" class="form-container">
			<div class="form-title"><h2 class="tc-1">Change Your Password</h2></div>
			<div class="form-title">Current password:</div>
			<input class="form-field" type="password" name="current_password">
			<div class="form-title">New password:</div>
			<input class="form-field" type="password" name="password" />
			<div class="form-title">New password again:</div>
			<input class="form-field" type="password" name="password_again" />
			<br>
			<button class="submit-button" type="submit" value="Change password" >Password Change</button>

			</form>
    	<?php 
        }
        ?> 
<?php include 'footer_pro.php'; ?>