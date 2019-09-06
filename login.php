<?php
error_reporting(0);
session_start();
include_once 'include/class.user.php';
$user = new User();
$login = $user->login();

  if($user->is_loggedin()!="")
{
 $user->redirect('profile');
}

if(isset($_POST['submit']))
{
 $uname = $_POST['emailusername'];
 $umail = $_POST['emailusername'];
 $upass = $_POST['password'];
 
 if (isset($_POST['remember'])) {
            /* Set cookie to last 1 year */
            setcookie('remember', $_POST['remember'], time()+60*60*24*365);
            setcookie('emailusername', $_POST['emailusername'], time()+60*60*24*365);
            setcookie('password', $_POST['password'], time()+60*60*24*365);
        
        } else {
            /* Cookie expires when browser closes */
            setcookie('remember', $_POST['remember'], false);
            setcookie('emailusername', $_POST['emailusername'], false);
            setcookie('password',  $_POST['password'], false);
        }
  
 $myarray = array('emailusername'=>$uname,'emailusername'=>$umail,'password'=>$upass);
 
 
 $stmt = $user->_dbh->prepare("SELECT * from users where email = '$umail' or username = '$uname' && password = '$upass'");
         $stmt->execute(array(':comment_id'=>$comment_id));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
        // print_r($row);         die();
 if($uname == '' && $upass == ''){
     $error[] = "Please Give User And Password";
 }
else if($uname != $row['email'] || $upass != $row['password'] )
 {
  $error[] = "Username And Password Don't Match!";
 } 
 else if($row['suspended']==2)
 {
  $error[] = "You are Suspended By Admin!";
 } 
 else{
 if($user->login($myarray))
 {
      if(isset($_SESSION['url'])){
   $url = $_SESSION['url']; 
    header("Location:$url");  
      }
else {
   $user->redirect('profile');  
}
 
 // $user->redirect('profile.php');
 }
 }
 
}
?>
<?php include 'part/header.php'; ?>	 
			<section class="page-header page-header-xs dark">
				<div class="container">
					<h1>Sign In </h1>
				</div>
			</section>
			<!-- /PAGE HEADER -->
		 
			<section>
				<div class="container">
					
					<div class="row">

						<!-- LOGIN -->
						<div class="col-md-6 col-sm-6">

							<!-- login form -->
							<form action="" method="post" class="sky-form boxed">

								<header class="size-20 margin-bottom-20">
									Login
								</header>
								
								<fieldset class="nomargin">
                                                                    
                                                                           <?php if($_COOKIE['emailusername']){ ?>
									<label class="input margin-bottom-10">
										<i class="ico-append fa fa-envelope"></i>
                                                                                <input required type="email" name="emailusername" value="<?php echo $_COOKIE['emailusername']; ?>" placeholder="Email address">
 									</label>
                                                                           <?php }else{ ?>
                                                                    <label class="input margin-bottom-10">
										<i class="ico-append fa fa-envelope"></i>
                                                                                <input required type="email" name="emailusername" placeholder="Email address">
 									</label>
                                                                           <?php } ?>
                                                                    <?php if($_COOKIE['password']){ ?>
 									<label class="input margin-bottom-10">
										<i class="ico-append fa fa-lock"></i>
										<input required type="password" name="password" value="<?php echo $_COOKIE['password']; ?>" placeholder="Password">
 									</label>
                                                                    <?php }else{ ?>
                                                                    <label class="input margin-bottom-10">
										<i class="ico-append fa fa-lock"></i>
										<input required type="password" name="password" placeholder="Password">
 									</label>
                                                                    <?php } ?>

									<div class="clearfix note margin-bottom-30">
										<a class="pull-right" href="fpassword.php">Forgot Password?</a>
									</div>
									
									<label class="checkbox weight-300">
                                                                            <?php if(isset($_COOKIE['remember'])) { ?>
                                                                            <input type="checkbox" name="remember" checked="checked" value="1">
                                                                              <?php
                                                                          } else {  ?>
                                                                            <input type="checkbox" name="remember"  value="1">
                                                                            <?php  } ?>
										<i></i> Keep me logged in
									</label>
                                                                    

								</fieldset>

								<footer>
									<button type="submit" name="submit" class="btn btn-primary noradius pull-right"><i class="fa fa-check"></i> OK, LOG IN</button>
								</footer>

							</form>
							<!-- /login form -->

							<!-- ALERT -->
							<?php
							if(isset($error))
							{
							foreach($error as $error)
							{
							?>
							  <div class="alert alert-mini alert-danger margin-bottom-30">
								  <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
							  </div>
							<?php } }?>
							 <!-- /ALERT -->

						</div>
						<!-- /LOGIN -->

						<!-- adv -->
						<div class="col-md-4 col-sm-5 col-md-offset-2 col-sm-offset-1">
							<div class="kik_img">
								<a href="/kikguys"><img src="img/kik.png"/></a> 
							</div>
							<div class="kik_img">
								<a href="/kikgirl"><img class="" src="img/kik2.png"/></a> 
							</div>
						</div>
						<!-- /adv -->	

					</div>

					
				</div>
			</section>
			<!-- / -->
 

			 
			<!-- / -->
<?php include 'part/footer.php'; ?>

