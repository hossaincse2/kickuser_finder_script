<?php
error_reporting(0);
 session_start();
  include_once 'include/class.user.php';
  include_once 'include/class.member.php';
  include_once 'include/class.report.php';
  $user = new User();
  $member = new Member();
  $reports = new Report();
  $users1 = $user->getvalue();
  $users = $user->get_all_user_profile();
  $comments = $user->getvalue_userprofile_comments();
  $reply = $user->getvalue_reply_comments();
  $votes = $member->count_vote();
  $count_comment = $member->count_comment();
  $count_given_votes_user_profile = $member->count_given_votes_user_profile();
  $votes_profile = $member->votes_user_profile();
  $username = $user->profile_username();
  $given_votes_profile = $member->given_votes_user_profile();
  $profile_view = $member->count_profile_view();
  $last_online = $user->last_online_users();
  $profileid = $_GET['id'];   
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
       $user_id = $_SESSION['user_session'];
      $myarray = array("id"=>$profileid,"user_id"=>$user_id,'ip'=>$ip);
       $user->profile_viewer_insert($myarray);
     }
  if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

  if (isset($_GET['q'])){
        $user->logout();
       header("location:index.php");
   }
                
     if(isset($_POST['submitreply']))
{
       $comment_id = trim($_POST['comment_id']);
       $replycomment = trim($_POST['replycomment']);
       $myarray = array("replycomment"=>$replycomment,"comment_id"=>$comment_id);
   
        
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
      
   if(isset($_POST['reportsubmit']))
{
       
       $user_id = trim($_POST['user_id']);
       $report_id = trim($_POST['report_id']);
       $report = trim($_POST['report']);
       $myarray = array("user_id"=>$user_id,"report_id"=>$report_id,"report"=>$report);
   
       try
      {
             if($reports->report_send($myarray)) 
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
         $user->redirect("user_profile.php?id=$profileid");
     } 
     else{
               if($user->userprofile_comments($myarray)) 
            {
                 
                 $user->redirect("user_profile.php?id=$profileid");
            } else {
                echo 'error';
             }
             }
}
   
   ?>
<?php include 'part/header.php'; ?>	 
			<section class="page-header"></section>
 			<section>
				<div class="container">
 					<!-- LEFT -->
					<div class="col-lg-3 col-md-3 col-sm-4">
 						<div class="thumbnail text-center">
                                                     <?php if($users['kik_img'] == ''){ ?>
                                                        <img src="<?php echo $base_url ?>/img/noimage.jpg" alt=""/>
                                                         <?php }else{ ?>
                                                        <img src="<?php echo $users['kik_img']; ?>" style="width: 460px; height: 230px;" alt="" />
                                                        <?php } ?>
							<h2 class="size-18 margin-top-10 margin-bottom-0"><?php echo $users['username']; ?></h2>
							<h3 class="size-13 margin-top-10 margin-bottom-0"> 
                         <?php if($users['gender']=='1'){ ?>
                         <img src='<?php echo $base_url ?>/img/guy.png' style="height: 17px; width:25px;"/> Guy &nbsp;&nbsp;&nbsp;
                <?php }else{ ?>
                    <img src='<?php echo $base_url ?>/img/venus.png' style="height: 15px; width:15px;"/> Girl &nbsp;&nbsp;
                 <?php } ?>
                  <i class="fa fa-map-marker" style="color: red"></i> <?php if($users['city'] != ''){ ?> <?php echo $users['city'] ?>, <?php } ?> <?php echo $users['country'] ?>  
            </h3>
                                    <h4 class="size-13 margin-top-10 margin-bottom-5"> 
                                        <b class="size-16">Hot Vote Received: <span class="count" style="font-weight: bold; font-size: 16px;"><?php echo $votes['votes']; ?></span></b>  <form class="margin-top-8" role="form" method="post" id="vote" action="">
                                         <input type="hidden" name="user_id" id="userid" value="<?php echo $user_id; ?>" />
                                        <input type="hidden" name="profileid" value="<?php echo $profileid; ?>" /> 
                                        <button class="fa a btn btn-primary changback  vote_buton" name="vote" type="submit"><i class="fa fa-heart-o"></i> <span style="font-size: 21px; font-weight: 900">+</span>1</button>
                                         </form>
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
                                                        <span><img src="<?php echo $base_url ?>/img/icon.png"> <a href="" class="size-11" data-toggle="modal" data-target=".bs-example-modal-sm"> Report This User as Fake</a> </span>
						</div>
                                                
                                                
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
   						<!-- SIDE NAV -->
						<ul class="side-nav list-group margin-bottom-60" id="sidebar-nav">
                          <li class="list-group-item active"><a href="<?php echo $base_url ?>/user/profile/<?php echo $users['username']; ?>"><i class="fa fa-eye"></i> PROFILE</a>
                          </li>
                           <li class="list-group-item"><a href="<?php echo $base_url ?>/userprofile/comments.php?id=<?php echo $users['username']; ?>"><i class="fa fa-comments-o"></i> COMMENTS</a>
                           </li>
                           <li class="list-group-item"><a href="<?php echo $base_url ?>/userprofile/hotvotes.php?id=<?php echo $users['username']; ?>"><i class="fa fa-tasks"></i> HOT VOTES</a>
                           </li>
                          <li class="list-group-item"><a href="<?php echo $base_url ?>/userprofile/hotvoted.php?id=<?php echo $users['username']; ?>"><i class="fa fa-history"></i> HOT VOTED</a>
                          </li>
                         <li class="list-group-item"><a href="<?php echo $base_url ?>/userprofile/share.php?id=<?php echo $users['username']; ?>"><i class="fa fa-gears"></i>SHARE</a>
                         </li>
  						</ul>
 
 						<!-- info -->
						<div class="box-light margin-bottom-30"><!-- .box-light OR .box-light -->
							<div class="row margin-bottom-20">
                  <div class="col-md-4 col-sm-4 col-xs-4 text-center bold">
									<h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway"><?php  echo $count_given_votes_user_profile['votes']; ?></h2>
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
                                           <p><?php
                                              $body = $users['about'];
                                               if(strlen($body)>100){
                                                preg_match('/^([^.!?\s]*[\.!?\s]+){0,30}/', strip_tags($body), $abstract);
                                                  echo $abstract[0];
                                                   }else{
                                                     echo $body;
                                                    }
                                            ?></p>							
            </div>
        </div>
                                 	<div class="back">
                                      	 <div class="box2 noradius">
                                      					 <h4>About Me</h4>
                                      							 <hr />
                                      						<?php if($users['about'] != ''){ ?>
                                      						<p><?php echo $users['about']; ?></p>
                                                   <?php }else{ ?>
                                                   <p>There is no Content About him.</p>
                                                   <?php } ?>
             
                                       </div>
							                    </div>
						</div>
						<!-- /FLIP BOX -->
 						<div class="box-light"><!-- .box-light OR .box-dark -->
 							<div class="row">
 								<!-- POPULAR POSTS -->
								<div class="col-md-6 col-sm-6">
                  <div class="box-footer">
										<!-- INLINE SEARCH -->
										<div class="inline-search clearfix">
											<a href="#" class="btn btn-featured btn-red" data-toggle="modal" data-target="#myModal">
                       <span>ASK KIK ID?</span> <i class="et-megaphone"></i> 
                     </a>
										</div>
										<!-- /INLINE SEARCH -->
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
 			<!-- Modal Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 			</div>
 		</div>
	</div>
</div>
 									<div class="box-inner">
										<h3>
                       <a class="pull-right size-11 text-warning" href="<?php echo $base_url ?>/userprofile/hotvoted.php?id=<?php echo $users['username']; ?>">VIEW ALL</a>
											HOT VOTED
										</h3>
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
                            <i class="fa fa-venus"></i> Girl
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
                                	<span>Total Votes</span>
                                	<i class="count" ><?php echo $votes['votes']; ?></i>
                                </a>
										</div>
										<!-- /INLINE SEARCH -->
 									</div>

									<div class="box-inner">
										<h3>
                     <a class="pull-right size-11 text-warning" href="<?php echo $base_url ?>/userprofile/hotvotes.php?id=<?php echo $users['username']; ?>">VIEW ALL</a>
											HOT VOTES
										</h3>
										<div class="height-250 slimscroll" data-always-visible="true" data-size="5px" data-position="right" data-opacity="0.4" disable-body-scroll="true">

											<?php foreach ($votes_profile as $profile){ ?>
											<div class="clearfix margin-bottom-10"><!-- post item -->
                                               <?php if($profile['kik_img']!=''){ ?><img src="<?php echo $profile['kik_img'] ?>"  class="thumbnail pull-left" width="60" height="60" alt=""/><?php }else { ?><img src="<?php echo $base_url ?>/img/noimage.jpg"  class="thumbnail pull-left" width="60" height="60" alt=""/> <?php } ?>
                               							  <h4 class="size-13 nomargin noborder nopadding"><a href="<?php echo $base_url ?>/user/profile/<?php echo $profile['username'] ?>"><?php echo $profile['username'] ?></a></h4>
                              							 <span class="size-11 text-muted"><p> <?php if($profile['gender']=='1'){ ?>
                                                  <img src='<?php echo $base_url ?>/img/guy.png' style="height: 17px; width:25px;"/> Guy
                                              <?php }else{ ?>
                                                  <i class="fa fa-venus"></i> Girl
                                               <?php } ?>
                                                <img  src='<?php echo $base_url ?>/img/location.png' style="height: 35px; width: 35px;" /><?php echo $profile['country'] ?></p>
                                            </span>
											</div><!-- /post item -->
                                                                                        <?php } ?>
 
 										</div>
									</div>									
 								</div>
  				</div>
  	</div>
 						<form method="post" action="#" class="box-light margin-top-20"><!-- .box-light OR .box-dark -->
							<div class="box-inner">
								<h4 class="uppercase">LEAVE A COMMENT TO <strong><?php echo $users['username']; ?></strong></h4>
								<input type="hidden" name="user_id" id="userid" value="<?php echo $user_id; ?>" />
                                                                <input type="hidden" name="profileid" value="<?php echo $profileid; ?>" /> 
								<textarea required name="comments" class="form-control word-count" data-maxlength="100" rows="5" placeholder="Type your Comment here..."></textarea>
								<div class="text-muted text-right margin-top-3 size-12 margin-bottom-10">
									<span>0/100</span> Words
								</div>

								<button type="submit" name="submit3" class="btn btn-primary"><i class="fa fa-check"></i> POST COMMENT</button>
							</div>
						</form>

					</div>
					
				</div>
			</section>
 <script type="text/javascript">
        $(document).ready(function() {
         $('#exampleModal').on('show.bs.modal', function (event) {
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
    //$(".js-modalbox").fadeIn(500);
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
                    
                  $('#comments').submit(function() {
  		            var vote = '<?php echo $votes['votes']; ?>';
                            
		            $.ajax({
		                url: 'comments.php', 
		                data: $('#comments').serialize(),
		                type: 'POST',
 		                success: function(msg) {
 		                    if(msg=="success")
		                    {
		                         
                                        var count = (parseInt(vote) + 1);
                                         $('.count').html(count);
                                        $("button").css("background-color", "yellow");
 		                    }
		                    else
		                    {
                                       $("button").css("background-color", "red");
		                    }
		                }
		            });
 		 
		        return false;
		    });  
                    
                    
                    
		});
           </script>
 <?php include 'part/footer.php'; ?>

