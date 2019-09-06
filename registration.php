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

			<section class="page-header page-header-xs dark">
				<div class="container">
					<h1>Registration - Easy as Pie</h1>
				</div>
			</section>
			<!-- /PAGE HEADER -->
			

			
			
			<!-- -->
			<section>
				<div class="container">

					<div class="row">

						<!-- REGISTER -->
						<div class="col-md-8 col-sm-7">


							<div class="box-static box-transparent box-bordered padding-30">

								<div class="box-title margin-bottom-30">
									<h2 class="size-20">Don't have an account yet?</h2>
								</div>
								
  								<div class="contact_sucess_message margin-bottom-20"></div>
								<div class="contact_message margin-bottom-20"></div>
								<div class="error margin-bottom-20"></div>
						

								<form class="nomargin sky-form" id="register-form" action="#" method="post"  enctype="multipart/form-data">
									<fieldset>

										<div class="row">
											<div class="form-group">

												<div class="col-md-6 col-sm-6">
													<label>Username *</label>
													<label class="input margin-bottom-10">
														<input type="text" name="username">
														<b class="tooltip tooltip-bottom-right">Your Desired Username For This Site</b>
													</label>
												</div>

												<div class="col-md-6 col-sm-6">
													<label for="register:last_name">KIK Username *</label>
													<label class="input margin-bottom-10">
														<input type="text" name="kikuser">
														<b class="tooltip tooltip-bottom-right">Your KIK Username</b>
													</label>
												</div>

											</div>
										</div>

										<div class="row">
											<div class="form-group">

												<div class="col-md-6 col-sm-6">
													<label for="register:city">City</label>
													<label class="input margin-bottom-10">
														<input type="text" name="city" >
														<b class="tooltip tooltip-bottom-right">Your City</b>
													</label>
												</div>

												<div class="col-md-6 col-sm-6">
													<label for="register:country">Country</label>
													<label class="select margin-bottom-10">
																<select name="country">
																	<option value="UNITED STATES" title="UNITED STATES">UNITED STATES</option>
																	<?php foreach ($country as $value) { ?>
																		 <option value="<?php echo $value['counrty_name']; ?>" title="<?php echo $value['counrty_name']; ?>"><?php echo $value['counrty_name']; ?></option>
																	<?php } ?>
																</select>
													</label>
												</div>

											</div>
										</div>

										<div class="row">
											<div class="form-group">

												<div class="col-md-6 col-sm-6">
													<label for="register:gender">Gender</label>
													<label class="select margin-bottom-10">
														<select name="gender">
															<option value="1" title="Guy">Guy</option>
															<option value="2" title="Girl">Girl</option>
														</select>
													</label>
												</div>

												<div class="col-md-6 col-sm-6">
													<label for="register:email">Email *</label>
													<label class="input margin-bottom-10">
														<input type="text" name="email" id="conemail" placeholder="Email address">
														<b class="tooltip tooltip-bottom-right">Your Valid Email Address</b>
													</label>
												</div>

											</div>
										</div>

										<div class="row">
											<div class="form-group">

												<div class="col-md-6 col-sm-6">
													<label for="register:pass1">Password *</label>
													<label class="input margin-bottom-10">
														<input type="password" name="password" placeholder="Password">
														<b class="tooltip tooltip-bottom-right">Min. 6 characters</b>
													</label>
												</div>
											</div>
										</div>
										
										<hr />

										<label class="checkbox nomargin"><input class="checked-agree" type="checkbox" name="agree" ><i></i>I agree to the company Terms of Service And Privacy Policy</label>
										<label class="checkbox nomargin"><input type="checkbox" name="newsleter"><i></i>Send Me monthly NewsLetter.We promise we are not gonna spam you.</label>

									</fieldset>

									<div class="row">
										<div class="col-md-12">
											<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> REGISTER</button>
										</div>
									</div>

								</form>
								
							</div>

						</div>
						<!-- /REGISTER -->
						
						<!-- adv -->
						<div class="col-md-4 col-sm-5">
							<div class="kik_img">
								<a href="<?php echo $base_url ?>/kikguys"><img src="<?php echo $base_url ?>/img/kik.png"/></a> 
							</div>
							<div class="kik_img">
								<a href="<?php echo $base_url ?>/kikgirl"><img class="" src="<?php echo $base_url ?>/img/kik2.png"/></a> 
							</div>
						</div>
						<!-- /adv -->						


					</div>

				</div>
			</section>
			<!-- / -->			
			
			
			
			
			
			
 <script>
     $(document).ready(function() {
		   $('#register-form').submit(function() {
		        if (!valid_email_address($("#conemail").val()))
		        {
		           $(".contact_message").html('<span class="alert alert-mini alert-danger">Please enter a valid email address !</span>');
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
		                        $(".contact_sucess_message").html('<span class="alert alert-success">You have successfully Registered. <strong><a href="/login">Click Here</a></strong> to login.</span>');
		                        $(".error").hide();
		                    }
                                    else if(msg=="username"){
                                        $(".error").html('<span class="alert alert-mini alert-danger">Sorry this username is already taken !</span>');
                                         $(".contact_message").hide();
                                    }
                                     else if(msg=="email"){
                                        $(".error").html('<span class="alert alert-mini alert-danger">Sorry this email is already taken !</span>');
                                        $(".contact_message").hide();
                                    }
                                     else if(msg=="provide username!"){
                                        $(".error").html('<span class="alert alert-mini alert-danger">Provide username please!</span>');
                                        $(".contact_message").hide();
                                    }
                                     else if(msg=="provide password!"){
                                        $(".error").html('<span class="alert alert-mini alert-danger">Provide password please!</span>');
                                        $(".contact_message").hide();
                                    }
                                    else if(msg=="provide email id!"){
                                        $(".error").html('<span class="alert alert-mini alert-danger">Provide email please!</span>');
                                        $(".contact_message").hide();
                                    }
                                    else if(msg=="provide kikuser!"){
                                        $(".error").html('<span class="alert alert-mini alert-danger">Provide kik username please!</span>');
                                        $(".contact_message").hide();
                                    }
                                    else if(msg=="provide agree!"){
                                        $(".error").html('<span class="alert alert-mini alert-danger">Please check the Terms and Agreement box!</span>');
                                        $(".contact_message").hide();
                                    }
                                    else if(msg=="validemail"){
                                        $(".error").html('<span class="alert alert-mini alert-danger">Please enter a valid email address !</span>');
                                        $(".contact_message").hide();
                                    }
		                    else
		                    {
		                      $(".contact_sucess_message").html('<span class="alert alert-mini alert-danger">Please enter a valid email address !</span>');  
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

