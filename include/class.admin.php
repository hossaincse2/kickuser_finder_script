<?php
 
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

    public function getvalue() {

        $user_id = $_SESSION['user_session'];
        $stmt = $this->_dbh->prepare("SELECT * FROM reg WHERE id=:user_id");
        $stmt->execute(array(":user_id" => $user_id));
        $userRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $userRow ;
    }
   
}
