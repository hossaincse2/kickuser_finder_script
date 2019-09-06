<?php
error_reporting(0);
 session_start();
  include_once 'include/class.user.php';
  include_once 'include/class.member.php';
  $user = new User();
  $member = new Member();
  $users1 = $user->getvalue();
  $users = $user->get_all_user_profile();
  $profile_view = $member->count_profile_view();
  $comments = $user->getvalue_userprofile_comments();
  $reply = $user->getvalue_reply_comments();
  $votes = $member->count_vote();
  $count_comment = $member->count_comment();
  $count_given_votes_user_profile = $member->count_given_votes_user_profile();
  $votes_profile = $member->votes_user_profile();
  $username = $user->profile_username();
  $given_votes_profile = $member->given_votes_user_profile();
  $last_online = $user->last_online_users();
   
  $user_id = $_SESSION['user_session'];
  
 
    ?>
<?php include 'part/header.php'; ?>	 
		<section>
			<div class="container">
					<!-- LEFT -->
					<?php include 'part/profile_sideber.php'; ?>
  					<!-- RIGHT -->
					<div class="col-lg-9 col-md-9 col-sm-8">
						<div class="box-icon box-icon-center box-icon-round box-icon-large text-center nomargin">
							<div class="back">
								<div class="box2 noradius">
									<h4>About Me</h4>
									<hr />
									<?php if($users['about'] != ''){ ?>
									<p><?php echo $users['about']; ?></p>
                                                                        <?php }else{ ?>
                                                                        <p>There is no Content About him.</p>
                                                                        <?php } ?>	
							
																															 <label>Last Online :   <?php
															 $timestamp = $last_online['date'];                    
																$datetime1=new DateTime("now");
															$datetime2=date_create($timestamp);
															$diff=date_diff($datetime1, $datetime2);
															$timemsg='';
															if($diff->y > 0){
																$timemsg = $diff->y .' year'. ($diff->y > 1?"'s":'');

															}
															else if($diff->m > 0){
															 $timemsg = $diff->m . ' month'. ($diff->m > 1?"'s":'');
															}
															else if($diff->d > 0){
															 $timemsg = $diff->d .' day'. ($diff->d > 1?"'s":'');
															}
															else if($diff->h > 0){
															 $timemsg = $diff->h .' hour'.($diff->h > 1 ? "'s":'');
															}
															else if($diff->i > 0){
															 $timemsg = $diff->i .' minute'. ($diff->i > 1?"'s":'');
															}
															else if($diff->s > 0){
															 $timemsg = $diff->s .' second'. ($diff->s > 1?"'s":'');
															}                        
																   echo  $timemsg = $timemsg.' ago';   ?></li>
								</div>
							</div>
						</div>
						<div class="box-light"><!-- .box-light OR .box-dark -->
								<div class="box-inner">
										<div class="shout-comment">
												<h4>Share <b><?php echo $users['username']; ?></b>'s profile on</h4><br>
												<p></p>
												<div class="row">
													<div class="col-sm-4 col-md-4 col-lg-4"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//kikusernames.com/user/<?php echo $users['kikuser']; ?>" class="btn btn-primary social_style fb-btn btn-block"><i class="fa fa-facebook-square"></i> Facebook</a></div>
													<div class="col-sm-4 col-md-4 col-lg-4"><a target="_blank" href="https://twitter.com/home?status=shakira0616's%20profile%20on%20kik%20usernames!%20http%3A//kikusernames.com/user/<?php echo $users['kikuser']; ?>" class="btn btn-success social_style btn-block"><i class="fa fa-twitter"></i> Twitter</a></div>
													<div class="col-sm-4 col-md-4 col-lg-4"><a target="_blank" href="https://plus.google.com/share?url=http%3A//kikusernames.com/user/<?php echo $users['kikuser']; ?>" class="btn btn-danger social_style btn-block"><i class="fa fa-google-plus"></i> Google Plus</a></div>
												</div>
												<p></p>
									   </div> 
								</div>
						</div>




				</div>

			</div>
	</section>
<?php include 'part/footer.php'; ?>

