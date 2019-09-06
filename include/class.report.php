<?php
 include_once "class.db.php";
class Report {
//put your code here
     public function __construct() {
        $db = Db::getInstance();
        $this->_dbh = $db->getConnection();
    }
    
public function report_send($myarray){// print_r($myarray); die();
        $date = date("Y-m-d H:i:s");
        $user_id = $myarray['user_id'];
        $report_id =$myarray['report_id'];
        $report =  $myarray['report'];
         
         try {
            //$new_password = password_hash($user_pass, PASSWORD_DEFAULT);

            $stmt = $this->_dbh->prepare("INSERT INTO report(user_id,report_id,report,date) VALUES(:user_id,:report_id,:report,:date)");
            
             $stmt->bindparam(":user_id", $user_id);
            $stmt->bindparam(":report_id", $report_id);
            $stmt->bindparam(":report", $report);
            $stmt->bindparam(":date", $date);
            $stmt->execute();

            //print_r($stmt);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
}
    
}
