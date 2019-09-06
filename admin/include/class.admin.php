<?php

 include_once "class.db.php";

class Admin{

    public function __construct() {

        $db = Db::getInstance();

        $this->_dbh = $db->getConnection();

    }



    //$value = array($fname,$lname,$uname,$umail,$upass);



    public function register($myarray) {

        

        $fullname = $myarray['fullname'];

        $user_name = $myarray['user_name'];

        $user_email = $myarray['user_email'];

        $user_pass = $myarray['user_pass'];

         

        try {

            $new_password = password_hash($user_pass, PASSWORD_DEFAULT);



            $stmt = $this->_dbh->prepare("INSERT INTO reg(fullname,user_name,user_email,user_pass) 

                                                       VALUES(:fullname,:user_name, :user_email, :user_pass)");



            $stmt->bindparam(":fullname", $fullname);

            $stmt->bindparam(":user_name", $user_name);

            $stmt->bindparam(":user_email", $user_email);

            $stmt->bindparam(":user_pass", $new_password);

            $stmt->execute();



            return $stmt;

        } catch (PDOException $e) {

            echo $e->getMessage();

        }

    }

    public function country_insert($myarray) {

        

        $code = $myarray['code'];

        $name = $myarray['name'];

        

       // print_r($myarray);

        

        try {

         //   $new_password = password_hash($user_pass, PASSWORD_DEFAULT);



            $stmt = $this->_dbh->prepare("INSERT INTO country(country_code,counrty_name) VALUES(:code,:name)");



            $stmt->bindparam(":code", $code);

            $stmt->bindparam(":name", $name);

            $stmt->execute();



            return $stmt;

        } catch (PDOException $e) {

            echo $e->getMessage();

        }

    }

    public function block_item_insert($myarray) {

        

        $block_active = $myarray['block_active'];

          

       // print_r($myarray);

        

        try {

         //   $new_password = password_hash($user_pass, PASSWORD_DEFAULT);



            $stmt = $this->_dbh->prepare("UPDATE block_item SET block_active=:block_active WHERE id=1");



            $stmt->bindparam(":block_active", $block_active);

            $stmt->execute();



            return $stmt;

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

    public function meta_insert($myarray) {

        

        $metakey = $myarray['metakey'];

        $metadescription = $myarray['metadescription'];

       // print_r($myarray);

        

        try {

         //   $new_password = password_hash($user_pass, PASSWORD_DEFAULT);



            $stmt = $this->_dbh->prepare("UPDATE meta SET metakey=:metakey,metadescription=:metadescription WHERE id=1");



            $stmt->bindparam(":metakey", $metakey);

            $stmt->bindparam(":metadescription", $metadescription);

            $stmt->execute();



            return $stmt;

        } catch (PDOException $e) {

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

    public function blog_insert($myarray) {

        

    $title = $myarray['title'];

    $description = $myarray['description'];

    $metakey = $myarray['metakey'];

    $metadescription = $myarray['metadescription'];

    $date = date("Y-m-d H:i:s");

      

        $text = strtolower($title);
        $slug_create=preg_replace('/[^A-Za-z0-9-]+/', '-', $text);     
        $slug = $slug_create.'/';
 

        try {

         //   $new_password = password_hash($user_pass, PASSWORD_DEFAULT);



            $stmt = $this->_dbh->prepare("INSERT INTO blog(title,description,metakey,metadescription,date,slug) VALUES(:title,:description,:metakey,:metadescription,:date,:slug)");



            $stmt->bindparam(":title", $title);

            $stmt->bindparam(":description", $description);

            $stmt->bindparam(":metakey", $metakey);

            $stmt->bindparam(":metadescription", $metadescription);

            $stmt->bindparam(":date", $date);

            $stmt->bindparam(":slug", $slug);

            $stmt->execute();



            return $stmt;

        } catch (PDOException $e) {

            echo $e->getMessage();

        }

    }

     public function blog_update($myarray) {

        

        $title = $myarray['title'];

       $description = $myarray['description'];

       $metakey = $myarray['metakey'];

    $metadescription = $myarray['metadescription'];

        //print_r($myarray); die();

        $id=$_GET['id'];

        try {

         //   $new_password = password_hash($user_pass, PASSWORD_DEFAULT);



            $stmt = $this->_dbh->prepare("UPDATE blog SET title=:title,description=:description,metakey=:metakey,metadescription=:metadescription WHERE id=:id");



            $stmt->bindparam(":title", $title);

            $stmt->bindparam(":description", $description);

            $stmt->bindparam(":metakey", $metakey);

            $stmt->bindparam(":metadescription", $metadescription);

            $stmt->bindparam(":id", $id);

            $stmt->execute();



            return $stmt;

        } catch (PDOException $e) {

            echo $e->getMessage();

        }

    }

     public function update_blog_show(){

           $id=$_GET['id'];

         try {

  

    $sql = "select * from blog where id='$id'   order by id DESC";

 

    $q = $this->_dbh->prepare($sql);

    $q->execute(array(':id' => $id));

    $q->setFetchMode(PDO::FETCH_ASSOC);

 

     return $ra = $q->fetch();

     

} catch (PDOException $e) {

            echo $e->getMessage();

        }  

        

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

     public function delete_blog() {

  $id=$_GET['id'];

$result = $this->_dbh->prepare("DELETE FROM blog WHERE id= :id");

$result->bindParam(':id', $id);

$result->execute();

      }

     public function getvalue_country() {

         

         $stmt = $this->_dbh->prepare("SELECT * FROM country order by id DESC");

        $stmt->execute();

        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);

        

        return $userRow ;

    }

     public function delete_country() {

  $id=$_GET['id'];

$result = $this->_dbh->prepare("DELETE FROM country WHERE id= :id");

$result->bindParam(':id', $id);

$result->execute();

      }

      

      public function getvalue_admin() {

         

         $stmt = $this->_dbh->prepare("SELECT * FROM reg order by id DESC");

        $stmt->execute();

        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);

        

        return $userRow ;

    }

     public function delete_admin() {

  $id=$_GET['id'];

$result = $this->_dbh->prepare("DELETE FROM reg WHERE id= :id");

$result->bindParam(':id', $id);

$result->execute();

      }

      

     public function update_profile($myarray) {

        

      // print_r($myarray); //die();

        $user_id = $_SESSION['user_session'];

         $profile_id = $_GET['id'];

        $fname = $myarray['fname'];

        $lname = $myarray['lname'];

        $about = $myarray['about'];

        $kikuser = $myarray['kikuser'];

        $country = $myarray['country'];

        $email = $myarray['email'];

        $gender = $myarray['gender'];

        $phone = $myarray['phone'];

        $other_accounts = $myarray['other_accounts'];

        $website = $myarray['website'];

           try {

            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);



            $stmt = $this->_dbh->prepare("UPDATE users SET fname=:fname,lname=:lname,"

                    . "kikuser=:kikuser,about=:about,country=:country,email=:email,gender=:gender,phone=:phone,other_accounts=:other_accounts,"

                    . "website=:website WHERE username='$profile_id'");



            $stmt->bindparam(":fname", $fname);

            $stmt->bindparam(":lname", $lname);

            $stmt->bindparam(":about", $about);

            $stmt->bindparam(":kikuser", $kikuser);

            $stmt->bindparam(":country", $country);

            $stmt->bindparam(":email", $email);

            $stmt->bindparam(":gender", $gender);

            $stmt->bindparam(":phone", $phone);

            $stmt->bindparam(":other_accounts", $other_accounts);

            $stmt->bindparam(":website", $website);

              $stmt->execute();

           //  print_r($stmt);             die();

            return $stmt;

        } catch (PDOException $e) {

            echo $e->getMessage();

        }

    }



    public function login($myarray) {

        

        $uname = $myarray['emailusername'];

        $umail = $myarray['emailusername'];

        $upass = $myarray['password'];

         

        

        try {

            $stmt = $this->_dbh->prepare("SELECT * FROM reg WHERE user_name=:uname OR user_email=:umail LIMIT 1");

            $stmt->execute(array(':uname' => $uname, ':umail' => $umail));

            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() > 0){  

                    $_SESSION['user_session'] = $userRow['id'];

                    return true;

                     

            }

        } catch (PDOException $e) {

           // echo $e->getMessage();

        }

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



            $count = $this->_dbh->prepare("select user_pass from reg where id=:user_id");



            $count->bindParam(":user_id", $user_id, PDO::PARAM_STR, 15);



            $count->execute();



            $row = $count->fetch(PDO::FETCH_OBJ);



            // print_r($row);            die();



            if ($row->user_pass = password_hash($password, PASSWORD_DEFAULT)) {



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



                $sql = $this->_dbh->prepare("update reg set user_pass=:newpassword where id=$user_id");



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

      public function getvalue_user() {

        $profile_id = $_GET['id'];

        //echo $profile_id;

        $user_id = $_SESSION['user_session'];

        $stmt = $this->_dbh->prepare("SELECT * FROM users WHERE username=:profile_id order by id DESC");

        $stmt->execute(array(":profile_id" => $profile_id));

        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

        

        return $userRow ;

    }

    public function getvalue_admin_login() {

        //$profile_id = $_GET['id'];

        //echo $profile_id;

        $user_id = $_SESSION['user_session'];

        $stmt = $this->_dbh->prepare("SELECT * FROM reg WHERE id=:user_id order by id DESC");

        $stmt->execute(array(":user_id" => $user_id));

        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

        

        return $userRow ;

    }

    public function getvalue() {



        $stmt = $this->_dbh->prepare("SELECT * FROM users order by id DESC");

        $stmt->execute();

        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);

        

        return $userRow ;

    }

    public function getvalue_suspenduser() {



        $stmt = $this->_dbh->prepare("SELECT * FROM users where suspended = 2 order by id DESC");

        $stmt->execute();

        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);

        

        return $userRow ;

    }

    public function delete_user() {

  $id=$_GET['id'];

$result = $this->_dbh->prepare("delete from p, i using users p, vote i where p.username = i.user_id and p.username = :id or p.username = i.profileid and p.username = :id ");

$result->bindParam(':id', $id);

$result->execute();

      }

      

       public function get_hotest_allmembers(){

        $stmt = $this->_dbh->prepare("SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.username group by vote.profileid order by votecount desc");

        $stmt->execute();

        $userRow1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        

        $stmt = $this->_dbh->prepare("SELECT *, count(*) as given FROM vote INNER JOIN users ON vote.user_id=users.username group by vote.user_id order by given desc");

        $stmt->execute();

        $userRow2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        

        $userRow = array_merge($userRow1,$userRow2);

        

         return $userRow;

    }

    public function get_hotest_given(){

         

        $stmt = $this->_dbh->prepare("SELECT *, count(*) as given FROM vote INNER JOIN users ON vote.user_id=users.username group by vote.user_id order by given desc");

        $stmt->execute();

        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);

         

         return $userRow;

    }

     public function get_vote_recive(){

        $stmt = $this->_dbh->prepare("SELECT *, count(*) as votecount FROM vote INNER JOIN users ON vote.profileid=users.username group by vote.profileid order by votecount desc");

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

    public function get_reports(){

        $stmt = $this->_dbh->prepare("SELECT report.id as serialid, report.user_id as report_username,au.username as username,au.id as rid,pu.id as uid,au.kikuser as rkik,pu.kikuser as ukik,au.date,report.report, au.suspended as suspended FROM report INNER JOIN users au ON report.report_id=au.username Join users pu on report.user_id = pu.username order by report.date desc");

        $stmt->execute();

        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);

        

       // print_r($userRow); die();

        

        return $userRow;

    }

     public function user_suspend() {

        

      // print_r($myarray); //die();

        //$user_id = $_SESSION['user_session'];

           $suspended = $_GET['sid'];

            $id = $_GET['ssid'];          // die();

        

           try {

            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);



            $stmt = $this->_dbh->prepare("UPDATE users SET suspended=:suspended WHERE username='$id'");



            $stmt->bindparam(":suspended", $suspended);

            $stmt->execute();

           //  print_r($stmt);             die();

            return $stmt;

        } catch (PDOException $e) {

            echo $e->getMessage();

        }

    }

    public function user_suspend_report() {

        

     // print_r($myarray); //die();

        //$user_id = $_SESSION['user_session'];

           $suspended = $_GET['sid'];

           echo $id = $_GET['ssid'];           //die();

        

           try {

            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);



            $stmt = $this->_dbh->prepare("UPDATE users SET suspended=:suspended WHERE id=$id");



            $stmt->bindparam(":suspended", $suspended);

            $stmt->execute();

           //  print_r($stmt);             die();

            return $stmt;

        } catch (PDOException $e) {

            echo $e->getMessage();

        }

    }

        

}

