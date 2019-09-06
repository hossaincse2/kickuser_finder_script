<?php
include_once "class.db.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class
 *
 * @author RS
 */
class Member {
    
    public function __construct() {
        $db = Db::getInstance();
        $this->_dbh = $db->getConnection();
    }
//put your code here
    public function count_profile_view(){
        $user_id = $_SESSION['user_session'];
        $profileid = $_GET['id'];
        $stmt = $this->_dbh->prepare("SELECT *,COUNT(*) as view FROM `profileview` WHERE  `visitor_user_id` = '".$profileid."'");
        $stmt->execute();
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $userRow;
    }
     public function count_user_profile_view(){
        $user_id = $_SESSION['user_session'];
        $profileid = $_GET['id'];
        $stmt = $this->_dbh->prepare("SELECT *,COUNT(*) as view FROM `profileview` WHERE  `visitor_user_id` = '".$user_id."'");
        $stmt->execute();
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
       // print_r($userRow);
                //die();
        return $userRow;
    }
     public function count_comment(){
        $user_id = $_SESSION['user_session'];
        $profileid = $_GET['id'];
        $stmt = $this->_dbh->prepare("SELECT *,COUNT(id) as comments FROM `comments` WHERE  `user_id` = '".$profileid."' && `profileid` = '0' or `profileid` = '".$profileid."'");
        $stmt->execute(array(":id" => $id));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $userRow;
    }
    public function count_comment_profile(){
        $user_id = $_SESSION['user_session'];
        $profileid = $_GET['id'];
        $stmt = $this->_dbh->prepare("SELECT *,COUNT(id) as comments FROM `comments` WHERE `user_id` = '".$user_id."' && `profileid` = '0' or `profileid` = '".$user_id."'");
        $stmt->execute(array(":id" => $id));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $userRow;
    }
    
     public function count_all_member(){
        $stmt = $this->_dbh->prepare("SELECT *,COUNT(id) as all_members FROM `users`");
        $stmt->execute(array(":id" => $id));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $userRow;
    }
     public function count_guy_member(){
        $stmt = $this->_dbh->prepare("SELECT *,COUNT(id) as guy FROM `users` WHERE `gender` = 1");
        $stmt->execute(array(":id" => $id));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
         return $userRow;
    }
    public function count_girl_member(){
        $stmt = $this->_dbh->prepare("SELECT *,COUNT(id) as girl FROM `users` WHERE `gender` = 2");
        $stmt->execute(array(":id" => $id));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
         return $userRow;
    }
     public function count_recent_member(){
         $tt = time()  - 4*24*3600;
        $day = date('Y-m-d',$tt); 
        $stmt = $this->_dbh->prepare("SELECT *,COUNT(*) as recent FROM `users` WHERE `date` > '$day'");
        $stmt->execute(array(":id" => $id));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
         // print_r($userRow); die();
         return $userRow;
    }
     public function get_recent_member(){
        $tt = time()  - 4*24*3600;
        $day = date('Y-m-d',$tt); 
        $stmt = $this->_dbh->prepare("SELECT * FROM `users` WHERE `date` > '$day' order by id DESC");
        $stmt->execute(array(":id" => $id));
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $userRow;
    }
    public function get_guy_member(){
        $stmt = $this->_dbh->prepare("SELECT * FROM `users` WHERE `gender` = 1 order by id");
        $stmt->execute(array(":id" => $id));
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $userRow;
    }
     public function get_girl_member(){
        $stmt = $this->_dbh->prepare("SELECT * FROM `users` WHERE `gender` = 2 order by id");
        $stmt->execute(array(":id" => $id));
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $userRow;
    }
    public function get_hotest_allmembers(){
        $stmt = $this->_dbh->prepare("SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.username group by vote.profileid order by votecount desc");
        $stmt->execute();
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $userRow;
    }
    public function get_hotest_allmemberstop5(){
        $stmt = $this->_dbh->prepare("SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.username group by vote.profileid order by votecount desc Limit 5");
        $stmt->execute();
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $userRow;
    }
     public function get_girl_top5(){
        $stmt = $this->_dbh->prepare("SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.username where users.gender=2 group by vote.profileid order by votecount desc LIMIT 5");
        $stmt->execute();
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
       // print_r($userRow); die();
         return $userRow;
    }
    public function get_guys_top5(){
        $stmt = $this->_dbh->prepare("SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.username where users.gender=1 group by vote.profileid order by votecount desc LIMIT 5");
        $stmt->execute();
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $userRow;
    }
    public function get_hotest_girl(){
        $stmt = $this->_dbh->prepare("SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.username where users.gender = 2 group by vote.profileid order by votecount desc");
        $stmt->execute();
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $userRow;
    }
    public function get_hotest_guys(){
        $stmt = $this->_dbh->prepare("SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.username where users.gender = 1 group by vote.profileid order by votecount desc ");
        $stmt->execute(array(":id" => $id));
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $userRow;
    }
    
    public function vote_count($myarray){
        //print_r($myarray);
        $date = date("Y-m-d H:i:s");
        $user_id = $myarray['user_id'];
        //$user_id = $_SESSION['user_session'];
        //$profileid = $_GET['id'];
        $profileid = $myarray['profileid'];
         
         try {
             
            $stmt = $this->_dbh->prepare("INSERT INTO vote(user_id,profileid,date) VALUES(:user_id,:profileid,:date)");
            
            $stmt->bindparam(":user_id", $user_id);
            $stmt->bindparam(":profileid", $profileid);
            $stmt->bindparam(":date", $date);
            $stmt->execute();

            //print_r($stmt);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function count_vote(){
        $profileid = $_GET['id'];
        $stmt = $this->_dbh->prepare("SELECT *,COUNT(id) as votes FROM `vote` WHERE `profileid` = '".$profileid."'");
        $stmt->execute();
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($userRow);        die();
         return $userRow;
    }
    public function count_vote_profile(){
        $user_id = $_SESSION['user_session'];
        $stmt = $this->_dbh->prepare("SELECT *,COUNT(id) as votes FROM `vote` WHERE `profileid` = '".$user_id."'");
        $stmt->execute();
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($userRow);
         return $userRow;
    }
     public function count_given_votes_profile(){
        $user_id = $_SESSION['user_session'];
        $stmt = $this->_dbh->prepare("SELECT *,COUNT(id) as votes FROM `vote` WHERE `user_id` = '".$user_id."'");
        $stmt->execute();
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($userRow);
         return $userRow;
    }
     public function count_given_votes_user_profile(){
        $user_id = $_SESSION['user_session'];
        $profileid = $_GET['id'];
        $stmt = $this->_dbh->prepare("SELECT *,COUNT(id) as votes FROM `vote` WHERE  `user_id` = '".$profileid."'");
        $stmt->execute();
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($userRow);
         return $userRow;
    }
    public function votes_profile(){
        $user_id = $_SESSION['user_session'];
        $profileid = $_GET['id'];
        $stmt = $this->_dbh->prepare("SELECT *,vote.id as voteid FROM vote INNER JOIN users ON vote.user_id=users.username where vote.profileid='".$user_id."' and vote.user_id!='".$user_id."'  order by vote.id DESC");
        $stmt->execute();
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($userRow);     die();
        return $userRow;
    }
    public function given_votes_profile(){
        $user_id = $_SESSION['user_session'];
        $profileid = $_GET['id'];
        $stmt = $this->_dbh->prepare("SELECT *,vote.id as voteid FROM vote INNER JOIN users ON vote.user_id=users.username where vote.user_id='".$user_id."' and vote.profileid!='".$user_id."'  order by vote.id DESC");
        $stmt->execute();
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
       // print_r($userRow);     die();
        return $userRow;
    }
    public function votes_user_profile(){
        $user_id = $_SESSION['user_session'];
        $profileid = $_GET['id'];
        $stmt = $this->_dbh->prepare("SELECT *,vote.id as voteid FROM vote INNER JOIN users ON vote.user_id=users.username where vote.profileid='".$profileid."' and vote.user_id!='".$profileid."' order by vote.id DESC");
        $stmt->execute();
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($userRow);     die();
        return $userRow;
    }
    public function given_votes_user_profile(){
        $user_id = $_SESSION['user_session'];
        $profileid = $_GET['id'];
        $stmt = $this->_dbh->prepare("SELECT *,vote.id as voteid FROM vote INNER JOIN users ON vote.user_id=users.username where vote.user_id='".$profileid."' and vote.profileid!='".$profileid."'  order by vote.id DESC");
        $stmt->execute();
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
       // print_r($userRow);     die();
        return $userRow;
    }
    
     public function blog_show(){
 
         try {
  
    $sql = 'select * from blog order by id DESC';
 
    $q = $this->_dbh->prepare($sql);
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);
 
     return $ra = $q->fetchAll();
     
} catch (PDOException $e) {
            echo $e->getMessage();
        }  
        
     }
      
     public function blog_show_detail(){
         
        $title = $_GET['slug'];
         try {
  
    $sql = "select * from blog where slug = '$title'";
 
    $q = $this->_dbh->prepare($sql);
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);
 
     return $ra = $q->fetch();
     
} catch (PDOException $e) {
            echo $e->getMessage();
        }  
        
     }
}
