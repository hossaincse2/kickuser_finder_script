<?php session_start(); include_once 'include/class.member.php'; $member = new Member();        $userid = $_POST['user_id'];         $profileid = trim($_POST['profileid']);                $myarray = array("user_id"=>$userid,"profileid"=>$profileid);        $stmt = $member->_dbh->prepare("SELECT user_id,profileid FROM vote WHERE user_id=:userid and profileid=:profileid");         $stmt->execute(array(':userid'=>$userid,':profileid'=>$profileid));         $row=$stmt->fetch(PDO::FETCH_ASSOC);          if($row['user_id']==$userid && $row['profileid']==$profileid) {              echo 'error';          }           else          {              if($member->vote_count($myarray))              {                  echo 'success';             }          }         