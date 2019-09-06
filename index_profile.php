<?php

error_reporting(0);

 session_start();

  $_SESSION['url'] = $_SERVER['REQUEST_URI'];

  include_once 'include/class.user.php';

  include_once 'include/class.member.php';

  include_once 'include/class.report.php';

  $user = new User();

  $member = new Member();

  $reports = new Report();

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


  $profileid = $_GET['id'];

  $user_id = $_SESSION['user_session'];
  $stmt = $member->_dbh->prepare("SELECT user_id,profileid FROM vote WHERE user_id=:userid or profileid=:profileid");
         $stmt->execute(array(':userid'=>$userid,':profileid'=>$profileid));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
         
   $stmt2 = $member->_dbh->prepare("SELECT username FROM users WHERE username=:userid or username=:profileid");
         $stmt2->execute(array(':userid'=>$userid,':profileid'=>$profileid));
         $row2=$stmt2->fetch(PDO::FETCH_ASSOC);
         
         //print_r($row2);

  if (!empty($_SERVER['HTTP_CLIENT_IP'])){

  $ip=$_SERVER['HTTP_CLIENT_IP'];

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
  include 'function.php'; 
 
      if($profileid == $row2['username']){
      ?>

<?php include 'part/header.php'; ?>	 
    <section>
	 <div class="container">
			<?php include 'part/profile_sideber.php'; ?>
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
												 <label>Last Online :<?php
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
												  echo  $timemsg = $timemsg.' ago';   ?> 

												</label>
										</div>
                                    </div>
                            </div>
			 <div class="box-light">
				<div class="box-inner">
							<?php if($user_id == ''){ ?>
								<h4 class="uppercase"><?php echo $count_comment['comments']; ?> COMMENTS</h4>
								<h4 class="uppercase">Please <a class="btn btn-3d btn-green" href="<?php echo $base_url ?>/login">Login</a> To Make a Comment</h4>
						   <?php }else{ ?>
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
							<?php } ?>
							<!-- COMMENT -->
					<?php foreach ($comments as $comment){ ?>
                                        <ul class="comment list-unstyled">
						<li class="comment">
							<?php if($comment['kik_img']!=''){ ?><img class="avatar" src="<?php echo $comment['kik_img'] ?>" width="50" height="50" /><?php }else { ?><img class="avatar" src="<?php echo $base_url ?>/img/noimage.jpg" width="50" height="50" /> <?php } ?>
							<div class="comment-body"> 
                                                            <?php if($user_id != $comment['username']){ ?>
								<a href="<?php echo $base_url; ?>/user/profile/<?php echo $comment['username'] ?>" class="comment-author">
 										<small class="text-muted pull-right"> </small>
 										<span><?php echo $comment['username']; ?></span>
								</a>
                                                            <?php }else{ ?>
                                                               <a href="<?php echo $base_url; ?>/profile/<?php echo $comment['username'] ?>" class="comment-author">
 										<small class="text-muted pull-right"> </small>
 										<span><?php echo $comment['username']; ?></span>
								</a>
                                                               <?php } ?>
								<p>
										<?php echo $comment['comments']; ?>
								</p>
							</div> 
							<ul class="list-inline size-11 margin-top-10">
								   <?php if($user_id == ''){ ?>
									<li>
									   <a href="#" data-toggle="modal" data-target="#exampleModal,<?php echo $comment['commentid']; ?>" data-whatever="<?php echo $comment['commentid']; ?>" data-user="<?php echo $comment['username']; ?>" class="text-info"><i class="fa fa-reply"></i> Reply</a>
									</li>
									<?php }else{ ?>
									<li>
									 <a href="#" data-toggle="modal" data-target="#exampleModal44,<?php echo $comment['commentid']; ?>" data-whatever="<?php echo $comment['commentid']; ?>" data-user="<?php echo $comment['username']; ?>" class="text-info"><i class="fa fa-reply"></i> Reply</a>
									 </li>
									<?php } ?>
							</ul>
						</li>
							<?php

							$id =$comment['commentid'];

							$stmt = $user->_dbh->prepare("SELECT *,comments_reply.id as commentid FROM comments_reply INNER JOIN users ON comments_reply.user_id=users.username where comment_id='$id' order by comments_reply.id DESC");

							$stmt->execute(array(':comment_id'=>$comment_id));

							$row=$stmt->fetchAll(PDO::FETCH_ASSOC);

							?> 
								  <?php foreach ($row as $com){ ?>
						<li class="comment comment-reply">

								    <?php if($com['kik_img'] == ''){ ?>
								    <img  class="avatar" src="<?php echo $base_url ?>/img/noimage.jpg" width="50" height="50" alt="avatar" />

										 <?php }else { ?>

									<img class="avatar" src="<?php echo $com['kik_img']; ?>" width="50" height="50" alt="avatar" />

										 <?php } ?>
								<div class="comment-body"> 
                                                                    <?php if($user_id != $com['username']){ ?>
 										<a href="<?php echo $base_url; ?>/user/profile/<?php echo $com['username'] ?>" class="comment-author">
 												<small class="text-muted pull-right"> </small>
 												<span><?php echo $com['username']; ?></span>
										</a>
                                                                     <?php }else{ ?>
                                                                       <a href="<?php echo $base_url; ?>/profile/<?php echo $com['username'] ?>" class="comment-author">
 												<small class="text-muted pull-right"> </small>
 												<span><?php echo $com['username']; ?></span>
										</a>
                                                                        <?php } ?>
										<p><?php echo $com['replycomment']; ?></p>
								</div>
						</li>
							<?php } ?>
                                         </ul>
                                             <?php } ?>
                                                <div class="modal fade" id="exampleModal44" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
						</div><!-- /COMMENT -->
 						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

								  <div class="modal-dialog model_style" role="document">

										<div class="modal-content">

										  <div class="modal-header">

											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

											<h4 class="modal-title" id="exampleModalLabel">Reply to <?php echo $comment['username']; ?> comment</h4>

										  </div>

											 <div class="modal-body">

										 <p>You must be logged in to Reply.</p>

										  </div>

										  <div class="modal-footer">

												 <div class="row">

													<div class="col-md-6 col-sm-6">

														<a class="btn btn-primary btn-lg btn-block" style="color:white" href="<?php echo $base_url ?>/login.php">Login</a>

													</div>

													<div class="col-md-6 col-sm-6">

														<a class="btn btn-success btn-lg btn-block" style="color:white" href="<?php echo $base_url ?>/registration.php">Create Account</a>
													</div>
												 </div>
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
     
   
         $(document).ready(function() {

 
        $('#exampleModal44').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget)  

  var recipient = button.data('whatever')  

  var username = button.data('user')

 
  console.log(recipient);

 
  var modal = $(this)

  modal.find('.modal-title').text('Reply message to ' + username)

  modal.find("#w3").attr("href", "http://kik.me/u/" + recipient);

  modal.find('#comment_id').val(recipient)

});



$(function(){

 
var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");



	$('a[data-modal-id]').click(function(e) {

		e.preventDefault();

    $("body").append(appendthis);

    $(".modal-overlay").fadeTo(500, 0.7);

		var modalBox = $(this).attr('data-modal-id');

		$('#'+modalBox).fadeIn($(this).data());

	});  

  

  

$(".js-modal-close, .modal-overlay").click(function() {

    $(".modal-box, .modal-overlay").fadeOut(500, function() {

        $(".modal-overlay").remove();

    });

 

});

 

$(window).resize(function() {

    $(".modal-box").css({

        top: ($(window).height() - $(".modal-box").outerHeight()) / 2,

        left: ($(window).width() - $(".modal-box").outerWidth()) / 2

    });

});

 

$(window).resize();

 

});
                    });

                    </script>

 			<!-- / -->

<?php include 'part/footer.php'; ?>

<?php }else{
//  echo 'profile';
  //$user->redirect('/profile.php');
  header("Location: $base_url/404");
       
         } ?>
