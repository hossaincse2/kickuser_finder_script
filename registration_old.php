<?php
error_reporting(0);
session_start();
 include_once 'include/class.user.php';

 $user = new User();
 $a = $user->getvalue();
 
 $country = $user->getcountry();
   
  
    if($user->is_loggedin()!="")
{
 $user->redirect('profile.php');
}
 ?>
<?php include 'part/header.php'; ?>	 
			<section class="page-header"></section>
			<!-- /PAGE HEADER -->
 			<section>
				<div class="container">
 					<div class="row">
 						<!-- LOGIN -->
						<div class="col-md-6 col-sm-6">
 							<!-- ALERT -->
  								<div class="contact_sucess_message"></div>
                                 <div class="contact_message"></div>
                                   <div class="error"></div>
 							<!-- register form -->
							<form class="nomargin sky-form boxed" id="register-form" action="#" method="post">
								<header>
									<i class="fa fa-users"></i> Register
									</header>
 								<fieldset class="nomargin">	
                                  <label class="input margin-bottom-10">
 									    <input type="text" name="username" placeholder="Username">
										<b class="tooltip tooltip-bottom-right">Must Be Needed Your Username</b>
								  </label>
                                <label class="input margin-bottom-10">
 										<input type="text" name="kikuser" placeholder="Kikuser">
										<b class="tooltip tooltip-bottom-right">Must Be Needed Your Kikuser</b>
								</label>
                                <label class="select margin-bottom-10 margin-top-20">
										<select name="country">
                                            <option value="" title="United Kingdom">Select Country</option>
											<?php foreach ($country as $value) { ?>
                                                 <option value="<?php echo $value['counrty_name']; ?>" title="United Kingdom"><?php echo $value['counrty_name']; ?></option>
                                            <?php } ?>
										</select>
										<i></i>
								 </label>
                                 <label class="input margin-bottom-10">
 										<input type="text" name="city"  placeholder="City">
										<b class="tooltip tooltip-bottom-right">Needed to verify your City</b>
								 </label>
                                 <label class="select margin-bottom-10 margin-top-20">
										<select name="gender">
                                            <option value="1" title="Guy">Select Gender</option>
											<option value="1" title="Guy">Guy</option>
                                            <option value="2" title="Girl">Girl</option>
										</select>
										<i></i>
								 </label>
								 <label class="input margin-bottom-10">
 										<input type="text" name="email" id="conemail" placeholder="Email address">
										<b class="tooltip tooltip-bottom-right">Must Be Needed Your Email</b>
								 </label>
								
								 <label class="input margin-bottom-10">
 										<input type="password" name="password" placeholder="Password">
										<b class="tooltip tooltip-bottom-right">Only characters and numbers</b>
								 </label>
								 <div class="margin-top-30">
									   <label class="checkbox nomargin"><input class="checked-agree" type="checkbox" name="agree" ><i></i>I agree to the company Terms of Service And Privacy Policy</label>
									   <label class="checkbox nomargin"><input type="checkbox" name="newsleter"><i></i>Send Me monthly NewsLetter.We promise we are not gonna spam you.</label>
								 </div>
								</fieldset>
 								<div class="row margin-bottom-20">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> REGISTER</button>
									</div>
							   </div>
 							</form>
							<!-- /register form -->
 						</div>
						<!-- /LOGIN -->
 						<!-- SOCIAL LOGIN -->
						<div class="col-md-6 col-sm-6">
							<form action="#" method="post" class="sky-form boxed">

								<header class="size-18 margin-bottom-20">
 								</header>
 								<fieldset class="nomargin">
 									<div class="row">
 										<div class="col-md-8 col-md-offset-2">
                                                 <div class="kik_img">
                                                    <a href="kikguys.php"><img src="img/kik.png"/></a> 
                                                </div>
                                                <div class="kik_img">
                                                    <a href="kikgirl.php"><img class="" src="img/kik2.png"/></a> 
                                                </div>
 										</div>
									</div>
 								</fieldset>
 								<footer>
                                  Already have an account? <a href="login.php"><strong>Back to login!</strong></a>
								</footer>
 							</form>
 						</div>
						<!-- /SOCIAL LOGIN -->
 					</div>
 				</div>
			</section>
			<!-- / -->
 <script>
     $(document).ready(function() {
		   $('#register-form').submit(function() {
		        if (!valid_email_address($("#conemail").val()))
		        {
		           $(".contact_message").html('<span style="color:red;  padding:15px; font-size:18px;">Please make sure you enter a valid email address.</span>');
		        }
		        else
		        {
		            
		           // $(".contact_message").html("<span style='color:green;'>Almost done, please check your email address to confirmation.</span>");
		            $.ajax({
		                url: 'registrationvalid.php', 
		                data: $('#register-form').serialize(),
		                type: 'POST',
                                //dataType: "json",
		                success: function(msg) {
                                    //alert(msg);
		                    if(msg=="success")
		                    {
		                        //$("#conemail").val("");
                                        //$("#subject").val("");
                                        $(".contact_message").html('');
		                        $(".contact_sucess_message").html('<span style="color:green; padding:15px; font-size:18px;">You have successfully Register.</span>');
		                        $(".error").hide();
		                    }
                                    else if(msg=="username"){
                                        $(".error").html('<span style="color:red; padding:15px; font-size:18px;">Sorry username already taken !</span>');
                                         $(".contact_message").hide();
                                    }
                                     else if(msg=="email"){
                                        $(".error").html('<span style="color:red; padding:15px; font-size:18px;">Sorry email id already taken !</span>');
                                        $(".contact_message").hide();
                                    }
                                     else if(msg=="provide username!"){
                                        $(".error").html('<span style="color:red; padding:15px; font-size:18px;">Provide username!</span>');
                                        $(".contact_message").hide();
                                    }
                                     else if(msg=="provide password!"){
                                        $(".error").html('<span style="color:red; padding:15px; font-size:18px;">Provide password!</span>');
                                        $(".contact_message").hide();
                                    }
                                    else if(msg=="provide email id!"){
                                        $(".error").html('<span style="color:red;padding:15px; font-size:18px;">Provide email id!</span>');
                                        $(".contact_message").hide();
                                    }
                                    else if(msg=="provide kikuser!"){
                                        $(".error").html('<span style="color:red; padding:15px; font-size:18px;">Provide kikuser!</span>');
                                        $(".contact_message").hide();
                                    }
                                    else if(msg=="provide agree!"){
                                        $(".error").html('<span style="color:red; padding:15px; font-size:18px;">You Agree Please Select!</span>');
                                        $(".contact_message").hide();
                                    }
                                    else if(msg=="validemail"){
                                        $(".error").html('<span style="color:red;padding:15px; font-size:18px;">Please enter a valid email address !</span>');
                                        $(".contact_message").hide();
                                    }
		                    else
		                    {
		                      $(".contact_sucess_message").html('<span style="color:red;padding:15px; font-size:18px;">Please make sure you enter a valid email address.</span>');  
		                    }
		                }
		            });
		        }
		 
		        return false;
		    });
		});
 
		function valid_email_address(email)
		{
		    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
		    return pattern.test(email);
		}
    </script>

			 
			<!-- / -->
<?php include 'part/footer.php'; ?>

