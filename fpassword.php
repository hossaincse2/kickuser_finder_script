<?php
//error_reporting(0);
session_start();
include_once 'include/class.user.php';
$user = new User();

  if($user->is_loggedin()!="")
{
 $user->redirect('profile.php');
}

if(isset($_POST['btn-submit']))
{
 $email = $_POST['txtemail'];
 
 $stmt = $user->_dbh->prepare("SELECT id FROM users WHERE email=:email LIMIT 1");
 $stmt->execute(array(":email"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC); 
 if($stmt->rowCount() == 1)
 {
  $id = $row['id'];
  $code = md5(uniqid(rand()));
  
  $stmt = $user->_dbh->prepare("UPDATE users SET tokenCode=:token WHERE email=:email");
  $stmt->execute(array(":token"=>$code,"email"=>$email));
  
  $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From:  KikUser@gmail.com \r\n'.
    'Reply-To: KikUser@gmail.com \r\n'.
    'X-Mailer: PHP/' . phpversion();
  $message = '<html><body>';
$message .= 'Hello , "'.$email.'" <br /><br />';
       
      $message .= ' We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore                   this email,
       <br /><br />';
      $message .= ' Click Following Link To Reset Your Password 
       <br /><br />';
       $message .= "<a href='http://findkikuser.com/resetpass.php?id=$id&code=$code'>click here to reset your password</a> 
       <br /><br />";
      $message .= ' thank you :)';
$message .= '</body></html>';

  $subject = "Password Reset";
  
   mail($email, $subject, $message, $headers);
  
  $msg = "<div class='alert alert-success'>
     <button class='close' data-dismiss='alert'>&times;</button>
     We've sent an email to $email.
                    Please click on the password reset link in the email to generate new password. 
      </div>";
 }
 else
 {
  $msg = "<div class='alert alert-danger'>
     <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Sorry!</strong>  this email not found. 
       </div>";
 }
}
?>
 
<?php include 'part/header.php'; ?>	 
			<section class="page-header page-header-xs dark">
				<div class="container">
					<h1>Forgot Password </h1>
				</div>
			</section>
			<!-- /PAGE HEADER -->
		 
			<section>
				<div class="container">
					
					<div class="row">

						<!-- LOGIN -->
						<div class="col-md-6 col-sm-6">

							<!-- login form -->
							<form class="form-signin sky-form boxed" method="post">
								<header class="size-20 margin-bottom-20">
									Forgot Password
								</header>
								<hr />
								<fieldset class="nomargin">
									 <?php
									   if(isset($msg))
									   {
										echo $msg;
									   }else
									   {
									?>
									<div class='alert alert-info'>
										Please enter your email address. You will receive a link to create a new password via email.!
									</div>  
									<?php	}   ?>
									<label class="input margin-bottom-10">
										<i class="ico-append fa fa-envelope"></i>
										<input type="email" name="txtemail" value="" placeholder="Email address" required>
									</label>
        
									<hr />
									<button class="btn btn-danger btn-primary margin-left-0" type="submit" name="btn-submit">Generate new Password</button>
								</fieldset>
							</form>

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

