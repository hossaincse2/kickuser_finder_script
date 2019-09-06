<?php
error_reporting(0);
 session_start();
  include_once 'include/class.user.php';
  include_once 'include/class.member.php';

  $user = new User();
  $member = new Member();
  $users = $user->getvalue();
  //$user_timeline = $user->getvalue_user_timeline();
  $comments = $user->getvalue_comments();
  $reply = $user->getvalue_reply_comments();
  $votes = $member->count_vote_profile();
  $count_given_votes_profile = $member->count_given_votes_profile();
  $count_comment = $member->count_comment_profile();
  $votes_profile = $member->votes_profile();
  $given_votes_profile = $member->given_votes_profile();
  $profile_view = $member->count_user_profile_view();
  $last_online = $user->last_online();
  $user_id = $_SESSION['user_session'];

  if (!empty($_SERVER['HTTP_CLIENT_IP'])){


  $ip=$_SERVER['HTTP_CLIENT_IP'];


//Is it a proxy address



}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){



  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];



}else{



  $ip=$_SERVER['REMOTE_ADDR'];



}   



  if (isset($_GET['id']) || $ip){



      $profileid = $_GET['id'];



      $users_id = '0';



      $myarray = array("id"=>$profileid,"user_id"=>$users_id,'ip'=>$ip);


      $user->profile_viewer_insert($myarray);



     }

 

    ?>



<?php include 'part/header.php'; ?>	 
  <section>
 	 <div class="container">
 
			<?php include 'part/login_profile_sideber.php'; ?>
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



                                                        </label>



                                                                 </div>



							</div>



						</div>


 
							<div class="box-light"><!-- .box-light OR .box-dark -->
                                                        	<div class="row">

                                                           
								<div class="col-md-6 col-sm-6">



                                                                <div class="box-footer">



										<!-- INLINE SEARCH -->



                                                                    <div class="inline-search clearfix">



                                                                       <a href="#"  class="btn btn-featured btn-red">



                                                                               <span>Total Hot Voted</span>



                                                                               <i><?php  echo $count_given_votes_profile['votes']; ?></i>



                                                                       </a>



                                                                     </div>



										<!-- /INLINE SEARCH -->



 									</div>
     <div class="box-inner">



		 



			 <div class="height-250 slimscroll" data-always-visible="true" data-size="5px" data-position="right" data-opacity="0.4" disable-body-scroll="true">



										<?php foreach ($given_votes_profile as $given_profile){ ?>

                                      <?php

                                 $id =$given_profile['profileid'];



                                                                                       
                          $stmt = $member->_dbh->prepare("SELECT * FROM users  where  username= '".$id."'  order by  id DESC");


                           $stmt->execute();

                            $row=$stmt->fetchAll(PDO::FETCH_ASSOC);


  
                                                                                      ?> 
 
                                         <?php foreach ($row as $profile){ ?>

 
											<div class="clearfix margin-bottom-10"><!-- post item -->



                        <?php if($profile['kik_img']!=''){ ?><img src="<?php echo $profile['kik_img'] ?>"  class="thumbnail pull-left" width="60" height="60" alt=""/><?php }else { ?><img src="<?php echo $base_url ?>/img/noimage.jpg"  class="thumbnail pull-left" width="60" height="60" alt=""/> <?php } ?>



 												<h4 class="size-13 nomargin noborder nopadding"><a href="<?php echo $base_url ?>/user/profile/<?php echo $profile['username'] ?>"><?php echo $profile['username'] ?></a></h4>



												<span class="size-11 text-muted"><p> <?php if($profile['gender']=='1'){ ?>



                    <img src='<?php echo $base_url ?>/img/guy.png' style="height: 17px; width:25px;"/> Guy



                <?php }else{ ?>



                    <i class="fa fa-venus"></i>Girl



                 <?php } ?>



                  <img  src='<?php echo $base_url ?>/img/location.png' style="height: 35px; width: 35px;" /><?php echo $profile['country'] ?></p></span>



											</div><!-- /post item -->


                      <?php } ?>

                                  <?php } ?> 



 

										</div>



									</div>
                                                		</div>

                        	<div class="col-md-6 col-sm-6">



                                                            <div class="box-footer">



										<!-- INLINE SEARCH -->



										<div class="inline-search clearfix">



											<a href="#" class="btn btn-featured btn-green">



                                                                    <span>Total Hot Votes Received</span>



                                                                    <i><?php echo $votes['votes']; ?></i>



                                                            </a>



										</div>

 
									</div>
 
									<div class="box-inner">



 										<div class="height-250 slimscroll" data-always-visible="true" data-size="5px" data-position="right" data-opacity="0.4" disable-body-scroll="true">
                                                                        	<?php foreach ($votes_profile as $profile){ ?>



											<div class="clearfix margin-bottom-10"><!-- post item -->



                        <?php if($profile['kik_img']!=''){ ?><img src="<?php echo $profile['kik_img'] ?>"  class="thumbnail pull-left" width="60" height="60" alt=""/><?php }else { ?><img src="<?php echo $base_url ?>/img/noimage.jpg"  class="thumbnail pull-left" width="60" height="60" alt=""/> <?php } ?>



 												<h4 class="size-13 nomargin noborder nopadding"><a href="<?php echo $base_url ?>/user/profile/<?php echo $profile['username'] ?>"><?php echo $profile['username'] ?></a></h4>



												<span class="size-11 text-muted"><p> <?php if($profile['gender']=='1'){ ?>



                    <img src='<?php echo $base_url ?>/img/guy.png' style="height: 17px; width:25px;"/> Guy



                <?php }else{ ?>



                    <i class="fa fa-venus"></i>Girl



                 <?php } ?>



                  <img  src='<?php echo $base_url ?>/img/location.png' style="height: 35px; width: 35px;" /><?php echo $profile['country'] ?></p></span>



											</div><!-- /post item -->



                                                                                        <?php } ?>



   										</div>



									</div>									

 

								</div>

 
							</div>
  
 	</div>

 			</div>

 
				</div>



</section>
<?php include 'part/footer.php'; ?>







