<?php
include_once "class.db.php";
class User {

    public function __construct() {
        $db = Db::getInstance();
        $this->_dbh = $db->getConnection();
    }

    //$value = array($fname,$lname,$uname,$umail,$upass);

    public function register($myarray) {
        
        $fname = $myarray['fname'];
        $lname = $myarray['lname'];
        $username = $myarray['username'];
        $kikuser = $myarray['kikuser'];
        $about = $myarray['about'];
        $country = $myarray['country'];
        $city = $myarray['city'];
        $email = $myarray['email'];
        $password = $myarray['password'];
        $gender = $myarray['gender'];
        $agree = $myarray['agree'];
        $newsleter = $myarray['newsleter'];
        $phone = $myarray['phone'];
        $other_accounts = $myarray['other_accounts'];
        $website = $myarray['website'];
        $profile_img = $myarray['profile_img'];
        $date = date("Y-m-d H:i:s");
        $suspended = '1';
       $ch = curl_init("http://kik.me/u/$kikuser");
CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER, true);
CURL_SETOPT($ch, CURLOPT_HEADER, false);

$data = curl_exec($ch);


$data = substr($data, 0, strpos($data, ' <meta property="og:site_name"   content="Kik"/>'));
$data = trim(substr($data, strpos($data, '<meta property="og:image"       content="')+strlen('<meta property="og:image"       content="')));
$data = substr($data,0,-3);  
          
        try {
            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);

            $stmt = $this->_dbh->prepare("INSERT INTO users(fname,lname,username,kikuser,about,country,city,email,password,gender,agree,newsleter,phone,other_accounts,website,profile_img,kik_img,date,suspended) 
                                                       VALUES(:fname,:lname,:username,:kikuser, :about, :country, :city, :email, :password,:gender,:agree,:newsleter, :phone, :other_accounts, :website, :profile_img,:data,:date,:suspended)");

            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":username", $username);
            $stmt->bindparam(":kikuser", $kikuser);
            $stmt->bindparam(":about", $about);
            $stmt->bindparam(":country", $country);
            $stmt->bindparam(":city", $city);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":password", $password);
            $stmt->bindparam(":gender", $gender);
            $stmt->bindparam(":phone", $phone);
            $stmt->bindparam(":agree", $agree);
            $stmt->bindparam(":newsleter", $newsleter);
            $stmt->bindparam(":other_accounts", $other_accounts);
            $stmt->bindparam(":website", $website);
            $stmt->bindparam(":profile_img", $profile_img);
            $stmt->bindparam(":data", $data);
            $stmt->bindparam(":date", $date);
            $stmt->bindparam(":suspended", $suspended);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
     public function update_profile($myarray) {
        
        //  print_r($myarray); //die();
        $user_id = $_SESSION['user_session'];
        $fname = $myarray['fname'];
        $lname = $myarray['lname'];
        $about = $myarray['about'];
        $kikuser = $myarray['kikuser'];
        $country = $myarray['country'];
        $city = $myarray['city'];
        $email = $myarray['email'];
        $gender = $myarray['gender'];
        $phone = $myarray['phone'];
        $other_accounts = $myarray['other_accounts'];
        $website = $myarray['website'];
        $profile_img = $myarray['profile_img'];
          try {
              
              
            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);

            $stmt = $this->_dbh->prepare("UPDATE users SET fname=:fname,lname=:lname,"
                    . "kikuser=:kikuser,about=:about,country=:country,city=:city,email=:email,gender=:gender,phone=:phone,other_accounts=:other_accounts,"
                    . "website=:website,profile_img=:profile_img WHERE username='$user_id'");

            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":about", $about);
            $stmt->bindparam(":kikuser", $kikuser);
            $stmt->bindparam(":country", $country);
            $stmt->bindparam(":city", $city);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":gender", $gender);
            $stmt->bindparam(":phone", $phone);
            $stmt->bindparam(":other_accounts", $other_accounts);
            $stmt->bindparam(":website", $website);
            $stmt->bindparam(":profile_img", $profile_img);
             $stmt->execute();
           //  print_r($stmt);             die();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function dataupdate($myarray){
        
        $user_id = $_SESSION['user_session'];
        $fname = $myarray['fname'];
        $lname = $myarray['lname'];
        $kikuser = $myarray['kikuser'];
        $country = $myarray['country'];
        $email = $myarray['email'];
        $phone = $myarray['phone'];
        $other_accounts = $myarray['other_accounts'];
        $website = $myarray['website'];
        $profile_img = $myarray['profile_img'];
          
        try {
            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);

            $stmt = $this->_dbh->prepare("UPDATE users SET fname=:fname,lname=:lname,"
                    . "kikuser=:kikuser,country=:country,email=:email,phone=:phone,other_accounts=:other_accounts,"
                    . "website=:website,profile_img=:profile_img WHERE username=$user_id");

            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":lname", $lname);
             $stmt->bindparam(":kikuser", $kikuser);
            $stmt->bindparam(":country", $country);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":phone", $phone);
            $stmt->bindparam(":other_accounts", $other_accounts);
            $stmt->bindparam(":website", $website);
            $stmt->bindparam(":profile_img", $profile_img);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function timelineupdate($myarray){
       //  print_r($myarray);  die();
        $user_id = $_SESSION['user_session'];
        $timeline_img = $myarray['timeline_img'];
          
        try {
            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);

            $stmt = $this->_dbh->prepare("INSERT INTO user_timeline(user_id,timeline_img) VALUES(:user_id,:timeline_img)");
            
            $stmt->bindparam(":user_id", $user_id);
            $stmt->bindparam(":timeline_img", $timeline_img);
            $stmt->execute();

            //print_r($stmt);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function imageupdate($myarray){
        $user_id = $_SESSION['user_session'];
        $profile_img = $myarray['profile_img'];
          
        try {
            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);

            $stmt = $this->_dbh->prepare("UPDATE users SET profile_img=:profile_img WHERE id=$user_id");
              
            $stmt->bindparam(":profile_img", $profile_img);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function login($myarray) {
        
        $uname = $myarray['emailusername'];
        $umail = $myarray['emailusername'];
        $upass = $myarray['password'];
        $date = date("Y-m-d H:i:s"); 
        
//        if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass'])){
//      $_SESSION['username'] = $_COOKIE['cookname'];
//      $_SESSION['password'] = $_COOKIE['cookpass'];
//   }
          
        try {
            $stmt = $this->_dbh->prepare("SELECT * FROM users WHERE username=:uname OR email=:umail and suspended = 1 LIMIT 1");
            $stmt->execute(array(':uname' => $uname, ':umail' => $umail));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
           // print_r($userRow);            die();
            if ($stmt->rowCount() > 0){  
                    $_SESSION['user_session'] = $userRow['username'];
                    $_SESSION['user_gender'] = $userRow['gender'];
                      $id = $_SESSION['user_session'];
                      
                       
            $stmt = $this->_dbh->prepare("INSERT INTO last_login(user_id,email,date)VALUES(:id,:umail,:date)");
            $stmt->bindparam(":id", $id);
            $stmt->bindparam(":umail", $umail);
            $stmt->bindparam(":date", $date);
           
            $stmt->execute();
                    return true;
                     
            }
          
        } catch (PDOException $e) {
           // echo $e->getMessage();
        }
         
          
    }
    public function last_online() {

        $ten_minutes_ago = time() - (60 * 10);

    $datetime = date("Y-m-d H:i:s", $ten_minutes_ago);

        $user_id = $_SESSION['user_session'];
        $stmt = $this->_dbh->prepare("SELECT * FROM last_login WHERE user_id=:user_id and date >= '$datetime' order by date DESC");
        $stmt->execute(array(":user_id" => $user_id));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $userRow ;
    }
   public function last_online_users() {

//        $ten_minutes_ago = time() - (60 * 10);
//
//    $datetime = date("Y-m-d H:i:s", $ten_minutes_ago);

          $profileid = $_GET['id'];       // die();
        
        $stmt = $this->_dbh->prepare("SELECT * FROM last_login WHERE user_id=:profileid order by date DESC");
        $stmt->execute(array(":profileid" => $profileid));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        
         // print_r($userRow);        die();
        return $userRow ;
    }
     public function is_loggedin() {
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }

    public function redirect($url) {
        header("Location: $url");
    }

    public function logout() {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

    public function changepass($myarray) {

        $password = $myarray['password'];
        $newpassword = $myarray['newpassword'];
        $confirmnewpassword = $myarray['confirmnewpassword'];
 
//        echo $user_id;
//        print_r($data);        exit();
        $user_id = $_SESSION['user_session'];
        $status = "OK";
        $msg = "";
        try { 

            $count = $this->_dbh->prepare("select user_pass from users where id=:user_id");

            $count->bindParam(":user_id", $user_id, PDO::PARAM_STR, 15);

            $count->execute();

            $row = $count->fetch(PDO::FETCH_OBJ);



            if ($row->user_pass <> md5($password)) {

                 $msg = $msg . "Your old password  is not matching as per our record.<BR>";
                
                $status = "NOTOK";
            }
            if (strlen($newpassword) < 3 or strlen($confirmnewpassword) > 8) {

                 $msg = $msg . "Password must be more than 3 char legth and maximum 8 char lenght<BR>";

                $status = "NOTOK";
            }

            if ($newpassword <> $confirmnewpassword) {

                  $msg = $msg . "Both passwords are not matching<BR>";

                $status = "NOTOK";
            }


            if ($status <> "OK") {

                echo "<font face='Verdana' size='2' color=red>$msg</font>";
            } else { // if all validations are passed.
                $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
        //$newpassword=md5($newpassword); // Encrypt the password before storing
        //if(mysql_query("update plus_signup set password='$password' where userid='$_SESSION[userid]'")){

                $sql = $this->_dbh->prepare("update users set user_pass=:newpassword where id=$user_id");

                $sql->bindParam(':newpassword', $newpassword, PDO::PARAM_STR, 32);

                if ($sql->execute()) {

                    echo "<font face='Verdana' size='2' ><center>Thanks <br> 

                    Your password changed successfully. Please keep changing your password for better security</font></center>";
                } else {

                    echo "<font face='Verdana' size='2' color=red><center>Sorry <br>
 
                     Failed to change password Contact Site Admin</font></center>";
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getvalue() {

        $user_id = $_SESSION['user_session'];
        $stmt = $this->_dbh->prepare("SELECT * FROM users WHERE username=:user_id");
        $stmt->execute(array(":user_id" => $user_id));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $userRow ;
    }
     public function getvalue_userprofile() {

        $user_id = $_SESSION['user_session'];
        $stmt = $this->_dbh->prepare("SELECT * FROM users WHERE id=:user_id");
        $stmt->execute(array(":user_id" => $user_id));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $userRow ;
    }
    public function latest_blog(){
 
         try {
  
    $sql = 'select * from blog order by id DESC Limit 5';
 
    $q = $this->_dbh->prepare($sql);
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);
 
     return $ra = $q->fetchAll();
     
} catch (PDOException $e) {
            echo $e->getMessage();
        }  
        
     }
    public function getcountry() {

       $stmt = $this->_dbh->prepare("SELECT * FROM country order by id ASC");
        $stmt->execute();
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $userRow ;
    }
    public function get_all_user() {

        $user_id = $_SESSION['user_session'];
        $stmt = $this->_dbh->prepare("SELECT * FROM users order by id ASC");
        $stmt->execute(array(":user_id" => $user_id));
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $userRow ;
    }
     public function get_recent_three_user() {
        // $user_id = $_SESSION['user_session'];
        $stmt = $this->_dbh->prepare("SELECT * FROM users order by id DESC Limit 3");
        $stmt->execute(array(":user_id" => $user_id));
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $userRow ;
    }
    
    public function get_all_random_user() {
    
    	$user_gender = $_SESSION['user_gender'];
        $user_id = $_SESSION['user_session'];
        $stmt = $this->_dbh->prepare("Select * from users where `username` not in( Select profileid from vote where user_id='$user_id') and gender != '$user_gender' and kik_img  != '' order by rand() limit 1");
        $stmt->execute(array(":user_id" => $user_id));
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $userRow ;
    }
    public function profile_username() {
        $profileid = $_GET['id'];
        $user_id = $_SESSION['user_session'];
        $stmt = $this->_dbh->prepare("SELECT * FROM users WHERE username= '".$profileid."'");
        $stmt->execute();
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $userRow ;
    }
    
//    public function get_all_user_index() {
//
//        $user_id = $_SESSION['user_session'];
//        $stmt = $this->_dbh->prepare("SELECT * FROM users  order by id DESC");
//        $stmt->execute(array(":user_id" => $user_id));
//        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        
//        return $userRow ;
//    }
    public function get_all_user_profile() {
        $profile_id = $_GET['id'];
        //echo $profile_id;
        $user_id = $_SESSION['user_session'];
        $stmt = $this->_dbh->prepare("SELECT * FROM users WHERE username=:profile_id order by id DESC");
        $stmt->execute(array(":profile_id" => $profile_id));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $userRow ;
    }
//     public function getvalue_user_timeline() {
//
//        $user_id = $_SESSION['user_session'];
//        $stmt = $this->_dbh->prepare("SELECT * FROM user_timeline WHERE user_id=:user_id order by id DESC");
//        $stmt->execute(array(":user_id" => $user_id));
//        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
//        
//        return $userRow ;
//    }
     public function profile_viewer_insert($myarray){
        //print_r($myarray);
         $profileid = $myarray['id'];   
         $user_id = $myarray['user_id'];
         $ip = $myarray['ip'];
         $date = date("Y-m-d H:i:s");
            
         $stmt = $this->_dbh->prepare("SELECT * FROM profileview WHERE user_id=:user_id and visitor_user_id=:profileid");
         $stmt->execute(array(':user_id'=>$user_id, ':profileid'=>$profileid));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
          //  print_r($row); die();
         
//           if($row['user_id'] == $user_id && $row['visitor_user_id'] == $profileid){
//             echo 'user_id';
//         }
         // else{
             
        try {
            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);
            
             $stmt = $this->_dbh->prepare("INSERT INTO profileview(user_id, visitor_user_id,ip, date_time) VALUES(:user_id,:profileid,:ip,:date)");
            
            $stmt->bindparam(":profileid", $profileid);
            $stmt->bindparam(":user_id", $user_id);
            $stmt->bindparam(":ip", $ip); 
            $stmt->bindparam(":date", $date);
            $stmt->execute();

             //print_r($stmt);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
       //  }
}
public function blog_comments($myarray){
            //print_r($myarray); die();
        $blog_id = $myarray['blog_id'];
        $date = date("Y-m-d H:i:s");
        $author = $myarray['author'];
        $contact_email = $myarray['contact_email'];
        $website = $myarray['website']; 
        $comment = $myarray['comment'];
          
        try {
            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);

            $stmt = $this->_dbh->prepare("INSERT INTO blog_comments(blog_id,author,contact_email,website,comment,date) VALUES(:blog_id,:author,:contact_email,:website,:comment,:date)");
            
            $stmt->bindparam(":blog_id", $blog_id);
            $stmt->bindparam(":author", $author);
            $stmt->bindparam(":contact_email", $contact_email);
            $stmt->bindparam(":website", $website);
            $stmt->bindparam(":comment", $comment);
            $stmt->bindparam(":date", $date);
            $stmt->execute();

             //print_r($stmt);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
}

public function blog_comments_show() {

        $title = $_GET['blog'];
        $stmt = $this->_dbh->prepare("SELECT * from blog_comments where  blog_id= '$title'  order by id DESC");
        $stmt->execute(array(":user_id" => $user_id));
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $userRow ;
    }
    public function blog_comments_count() {

        $title = $_GET['blog'];
        $stmt = $this->_dbh->prepare("SELECT *,count(*) as total from blog_comments where  blog_id= '$title'");
        $stmt->execute(array(":user_id" => $user_id));
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $userRow ;
    }
    public function comments($myarray){
       // print_r($myarray);
        $date = date("Y-m-d H:i:s");
        $user_id = $_SESSION['user_session'];
        $profileid = 0;
        $comments = $myarray['comments'];
          
        try {
            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);

            $stmt = $this->_dbh->prepare("INSERT INTO comments(user_id,profileid,comments,date) VALUES(:user_id,:profileid,:comments,:date)");
            
            $stmt->bindparam(":user_id", $user_id);
            $stmt->bindparam(":profileid", $profileid);
            $stmt->bindparam(":comments", $comments);
            $stmt->bindparam(":date", $date);
            $stmt->execute();

             //print_r($stmt);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
}
public function reply_comments($myarray){
         //print_r($myarray);
        $date = date("Y-m-d H:i:s");
        $user_id = $_SESSION['user_session'];
        if($_GET['id'] != ''){
        $profileid = $_GET['id'];
        }else{
            $profileid = '0';
        }
        $comment_id = $myarray['comment_id'];
        
        $replycomment = $myarray['replycomment'];
       
          
        try {
            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);

            $stmt = $this->_dbh->prepare("INSERT INTO comments_reply(comment_id,user_id,profileid,replycomment,date) VALUES(:comment_id,:user_id,:profileid,:replycomment,:date)");
            
            $stmt->bindparam(":comment_id", $comment_id);
            $stmt->bindparam(":user_id", $user_id);
            $stmt->bindparam(":profileid", $profileid);
            $stmt->bindparam(":replycomment", $replycomment);
            $stmt->bindparam(":date", $date);
            $stmt->execute();

            //print_r($stmt);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
}
public function reply_blog_comments($myarray){
         //print_r($myarray);
        $date = date("Y-m-d H:i:s");
        $blog_id = $myarray['blog_id'];
        
        $comment_id = $myarray['comment_id'];
        
        $replycomment = $myarray['replycomment'];
       
          
        try {
            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);

            $stmt = $this->_dbh->prepare("INSERT INTO comments_blog_reply(comment_id,blog_id,replycomment,date) VALUES(:comment_id,:blog_id,:replycomment,:date)");
            
            $stmt->bindparam(":comment_id", $comment_id);
            $stmt->bindparam(":blog_id", $blog_id);
            $stmt->bindparam(":replycomment", $replycomment);
            $stmt->bindparam(":date", $date);
            $stmt->execute();

            //print_r($stmt);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
}

public function userprofile_comments($myarray){
        $date = date("Y-m-d H:i:s");

        $user_id = $myarray['user_id'];
        $profileid = $myarray['profileid'];
        $comments = $myarray['comments'];
          
        try {
            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);

            $stmt = $this->_dbh->prepare("INSERT INTO comments(user_id,profileid,comments,date) VALUES(:user_id,:profileid,:comments,:date)");
            
            $stmt->bindparam(":user_id", $user_id);
            $stmt->bindparam(":profileid", $profileid);
            $stmt->bindparam(":comments", $comments);
            $stmt->bindparam(":date", $date);
            $stmt->execute();

            //print_r($stmt);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
}
public function getvalue_reply_comments() {

        $profileid = $_GET['id'];
        $user_id = $_SESSION['user_session'];
        $stmt = $this->_dbh->prepare("SELECT * FROM comments INNER JOIN comments_reply ON comments.id=comments_reply.comment_id where comments.user_id=:user_id && comments.profileid='0' order by comments.id DESC");
        $stmt->execute(array(":user_id" => $user_id));
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
       // print_r($userRow); die();
        return $userRow ;
    }
public function getvalue_comments() {

        $user_id = $_SESSION['user_session'];
        $stmt = $this->_dbh->prepare("SELECT *,comments.id as commentid FROM comments INNER JOIN users ON comments.user_id=users.username where comments.user_id=:user_id && comments.profileid='0' or comments.profileid=:user_id order by comments.id DESC");
        $stmt->execute(array(":user_id" => $user_id));
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $userRow ;
    }

  public function getvalue_userprofile_comments() {

        $profile_id = $_GET['id'];
       // echo $profile_id;
        $user_id = $_SESSION['user_session'];
        $stmt = $this->_dbh->prepare("SELECT *,comments.id as commentid FROM comments INNER JOIN users ON comments.user_id=users.username where  comments.user_id=:profile_id && comments.profileid='0' or comments.profileid=:profile_id order by comments.id DESC");
        $stmt->execute(array(":profile_id" => $profile_id));
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $userRow ;
    }
    public function search_users($myarray){
        echo $username = $myarray['username'];
        $stmt = $this->_dbh->prepare("SELECT * from users where username like '%$username%' order by id DESC");
        $stmt->execute();
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($userRow);
        return $userRow ;
    }
  public function subscribeMail($email,$ip_address2){
          
        $curr_date = date('m/d/Y h:i:s', time());
         try
       {
    
            $stmt = $this->_dbh->prepare("INSERT INTO subscribe_mail(email,ip_address2,curr_date)VALUES(:email, :ip_address2, :curr_date)");
              
            
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":ip_address2", $ip_address2);
            $stmt->bindparam(":curr_date", $curr_date);
             
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
        
    }
    
     public function meta_show(){
 
         try {
  
    $sql = 'select * from meta order by id DESC';
 
    $q = $this->_dbh->prepare($sql);
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);
 
    
    return $ra = $q->fetch();
     
} catch (PDOException $e) {
            echo $e->getMessage();
        }  
        
  
    }
    
      public function block_show(){
 
         try {
  
    $sql = 'select * from block_item order by id DESC';
 
    $q = $this->_dbh->prepare($sql);
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);
 
    
    return $ra = $q->fetch();
     
} catch (PDOException $e) {
            echo $e->getMessage();
        }  
   
    }
     
    public function select_city(){
 
         try {
  
    $sql = "SELECT * FROM `users` WHERE city != '' group by city";
 
    $q = $this->_dbh->prepare($sql);
    $q->execute();
    $q->setFetchMode(PDO::FETCH_ASSOC);
 
    
    return $ra = $q->fetchAll();
     
} catch (PDOException $e) {
            echo $e->getMessage();
        }  
        
  
    }
}


?>