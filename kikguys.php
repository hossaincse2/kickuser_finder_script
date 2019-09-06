<?php
error_reporting(0);
session_start();
include_once 'include/class.user.php';
include_once 'include/class.member.php';
  $user = new User();
  $member = new Member();
  $users = $user->getvalue();
  $usersprofile = $member->get_girl_member();
  $allmember = $member->count_all_member();
  $guy = $member->count_guy_member();
  $girl = $member->count_girl_member();
  $recent = $member->count_recent_member();
  $hotest_girl = $member->get_hotest_girl();
  $get_girl_top5 = $member->get_girl_top5();
  $get_guys_top5 = $member->get_guys_top5();
 // print_r($hotest_girls);  die();
  $user_id = $_SESSION['user_session'];
?>
<?php include 'part/header.php'; ?>		
<section class="page-header"></section>
<section class="padding-10 alternate">
    <div class="container"><h2>Kik User</h2></div>
</section>
 	<section>
		<div class="container">
 			<div class="text-left">
				<ul class="nav nav-tabs nav-bottom-border">
		        	<li class="active"><a href="#home" data-toggle="tab">All Kik Guys</a></li>
		          	<li><a href="#menu1" data-toggle="tab">Hottest Guys</a></li>
		            <li><a href="#menu2" data-toggle="tab">Recent Guys</a></li>
               </ul>
 		</div>
 					<div class="divider divider-dotted"><!-- divider --></div>
					<div class="row">
                           <div class="col-md-9 col-sm-9">
  								<div class="mix-grid">
 									 <div class="tab-content">
										      <!-- All Member -->
										    <div id="home" class="tab-pane fade in active">
												 <!-- this will hold all the data -->
												<div id="results2"></div>
												<!-- loading image -->
												<div class="loader_image" class="load_buton2"><img src="<?php echo $base_url ?>/img/LoaderIcon.gif" alt="" width="24" height="24">Loading...please wait</div>
												<!-- for message if data is avaiable or not -->
												<div class="loader_message2"></div>
												<br/>
										    </div>
										       <!-- Hotest Guy -->
										    <div id="menu1" class="tab-pane fade">
												 <div id="results5"></div>
												<!-- loading image -->
												<div class="loader_image" class="load_buton2"><img src="<?php echo $base_url ?>/img/LoaderIcon.gif" alt="" width="24" height="24">Loading...please wait</div>
												<!-- for message if data is avaiable or not -->
												<div class="loader_message5"></div>
												         <br/>
											 </div>
										       <!-- Hotest Girl -->
										    <div id="menu2" class="tab-pane fade">
													   <div id="results9"></div>
													<!-- loading image -->
													<div class="loader_image" class="load_buton2"><img src="<?php echo $base_url ?>/img/LoaderIcon.gif" alt="" width="24" height="24">Loading...please wait</div>
													<!-- for message if data is avaiable or not -->
													<div class="loader_message9"></div>
													<br/>
					 </div>
    			 </div>
                    </div>
 
		</div>
          <!-- RIGHT -->
<?php include 'part/rightsideber.php'; ?>
 		</div>
  	</div>
</section>
			<!-- / -->
<script type="text/javascript" src="<?php echo $base_url ?>/assets/js/index.js"></script>      
<?php include 'part/footer.php'; ?>

