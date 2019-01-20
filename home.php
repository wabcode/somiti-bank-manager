<?php 
require 'core/init.php';
$general->logged_out_protect();

$username 	= htmlentities($user['username']); // storing the user's username after clearning for any html tags.

?>
<?php include 'header_1.php'; ?>
<section>
            <!-- FIRST BLOCK -->
            <div id="first-block">
               <div class="line">
                  <div class="margin-bottom">
                     <div class="margin">
                        <article class="s-12">
                           <h1>Welcome to our site!</h1>
							<h1>11 members shometi.</h1>
							
                        </article>
                     </div>
                  </div>
               </div>
            </div>
         </section>

<?php include 'footer.php'; ?>