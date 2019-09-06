<?php
 

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

         $user->redirect("$profileid");

     } 

     else{

               if($user->userprofile_comments($myarray)) 

            {

                //$setting->redirect('sign-up.php?joined');

                // $sucess = 'Data Save Sucessfull';

                // echo 'success';

                 $user->redirect("$profileid");

            } else {

                echo 'error';

             }

          }

}

 if(isset($_POST['reportsubmit']))

{

       

       $user_id = trim($_POST['user_id']);

       $report_id = trim($_POST['report_id']);

       $report = trim($_POST['report']);

       $myarray = array("user_id"=>$user_id,"report_id"=>$report_id,"report"=>$report);

   

   //print_r($myarray);  die();

    

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