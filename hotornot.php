<?php
 error_reporting(0);
 session_start();
 $_SESSION['url'] = $_SERVER['REQUEST_URI'];
   include_once 'include/class.user.php';
  include_once 'include/class.member.php';
   $user = new User();
  $member = new Member();
   $users = $user->getvalue();
   $usersprofile = $user->get_all_random_user();
  $get_hotest_allmemberstop = $member->get_hotest_allmemberstop5();
  $votes_profile = $member->votes_user_profile();
   $user_gender = $_SESSION['user_gender'];
   $user_id = $_SESSION['user_session'];
   if (isset($_POST['submithot'])){
        $userid = $_POST['user_id']; 
        $profileid = trim($_POST['profileid']);        
        $myarray = array("user_id"=>$userid,"profileid"=>$profileid);
        
         $stmt = $member->_dbh->prepare("SELECT user_id,profileid FROM vote WHERE user_id=:userid and profileid=:profileid");
         $stmt->execute(array(':userid'=>$userid,':profileid'=>$profileid));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
         
     
         if($row['user_id']==$userid && $row['profileid']==$profileid) {
           $user_id = $_SESSION['user_session'];
        $stmt = $member->_dbh->prepare("Select * from users where `username` not in( Select profileid from vote where user_id='$user_id') and gender != '$user_gender' and kik_img  != '' order by rand() limit 1");
        $stmt->execute(array(":user_id" => $user_id));
        $random = $stmt->fetchAll(PDO::FETCH_ASSOC);
         }
          else
         {
             if($member->vote_count($myarray)) 
            {
                 
        $user_id = $_SESSION['user_session'];
        $stmt = $member->_dbh->prepare("Select * from users where `username` not in( Select profileid from vote where user_id='$user_id') and gender != '$user_gender' and kik_img  != '' order by rand() limit 1");
        $stmt->execute(array(":user_id" => $user_id));
        $random = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
             }
         }
  }

  if (isset($_GET['q'])){
        $user->logout();
       header("location:index.php");
   }
                
      
   ?>
<?php include 'part/header.php'; ?>	 

			
		<section class="hotornot">
		
			<div class="container zindex">
				<!-- LEFT -->
				<div class="col-lg-5 col-md-5 col-sm-7 col-xs-12">
					
					<div class="box-static box-border-top box-dark padding-30">

						<div class="box-title margin-bottom-30 hot_leader_box_title text-center">
							<h2 class="size-25"><i class="fa fa-trophy"></i>&nbsp;Top 5 Leader Board</h2>
						</div>
						
						<?php foreach ($get_hotest_allmemberstop as $value) { ?>  
								<div class="row margin-bottom-20"><!-- post -->
									<div class="col-md-3 col-sm-3 col-xs-3">
										<a href="user/profile/<?php echo $value['username']; ?>">
										 <?php if($value['kik_img']!=''){ ?><img class="img-circle width-75" src="<?php echo $value['kik_img'] ?>"/><?php }else { ?><img width="50" src="img/noimage.jpg"/> <?php } ?>
										</a>
									</div>
									<div class="col-md-5 col-sm-5 margin-top-5 margin-left-10 col-xs-5">
										<a href="user/profile/<?php echo $value['username']; ?>"><h4><?php echo $value['username']; ?></h4></a>
										<div> 
											<span class="user-meta"><?php if($value['gender']=='1'){ ?>
												<img src='img/guy.png' style="height: 17px; width:25px;"/> Guy &nbsp;&nbsp;&nbsp;
												<?php }else{ ?>
												&nbsp;<img src='img/venus.png' style="height: 17px; width:13px;"/>  Girl &nbsp;&nbsp;&nbsp;
												<?php } ?>
											</span>
											<span class="user-meta"><i class="fa fa-fire"></i>&nbsp;&nbsp;<?php echo $value['votecount']; ?>
											</span>
										</div>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-3 margin-top-18">
										<a href="user/profile/<?php echo $value['username']; ?>" class="btn btn-hot-not" role="button">View Profile</a>
									</div>
								</div>
							<?php  }   ?>
					</div>
					
				</div>


				<!-- RIGHT -->
				<div class="col-lg-7 col-md-7 col-sm-5 col-xs-12 margin-top-80">

							<div class="text-center">
							
								<?php if($user_id != ''){ ?>
								<!-- item -->
								<?php if($random[0]['username'] == ''){ ?>
								<?php if($usersprofile[0]['username'] == ''){ ?>
								<span>Sorry !! No More User Found </span>
								<?php }else{ ?>
								<?php foreach ($usersprofile as $profile){ ?>
								<div class="custom_style row">
									<div class="col-md-12">
									<?php if($profile['kik_img']!=''){ ?><img width="200px" height="auto" src="<?php echo $profile['kik_img']; ?>"  class="center-block img-circle "/><?php }else { ?><img width="225px" height="auto" src="img/noimage.jpg"  class="center-block img-circle img-thumbnail img-responsive"/> <?php } ?>
									</div>
									<div class="col-md-12">
									<h2><a class="girl-color username" href="user/profile/<?php echo $profile['username']; ?>"><?php echo $profile['username']; ?></a></h2>
									</div>
									<div class="hon-buttons-signup col-md-12">
										<!--<a class="">-->
											<div class="col-md-3 col-md-offset-2">
											<form role="form" method="post" class="vote" action="">
												<input type="hidden" name="user_id" class="userid" value="<?php echo $user_id; ?>" />
												<input type="hidden" name="profileid" class="profileid username" value="<?php echo $profile['username']; ?>" />  
												<!--   <input class="fa fa-heart-o btn badge-success" name="vote" type="submit" value="+1"/>-->
												<button class="submit_in"   name="submithot"   data-attr="<?php echo $profile['username']; ?>">HOT</button>
												<!-- <span style="font-size: 21px; font-weight: 900">+</span>1 -->
										   </form>
										   </div>
											<div class="col-md-3 col-md-offset-1">
											<form role="form" method="post" class="vote" action="">
												<input type="hidden" name="user_id" class="userid" value="<?php echo $user_id; ?>" />
												<!-- <input type="hidden" name="profileid" class="profileid" value="<?php echo $profile['id']; ?>" /> -->
												<!-- <input class="fa fa-heart-o btn badge-success" name="vote" type="submit" value="+1"/>-->
												<button class="submit_not"   name="profileid"  data-attr="<?php echo $profile['username']; ?>">NOT</button>
												<!-- <span style="font-size: 21px; font-weight: 900">+</span>1 -->
										   </form>
										   </div>
										<!--</a>-->
									</div>
									<p class="swipe-left"><b class="message"></b></p>
								</div>
								
								<?php } } }else{ ?> 
								<?php foreach ($random as $profile){ ?>
								<div class="custom_style row">
									<div class="col-md-12">
									<?php if($profile['kik_img']!=''){ ?><img width="200px" height="auto" src="<?php echo $profile['kik_img']; ?>"  class="center-block img-circle "/><?php }else { ?><img width="225px" height="auto" src="img/noimage.jpg"  class="center-block img-circle img-thumbnail img-responsive"/> <?php } ?>
									</div>
									<div class="col-md-12">
									<h2><a class="girl-color username" href="user/profile/<?php echo $profile['username']; ?>"><?php echo $profile['username']; ?></a></h2>
									</div>
									<div class="hon-buttons-signup col-md-12">
										<!--<a class="">-->
											<div class="col-md-3 col-md-offset-2">
											<form role="form" method="post" class="vote" action="">
												<input type="hidden" name="user_id" class="userid" value="<?php echo $user_id; ?>" />
												<input type="hidden" name="profileid" class="profileid username" value="<?php echo $profile['username']; ?>" />  
												<!--   <input class="fa fa-heart-o btn badge-success" name="vote" type="submit" value="+1"/>-->
												<button class="submit_in"   name="submithot"   data-attr="<?php echo $profile['username']; ?>">HOT</button>
												<!-- <span style="font-size: 21px; font-weight: 900">+</span>1 -->
										   </form>
										   </div>
											<div class="col-md-3 col-md-offset-1">
											<form role="form" method="post" class="vote" action="">
												<input type="hidden" name="user_id" class="userid" value="<?php echo $user_id; ?>" />
												<!-- <input type="hidden" name="profileid" class="profileid" value="<?php echo $profile['id']; ?>" /> -->
												<!-- <input class="fa fa-heart-o btn badge-success" name="vote" type="submit" value="+1"/>-->
												<button class="submit_not"   name="profileid"  data-attr="<?php echo $profile['username']; ?>">NOT</button>
												<!-- <span style="font-size: 21px; font-weight: 900">+</span>1 -->
										   </form>
										   </div>
										<!--</a>-->
									</div>
									<p class="swipe-left"><b class="message"></b></p>
								</div>
								
								<?php } } ?>
								<?php }else{ ?> 
								<?php foreach ($usersprofile as $profile){ ?>
								<div class="">
									<?php if($profile['kik_img']!=''){ ?><img width="225px" height="auto" src="<?php echo $profile['kik_img']; ?>"  class="center-block img-circle img-responsive"/><?php }else { ?><img width="225px" height="auto" src="img/noimage.jpg"  class="center-block img-circle img-thumbnail img-responsive"/> <?php } ?>
									<h2 class="margin-top-20 pro_title"><a href="user/profile/<?php echo $profile['username']; ?>"><?php echo $profile['username']; ?></a></h2>
									<div class="hon-buttons-signup">
										<a href="login" class="btn btn-hot-not btn-lg">
											Create Account To Vote
										</a>
									</div>
									<p class="swipe-left"><b class="message"></b></p>
								</div>
								<?php } ?>
								<?php } ?> 

							</div>

				</div>
				
			</div>

		</section>
		
<script type="text/javascript">
        
        $(document).ready(function() {
 
                     var $carousel = $('#myCarousel');
					$("button").click(function() {
					  currentIndex = $('div.active').index();
					  var ActiveElement = $carousel.find('.item.active');
					  ActiveElement.remove();
					  var NextElement = $carousel.find('.item').first();
					  NextElement.addClass('active');
					});
                    
		});
		 
</script>
<?php include 'part/footer.php'; ?>

