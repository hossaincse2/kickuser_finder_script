<?php

 error_reporting(0);

 session_start();

  include_once 'include/class.user.php';

  include_once 'include/class.member.php';

  $user = new User();

  $member = new Member();

  $users = $user->getvalue();

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
  $profileid = $_GET['id'];

  $user_id = $_SESSION['user_session'];
  $stmt = $member->_dbh->prepare("SELECT user_id,profileid FROM vote WHERE user_id=:userid or profileid=:profileid");
         $stmt->execute(array(':userid'=>$userid,':profileid'=>$profileid));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
  

 if(!$user->is_loggedin())

{

 $user->redirect('login');

}



  if (isset($_GET['q'])){
        $user->logout();
        header("location:login");
    } 

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

       }else{

         print_r($errors);

      }

   }
 

  $myarray = array("profile_img"=>$file_name);

      try

      {

             if($user->imageupdate($myarray)) 

            {
 
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
  
      }else{

         print_r($errors);

      }

   }
 

  $myarray = array("timeline_img"=>$file_name);

     try

      {

             if($user->timelineupdate($myarray)) 

            {
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

         $user->redirect("");

     } 

     else{

                if($user->comments($myarray)) 

            {
 

                 $user->redirect("");

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
   
    if($replycomment == ''){

           echo 'Please Reply';

       }

 else {

      try

      {

             if($user->reply_comments($myarray)) 

            {

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

  if($profileid == $row['profileid'] || $_SESSION['url'] != ''){

   ?>

<?php include 'part/header.php'; ?>	 
<section>
 	<div class="container">
                     <!-- LEFT -->
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

                <div class="box-light"> 

                    <div class="box-inner">
 
                                <?php foreach ($comments as $comment){ ?>

                                    <ul class="comment list-unstyled">

                                        <li class="comment">
 
                                                 <?php if($comment['kik_img']!=''){ ?><img class="avatar" src="<?php echo $comment['kik_img'] ?>" width="50" height="50" /><?php }else { ?><img class="avatar" src="<?php echo $base_url ?>/img/noimage.jpg" width="50" height="50" /> <?php } ?>
  
                                                 <div class="comment-body"> 
                                                        <?php if($user_id != $comment['username']){ ?>
                                                        <a href="<?php echo $base_url ?>/user/profile/<?php echo $comment['username']; ?>" class="comment-author">
                                                                  <span><?php echo $comment['username']; ?></span>
                                                         </a>
                                                        <?php }else{ ?>
                                                         <a href="<?php echo $base_url ?>/profile/<?php echo $comment['username']; ?>" class="comment-author">
                                                                  <span><?php echo $comment['username']; ?></span>
                                                         </a>
                                                        <?php } ?>
                                                         <p><?php echo $comment['comments']; ?></p>

                                                </div> 

                                                <ul class="list-inline size-11 margin-top-10">

                                                        <li>
                                                             <a href="#" data-toggle="modal" data-target="#exampleModal,<?php echo $comment['commentid']; ?>" data-whatever="<?php echo $comment['commentid']; ?>" data-user="<?php echo $comment['username']; ?>" class="text-info"><i class="fa fa-reply"></i> Reply</a>
                                                        </li>

 
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
                                                                     <span><?php echo $com['username']; ?></span>
                                                            </a>
                                                       <?php }else{ ?>
                                                         <a href="<?php echo $base_url; ?>/profile/<?php echo $com['username'] ?>" class="comment-author">
                                                                     <span><?php echo $com['username']; ?></span>
                                                            </a>
                                                        <?php } ?>

                                                           <p><?php echo $com['replycomment']; ?></p>

                                                   </div> 
                                                    <ul class="list-inline size-11 margin-top-10"></ul><!-- /options -->

                                            </li>

                                            <?php } ?>

                                    </ul>

                                                         <?php } ?>
 
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

                     //  console.log(count);
                       $('.count').html(count);

                      $("button > .changback").css("background-color", "yellow");

                  }

                  else

                  {
                     $("button > .changback").css("background-color", "red");

                  }

              }

          });

      return false;

  });  
            
  </script>	 

 <?php }else{
   header("Location: $base_url/404");
          } ?>
<?php include 'part/footer.php'; ?>



