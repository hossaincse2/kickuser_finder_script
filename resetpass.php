<?php
error_reporting(0);
session_start();
include_once 'include/class.user.php';
$user = new User();
 
if(empty($_GET['id']) && empty($_GET['code']))
{
 $user->redirect('index.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
  $id = $_GET['id'];
  $code = $_GET['code'];
 
 $stmt = $user->_dbh->prepare("SELECT * FROM users WHERE id=:uid AND tokenCode=:token");
 $stmt->execute(array(":uid"=>$id,":token"=>$code));
 $rows = $stmt->fetch(PDO::FETCH_ASSOC);
  //print_r($rows); die();

 
 if($stmt->rowCount() == 1)
 {
  if(isset($_POST['btn-reset-pass']))
  {
   $pass = $_POST['pass'];
   $cpass = $_POST['confirm-pass'];
   
   if($cpass!==$pass)
   {
    $msg = "<div class='alert alert-block'>
      <button class='close' data-dismiss='alert'>&times;</button>
      <strong>Sorry!</strong>  Password Doesn't match. 
      </div>";
   }
   else
   {
    $stmt = $user->_dbh->prepare("UPDATE users SET password=:upass WHERE id=:uid");
    $stmt->execute(array(":upass"=>$cpass,":uid"=>$rows['id']));
    
    $msg = "<div class='alert alert-success'>
      <button class='close' data-dismiss='alert'>&times;</button>
      Password Changed.
      </div>";
    header("refresh:3;login.php");
   }
  } 
 }
 else
 {
  exit;
 }
 
 
}

?>
 
<?php include 'part/header.php'; ?>	 
			<section class="page-header page-header-xs dark">
				<div class="container">
					<h1>Reset Password</h1>
				</div>
			</section>
			<!-- /PAGE HEADER -->
		 
			<section>
				<div class="container">
					
					<div class="row">

						<!-- LOGIN -->
						<div class="col-md-6 col-sm-6">

							<!-- login form -->
							<div class='alert alert-success'>
								<strong>Hello !</strong>  <?php echo $rows['username'] ?> you are here to reset your forgetton password.
							</div>
								<form class="form-signin sky-form boxed" method="post">
									<header class="size-18 margin-bottom-20">Reset Your Password</header>
									<fieldset class="nomargin">
										<?php
											if(isset($msg))
											{
												echo $msg;
											}
										?>
									<label class="input margin-bottom-10">
										<i class="ico-append fa fa-envelope"></i>
										<input type="password" class="input-block-level" placeholder="New Password" name="pass" required />
									</label>
									<label class="input margin-bottom-10">
										<i class="ico-append fa fa-envelope"></i>
										<input type="password" class="input-block-level" placeholder="Confirm New Password" name="confirm-pass" required />
									</label>
								
								
									<hr />
									<button class="btn btn-large btn-primary margin-left-0" type="submit" name="btn-reset-pass">Reset Your Password</button>
									<fieldset class="nomargin">  
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

