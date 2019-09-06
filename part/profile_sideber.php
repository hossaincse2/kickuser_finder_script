<div class="col-lg-3 col-md-3 col-sm-4">
			<div class="thumbnail text-center">
                     <?php if($users['kik_img'] == ''){ ?>
                      <img src="<?php echo $base_url ?>/img/noimage.jpg" alt=""/>
				<?php }else{ ?>
                        <img src="<?php echo $users['kik_img']; ?>" style="width: 460px; height: 230px;" alt="" />
                         <?php } ?>
								 <h2 class="size-18 margin-top-10 margin-bottom-0"><?php echo $users['username']; ?></h2>
								 <h3 class="size-13 margin-top-10 margin-bottom-0"> 
								   <p class="position_img"> 
									<?php if($users['gender']=='1'){ ?>
									<img src='<?php echo $base_url ?>/img/guy.png' style="height: 17px; width:25px;"/> Guy &nbsp;&nbsp;&nbsp;
										<?php }else{ ?>
									<img src='<?php echo $base_url ?>/img/venus.png' style="height: 15px; width:15px;"/> Girl &nbsp;&nbsp;
									   <?php } ?>
								   <i class="fa fa-map-marker" style="color: red"></i> <?php if($users['city'] != ''){ ?> <?php echo $users['city'] ?>, <?php } ?> <?php echo $users['country'] ?>  
								   </h3>
									<h4 class="size-13 margin-top-0 margin-bottom-5">
										<?php if($user_id == ''){ ?>
									<a href="#" data-toggle="modal" data-target="#myModal34" class="fa a btn btn-primary changback  vote_buton" name="vote" type="submit"><i class="fa fa-heart-o"></i> <span style="font-size: 21px; font-weight: 900">+</span>1</a>
									<?php }else{ ?>
									<form class="margin-top-4" role="form" method="post" id="vote" action="">
									   <input type="hidden" name="user_id" id="userid" value="<?php echo $user_id; ?>" />
									   <input type="hidden" name="profileid" value="<?php echo $profileid; ?>" /> 
									   <button class="fa a btn btn-primary changback  vote_buton" name="vote" type="submit"><i class="fa fa-heart-o"></i> <span style="font-size: 21px; font-weight: 900">+</span>1</button>
									 </form>
									 <?php } ?>
									</h4>
					    <h4 class="size-13 margin-top-0 margin-bottom-5">Hot Votes Received: <?php echo $votes['votes']; ?></h4>
					    <h4 class="size-13 margin-top-0 margin-bottom-5">Profile View : <?php echo $profile_view['view']; ?></h4>
			</div>
                        <div class="inline-search clearfix">
                             <?php if($user_id == ''){ ?>
                                             <a href="#" data-toggle="modal" data-target="#myModal33" class="btn btn-featured btn-red"><span>ASK KIK ID?</span> <i class="et-megaphone"></i></a>
                             <?php }else{ ?>
                             <a href="#" class="btn btn-featured btn-red" data-toggle="modal" data-target="#myModal"><span>ASK KIK ID?</span><i class="et-megaphone"></i></a>
                             <?php } ?>
                        </div>
			<div class="margin-top-30 margin-bottom-30">
					 <?php if($user_id == ''){ ?>
					 <span><img src="<?php echo $base_url ?>/img/icon.png"> <a href="" data-toggle="modal" data-target=".bs-example-modal-sm" class="size-11"> Report This User as Fake</a> </span>
					 <?php }else if($profileid != ''){ ?>
					 <span><img src="<?php echo $base_url ?>/img/icon.png"> <a href="" class="size-11" data-toggle="modal" data-target=".bs-example-modal-sm2"> Report This User as Fake</a> </span>
					 <?php }else{ ?>
					 
					 <?php } ?>
                        </div>
                       <!-- SIDE NAV -->
			<ul class="side-nav list-group margin-bottom-60" id="sidebar-nav">
					<?php if($_SERVER['PHP_SELF'] == '/index_profile.php'){ ?>
                          <li class="list-group-item active"><a href="<?php echo $base_url ?>/user/profile/<?php echo $users['username']; ?>"><i class="fa fa-eye"></i> PROFILE</a></li>
					<?php }else { ?>
					<li class="list-group-item"><a href="<?php echo $base_url ?>/user/profile/<?php echo $users['username']; ?>"><i class="fa fa-eye"></i> PROFILE</a></li>
                          <?php } ?>
					<?php if($_SERVER['PHP_SELF'] == '/hotvotes'){ ?>
				    <li class="list-group-item active"><a href="<?php echo $base_url ?>/hotvotes?id=<?php echo $users['username']; ?>"><i class="fa fa-tasks"></i> HOT VOTES</a></li>
				    <?php } else{ ?>
				    <li class="list-group-item"><a href="<?php echo $base_url ?>/hotvotes?id=<?php echo $users['username']; ?>"><i class="fa fa-tasks"></i> HOT VOTES</a></li>
				    <?php }?>
				    <?php if($_SERVER['PHP_SELF'] == '/share'){ ?>
				    <li class="list-group-item active"><a href="<?php echo $base_url ?>/share?id=<?php echo $users['username']; ?>"><i class="fa fa-gears"></i> SHARE</a></li>
				    <?php } else{ ?>
				    <li class="list-group-item"><a href="<?php echo $base_url ?>/share?id=<?php echo $users['username']; ?>"><i class="fa fa-gears"></i> SHARE</a></li>
				    <?php }?>
			</ul>
                <div class="modal bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
 					<!-- header modal -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="mySmallModalLabel">Report This User as Fake</h4>
					</div>
 					<!-- body modal -->
					<div class="modal-body">
					   <form method="post" action="">
							   <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
							   <input type="hidden" name="report_id" value="<?php echo $profileid; ?>">
							   <div class="form-group">
								 <textarea class="form-control" name="report" id="message-text"></textarea>
							  </div>
							 <button type="submit" name="reportsubmit" class="btn btn-primary text-right">Submit</button>
						 </form>
					</div>
 				</div>
			</div>
                    </div>           
                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Kik UserName</h4>
						</div>
 						<!-- Modal Body -->
						<div class="modal-body">
							<form method="post" action="">
 								   <div class="form-group">
									   <input class="form-control" name="report" value="<?php echo $users['kikuser'] ?>" id="message-text" />
								  </div>
								   <p>
									   Copy and paste <?php echo $profile['kikuser'] ?> Kik username or go directly to their <a target="_blank" href="http://kik.me/u/<?php echo $users['kikuser'] ?>">Kik online profile</a>.
								   </p>
							 </form>
						</div> 	
						<div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
 					</div>
				</div>
                    </div>
                    <div id="myModal33" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                    <div class="modal-content">
                                                                    <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Ask For Kik Username Login Please</h4>
                                                            </div>
                                                                    <!-- Modal Body -->
                                                    <div class="modal-body">
                                                            <div class="row">
                                                                    <div class="col-md-6 col-sm-6">
                                                                            <a class="btn btn-primary btn-lg btn-block" style="color:white" href="<?php echo $base_url ?>/login.php">Login</a>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-6">
                                                                            <a class="btn btn-success btn-lg btn-block" style="color:white" href="<?php echo $base_url ?>/registration.php">Create Account</a>
                                                                    </div>
                                                            </div>
                                              </div>
                                            <!-- Modal Footer -->
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                </div>
                       </div>
                    </div>
    <div id="myModal34" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
 			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Ask For Kik Username Login Please</h4>
			</div>
 			<!-- Modal Body -->
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<a class="btn btn-primary btn-lg btn-block" style="color:white" href="<?php echo $base_url ?>/login.php">Login</a>
					</div>
					<div class="col-md-6 col-sm-6">
						<a class="btn btn-success btn-lg btn-block" style="color:white" href="<?php echo $base_url ?>/registration.php">Create Account</a>
					</div>
				</div>
			</div>
 			<!-- Modal Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
 			</div>
		</div>
	</div>
 	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<!-- header modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="mySmallModalLabel">Report This User Please Login</h4>
				</div>
 				<!-- body modal -->
				 <div class="modal-body">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<a class="btn btn-primary btn-lg btn-block" style="color:white" href="login.php">Login</a>
						</div>
						<div class="col-md-6 col-sm-6">
							<a class="btn btn-success btn-lg btn-block" style="color:white; font-size: 12px;" href="registration.php">Create Account</a>
						</div>
					 </div>
				</div>
			</div>
		</div>
	</div>
</div>
          <script type="text/javascript">
                var baseurl = '<?php echo $base_url ?>';
         $('#vote').submit(function() {
                   var vote = '<?php echo $votes['votes']; ?>';
                  $.ajax({
                     url: baseurl + '/vote.php', 
                     data: $('#vote').serialize(),
                     type: 'POST',
                     success: function(msg) {
                         if(msg=="success")
                         {
							 var count = (parseInt(vote) + 1);
							 $('.count').html(count);
							 $(".changback").css("background-color", "yellow");
                         } else {
							$(".changback").css("background-color", "red");
							alert("Already Voted");
                         }
                     }
                 });
             return false;
         });
          </script>