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
   
  // print_r($myarray);  die();
    
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
        //$myarray = array("comments"=>$comments);      
        $myarray = array("comments"=>$comments,"user_id"=>$userid,"profileid"=>$profileid);
   
        
      //print_r($myarray);   die();
     if($comments == ''){
         $error = 'Please Comments';
         $user->redirect("comments.php");
     } 
     else{
                if($user->comments($myarray)) 
            {
                //$setting->redirect('sign-up.php?joined');
                // $sucess = 'Data Save Sucessfull';
                // echo 'success';
                 $user->redirect("comments.php");
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
                                                        <img src="<?php echo $users['kik_img']; ?>" style="width: 460px; height: 260px;" alt="" />
                                                        <?php } ?>
							<h2 class="size-18 margin-top-10 margin-bottom-0"><?php echo $users['username']; ?></h2>
							<h3 class="size-13 margin-top-10 margin-bottom-0"> 
                                                                                     <p class="position_img"> 
                                                                                         <?php if($users['gender']=='1'){ ?>
                                                                                         <img src='img/guy.png' style="height: 17px; width:25px;"/> Guy &nbsp;&nbsp;&nbsp;
                <?php }else{ ?>
                    <img src='img/venus.png' style="height: 15px; width:15px;"/> Girl &nbsp;&nbsp;
                 <?php } ?>
                                                                                          <i class="fa fa-map-marker" style="color: red"></i> <?php echo $users['country'] ?></p>
                                                                                 </h3>
                                                        <h4 class="size-13 margin-top-0 margin-bottom-5"> 
                                                                                     Total Vote: <?php echo $votes['votes']; ?>
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
                                                    <li class="list-group-item active"><a href="comments.php"><i class="fa fa-comments-o"></i> COMMENTS</a></li>
                                                    <li class="list-group-item"><a href="hotvotes.php"><i class="fa fa-tasks"></i> HOT VOTES</a></li>
                                                    <li class="list-group-item"><a href="hotvoted.php"><i class="fa fa-history"></i> HOT VOTED</a></li>
                                                    <li class="list-group-item"><a href="share.php"><i class="fa fa-gears"></i> SHARE</a></li>
                                                    <li class="list-group-item"><a href="settings.php"><i class="fa fa-gears"></i> SETTINGS</a></li>
 						</ul>
                                                
						<!-- /SIDE NAV -->


						<!-- info -->
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
									<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere</p>
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

<form method="post" action="#" class="box-light margin-top-20"><!-- .box-light OR .box-dark -->
							<div class="box-inner">
								<h4 class="uppercase"><?php echo $count_comment['comments']; ?> COMMENTS TO <strong><?php echo $users['username']; ?></strong></h4>
								<input type="hidden" name="user_id" id="userid" value="<?php echo $user_id; ?>" />
                                                                <input type="hidden" name="profileid" value="<?php echo $profileid; ?>" /> 
								<textarea required name="comments" class="form-control word-count" data-maxlength="100" rows="5" placeholder="Type your Comment here..."></textarea>
								<div class="text-muted text-right margin-top-3 size-12 margin-bottom-10">
									<span>0/100</span> Words
								</div>

								<button type="submit" name="submit3" class="btn btn-primary"><i class="fa fa-check"></i> POST COMMENT</button>
							</div>
						</form>
						<div class="box-light"><!-- .box-light OR .box-dark -->

							<div class="box-inner">
							
								<!-- COMMENT -->
                                                                
                                                                <?php foreach ($comments as $comment){ ?>
								<ul class="comment list-unstyled">
									<li class="comment">

										<!-- avatar -->
                                                                                <?php if($comment['kik_img']!=''){ ?><img class="avatar" src="<?php echo $comment['kik_img'] ?>" width="50" height="50" /><?php }else { ?><img class="avatar" src="img/noimage.jpg" width="50" height="50" /> <?php } ?>
 
										<!-- comment body -->
                                                                                
										<div class="comment-body"> 
											<a href="#" class="comment-author">
												<small class="text-muted pull-right"> 12 Minutes ago </small>
												<span><?php echo $comment['username']; ?></span>
											</a>
											<p>
												<?php echo $comment['comments']; ?>
											</p>
										</div><!-- /comment body -->

										<!-- options -->
										<ul class="list-inline size-11 margin-top-10">
											<li>
												<a href="#" data-toggle="modal" data-target="#exampleModal,<?php echo $comment['commentid']; ?>" data-whatever="<?php echo $comment['commentid']; ?>" data-user="<?php echo $comment['username']; ?>" class="text-info"><i class="fa fa-reply"></i> Reply</a>
											</li>
											<li>
												<a href="#" class="text-success"><i class="fa fa-thumbs-up"></i> Like</a>
											</li>
											 
										</ul>
									</li><!-- /options -->
<?php
       $id =$comment['commentid'];
   $stmt = $user->_dbh->prepare("SELECT *,comments_reply.id as commentid FROM comments_reply INNER JOIN users ON comments_reply.user_id=users.username where comment_id='$id' order by comments_reply.id DESC");
         $stmt->execute(array(':comment_id'=>$comment_id));
         $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
        //  print_r($row); die();
         ?> 
                     
                      <?php foreach ($row as $com){ ?>
									<li class="comment comment-reply">

										<!-- avatar -->
                                                                                <?php if($com['kik_img'] == ''){ ?>
                         <img  class="avatar" src="img/noimage.jpg" width="50" height="50" alt="avatar" />
                         <?php }else { ?>
                 <img class="avatar" src="<?php echo $com['kik_img']; ?>" width="50" height="50" alt="avatar" />
                         <?php } ?>
 
										<!-- comment body -->
										<div class="comment-body"> 
											<a href="#" class="comment-author">
												<small class="text-muted pull-right"> 4 Minutes ago </small>
												<span><?php echo $com['username']; ?></span>
											</a>
											<p>
												<?php echo $com['replycomment']; ?> <i class="fa fa-smile-o green"></i> 
											</p>
										</div><!-- /comment body -->

										<!-- options -->
										<ul class="list-inline size-11 margin-top-10">
											<li>
												<a href="#" class="text-success"><i class="fa fa-thumbs-up"></i> Like</a>
											</li>
											 
										</ul><!-- /options -->

									</li>
                                                                         <?php } ?>

									 
								</ul>
                                                                 <?php } ?>
								<!-- /COMMENT -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Reply to <?php echo $comment['username']; ?> comment</h4>
      </div>
        <form method="post" action="">
      <div class="modal-body">
          <input type="hidden" name="comment_id"  id="comment_id" value="">
           <div class="form-group">
             <textarea class="form-control" name="replycomment" id="message-text"></textarea>
          </div>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="submitreply" class="btn btn-primary">Send message</button>
      </div>
    </form>
    </div>
  </div>
</div>
			 
							
							</div>

						</div>


						

					</div>
					
				</div>
			</section>
 
 <script type="text/javascript">
                         $(document).ready(function() {
      
      
       $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var username = button.data('user')
  //alert('sdsd');
  console.log(recipient);
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Reply message to ' + username)
  modal.find("#w3").attr("href", "http://kik.me/u/" + recipient);
  modal.find('#comment_id').val(recipient)
});
});

                        </script>
			 
			<!-- / -->
<?php include 'part/footer.php'; ?>

