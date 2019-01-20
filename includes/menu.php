
			<nav>
               <div class="line">
                  <div style="border: 0; height: 67px;" class="s-3 m-2 1-2">

				  							<?php 

							if($general->logged_in()){?>
								<div style="border: 0; height: 67px;"> 
								<iframe src="menu_image.php?username=<?php echo $user['username'];?>" style="border: 0; width: 100%; height: 100%" class=" center" frameborder="0" scrolling="no" align="center"> </iframe>
								</div>
							<?php
							}else{?>
								<img class="s-5 l-12 center"src="img/logo.png">
							<?php
							}
							?>
				  
                     
                  </div>
                  <div class="top-nav s-12 l-9 right">
                     <p class="nav-text">All Useful Menu</p>
                     <ul class="right">
                        <li><a href="index.php">Home</a></li>
							<?php 

							if($general->logged_in()){?>
								<li><a href="members.php">Members</a></li>
								<li><a href="profile.php?username=<?php echo $user['username'];?>">Profile</a></li>
								<li><a href="settings.php">Settings</a></li>
								<li><a href="change-password.php">Change password</a></li>
								<li><a href="logout.php">Log out</a></li>
							
							<?php
							
							$admin = "ad";
							if(($user['admin'])==$admin){?>
							<li><a href="bank/index.php">admin dashboard</a></li>	
							<?php
							}}else{?>
								<li><a href="register.php">Register</a></li>
								<li><a href="login.php">Login</a></li>
							<?php
							}
							?>
							
                     </ul>
                  </div>
               </div>
            </nav>