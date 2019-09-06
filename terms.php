<?php
error_reporting(0);
session_start();
include_once 'include/class.user.php';
include_once 'include/class.member.php';
  $user = new User();
  $member = new Member();
  $users = $user->getvalue();
   $usersprofile = $user->get_all_user();
  $country = $user->getcountry();
  
  $user_id = $_SESSION['user_session'];
  
?>
<?php include 'part/header.php'; ?>	 
			<section class="page-header">
				 
			</section>
			<!-- /PAGE HEADER -->
 
			<!-- -->
			<!-- -->
 			 
 
			<section>
  
 				<div class="container">
                        <h3>Terms and Conditions</h3>
                                    <p>
                                         iquam fringilla, sapien eget scelerisque placerat, lorem libero cursus lorem, sed sodales lorem libero eu sapien. Nunc mattis feugiat justo vel faucibus. Nulla consequat feugiat malesuada. Ut justo nulla, facilisis vel molestie id, dictum ut arcu. Nunc ipsum nulla, eleifend non blandit quis, luctus quis orci. Cras blandit turpis mattis nulla ultrices interdum. Mauris pretium pretium dictum. Nunc commodo, felis sed dictum bibendum, risus justo iaculis dui, nec euismod orci sem eget neque. Donec in metus metus, vitae eleifend lorem. Ut vestibulum gravida venenatis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque suscipit tincidunt magna non mollis. Fusce tempus tincidunt nisi, in luctus elit pellentesque quis. Sed velit mi, ullamcorper ut tempor ut, mattis eu lacus. Morbi rhoncus aliquet tellus, id accumsan enim sollicitudin vitae.
                                    </p> 
					
				</div>
			</section>
 
			 
			<!-- / -->
<?php include 'part/footer.php'; ?>

