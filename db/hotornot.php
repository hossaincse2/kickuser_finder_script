<?php
 error_reporting(0);
 session_start();
 $_SESSION['url'] = $_SERVER['REQUEST_URI'];

  include_once 'include/class.user.php';
  include_once 'include/class.member.php';
 
  $user = new User();
  $member = new Member();
   $users = $user->getvalue();
   // print_r($profile); die();
  $usersprofile = $user->get_all_random_user();
  $get_hotest_allmemberstop = $member->get_hotest_allmemberstop5();
  $votes_profile = $member->votes_user_profile();
    // print_r($username);
  //echo $votes['votes'];  die();
   //echo $a = $comments[0]['comments'];
   $user_id = $_SESSION['user_session'];
     
  
  

  if (isset($_GET['q'])){
        $user->logout();
       header("location:index.php");
   }
               // $settings->insertData();  
                 //$setting->redirect('sign-up.php?joined');
      
   ?>
<?php include 'part/header.php'; ?>	 
			<section class="page-header">
				 
			</section>
			<!-- /PAGE HEADER -->
 
			<!-- -->
			<!-- -->
			<section>
				<div class="container">
					
					<!-- LEFT -->
					<div class="col-lg-3 col-md-3 col-sm-4">
					
						<div class="tabs nomargin-top margin-bottom-60">

								 
                                                        

		<h3 class="size-22 margin-bottom-10 text-center"><i class="fa fa-trophy"></i>&nbsp;Top 5 Leader Board</h3>
 
	 

								<!-- tabs content -->
								<div class="tab-content margin-bottom-60 margin-top-30">
                                                                    
									<!-- POPULAR -->
									<div id="tab_1" class="tab-pane active">
                                                                            <?php foreach ($get_hotest_allmemberstop as $value) { ?>  
										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="user_profile.php?id=<?php echo $value['username']; ?>">
													 <?php if($value['kik_img']!=''){ ?><img width="50" src="<?php echo $value['kik_img'] ?>"/><?php }else { ?><img width="50" src="img/noimage.jpg"/> <?php } ?>
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="user_profile.php?id=<?php echo $value['username']; ?>"><?php echo $value['username']; ?></a>
                                                                                 <small> 
                                                                                     <span class="user-meta"><?php if($value['gender']=='1'){ ?>
                                                                                <img src='img/guy.png' style="height: 17px; width:25px;"/> Guy &nbsp;&nbsp;&nbsp;
                                                                            <?php }else{ ?>
                                                                              &nbsp;<img src='img/venus.png' style="height: 15px; width:15px;"/>  Girl &nbsp;&nbsp;&nbsp;
                                                                             <?php } ?></span> 
                                                                               <span class="user-meta"><i class="fa fa-fire"></i>&nbsp;<?php echo $value['votecount']; ?></span>
                                                                                </small>
											</div>
										</div>
                                                                            <?php  }   ?>  <!-- /post -->

										 
										 

									</div>
                                                                        <div class="text-center">
                                                                            <a href="hotestusers.php" class="btn btn-3d btn-red"><i class="et-megaphone"></i>View All Full Leaderboard</a>
                                                                       </div>  
                                                                   <!-- /POPULAR -->

 
								</div>

							</div>
 

					</div>


					<!-- RIGHT -->
					<div class="col-lg-9 col-md-9 col-sm-8">
 

 
						<div class="box-light"><!-- .box-light OR .box-dark -->

							<div class="box-inner">
							
								<div class="text-center">
								<div class="owl-carousel owl-padding-1 nomargin buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items": "1", "autoPlay": 35000, "navigation": true, "pagination": false}'>
									<?php if($user_id != ''){ ?>
									<!-- item -->
                                                                        <?php foreach ($usersprofile as $profile){ ?>
									<div class="item-box">
                                                                                     <?php if($profile['kik_img']!=''){ ?><img width="150px" height="200px" src="<?php echo $profile['kik_img']; ?>"  class="center-block img-circle img-thumbnail img-responsive"/><?php }else { ?><img width="120px" height="70px" src="img/noimage.jpg"  class="center-block img-circle img-thumbnail img-responsive"/> <?php } ?>
                                                                                     <h2><a class="girl-color" href="user_profile.php?id=<?php echo $profile['username']; ?>"><?php echo $profile['username']; ?></a></h2>
                                                                                       <div class="hon-buttons-signup"><a class="">
                                                                                                      <form role="form" method="post" class="vote" action="">
                                                                                                    <input type="hidden" name="user_id" class="userid" value="<?php echo $user_id; ?>" />
                                                           <!--                                         <input type="hidden" name="profileid" class="profileid" value="<?php echo $profile['id']; ?>" /> -->
                                                           <!--                                        <input class="fa fa-heart-o btn badge-success" name="vote" type="submit" value="+1"/>-->
                                                                                                  <button class="submit_in"   name="profileid"  data-attr="<?php echo $profile['username']; ?>"><img src="img/button.png" style="height:50px; width: 90px;"/></button>
                                                                                                   </form>
                                                                                   </a></div>
                                                                                    <p class="swipe-left"><b class="message"></b></p>
                                                                          </div>
                                                                        <?php } ?> 
                                                                        <?php }else{ ?> 
                                                                         <?php foreach ($usersprofile as $profile){ ?>
									<div class="item-box">
                     <?php if($profile['kik_img']!=''){ ?><img width="150px" height="200px" src="<?php echo $profile['kik_img']; ?>"  class="center-block img-circle img-thumbnail img-responsive"/><?php }else { ?><img width="150px" height="100px" src="img/noimage.jpg"  class="center-block img-circle img-thumbnail img-responsive"/> <?php } ?>
                    <h2><a class="girl-color" href="user_profile.php?id=<?php echo $profile['username']; ?>"><?php echo $profile['username']; ?></a></h2>
                    <div class="hon-buttons-signup"><a href="login.php" class="btn btn-primary btn-lg">
                                       Please Login At First
                   </a></div>
                    <p class="swipe-left"><b class="message"></b></p>
            </div><?php } ?>
                                                                           </div>
                                                                         <?php } ?> 
 

								</div>
							</div>
							
							</div>

						</div>


						

					</div>
					
				</div>
			</section>
 
<script type="text/javascript">
        
      
      $(document).ready(function() {
      
           $('.submit_in').click(function() {
		    //$('.vote').submit(function() {
                       var user_id = $('.userid').val();
                       //var profile = $('.profileid').val();
                       var profileid = $(this).attr('data-attr');
                       //  alert(user_id); alert(profileid);
                             //console.log(vote);
		           // $(".contact_message").html("<span style='color:green;'>Almost done, please check your email address to confirmation.</span>");
		            $.ajax({
		                url: 'vote.php', 
		                data: 'user_id=' + user_id + '&profileid=' + profileid,
		                type: 'POST',
                                //dataType: "json",
		                success: function(msg) {
                                    //alert(msg);
		                    if(msg=="success")
		                    {
		                        //$("#conemail").val("");
                                        //$("#subject").val("");
//                                        var count = (parseInt(vote) + 1);
//                                       //  console.log(count);
//                                        $('.count').html(count);
                                       // $(".message").html('Thanks For Voted');
                                       // $("button").css("background-color", "yellow");
                                        alert("Thanks For Voted");
 		                    }
		                    else
		                    {
                                       // alert('dff');
		                      //$("button").addClass("vote_a_button");
                                      //$(".message").html('<i class="fa fa-share"></i>You are Not Voted Again');
                                     // $("button.vote_buton").css("background-color", "red");
                                     alert("Already Voted");
		                    }
		                }
		            });
 		 
		        return false;
		    });
                    
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
			 
			<!-- / -->
<?php include 'part/footer.php'; ?>

