 $(document).ready(function() {
		    $('#search-form').submit(function() {
		        if (!valid_email_address($("#email").val()))
		        {
		            $(".message").html('Please make sure you enter a valid email address.');
		        }
		        else
		        {
		            
		            $(".message").html("<span style='color:green;'>Almost done, please check your email address to confirmation.</span>");
		            $.ajax({
		                url: 'check.php', 
		                data: $('#search-form').serialize(),
		                type: 'POST',
		                success: function(msg) {
		                    if(msg=="success")
		                    {
                                        _toastr("Subscribed! Thank you!","bottom-right","primary",false);
		                          
		                    }
                                    else if(msg=="email"){
                                        _toastr("Already Taken This Email!","bottom-right","error",false);
                                    }
		                    else
		                    {
		                      $(".message").html('Please make sure you enter a valid email address.');  
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