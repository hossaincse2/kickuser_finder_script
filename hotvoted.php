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

  //print_r($last_online);     die();

   //echo $a = $comments[0]['comments'];

  $user_id = $_SESSION['user_session'];

  

 if(!$user->is_loggedin())

{

 $user->redirect('login.php');

}



  if (isset($_GET['q'])){

        $user->logout();

       header("location:login.php");

   }

               // $settings->insertData();  

                 //$setting->redirect('sign-up.php?joined');

     

        if(isset($_POST['submit']))

{

    

      if(isset($_FILES['profile_img'])){

      $errors= array();

      $file_name = $_FILES['profile_img']['name'];

      $file_name = stripslashes($file_name);

                     $file_name = strtolower($file_name);

                    if(strlen($file_name) > 8) {

                         $file_name = substr($file_name, -8);   

                    }

                   $file_name = time() . "_" . rand(1, 999) . $file_name;

      // echo $file_name;

      $file_size =$_FILES['profile_img']['size'];

      $file_tmp =$_FILES['profile_img']['tmp_name'];

      $file_type=$_FILES['profile_img']['type'];

      $file_ext=strtolower(end(explode('.',$_FILES['profile_img']['name'])));

      

      $expensions= array("jpeg","jpg","png");

      

      if(in_array($file_ext,$expensions)=== false){

         $errors[]="extension not allowed, please choose a JPEG or PNG file.";

      }

      

      if($file_size > 2097152){

         $errors[]='File size must be excately 2 MB';

      }

      

      if(empty($errors)==true){

        $profile_img = move_uploaded_file($file_tmp,"images/".$file_name);

         //echo $profile_img."Success";

      }else{

         print_r($errors);

      }

   }

 

   

  $myarray = array("profile_img"=>$file_name);

   

 // print_r($myarray);  die();

    

      try

      {

             if($user->imageupdate($myarray)) 

            {

                //$setting->redirect('sign-up.php?joined');

                 $sucess[] = 'Update Sucessfully';

            }  else {

                $error[] = 'Update Fail';

            }

         }

      catch(PDOException $e)

     {

        echo $e->getMessage();

     }

 }

  if(isset($_POST['submit2']))

{

  if(isset($_FILES['timeline_img'])){

      $errors= array();

      $file_name = $_FILES['timeline_img']['name'];

      $file_name = stripslashes($file_name);

                     $file_name = strtolower($file_name);

                    if(strlen($file_name) > 8) {

                         $file_name = substr($file_name, -8);   

                    }

                   $file_name = time() . "_" . rand(1, 999) . $file_name;

      // echo $file_name;

      $file_size =$_FILES['timeline_img']['size'];

      $file_tmp =$_FILES['timeline_img']['tmp_name'];

      $file_type=$_FILES['timeline_img']['type'];

      $file_ext=strtolower(end(explode('.',$_FILES['timeline_img']['name'])));

      

      $expensions= array("jpeg","jpg","png");

      

      if(in_array($file_ext,$expensions)=== false){

         $errors[]="extension not allowed, please choose a JPEG or PNG file.";

      }

      

      if($file_size > 2097152){

         $errors[]='File size must be excately 2 MB';

      }

      

      if(empty($errors)==true){

        $profile_img = move_uploaded_file($file_tmp,"images/".$file_name);

         //echo $profile_img."Success";

      }else{

         print_r($errors);

      }

   }

  $myarray = array("timeline_img"=>$file_name);
    try

      {

             if($user->timelineupdate($myarray)) 

            {

                //$setting->redirect('sign-up.php?joined');

                 $sucess[] = 'Update Sucessfully';

            }  else {

                $error[] = 'Update Fail';

            }

         }

      catch(PDOException $e)

     {

        echo $e->getMessage();

     }

     }

 

   if(isset($_POST['submit3']))

{

        $userid = trim($_POST['user_id']);

        $profileid = trim($_POST['profileid']); 

        $comments = trim($_POST['comments']);

        $myarray = array("comments"=>$comments,"user_id"=>$userid,"profileid"=>$profileid);


     if($comments == ''){

         $error = 'Please Comments';

         $user->redirect("profile.php");

     } 

     else{

                if($user->comments($myarray)) 

            {

                 $user->redirect("profile.php");

            } else {

                echo 'error';

             }

             }

}

   

   ?>

   <?php

   if(isset($_POST['submitreply']))

{

       $comment_id = trim($_POST['comment_id']);

       $replycomment = trim($_POST['replycomment']);

       $myarray = array("replycomment"=>$replycomment,"comment_id"=>$comment_id);

   

   //print_r($myarray);  die();

    if($replycomment == ''){

           echo 'Please Reply';

       }

 else {

      try

      {

             if($user->reply_comments($myarray)) 

            {

                //$setting->redirect('sign-up.php?joined');

                 $sucess[] = 'Update Sucessfully';

            }  else {

                $error[] = 'Update Fail';

            }

         }

      catch(PDOException $e)

     {

        echo $e->getMessage();

     }

   }

}

     

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

					

						<div class="thumbnail text-center">

                                                     <?php if($users['kik_img'] == ''){ ?>

                                                        <img src="img/noimage.jpg" alt=""/>

							

                                                        <?php }else{ ?>

                                                        <img src="<?php echo $users['kik_img']; ?>" style="width: 460px; height: 230px;" alt="" />

                                                        <?php } ?>

							<h2 class="size-18 margin-top-10 margin-bottom-0"><?php echo $users['username']; ?></h2>

							<h3 class="size-13 margin-top-10 margin-bottom-0"> 

                                                                                     <p class="position_img"> 

                                                                                         <?php if($users['gender']=='1'){ ?>

                                                                                         <img src='img/guy.png' style="height: 17px; width:25px;"/> Guy &nbsp;&nbsp;&nbsp;

                <?php }else{ ?>

                    <img src='img/venus.png' style="height: 15px; width:15px;"/> Girl &nbsp;&nbsp;

                 <?php } ?>
                  <i class="fa fa-map-marker" style="color: red"></i> <?php if($users['city'] != ''){ ?> <?php echo $users['city'] ?>, <?php } ?> <?php echo $users['country'] ?>
              </p>

                 </h3>

                      <h4 class="size-13 margin-top-0 margin-bottom-5"> 
                         Hot Vote Received: <?php echo $votes['votes']; ?>
                      </h4>

						</div>



						<!-- completed -->

						<div class="margin-bottom-30">

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

						<!-- /completed -->



						<!-- SIDE NAV -->

						<ul class="side-nav list-group margin-bottom-60" id="sidebar-nav">

                                                    <li class="list-group-item"><a href="profile.php"><i class="fa fa-eye"></i> PROFILE</a></li>

                                                    <li class="list-group-item"><a href="comments.php"><i class="fa fa-comments-o"></i> COMMENTS</a></li>

                                                    <li class="list-group-item"><a href="hotvotes.php"><i class="fa fa-tasks"></i> HOT VOTES</a></li>

                                                    <li class="list-group-item active"><a href="hotvoted.php"><i class="fa fa-history"></i> HOT VOTED</a></li>

                                                    <li class="list-group-item"><a href="share.php"><i class="fa fa-gears"></i> SHARE</a></li>

                                                    <li class="list-group-item"><a href="settings.php"><i class="fa fa-gears"></i> SETTINGS</a></li>

 						</ul>
 
						<!-- /SIDE NAV -->
 

						<div class="box-light margin-bottom-30"><!-- .box-light OR .box-light -->

							<div class="row margin-bottom-20">

								<div class="col-md-4 col-sm-4 col-xs-4 text-center bold">

									<h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway"><?php  echo $count_given_votes_profile['votes']; ?></h2>

									<h3 class="size-11 margin-top-0 margin-bottom-10 text-info">Hot Voted</h3>

								</div>
            	<div class="col-md-4 col-sm-4 col-xs-4 text-center bold">

									<h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway"><?php echo $profile_view['view']; ?></h2>

									<h3 class="size-11 margin-top-0 margin-bottom-10 text-info">Profile View</h3>

								</div>



								<div class="col-md-4 col-sm-4 col-xs-4 text-center bold">

									<h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway"><?php echo $votes['votes']; ?></h2>

									<h3 class="size-11 margin-top-0 margin-bottom-10 text-info">Hot Votes</h3>

								</div>

							</div>

							<!-- /info -->
 

						</div>

 
					</div>

 			<!-- RIGHT -->

					<div class="col-lg-9 col-md-9 col-sm-8">

 			<!-- FLIP BOX -->

						<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center nomargin">

							<div class="front">

								<div class="box1 noradius">

									<div class="box-icon-title">

										<i class="fa fa-user"></i>

										<h2><?php echo $users['username']; ?> &ndash; Profile</h2>

									</div>

									<p><?php echo $users['username']; ?> Given Vote <?php  echo $count_given_votes_profile['votes']; ?> Peoples!</p>

								</div>

							</div>

     		<div class="back">

								<div class="box2 noradius">

									<h4>About Me</h4>

									<hr />

									<p><?php echo $users['about'] ?></p>

		           </div>

							</div>

						</div>

						<!-- /FLIP BOX -->
    	<div class="box-light"><!-- .box-light OR .box-dark -->

    	<div class="box-inner">

				   <?php foreach ($given_votes_profile as $given_profile){ ?>

          <?php

         $id =$given_profile['profileid'];
  
         $stmt = $member->_dbh->prepare("SELECT * FROM users  where  username= '".$id."'  order by  id DESC");

         $stmt->execute();

         $row=$stmt->fetchAll(PDO::FETCH_ASSOC);

          ?> 

            <?php foreach ($row as $profile){ ?>

								 <div class="row user">

            <div class="col-md-2 blog_img"><?php if($profile['kik_img']!=''){ ?><img src="<?php echo $profile['kik_img'] ?>"  class="img img-circle"/><?php }else { ?><img src="img/noimage.jpg"  class="img img-circle"/> <?php } ?></div>

            <div class="col-md-5 name_content">

                <h2><?php echo $profile['username'] ?></h2>

                <p>  <?php if($profile['gender']=='1'){ ?>

                    <img style="height: 17px; width:25px;" src="img/guy.png"> Guy

                    <?php }else{ ?>

                    <img src='img/venus.png' style="height: 17px; width:13px;"/> Girl

                     <?php } ?>

                    <img style="height: 35px; width: 35px;" src="img/location.png">United Kingdom</p>

            </div>

            <div class="col-md-5 view_content"><ul class="nav navbar-nav rs_hot navbar-nav3 ul rs_hot">

                    <li><a href="<?php echo $base_url ?>/user/profile/<?php echo $profile['username'] ?>" class="border_user">View Profile</a></li>

 
         <li class="dropdown">

           <a data-whatever3="<?php echo $profile['kikuser']; ?>" data-target="#exampleModal" data-toggle="modal" style="background-color: #80bf41; color: white; border:none" class="border_user current" href="3">

            <b>Ask For Kik Id</b>

           </a>

         </li>

       </ul></div>

        </div>

                                                         

        <?php } ?>

          <?php } ?>

                                                 				

							</div>
 
						</div>
 

					</div>
 
				</div>

			</section>
  

<?php include 'part/footer.php'; ?>



