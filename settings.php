<?php
error_reporting(0);
session_start();
 include_once 'include/class.user.php';
include_once 'include/class.member.php';

  $user = new User();
  $member = new Member();
  $users = $user->getvalue();
  $votes = $member->count_vote_profile();
  $count_given_votes_profile = $member->count_given_votes_profile();
  $count_comment = $member->count_comment_profile();
  $votes_profile = $member->votes_profile();
  $given_votes_profile = $member->given_votes_profile();
  $profile_view = $member->count_user_profile_view();
  $last_online = $user->last_online();
 
 $country = $user->getcountry();
 $user_id = $_SESSION['user_session'];

   if(isset($_POST['submit']))
{       
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $about = trim($_POST['about']);
        $kikuser = trim($_POST['kikuser']);
        $country = trim($_POST['country']);
        $city = trim($_POST['city']);
        $email = trim($_POST['email']);
        $gender = trim($_POST['gender']);
        $phone = trim($_POST['phone']);
        $other_accounts = trim($_POST['other_accounts']);
        $website = trim($_POST['website']);
        $file_name = trim($_POST['profile_img']);
         
        $myarray = array("fname"=>$fname,"lname"=>$lname,"about"=>$about,"kikuser"=>$kikuser,"country"=>$country,"city"=>$city,"email"=>$email,"gender"=>$gender,"phone"=>$phone,"other_accounts"=>$other_accounts,"website"=>$website,"profile_img"=>$file_name);
 
       try
      {
          
             if($user->update_profile($myarray))
            {
                 $sucess = 'Data Save Sucessfull';
                 $user->redirect('settings');
                 
                 
            }
      }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
 }
  
  
?>
<?php include 'part/header.php'; ?>	 			 
			<section>
				<div class="container">
 					<!-- RIGHT -->
					<div class="col-lg-9 col-md-9 col-sm-8 col-lg-push-3 col-md-push-3 col-sm-push-4 margin-bottom-80">

						<ul class="nav nav-tabs nav-top-border">
							<li class="active"><a href="#info" data-toggle="tab">Personal Info</a></li>
 						</ul>

						<div class="tab-content margin-top-20">

							<!-- PERSONAL INFO TAB -->
							<div class="tab-pane fade in active" id="info">
								<form role="form" action="#" method="post">
									<div class="form-group">
										<label class="control-label">First Name</label>
										<input type="text" name="fname" placeholder="Felicia" class="form-control" value="<?php echo $users['fname']; ?>">
									</div>
									<div class="form-group">
										<label class="control-label">Last Name</label>
										<input type="text" name="lname" placeholder="Doe" class="form-control" value="<?php echo $users['lname']; ?>">
									</div>
									<div class="form-group">
										<label class="control-label">Kik User</label>
										<input type="text" name="kikuser" placeholder="Kik User" value="<?php echo $users['kikuser']; ?>" class="form-control">
									</div>
									<div class="form-group">
										<label class="select margin-bottom-10 margin-top-20">Country</label>
										<select class="form-control input-lg" name="country">
                                                                                    <?php if($users['country'] != ''){ ?>
                                                                                     <option value="<?php echo $users['country']; ?>" selected="selected"><?php echo $users['country']; ?></option>
											<?php foreach ($country as $value) { ?>
                                                                                      <option value="<?php echo $value['counrty_name']; ?>" title="United Kingdom"><?php echo $value['counrty_name']; ?></option>
                                                                                          <?php } ?>
                                                                                     <?php }else{ ?>
                                                                                     <option value="<?php echo $users['country']; ?>">Select Country</option>
											<?php foreach ($country as $value) { ?>
                                                                                        <option value="<?php echo $value['counrty_name']; ?>" title="United Kingdom"><?php echo $value['counrty_name']; ?></option>
                                                                                          <?php } ?>
                                                                                     <?php } ?>
                                                                                      
										</select>
										<i></i>
									
									</div>
                                                                    <div class="form-group">
                                                                        <label class="select margin-bottom-10 margin-top-20">City</label>
                                                                        <input type="city" class="form-control fourm_custom" id="name" name="city" placeholder="City" value="<?php echo $users['city']; ?>">
                                                                    </div>
<!--                                                                    <div class="form-group">
										<label class="select margin-bottom-10 margin-top-20">Gender</label>
										<select class="form-control input-lg" name="gender">
                                                                                    <option value="<?php //echo $users['gender']; ?>">Select Gender</option>
                                                                                    <?php //if($users['gender'] == 1){ ?>
                                                                                   <option value="<?php //echo $users['gender']; ?>" selected="selected" title="Guy">Guy</option>
                                                                                   <option value="2" title="Girl">Girl</option>
                                                                                    <?php// }else{ ?>
                                                                                   <option value="1" title="Guy">Guy</option>
                                                                                   <option value="<?php// echo $users['gender']; ?>" selected="selected" title="Girl">Girl</option>
                                                                                    <?php //} ?>
                                                                                  </select>
										<i></i>
									
									</div>  -->
									<div class="form-group">
										<label class="control-label">Phone</label>
										<input type="text" name="phone" placeholder="Phone" value="<?php echo $users['phone']; ?>" class="form-control">
									</div>
                                                                    <div class="form-group">
										<label class="control-label">Email</label>
										<input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo $users['email']; ?>">
									</div>
									<div class="form-group">
										<label class="control-label">About</label>
										<textarea class="form-control" name="about" rows="3" placeholder="About Me..." value="<?php echo $users['about']; ?>"><?php echo $users['about']; ?></textarea>
									</div>
 
									<div class="margiv-top10">
                                                                            <input id="submit" name="submit" type="submit" value="Save Changes" class="btn btn-primary">
 										<a href="#" class="btn btn-default">Cancel </a>
									</div>
								</form>
							</div>
 
						</div>

					</div>
 					
					<!-- LEFT -->
	 <div class="col-lg-3 col-md-3 col-sm-4 col-lg-pull-9 col-md-pull-9 col-sm-pull-8">
					
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
                            <h4 class="size-13 margin-top-0 margin-bottom-5"> 
                              Hot Votes Received: <?php echo $votes['votes']; ?>
                            </h4>
                           <h4 class="size-13 margin-top-0 margin-bottom-5"> 
                              Total Views Your Profile: <?php echo $profile_view['view']; ?>
                           </h4>
                </div>
                    
             <div class="inline-search clearfix">
                 <?php if($user_id == ''){ ?>
		     <a href="#" data-toggle="modal" data-target="#myModal33" class="btn btn-featured btn-red">
                          <span>ASK KIK ID?</span>
                               <i class="et-megaphone"></i>
                     </a>
                 <?php }else{ ?>
                 <a href="#" class="btn btn-featured btn-red" data-toggle="modal" data-target="#myModal">
                          <span>ASK KIK ID?</span>
                            <i class="et-megaphone"></i>
                 </a>
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

                          <?php if($_SERVER['PHP_SELF'] == '/profile/'.$user_id){ ?>

                          <li class="list-group-item active"><a href="<?php echo $base_url ?>/profile/<?php echo $user_id; ?>"><i class="fa fa-eye"></i> PROFILE</a></li>

                         <?php }else { ?>

                         <li class="list-group-item"><a href="<?php echo $base_url ?>/profile/<?php echo $user_id; ?>"><i class="fa fa-eye"></i> PROFILE</a></li>

                         <?php } ?>

                         <?php if($_SERVER['PHP_SELF'] == '/profile_hotvotes'){ ?>

                         <li class="list-group-item active"><a href="<?php echo $base_url ?>/profile_hotvotes"><i class="fa fa-tasks"></i> HOT VOTES</a></li>

                         <?php } else{ ?>

                         <li class="list-group-item"><a href="<?php echo $base_url ?>/profile_hotvotes"><i class="fa fa-tasks"></i> HOT VOTES</a></li>

                         <?php }?>

                         <?php if($_SERVER['PHP_SELF'] == '/profile_share'){ ?>

                         <li class="list-group-item active"><a href="<?php echo $base_url ?>/profile_share"><i class="fa fa-gears"></i> SHARE</a></li>

                         <?php } else{ ?>

                         <li class="list-group-item"><a href="<?php echo $base_url ?>/profile_share"><i class="fa fa-gears"></i> SHARE</a></li>

                         <?php }?>

                          <?php if ($user_id != '' && $profileid == ''){ ?>

                          <?php if($_SERVER['PHP_SELF'] == '/settings'){ ?>

                         <li class="list-group-item active"><a href="<?php echo $base_url ?>/settings"><i class="fa fa-gears"></i> SETTINGS</a></li>

                          <?php } else{ ?>

                         <li class="list-group-item"><a href="<?php echo $base_url ?>/settings"><i class="fa fa-gears"></i> SETTINGS</a></li>

                         <?php } } ?>

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
              </div> 	<div class="modal-footer">
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

    </div>
</section>
 
 <script type="text/javascript">
            
        $('#vote').submit(function() {

                  var vote = '<?php echo $votes['votes']; ?>';
                       $.ajax({

                    url: 'vote.php', 

                    data: $('#vote').serialize(),

                    type: 'POST',

 
                    success: function(msg) {

 
                        if(msg=="success")

                        {
 
                                        var count = (parseInt(vote) + 1);

 
                                        $('.count').html(count);

                                        $(".changback").css("background-color", "yellow");

                        }
                         else
                         {
                                        $(".changback").css("background-color", "red");
                                        alert("Already Voted");
                         }
                     }
                 });
 
            return false;

        });
          </script>
  <?php include 'part/footer.php'; ?>

