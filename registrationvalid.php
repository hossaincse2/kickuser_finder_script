<?php
 session_start();
 include_once 'include/class.user.php';

 $user = new User();
 $fname='';$lname='';$username='';$kikuser='';$about='';$country='';$city='';$email='';$password='';
 $gender='';$agree='';$newsleter='';$phone='';$other_accounts='';$website='';$profile_img='';
 if(isset($_POST['fname']) && !empty($_POST['fname']))$fname = trim($_POST['fname']);
 if(isset($_POST['lname']) && !empty($_POST['lname'])) $lname = trim($_POST['lname']);
 if(isset($_POST['username']) && !empty($_POST['username'])) $username = trim($_POST['username']);
 if(isset($_POST['kikuser']) && !empty($_POST['kikuser']))$kikuser = trim($_POST['kikuser']);
 if(isset($_POST['about']) && !empty($_POST['about'])) $about = trim($_POST['about']);
 if(isset($_POST['country']) && !empty($_POST['country'])) $country = trim($_POST['country']);
 if(isset($_POST['city']) && !empty($_POST['city']))$city = trim($_POST['city']);
 if(isset($_POST['email']) && !empty($_POST['email'])) $email = trim($_POST['email']);
 if(isset($_POST['password']) && !empty($_POST['password'])) $password = trim($_POST['password']);
 if(isset($_POST['gender']) && !empty($_POST['gender']))$gender = trim($_POST['gender']);
 if(isset($_POST['agree']) && !empty($_POST['agree'])) $agree = trim($_POST['agree']);
 if(isset($_POST['newsleter']) && !empty($_POST['newsleter'])) $newsleter = trim($_POST['newsleter']);
 if(isset($_POST['phone']) && !empty($_POST['phone'])) $phone = trim($_POST['phone']);
 if(isset($_POST['other_accounts']) && !empty($_POST['other_accounts'])) $other_accounts = trim($_POST['other_accounts']);
 if(isset($_POST['website']) && !empty($_POST['website'])) $website = trim($_POST['website']);
 if(isset($_POST['profile_img']) && !empty($_POST['profile_img'])) $profile_img = trim($_POST['profile_img']);
        
        
        $myarray = array("fname"=>$fname,"lname"=>$lname,"username"=>$username,"kikuser"=>$kikuser,"about"=>$about,"country"=>$country,"city"=>$city,"email"=>$email,"password"=>$password,"gender"=>$gender,"agree"=>$agree,"newsleter"=>$newsleter,"phone"=>$phone,"other_accounts"=>$other_accounts,"website"=>$website,"profile_img"=>$profile_img);
 
    if($username=="") {
       echo "provide username!"; 
   }
   else if($kikuser=="") {
       echo "provide kikuser!"; 
   }
   else if($agree=="") {
       echo "provide agree!"; 
   }
   else if($email=="") {
      echo "provide email id!"; 
   }
   else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo 'validemail';
   }
   else if($password=="") {
      echo "provide password!";
   }
   else if(strlen($password) < 6){
      echo "Password must be atleast 6 characters"; 
   }
   else
   {
       
         $stmt = $user->_dbh->prepare("SELECT username,email FROM users WHERE username=:username OR email=:email");
         $stmt->execute(array(':username'=>$username, ':email'=>$email));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if($row['username']==$username) {
            echo "username";
         }
         else if($row['email']==$email) {
             echo "email";
         }
         else
         {
             if($user->register($myarray))
            {
                //$setting->redirect('sign-up.php?joined');
                 echo 'success';
                  
            }
         }
          
}